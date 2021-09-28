<?php
######################################################################################
##                                                                                   #
##  Documentation													                 #
##  PayPal_Lib Controller Class (Paypal IPN Class)								     #
##                                                                                   #
##  Paypal controller that provides functionality to the creation for PayPal forms,  #
##  submissions, success and cancel requests, as well as IPN responses.              #
##                                                                                   #
##  The class requires the use of the PayPal_Lib library and config files.           #
##                                                                                   #
##  @package     				CodeIgniter                                          #
##  @subpackage  				Libraries                                            #
##  @category    				Commerce                                             #
##  @author      				Ran Aroussi <ran@aroussi.com>						 #
##  @copyright   				Copyright (c) 2006, http://aroussi.com/ci/           #
##  @revamp and hardcoded   	webmasterai | squal_ai                               #
##  @powered and supported		www.webmastermacro.com | www.truinehost.com          #
##                                                                                   #
######################################################################################

 

class Paypal extends CI_Controller {

	public function __construct()
			{
				parent::__construct();		
			}
	
	public function index()
			{
				$this->load->view('header');
				$this->form();
				$this->load->view('footer');		
			}
	
	public function userdata($a = null) 
			{
				$array = array(
							  'id'		    => '001',
							  'first_name'  => 'testF',
							  'last_name'   => 'testS',
							  'item_number' => '999',
							  'balance' 	=> '99',
							  'mobile'		=> '09338752911',
							  't_phone'		=> '0324412343',
							  'age'			=> '20',
							  'address'		=> 'Taga Pasil manko',
							  'm_name'		=> 'Indaybads',
							  'f_name'		=> 'Manoys',
							  'email'		=> 'akoni@yahoo.com',
							  'profession'	=> 'Janitor',
							  'title'		=> 'Mr.',
							  'gender'		=> 'Male',
							  'w_name'		=> 'Jania',
							  'city'		=> 'Cebu',
							  'city_code'	=> '6000',
							  'gov_id_num'	=> '8973234523443234',
							  'gov_id_num'	=> '8973234523443234',
							  'siblings'	=> '1'
							  
							  );

								switch($a)
										{
											case $array[] = 'id':		  
												return element('id',$array);
											break;
											case $array[] = 'first_name':		  
												return element('first_name',$array);
											break;
											case $array[] = 'last_name':		  
												return element('last_name',$array);
											break;
											case $array[] = 'item_number':		  
												return element('item_number',$array);
											break;
											case $array[] = 'balance':		  
												return element('balance',$array);
											break;
											case $array[] = 'item_number':		  
												return element('first_name',$array);
											break;
											case $array[] = 'mobile':		  
												return element('mobile',$array);
											break;
											case $array[] = 't_phone':		  
												return element('t_phone',$array);
											break;
											case $array[] = 'age':		  
												return element('age',$array);
											break;
											case $array[] = 'address':		  
												return element('address',$array);
											break;
											case $array[] = 'm_name':		  
												return element('m_name',$array);
											break;
											case $array[] = 'email':		  
												return element('email',$array);
											break;
											case $array[] = 'title':		  
												return element('title',$array);
											break;
											case $array[] = 'gender':		  
												return element('gender',$array);
											break;
											case $array[] = 'w_name':		  
												return element('w_name',$array);
											break;
											case $array[] = 'city':		  
												return element('city',$array);
											break;
											case $array[] = 'city_code':		  
												return element('city_code',$array);
											break;
											case $array[] = 'gov_id_num':		  
												return element('gov_id_num',$array);
											break;
											case $array[] = 'siblings':		  
												return element('siblings',$array);
											break;
										
								}
						  
			}
	
	private function token_nipedro()
			{

				$form_id = uniqid(md5(mt_rand()), true);
				
				$apitokenkey = uniqid(md5(mt_rand(10,100)), true);
				$secret = uniqid(md5(mt_rand()), true);
				$timestamp = time();
				

				
				$token = uniqid(md5($apitokenkey.$secret.$timestamp), true);

				
				$_SESSION['token'] = $token;
				$_SESSION['form_id'] = $form_id;
				$_SESSION['token_time'] = $timestamp;
				
				$_SESSION[$form_id]['token'] = $token;
				
				return $_SESSION;
				

			}
	
