<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class User_data extends CI_Controller {
	public function __construct()
    {
		parent::__construct();
		$this->load->model('model_user');
	}

	public function index(){
		
		$cd_akses = $this->session->userdata('role_id');
		if (!$this->session->userdata('email')){
			redirect('admin');
		} else if (in_array($cd_akses, array('2'))) {
			redirect('user');
		}

		 $data['title'] = 'User Data';
		 $data['user'] = $this->db->get_where('user', ['email' =>
		 $this->session->userdata('email')])->row_array();

		 $data['menu'] = $this->db->get('user')->result_array();

	     $this->load->view("admin/_partials/head", $data);
	     $this->load->view("admin/_partials/sidebar", $data);
	     $this->load->view("admin/_partials/navbar", $data);
	     $this->load->view("admin/user_data", $data);
	     $this->load->view("admin/_partials/footer");
	     $this->load->view("admin/_partials/modal");
	     $this->load->view("admin/auth_footer");  
	}

	public function edit(){

		$data['title'] = 'Edit User';
		 $data['user'] = $this->db->get_where('user', ['email' =>
		 $this->session->userdata('email')])->row_array();

		 $this->form_validation->set_rules('name', 'Full Name', 'required|trim' );

		 if ($this->form_validation->run() == false) {
		 $this->load->view("admin/_partials/head", $data);
	     $this->load->view("admin/_partials/sidebar", $data);
	     $this->load->view("admin/_partials/navbar", $data);
	     $this->load->view("admin/edit", $data);
	     $this->load->view("admin/_partials/footer");
	     $this->load->view("admin/_partials/modal");
	     $this->load->view("admin/auth_footer");  
		 	
		 } else {
		 	$name = $this->input->post('name');
		 	$email = $this->input->post('email');

		 	//cek jika ada gambar
		 	$upload_image = $_FILES['image']['name'];

		 	if ($upload_image) {
		 		$config['allowed_types'] = 'gif|jpg|png';
		 		$config['max_size'] 	= '2048';
		 		$config['upload_path'] 	= './asset/img/myprofil/';

		 		$this->load->library('upload', $config);

		 		if ($this->upload->do_upload('image')) {
		 			$old_image = $data['user']['image'];
		 			if ($old_image != 'default.jpg') {
		 				unlink(FCPATH . 'asset/img/myprofil/' . $old_image);
		 			}
		 			$new_image = $this->upload->data('file_name');
		 			$this->db->set('image', $new_image);
		 		} else {
		 			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
					redirect('user');
		 		}
		 	}

		 	$this->db->set('name', $name);
		 	$this->db->where('email', $email);
		 	$this->db->update('user');

		 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  									Your Profile has been Update!</div>');
			redirect('user');

		 }

	}

	public function hapususer(){
		$this->model_user->_deleteUser($_GET['ID']);		
	}

	public function changepassword(){

		 $data['title'] = 'Change Password';
		 $data['user'] = $this->db->get_where('user', ['email' =>
		 $this->session->userdata('email')])->row_array();

		 $this->form_validation->set_rules('current_password','Current Password', 'required|trim');
		 $this->form_validation->set_rules('new_password1','New Password', 'required|trim|min_length[3]|matches[new_password2]');
		 $this->form_validation->set_rules('new_password2','Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

		if ($this->form_validation->run() == false) {
	     $this->load->view("admin/_partials/head", $data);
	     $this->load->view("admin/_partials/sidebar", $data);
	     $this->load->view("admin/_partials/navbar", $data);
	     $this->load->view("admin/changepassword", $data);
	     $this->load->view("admin/_partials/footer");
	     $this->load->view("admin/_partials/modal");
	     $this->load->view("admin/auth_footer");  
		} else {
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');

			if (!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
  									Wrong Current Password!</div>');
			redirect('changepassword');
			}else{
				if ($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
  									New Password cannot be the same current Password </div>');
					redirect('changepassword');
				}else {
					//password sudah ok
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  									Password change!</div>');
					redirect('changepassword');
				}
			}

		}


 	 }





}