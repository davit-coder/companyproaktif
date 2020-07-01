<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Song extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('model_song');
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
	}

	public function index(){

		if (!$this->session->userdata('email')){
			redirect('admin');
		}

		$data['title'] = 'List Catalogue';
		 $data['user'] = $this->db->get_where('user', ['email' =>
		 $this->session->userdata('email')])->row_array();

		 $data['song'] = $this->model_song->getSong();
		 $data['pencipta'] = $this->db->get('pencipta')->result_array();

		 $this->form_validation->set_rules('name_lagu', 'Name_lagu', 'required');		

		 if ($this->form_validation->run() == false) {
	     $this->load->view("admin/_partials/head", $data);
	     $this->load->view("admin/_partials/sidebar", $data);
	     $this->load->view("admin/_partials/navbar", $data);
	     $this->load->view("admin/song", $data);
	     $this->load->view("admin/_partials/footer" );
	     $this->load->view("admin/_partials/modal");
	     $this->load->view("admin/auth_footer");
		 	
		 } else {

				$id_pencipta = $this->input->post('id_pencipta');
				$name_lagu = $this->input->post('name_lagu');
				$genre = $this->input->post('genre');
				$check = isset($_POST['is_active']) ? 1 : 0;		 		

		 		
		 		$this->db->set('id_pencipta', $id_pencipta);
		 		$this->db->set('name_lagu', $name_lagu);
		 		$this->db->set('genre', $genre);
		 		$this->db->set('is_active', $check);
		 		$this->db->insert('song');
		 	
		 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  									Song Added</div>');
			redirect('song');
		 }

	}

	public function edit_song(){

		$data['title'] = 'Edit Song';
		$data['user'] = $this->db->get_where('user', ['email' =>
		 $this->session->userdata('email')])->row_array();

		$data['song'] = $this->model_song->getSongEdit($_GET['ID']);
		//$data['song'] = $this->model_song->getSong($_GET['ID']);
		
		

		$this->load->view("admin/_partials/head", $data);
	     $this->load->view("admin/_partials/sidebar", $data);
	     $this->load->view("admin/_partials/navbar", $data);
	     $this->load->view("admin/edit_song", $data);
	     $this->load->view("admin/_partials/footer" );
	     $this->load->view("admin/_partials/modal");
	     $this->load->view("admin/auth_footer");	     
		
	}

	public function p_editsong(){
		$id_pencipta = $this->input->post('id_pencipta');
		$id_song = $this->input->post('id_song');
		$name_lagu = $this->input->post('name_lagu');
		$genre = $this->input->post('genre');
		$is_active = $this->input->post('is_active');

				

		$this->model_song->editlagu($id_song, $id_pencipta, $name_lagu, $genre, $is_active);


	}

	public function hapuslagu(){
		$this->model_song->_deleteData($_GET['ID']);		
	}

	public function upload(){

		if (!$this->session->userdata('email')){
			redirect('admin');
		}               
	 	
        $fileName = $this->input->post('excelfile', TRUE);
      
        $config['upload_path'] = './excel/'; //buat folder dengan nama assets di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;
         
        $this->load->library('upload');
        $this->upload->initialize($config);
         
        if(! $this->upload->do_upload('excelfile') ){
         $error = array('error' => $this->upload->display_errors());
    	 $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  									File not found!</div>'); 
     	redirect('song'); 
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
                    "id_pencipta"=> $rowData[0][0],
                    "name_lagu"=> $rowData[0][1],
                    "genre"=> $rowData[0][2],
                    "is_active"=> $rowData[0][3]
                );
                 
                //sesuaikan nama dengan nama tabel
                $insert = $this->db->insert("song",$data);

                delete_files($media['file_path']);
                     
            }
           	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  									Song Added Upload!</div>');
        	redirect('song');
         	}
         	
   }
}
