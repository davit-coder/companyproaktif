<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Model_user extends CI_Model {

    
    public function _deleteUser($id){
    	//$slider = $this->get($slider_id);
    	//print_r($slider_id);die();

    	// cari file di database
    	$sql = 'select * from webmusik.user where id = ?';
    	$query=$this->db->query($sql, array($id))->result_array();
    	if (count($query) > 0) {
    		$filename = $query[0]['image'] != 'default.jpg';            
            
    		// delete file dahulu
    		$path = FCPATH. "asset/img/myprofil/".$filename;
    		unlink($path);

    		// delete data di database
    		$this->db->where('id',$id);
    		$this->db->delete('webmusik.user');

    				 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    		  									Your ID has been Deleted!</div>');
    	}
    	else
    	{
    				 	$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
    		  									The ID doessnot exist!</div>');
    	}
    

    	redirect('usermanagement');
    	
    }

}