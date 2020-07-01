<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Pencipta extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('model_pencipta');
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
	}

	public function index(){

		if (!$this->session->userdata('email')){
			redirect('admin');
		}

		$data['title'] = 'List Pencipta';
		 $data['user'] = $this->db->get_where('user', ['email' =>
		 $this->session->userdata('email')])->row_array();

		 $data['pencipta'] = $this->db->get('pencipta')->result_array();

		 $this->form_validation->set_rules('nama_pencipta', 'Nama_pencipta', 'required');		

		 if ($this->form_validation->run() == false) {
	     $this->load->view("admin/_partials/head", $data);
	     $this->load->view("admin/_partials/sidebar", $data);
	     $this->load->view("admin/_partials/navbar", $data);
	     $this->load->view("admin/pencipta", $data);
	     $this->load->view("admin/_partials/footer" );
	     $this->load->view("admin/_partials/modal");
	     $this->load->view("admin/auth_footer");
		 	
		 } else {

				$nama_pencipta = $this->input->post('nama_pencipta');
				$share = $this->input->post('share');
				$check = isset($_POST['is_active']) ? 1 : 0;		 		

		 		
		 		$this->db->set('nama_pencipta', $nama_pencipta);
		 		$this->db->set('share', $share);
		 		$this->db->set('is_active', $check);
		 		$this->db->insert('pencipta');
		 	
		 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  									Pencipta Added</div>');
			redirect('pencipta');
		 }

	}

	public function edit_pencipta(){

		$data['title'] = 'Edit Pencipta';
		$data['user'] = $this->db->get_where('user', ['email' =>
		 $this->session->userdata('email')])->row_array();

		$data['pencipta'] = $this->model_pencipta->getPencipta($_GET['ID']);

		$this->load->view("admin/_partials/head", $data);
	     $this->load->view("admin/_partials/sidebar", $data);
	     $this->load->view("admin/_partials/navbar", $data);
	     $this->load->view("admin/edit_pencipta", $data);
	     $this->load->view("admin/_partials/footer" );
	     $this->load->view("admin/_partials/modal");
	     $this->load->view("admin/auth_footer");	     
		
	}

	public function p_editpencipta(){
		$id_pencipta = $this->input->post('id_pencipta');
		$nama_pencipta = $this->input->post('nama_pencipta');
		$share = $this->input->post('share');
		$is_active = $this->input->post('is_active');

				

		$this->model_pencipta->editpencipta($id_pencipta, $nama_pencipta, $share, $is_active);


	}

	public function hapuspencipta(){
		$this->model_pencipta->_deleteData($_GET['ID']);		
	}

	public function upload(){

		if (!$this->session->userdata('email')){
			redirect('admin');
		}

		$data['title'] = 'Upload Pencipta';
		 $data['user'] = $this->db->get_where('user', ['email' =>
		 $this->session->userdata('email')])->row_array();

		// $data['slider'] = $this->db->get('slider')->result_array();

		// $this->form_validation->set_rules('excelfile', 'Excelfile', 'required');

		 
	     $this->load->view("admin/_partials/head", $data);
	     $this->load->view("admin/_partials/sidebar", $data);
	     $this->load->view("admin/_partials/navbar", $data);
	     $this->load->view("admin/uploadpencipta", $data);
	     $this->load->view("admin/_partials/footer" );
	     $this->load->view("admin/_partials/modal");
	     $this->load->view("admin/auth_footer");
	 	
	 		
        $fileName = $this->input->post('excelfile', TRUE);
         
        $config['upload_path'] = './excel/'; //buat folder dengan nama assets di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;
         
        $this->load->library('upload');
        $this->upload->initialize($config);
         
        if(! $this->upload->do_upload('excelfile') ){
        $this->upload->display_errors();
        }else {
        $media = $this->upload->data();
        $inputFileName = 'excel/'.$media['file_name'];
         
        try {
                $inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }
 
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
             
            for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);
                                                 
                //Sesuaikan sama nama kolom tabel di database                                
                 $data = array(                    
                    "Nama_pencipta"=> $rowData[0][0],
                    "share"=> $rowData[0][1],
                    "is_active"=> $rowData[0][2]
                );
                 
                //sesuaikan nama dengan nama tabel
                $insert = $this->db->insert("pencipta",$data);

                delete_files($media['file_path']);
                     
            }
           	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  									Pencipta Added Upload!</div>');
        	redirect('pencipta');
         	}
         	
   }
}
