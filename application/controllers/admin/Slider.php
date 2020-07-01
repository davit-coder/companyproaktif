<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Slider extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('model_slider');
	}

	public function index(){

		if (!$this->session->userdata('email')){
			redirect('admin');
		}

		$data['title'] = 'List Slider';
		 $data['user'] = $this->db->get_where('user', ['email' =>
		 $this->session->userdata('email')])->row_array();

		 $data['slider'] = $this->db->get('slider')->result_array();

		 $this->form_validation->set_rules('name_image', 'Name_image', 'required');

		 if ($this->form_validation->run() == false) {
	     $this->load->view("admin/_partials/head", $data);
	     $this->load->view("admin/_partials/sidebar", $data);
	     $this->load->view("admin/_partials/navbar", $data);
	     $this->load->view("admin/slider", $data);
	     $this->load->view("admin/_partials/footer" );
	     $this->load->view("admin/_partials/modal");
	     $this->load->view("admin/auth_footer");
		 	
		 } else {
				$name_image = $this->input->post('name_image');
				$check = isset($_POST['is_active']) ? 1 : 0;	

		 		$config['allowed_types'] = 'gif|jpg|png';
		 		$config['max_size'] 	= '2048';
		 		$config['upload_path'] 	= './asset/img/slider/';

		 		$this->load->library('upload', $config);
		 		if ($this->upload->do_upload('image')) {
		 			$new_image = $this->upload->data('file_name');
		 			$this->db->set('img_slider', $new_image);
		 		} else {
		 			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
					redirect('slide');
		 		}

		 		$this->db->set('name_image', $name_image);
		 		$this->db->set('is_active', $check);
		 		$this->db->insert('slider');
		 	
		 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  									Slider Added</div>');
			redirect('slide');
		 }

	}

	public function edit_slider(){

		$data['title'] = 'Edit Slider';
		$data['user'] = $this->db->get_where('user', ['email' =>
		 $this->session->userdata('email')])->row_array();

		$data['slider'] = $this->model_slider->getSlider($_GET['ID']);

		$this->load->view("admin/_partials/head", $data);
	     $this->load->view("admin/_partials/sidebar", $data);
	     $this->load->view("admin/_partials/navbar", $data);
	     $this->load->view("admin/edit_slider", $data);
	     $this->load->view("admin/_partials/footer" );
	     $this->load->view("admin/_partials/modal");
	     $this->load->view("admin/auth_footer");
		
	}

	public function proses_editSlider(){
		$slider_id = $this->input->post('slider_id');
		$name_image = $this->input->post('name_image');
		$is_active = $this->input->post('is_active');

				

		$this->model_slider->editslider($slider_id, $name_image, $is_active);


	}

	public function sliderhapus(){
		$this->model_slider->_deleteImage($_GET['ID']);		
	}



}