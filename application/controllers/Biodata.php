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

	public function download_sample()
	{
    $filename = "sample_biodata.csv";

    // Sample data
    $data = "id,name,address\n";
    $data .= "1,John Doe,New York\n";
    $data .= "2,Jane Smith,California\n";

    // Force download
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$filename");
    header("Content-Type: application/csv; ");

    echo $data;
    exit;
	}


// 	

public function import_excel()
{
    if (!empty($_FILES['excel_file']['name'])) {
        $file = $_FILES['excel_file']['tmp_name'];
        $newPath = FCPATH . 'uploads/' . $_FILES['excel_file']['name'];

        if (!move_uploaded_file($file, $newPath)) {
            $this->session->set_flashdata('error', 'File upload failed!');
            redirect('biodata');
        }

        if (($handle = fopen($newPath, "r")) !== FALSE) {
            $row = 0;
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if ($row == 0) { $row++; continue; } // skip header

                $name    = trim($data[0]); // remove extra spaces
            $address = trim($data[1]);

            if (!empty($name) && !empty($address)) {
                $insert = [
                    'name' => $name,
                    'address' => $address
                ];
                $this->db->insert('biodata_table', $insert);
            }
            $row++;
            }
            fclose($handle);
        }

        $this->session->set_flashdata('success', 'CSV data uploaded successfully!');
        redirect('biodata/add');
    } else {
        $this->session->set_flashdata('error', 'Please select a file.');
        redirect('biodata/add');
    }
}
}