<?php
class Email extends CI_Controller {

public function __construct()
			{
				parent::__construct();		

				$this->load->library(array('email', 'form_validation'));
				$this->load->helper(array('email', 'form'));
			}


public function index(){
		
			$this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
			$this->form_validation->set_rules('email', 'Email Address',	'required|valid_email|callback_add_user|xss_clean');
			$this->form_validation->set_rules('subject', 'Subject', 'required|xss_clean');
			$this->form_validation->set_rules('message', 'Message', 'required|xss_clean');
			
				if($this->form_validation->run('email') == FALSE){
					$this->load->view('emailform/email'); 
				}else{
					$name = $this->input->post('name');
					$email = $this->input->post('email');
					$subject = $this->input->post('subject');
					$message = $this->input->post('message');
					$this->email->from($email, $name);
					$this->email->to('youremail@yourdomain.ext');
					$this->email->subject($subject);
					$this->email->message($message);
					$this->email->send();
				}
		} 

function add_user($email) { 
	$this->load->database();
	$query = $this->db->query("SELECT * FROM `user_data` WHERE `email` = '$email'");
	
	if($query->num_rows() === 0)
	{

	
	echo "email is ok!!";
	}
	else {
	 echo "email already exist!!";
	}
	
	$this->email->send();
	$data['msg'] = "Thank you, your email has now been sent.";
	$this->load->view('email_success', $data);


}

function check_email_availablity()
{
	$this->load->model('My_model');
	$get_result = $this->My_model->check_email_availablity();
 
	if(!$get_result )
	echo '<span style="color:#f00">Email already in use. </span>';
	else
	echo '<span style="color:#0c0">Email Available</span>';
}
} 
?>