	public function form()
			{

				$data['pp_info'] = $this->token_nipedro();
				$arraysesvars	 = $data['pp_info'];

				
				$tokenized		 = $arraysesvars['token'];
				$form_idz		 = $arraysesvars['form_id'];
				$token_timez	 = $arraysesvars['token_time'];


				
				$ary_id 		 = $this->userdata('id');
				$ary_first_name  = $this->userdata('first_name');
				$ary_last_name   = $this->userdata('last_name');
				$ary_item_number = $this->userdata('item_number');
				$ary_balance 	 = $this->userdata('balance');
				$ary_mobile 	 = $this->userdata('mobile');
				$ary_t_phone 	 = $this->userdata('t_phone');
				$ary_age 	 	 = $this->userdata('age');
				$ary_address 	 = $this->userdata('address');
				$ary_m_name    	 = $this->userdata('m_name');
				$ary_f_name   	 = $this->userdata('f_name');
				$ary_email     	 = $this->userdata('email');
				$ary_profession  = $this->userdata('profession');
				$ary_title       = $this->userdata('title');
				$ary_gender      = $this->userdata('gender');
				$ary_w_name      = $this->userdata('w_name');
				$ary_city 		 = $this->userdata('city');
				$ary_city_code 	 = $this->userdata('city_code');
				$ary_gov_id_num  = $this->userdata('gov_id_num');
				$ary_siblings    = $this->userdata('siblings');

				
		
				$this->paypal_lib->add_field('business', 'manoys_1308193020_biz@yahoo.com');

	    		$this->paypal_lib->add_field('return', site_url('paypal/success')); 
	    		$this->paypal_lib->add_field('cancel_return', site_url('paypal/cancel')); 
				$this->paypal_lib->add_field('notify_url', site_url('paypal/ipn')); 
		

	    		$this->paypal_lib->add_field('custom', $ary_id); 
				
			
	    		$this->paypal_lib->add_field('item_number', $ary_item_number); 
		


	    		$this->paypal_lib->add_field('item_name', 'Units');

				$this->paypal_lib->image('button_03.gif');
		

				
				$data['paypal_form'] = $this->paypal_lib->paypal_form();
				 

				$data['content'] = $this->load->view( 'paypal/form', $data);
 		
	
	
			}
	
	public function auto_form()	
			{
				$data['pp_info'] = $this->token_nipedro();
				$arraysesvars	 = $data['pp_info'];

				
				$tokenized		 = $arraysesvars['token'];
				$form_idz		 = $arraysesvars['form_id'];
				$token_timez	 = $arraysesvars['token_time'];

				
				$ary_id 		 = $this->userdata('id');
				$ary_first_name  = $this->userdata('first_name');
				$ary_last_name   = $this->userdata('last_name');
				$ary_item_number = $this->userdata('item_number');
				$ary_balance 	 = $this->userdata('balance');
				$ary_mobile 	 = $this->userdata('mobile');
				$ary_t_phone 	 = $this->userdata('t_phone');
				$ary_age 	 	 = $this->userdata('age');
				$ary_address 	 = $this->userdata('address');
				$ary_m_name    	 = $this->userdata('m_name');
				$ary_f_name   	 = $this->userdata('f_name');
				$ary_email     	 = $this->userdata('email');
				$ary_profession  = $this->userdata('profession');
				$ary_title       = $this->userdata('title');
				$ary_gender      = $this->userdata('gender');
				$ary_w_name      = $this->userdata('w_name');
				$ary_city 		 = $this->userdata('city');
				$ary_city_code 	 = $this->userdata('city_code');
				$ary_gov_id_num  = $this->userdata('gov_id_num');
				$ary_siblings    = $this->userdata('siblings');

				// the company business email address
				$this->paypal_lib->add_field('business', 'manoys_1308193020_biz@yahoo.com');

	    		$this->paypal_lib->add_field('return', site_url('paypal/success')); // <-- Success url
	    		$this->paypal_lib->add_field('cancel_return', site_url('paypal/cancel')); // <-- Cancel url
				$this->paypal_lib->add_field('notify_url', site_url('paypal/ipn')); // <-- IPN url
				
				// using fixed array element not dyanmic data from db
	    		$this->paypal_lib->add_field('custom', $ary_id); // <-- Array or session db id send through paypal
				
				// using fixed array element not dynamic data from db
				$this->paypal_lib->add_field('item_number', $ary_item_number); //  <--Array or db result send through paypal
	    		$this->paypal_lib->add_field('item_name', 'Units');
	    		
//	    		$this->paypal_lib->add_field('amount', '197');

				// if you want an image button use this:
				$this->paypal_lib->image('button_03.gif');


	   			 $this->paypal_lib->paypal_auto_form();
			}
			
