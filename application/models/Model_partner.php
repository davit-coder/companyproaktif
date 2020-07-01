<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Model_partner extends CI_Model {

    public function getPartner($partner_id){
      $this->db->from('partner');
      $this->db->where('partner_id', $partner_id);

      $query = $this->db->get();
      return $query->result();
    }

    public function editpartner($partner_id, $url_yt, $is_active){
    	
    	$data = array(
    		'partner_id' => $partner_id,
    		'url_yt' => $url_yt,    		
    		'is_active' => $is_active

    	);
    	
		 	$upload_image = $_FILES['image']['name'];

		 	if ($upload_image) {
		 		$config['allowed_types'] = 'gif|jpg|png';
		 		$config['max_size'] 	= '2048';
		 		$config['upload_path'] 	= './asset/img/partner/';

		 		$this->load->library('upload', $config);

		 		if ($this->upload->do_upload('image')) {
                    // print_r($data);die();
                    $sql = 'select * from partner where partner_id = '.$partner_id;
                    $query = $this->db->query($sql,array())->result_array();
                    if (count($query) > 0) {
                        // print_r($query);die();
                        $old_image = $query[0]['img_partner'];
                        // print_r($old_image);die();
                        $path = FCPATH . 'asset/img/partner/' . $old_image;
                        if ($old_image != 'default.jpg' && file_exists($path) ) {
                            unlink($path);
                        }
                    }
		 			
		 			$new_image = $this->upload->data('file_name');
		 			$this->db->set('img_partner', $new_image);
		 		} else {
		 			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
					redirect('partner');
		 		}
		 	}

    	$this->db->where('partner_id', $partner_id);
    	$this->db->update('partner', $data);

		 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  									Your Partner has been Update!</div>');
			redirect('partner');
    }

    public function _deleteImage($partner_id){
    	//$slider = $this->get($slider_id);
    	//print_r($slider_id);die();

    	// cari file di database
    	$sql = 'select * from webmusik.partner where partner_id = ?';
    	$query=$this->db->query($sql, array($partner_id))->result_array();
    	if (count($query) > 0) {
    		$filename = $query[0]['img_partner'];
    		// delete file dahulu
    		$path = FCPATH. "asset/img/partner/".$filename;
    		unlink($path);

    		// delete data di database
    		$this->db->where('partner_id',$partner_id);
    		$this->db->delete('webmusik.partner');

    				 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    		  									Your Partner has been Deleted!</div>');
    	}
    	else
    	{
    				 	$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
    		  									The Partner doesnot exist!</div>');
    	}

    	redirect('partner');
    	
    }

}