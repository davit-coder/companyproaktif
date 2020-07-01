<?php

class Auth extends CI_Controller {


    public function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->session->userdata('email')){
			redirect('user');
		}
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
	        $data['title'] = 'Login Page';
	        $this->load->view("admin/auth_header", $data);
	        $this->load->view("admin/login");
	        $this->load->view("admin/auth_footer");        	
        }else {
        	// validasi success
        	$this->_login();
        }
	}

	private function _login(){

		$email = $this->input->post('email');
		$password =$this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();
			// jika usernya ada
		if ($user) {
			// jika usernya aktif
			if ($user['is_active'] == 1) {
				// cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('user');
						# code...
					}else {
						redirect('user');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
  									Wrong password!</div>');
				redirect('admin');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
  									This email has not been activated!</div>');
				redirect('admin');
			}

		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
  									Email is not registered!</div>');
			redirect('admin');
		}
	}

	public function registration ()
	{
		$cd_akses = $this->session->userdata('role_id');
		if (!$this->session->userdata('email')){
			redirect('admin');
		} else if (in_array($cd_akses, array('2'))) {
			redirect('user');
		}
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
				'is_unique' => 'This email has already registered!'

			]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password dont match!!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		$data['user_role'] = $this->db->get('user_role')->result_array();

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Media Musik Proaktif Registration';
			$this->load->view("admin/auth_header", $data);
	        $this->load->view("admin/register");
	        $this->load->view("admin/auth_footer");
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => $this->input->post('role_id'),
				'is_active' => 1,
				'date_created' => time()
			];
/*
			//siapkan toker belum ada table
			$token = baes64_encode(rando_bytes(32));
			$user_token = [
				'email' => $email,
				'token' => $email,
				'date_created' => time()
			];*/

			$this->db->insert('user', $data);
			/*$this->db->insert('user_token', $user_token);

			$this->_sendEmail($token, 'verify');*/

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  									Congratulation! your account has been created. please acvitvate you account!</div>');
			redirect('user');
		}
	}

	/*private function _sendEmail($token, $type){

		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtop/googlemail.com',
			'smtp_user' => '',
			'smtp_pass' => '',
			'smtp_port' => 465,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"
		];

		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('email@gmail.com', 'Davit Chandra CMS');
		$this->email->to($this->input->post('email'));

		if ($type == 'verify') {
		$this->email->subject('Account Verification');
		$this->email->message('Click this link to verify you account : <a href="'. base_url() . 'auth/verify?email=' . $this->input->post('email') . '$token=' . urlencode($token) .'">Activate</a>');
		}

		if($this->email->send()){
			return true;
		} else {
			echo $this->email->print_debugger();
		}
	}

	public function verify(){

		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' =>$email])->row_array();

		if($user){
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if ($user_token) {
				if (time() - $user_token['date_created'] < 30) {
					$this->db->set('is_active', 1);
					$this->db->set('email', $email);
					$this->db->update('user');

					$this->db->delete('user_token', ['email' => $email]);
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  									'.$email.' has been activated. please log in!</div>');
			redirect('admin');
					
				} else {

					$this->db->delete('user', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
  									Account activation failed! Token expired.</div>');
			redirect('admin');
				}
			}else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
  									Account activation failed! Wrong Token.</div>');
			redirect('admin');
			}

		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
  									Account activation failed! Wrong email.</div>');
			redirect('admin');
		}

	}
*/

	public function logout(){
		
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  									You have been logged out!</div>');
			redirect('admin');
	}
}