<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Partner extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('model_partner');
	}

	public function index(){

		if (!$this->session->userdata('email')){
			redirect('admin');
		}

		$data['title'] = 'List Partner';
		 $data['user'] = $this->db->get_where('user', ['email' =>
		 $this->session->userdata('email')])->row_array();

		 $data['partner'] = $this->db->get('partner')->result_array();

		 $this->form_validation->set_rules('url_yt', 'Url_yt', 'required');

		 if ($this->form_validation->run() == false) {
	     $this->load->view("admin/_partials/head", $data);
	     $this->load->view("admin/_partials/sidebar", $data);
	     $this->load->view("admin/_partials/navbar", $data);
	     $this->load->view("admin/partner", $data);
	     $this->load->view("admin/_partials/footer" );
	     $this->load->view("admin/_partials/modal");
	     $this->load->view("admin/auth_footer");
		 	
		 } else {
				$url_yt = $this->input->post('url_yt');
				$check = isset($_POST['is_active']) ? 1 : 0;	

		 		$config['allowed_types'] = 'gif|jpg|png';
		 		$config['max_size'] 	= '2048';
		 		$config['upload_path'] 	= './asset/img/partner/';

		 		$this->load->library('upload', $config);
		 		if ($this->upload->do_upload('image')) {
		 			$new_image = $this->upload->data('file_name');
		 			$this->db->set('img_partner', $new_image);
		 		} else {
		 			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
					redirect('partner');
		 		}

		 		$this->db->set('url_yt', $url_yt);
		 		$this->db->set('is_active', $check);
		 		$this->db->insert('partner');
		 	
		 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  									Partner Added</div>');
			redirect('partner');
		 }

	}

	public function edit_partner(){

		$data['title'] = 'Edit Partner';
		$data['user'] = $this->db->get_where('user', ['email' =>
		 $this->session->userdata('email')])->row_array();

		$data['partner'] = $this->model_partner->getPartner($_GET['ID']);

		$this->load->view("admin/_partials/head", $data);
	     $this->load->view("admin/_partials/sidebar", $data);
	     $this->load->view("admin/_partials/navbar", $data);
	     $this->load->view("admin/edit_partner", $data);
	     $this->load->view("admin/_partials/footer" );
	     $this->load->view("admin/_partials/modal");
	     $this->load->view("admin/auth_footer");
		
	}

	public function proses_editpartner(){
		$partner_id = $this->input->post('partner_id');
		$url_yt = $this->input->post('url_yt');
		$is_active = $this->input->post('is_active');

				

		$this->model_partner->editpartner($partner_id, $url_yt, $is_active);


	}

	public function partnerhapus(){
		$this->model_partner->_deleteImage($_GET['ID']);		
	}
}
