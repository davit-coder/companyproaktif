<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller {

	public function index(){

		if (!$this->session->userdata('email')){
			redirect('admin');
		}

		$data['title'] = 'Update Terbaru MMP';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->view("admin/_partials/head", $data);
	    $this->load->view("admin/_partials/sidebar", $data);
	    $this->load->view("admin/_partials/navbar", $data);
	    $this->load->view("admin/overview", $data);
	    $this->load->view("admin/_partials/footer");
	    $this->load->view("admin/_partials/modal");
	    $this->load->view("admin/auth_footer");
	}


}