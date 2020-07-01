<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Model_pencipta extends CI_Model {

    public function getPencipta($id_pencipta){
      $this->db->from('pencipta');
      $this->db->where('id_pencipta', $id_pencipta);

      $query = $this->db->get();
      return $query->result();
    }

    public function editpencipta($id_pencipta, $nama_pencipta, $share, $is_active){
    	
    	$data = array(
    		'id_pencipta' => $id_pencipta,
            'nama_pencipta' => $nama_pencipta,          
    		'share' => $share,    		
    		'is_active' => $is_active

    	);   	
		 	

    	$this->db->where('id_pencipta', $id_pencipta);
    	$this->db->update('pencipta', $data);

		 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  									Your Pencipta has been Update!</div>');
			redirect('pencipta');
    }

    public function _deleteData($id_pencipta){
    	
    	$sql = 'select * from webmusik.pencipta where id_pencipta = ?';
    	$query=$this->db->query($sql, array($id_pencipta))->result_array();
    	if (count($query) > 0) {    		

    		// delete data di database
    		$this->db->where('id_pencipta',$id_pencipta);
    		$this->db->delete('webmusik.pencipta');

    				 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    		  									Your pencipta has been Deleted!</div>');
    	}
    	else
    	{
    				 	$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
    		  									The pencipta doessnot exist!</div>');
    	}

    	redirect('pencipta');
    	
    }

}