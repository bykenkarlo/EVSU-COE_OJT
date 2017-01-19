<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UploadController extends CI_Controller {

	public function upload_file()
   {	
   			$this->load->model('login_user_model');
	    	$cdr_id = $this->input->post('cdr_id');
	        $target_dir = "assets/uploads/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}
			// Check if file already exists
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($FileType != "pdf") {
					$this->message('message','danger' ,'Sorry, only .PDF files are allowed.');	
			    $uploadOk = 0;
			}
			
			// Check if $uploadOk is set to 0 by an error
			 else {
			    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					$this->message('message','success' ,'Success, The file '. basename( $_FILES["fileToUpload"]["name"]).' has been uploaded');	

			    } else {
					$this->message('message','danger' ,'Sorry, there was an error uploading your file.');		

			    }
			}
		$data = array('cdr_id'=>$cdr_id, 'pdf_file'=>$target_file);
		$this->login_user_model->insertfile($data, $cdr_id);
		redirect('/Login/uploads');
    }


    public function message($message, $alert, $parag)
	{
		$this->session->set_flashdata($message, "<div class='alert alert-".$alert." alert-dismissable fade in'>
			<span class='glyphicon glyphicon-exclamation-sign' area-hiden='true'></span>&nbsp;".$parag.'<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.
		"</div>" );
	}
  	
}



