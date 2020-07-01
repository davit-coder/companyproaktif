<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Model_berita extends CI_Model {

    public function getBerita($berita_id){
      $this->db->from('berita');
      $this->db->where('berita_id', $berita_id);

      $query = $this->db->get();
      return $query->result();
    }

    public function editberita($berita_id, $caption, $ket, $is_active){
    	
    	$data = array(
    		'berita_id' => $berita_id,
            'caption' => $caption,          
    		'ket' => $ket,    		
    		'is_active' => $is_active

    	);
    	
		 	$upload_image = $_FILES['image']['name'];

		 	if ($upload_image) {
		 		$config['allowed_types'] = 'gif|jpg|png';
		 		$config['max_size'] 	= '2048';
		 		$config['upload_path'] 	= './asset/img/news/';

		 		$this->load->library('upload', $config);

		 		if ($this->upload->do_upload('image')) {
		 			$old_image = $data['berita']['image'];
		 			if ($old_image != 'default.jpg') {
		 				unlink(FCPATH . 'asset/img/news/' . $old_image);
		 			}
		 			$new_image = $this->upload->data('file_name');
		 			$this->db->set('img_berita', $new_image);
		 		} else {
		 			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
					redirect('news');
		 		}
		 	}

    	$this->db->where('berita_id', $berita_id);
    	$this->db->update('berita', $data);

		 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  									Your News has been Update!</div>');
			redirect('news');
    }

    public function _deleteImage($berita_id){
    	//$slider = $this->get($slider_id);
    	//print_r($slider_id);die();

    	// cari file di database
    	$sql = 'select * from webmusik.berita where berita_id = ?';
    	$query=$this->db->query($sql, array($berita_id))->result_array();
    	if (count($query) > 0) {
    		$filename = $query[0]['img_berita'];
    		// delete file dahulu
    		$path = FCPATH. "asset/img/news/".$filename;
    		unlink($path);

    		// delete data di database
    		$this->db->where('berita_id',$berita_id);
    		$this->db->delete('webmusik.berita');

    				 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    		  									Your News has been Deleted!</div>');
    	}
    	else
    	{
    				 	$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
    		  									The News doessnot exist!</div>');
    	}

    	redirect('news');
    	
    }

}