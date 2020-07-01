<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Model_slider extends CI_Model {

    public function getSlider($slider_id){
      $this->db->from('slider');
      $this->db->where('slider_id', $slider_id);

      $query = $this->db->get();
      return $query->result();
    }

    public function editSlider($slider_id, $name_image, $is_active){
    	
    	$data = array(
    		'slider_id' => $slider_id,
    		'name_image' => $name_image,    		
    		'is_active' => $is_active

    	);
    	
		 	$upload_image = $_FILES['image']['name'];

		 	if ($upload_image) {
		 		$config['allowed_types'] = 'gif|jpg|png';
		 		$config['max_size'] 	= '2048';
		 		$config['upload_path'] 	= './asset/img/slider/';

		 		$this->load->library('upload', $config);

		 		if ($this->upload->do_upload('image')) {
		 			$old_image = $data['slider']['image'];
		 			if ($old_image != 'default.jpg') {
		 				unlink(FCPATH . 'asset/img/slider/' . $old_image);
		 			}
		 			$new_image = $this->upload->data('file_name');
		 			$this->db->set('img_slider', $new_image);
		 		} else {
		 			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
					redirect('slide');
		 		}
		 	}

    	$this->db->where('slider_id', $slider_id);
    	$this->db->update('slider', $data);

		 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  									Your Slider has been Update!</div>');
			redirect('slide');
    }

    public function _deleteImage($slider_id){
    	//$slider = $this->get($slider_id);
    	//print_r($slider_id);die();

    	// cari file di database
    	$sql = 'select * from webmusik.slider where slider_id = ?';
    	$query=$this->db->query($sql, array($slider_id))->result_array();
    	if (count($query) > 0) {
    		$filename = $query[0]['img_slider'];
    		// delete file dahulu
    		$path = FCPATH. "asset/img/slider/".$filename;
    		unlink($path);

    		// delete data di database
    		$this->db->where('slider_id',$slider_id);
    		$this->db->delete('webmusik.slider');

    				 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    		  									Your Slider has been Deleted!</div>');
    	}
    	else
    	{
    				 	$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
    		  									The Slider doesnot exist!</div>');
    	}

    	redirect('slide');
    	
    }

}