	public function cancel()
			{
				//redirect('account/trns_cans');
				
				echo 'Your transactions have been cancelled!';
				echo '</br><a href="http://www.webmastermacro.com/applications/ecommerce/dev1/">Back to Paypal IPN Application</a>';
			}
	
	public function success()
			{
	#################################################################################		
	##		                                                                        #
	##  Documentation                                                               #
	##  This is where you would probably want to thank the user for their order     #
	##  or what have you.  The order information at this point is in POST           #
	##  variables.  However, you don't want to "process" the order until you        #
	##  get validation from the IPN.  That's where you would have the code to       #
	##  email an admin, update the database with payment status, activate a         #
	##  membership, etc.                                                            #
	##		                                                                        #
	##  You could also simply re-direct them to another page, or your own           #
	##  order status page which presents the user with the status of their          #
	##  order based on a database (which can be modified with the IPN code below).  #
	##		                                                                        #
	#################################################################################
		

				
				$data['pp_info'] = $_POST;
				printr($data);
				
				echo 'Congratulations! Your payment has been successfully received..</br>';
				echo '</br><a href="http://www.webmastermacro.com/applications/ecommerce/dev1/">Back to Paypal IPN Application</a>';							
				

	
	function ipn()
			{
	#############################################################################
	##	                                                                        #
	##  Documentation                                                           #
	##  Payment has been received and IPN is verified.  This is where you       #
	##  update your database to activate or process the order, or setup         #
	##  the database with the user's order details, email an administrator,     #
	##  etc. You can access a slew of information via the ipn_data() array.     #
	##                                                                          #
	##  Check the paypal documentation for specifics on what information        #
	##  is available in the IPN POST variables.  Basically, all the POST vars   #
	##  which paypal sends, which we send back for validation, are now stored   #
	##  in the ipn_data() array.                                                #
	##                                                                          #
	##  all validated IPN is emailed through the below email address specified  #
	##                                                                          #
	#############################################################################
 
			$to    = 'alwin@webmastermacro.com';
		
				if ($this->paypal_lib->validate_ipn()) 
					{
						$body  = 'An instant payment notification was successfully received from ';
						$body .= $this->paypal_lib->ipn_data['payer_email'] . ' on '.date('m/d/Y') . ' at ' . date('g:i A') . "\n\n";
						$body .= " Details:\n";
			
							foreach ($this->paypal_lib->ipn_data as $key=>$value)
								$body .= "\n$key: $value";
				

							$this->email->to($to);
							$this->email->from($this->paypal_lib->ipn_data['payer_email'], $this->paypal_lib->ipn_data['payer_name']);
							$this->email->subject('CI paypal_lib IPN (Received Payment)');
							$this->email->message($body);	
							$this->email->send();	   
						
		
					}
			}
	
	public function acc_bal()
			{
		 		if ($this->member_mod->is_login())
					{
         			$id = $this->member_mod->get_login_id();
           			$member_data = $this->member_mod->view_cur_member('id',$id);
           				if ($member_data) 
							{
								$this->load->view('paypal/acc_bal', $member_data);
           					}
					}else{
				  	redirect('login');
				 	}		
  			}
				
}
?>