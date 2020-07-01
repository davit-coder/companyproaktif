<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('model_berita');
	}

	public function index(){

		if (!$this->session->userdata('email')){
			redirect('admin');
		}

		$data['title'] = 'List News';
		 $data['user'] = $this->db->get_where('user', ['email' =>
		 $this->session->userdata('email')])->row_array();

		 $data['berita'] = $this->db->get('berita')->result_array();

		

		 if ($this->form_validation->run() == false) {
	     $this->load->view("admin/_partials/head", $data);
	     $this->load->view("admin/_partials/sidebar", $data);
	     $this->load->view("admin/_partials/navbar", $data);
	     $this->load->view("admin/news", $data);
	     $this->load->view("admin/_partials/footer" );
	     $this->load->view("admin/_partials/modal");
	     $this->load->view("admin/auth_footer");
		 	
		 } /*else {
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
		 }*/

	}

	public function addnews(){

		if (!$this->session->userdata('email')){
			redirect('admin');
		}

		$data['title'] = 'Add News';
		 $data['user'] = $this->db->get_where('user', ['email' =>
		 $this->session->userdata('email')])->row_array();

		 //$data['berita'] = $this->db->get('berita')->result_array();

		 $this->form_validation->set_rules('caption', 'Caption', 'required');

		 if ($this->form_validation->run() == false) {
	     $this->load->view("admin/_partials/head", $data);
	     $this->load->view("admin/_partials/sidebar", $data);
	     $this->load->view("admin/_partials/navbar", $data);
	     $this->load->view('admin/addnews', $data);
	     $this->load->view("admin/_partials/footer" );
	     $this->load->view("admin/_partials/modal");
	     $this->load->view("admin/auth_footer");
	     $this->load->view("admin/_partials/js");
		 	
		 } else {
				$caption = $this->input->post('caption');
				$ket = $this->input->post('ket');
				$check = isset($_POST['is_active']) ? 1 : 0;

		 		$config['allowed_types'] = 'gif|jpg|png';
		 		$config['max_size'] 	= '2048';
		 		$config['upload_path'] 	= './asset/img/news/';

		 		$this->load->library('upload', $config);
		 		if ($this->upload->do_upload('image')) {
		 			$new_image = $this->upload->data('file_name');
		 			$this->db->set('img_berita', $new_image);
		 		} else {
		 			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
					redirect('news');
		 		}

		 		$this->db->set('caption', $caption);
		 		$this->db->set('ket', $ket);
		 		$this->db->set('is_active', $check);
		 		$this->db->insert('berita');
		 	
		 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  									News Added</div>');
			redirect('news');
		 }
		
	}

	public function edit_berita(){

		$data['title'] = 'Edit Berita';
		$data['user'] = $this->db->get_where('user', ['email' =>
		 $this->session->userdata('email')])->row_array();

		$data['berita'] = $this->model_berita->getBerita($_GET['ID']);

		$this->load->view("admin/_partials/head", $data);
	     $this->load->view("admin/_partials/sidebar", $data);
	     $this->load->view("admin/_partials/navbar", $data);
	     $this->load->view("admin/edit_berita", $data);
	     $this->load->view("admin/_partials/footer" );
	     $this->load->view("admin/_partials/modal");
	     $this->load->view("admin/auth_footer");
	     $this->load->view("admin/_partials/js");
		
	}

	public function p_editberita(){
		$berita_id = $this->input->post('berita_id');
		$caption = $this->input->post('caption');
		$ket = $this->input->post('ket');
		$is_active = $this->input->post('is_active');

				

		$this->model_berita->editberita($berita_id, $caption, $ket, $is_active);


	}

	public function hapusberita(){
		$this->model_berita->_deleteImage($_GET['ID']);		
	}
}
