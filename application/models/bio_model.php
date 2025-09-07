<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bio_model extends CI_Model {
    public function save_bio($data){
        //echo '<pre>';print_r($data);exit();
        $this->db->insert('biodata_table',$data);
        return $this->db->insert_id();
    }
    public function get_bio(){
        $query = $this->db->get('biodata_table');
        //echo '<pre>';print_r($query->row());exit();
        return $query->result();
    }

    public function edit_bio($id){
        $query = $this->db->get_where('biodata_table',['id'=>$id]);
        //echo '<pre>';print_r($query);exit();
        return $query->row();
    }

    public function update_bio($data,$id){
        $name=$this->input->post('name');
		$address=$this->input->post('address');

		$data=[
				'name'=>$name,
				'address'=>$address,				
			   ];

        $this->db->update('biodata_table',$data,array('id'=>$id));
    }

    public function delete_bio($id){
        return $this->db->delete('biodata_table',['id'=>$id]);
        //echo $this->db->last_query(); exit;
        // return $query->row();
    }
}
?>