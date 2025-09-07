<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('bio_model');
	}

    public function index()
	{
		$this->load->view('biodata');
	}
	public function add(){
		$name=$this->input->post('name');
		$address=$this->input->post('address');

		$data=[
				'name'=>$name,
				'address'=>$address,				
			   ];
		//echo '<pre>';print_r($data);exit();
		
		$this->bio_model->save_bio($data);
		$submission=$this->bio_model->get_bio();
		//echo '<pre>';print_r($submission);exit();
		$this->load->view('bioadd',['data'=>$submission]);
		//var_dump(get_defined_vars());
		
	}

	public function edit($id){
		$data['bio'] = $this->bio_model->edit_bio($id);
		//echo '<pre>';print_r($data['bio']);exit();
		$this->load->view('bioedit',$data);
	}

	

	public function update(){
		$id = $this->input->post('id');
		$name=$this->input->post('name');
		$address=$this->input->post('address');

		$data=[
				'id'=> $id,
				'name'=>$name,
				'address'=>$address,				
			   ];
		//echo '<pre>';print_r($data);exit();

		//echo '<pre>';print_r($data);exit();
		
		$this->bio_model->update_bio($data,$id);

    	redirect('biodata');  


	}

	public function delete($id){
		if($this->bio_model->delete_bio($id)){
		redirect('biodata');
		} else {
        echo "Delete failed!";
    	}
	}
}

