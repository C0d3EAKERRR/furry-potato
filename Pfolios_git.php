<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pfolios extends CI_Controller {

	public function __construct()
		{
	
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->helper('file');

		}

	
	public function index()
		{

			$this->load->view('press4/header');
			$this->load->view('press4/body');
			$this->load->view('press4/footer');		

		}

	public function pfolios_mens()
		{
			
			$data['title']   = "Mens Fashion";
            $data['heading'] = "Welcome to Mens Fashion Showroom!";
            $data['footer']  = "© Mens Fashion Showroom - - www.C0d3reakerr.com 2008 - 2021";

			$this->load->view('press4/header', $data);
			$this->load->view('press4/pfolios_mens', $data);
			$this->load->view('press4/footer');	
	
		}

	public function pfolios_womens()
		{
			
			$data['title']   = "Womens Fashion";
            $data['heading'] = "Welcome to Womens Fashion Showroom!";
            $data['footer']  = "© Womens Fashion Showroom - - www.C0d3reakerr.com 2008 - 2021";

			$this->load->view('press4/header', $data);
			$this->load->view('press4/pfolios_womens', $data);
			$this->load->view('press4/footer');	
	
		}

	public function pfolios_sporty()
		{			

			$data['title']   = "Sporty Fashion";
            $data['heading'] = "Welcome to Sporty Fashion Showroom!";
            $data['footer']  = "© Sporty Fashion Showroom - - www.C0d3reakerr.com 2008 - 2021";

			$this->load->view('press4/header', $data);
			$this->load->view('press4/pfolios_sporty', $data);
			$this->load->view('press4/footer');	
	
		}

	public function pfolios_kids()
		{			

			$data['title'] 	 = "Kids Fashion";
            $data['heading'] = "Welcome to Kids Fashion Showroom!";
            $data['footer']  = "© Kids Fashion - - www.C0d3reakerr.com 2008 - 2021";

			$this->load->view('press4/header', $data);
			$this->load->view('press4/pfolios_kids', $data);
			$this->load->view('press4/footer');	
	
		}

	public function pfolios_events1()
		{			

			$data['title']   = "Events Fashion";
            $data['heading'] = "Welcome to Events Fashion Showroom!";
            $data['footer']  = "© Events Fashion - - www.C0d3reakerr.com 2008 - 2021";

			$this->load->view('press4/header', $data);
			$this->load->view('press4/pfolios_events1', $data);
			$this->load->view('press4/footer');	
	
		}

	public function pfolios_accessory()
		{			

			$data['title']   = "Accessory Fashion";
            $data['heading'] = "Welcome to Accessory Fashion Showroom!";
            $data['footer']  = "© Accessory Fashion - - www.C0d3reakerr.com 2008 - 2021";

			$this->load->view('press4/header', $data);
			$this->load->view('press4/pfolios_accessory', $data);
			$this->load->view('press4/footer');	
	
		}


}
