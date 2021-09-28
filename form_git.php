<?php

class Form extends Controller {
	
		function index()
		{
			$this->load->helper(array('form', 'url'));
			
			$this->load->library('validation');
			

			$rules['username']	= "trim|required|min_length[5]|max_length[12]|xss_clean";
			$rules['password']	= "trim|required|matches[passconf]";
			$rules['passconf']	= "trim|required";
			$rules['email']	    = "trim|required|valid_email";

			
			
			
			
			$this->validation->set_rules($rules);
			
			$fields['username']	= 'Username';
			$fields['password']	= 'Password';
			$fields['passconf']	= 'Password Confirmation';
			$fields['email']	= 'Email Address';
		
			$this->validation->set_fields($fields);
				
			if ($this->validation->run() == FALSE)
					{
						$this->load->view('myform');
					}
			else
					{
						$this->load->view('formsuccess');
					}
		}
		
}
?>