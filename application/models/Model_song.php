<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Model_song extends CI_Model {

    public function getSongEdit($id_song){
      $this->db->from('song');
      $this->db->where('id_song', $id_song);

      $query = $this->db->get();
      return $query->result();
    }

    public function getSong(){

        $query = 'SELECT webmusik.song.*, webmusik.pencipta.nama_pencipta
                    FROM webmusik.song JOIN webmusik.pencipta
                    ON webmusik.song.id_pencipta = webmusik.pencipta.id_pencipta
                    ';

        return $this->db->query($query)->result_array();
    }

    public function editlagu($id_song, $id_pencipta, $name_lagu, $genre, $is_active){
    	
    	$data = array(
            'id_song' => $id_song,
    		'id_pencipta' => $id_pencipta,
            'name_lagu' => $name_lagu,          
    		'genre' => $genre,    		
    		'is_active' => $is_active

    	);   	
		 	

    	$this->db->where('id_song', $id_song);
    	$this->db->update('song', $data);

		 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  									Your Song has been Update!</div>');
			redirect('song');
    }

    public function _deleteData($id_song){
    	
    	$sql = 'select * from webmusik.song where id_song = ?';
    	$query=$this->db->query($sql, array($id_song))->result_array();
    	if (count($query) > 0) {    		

    		// delete data di database
    		$this->db->where('id_song',$id_song);
    		$this->db->delete('webmusik.song');

    				 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    		  									Your Song has been Deleted!</div>');
    	}
    	else
    	{
    				 	$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
    		  									The Song doessnot exist!</div>');
    	}

    	redirect('song');
    	
    }

}