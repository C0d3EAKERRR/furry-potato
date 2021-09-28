<?php
class contactform extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation', 'email'));
    }

    function index()
    {
        
        //set validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean|callback_alpha_space_only');
        $this->form_validation->set_rules('email', 'Emaid ID', 'trim|required|valid_email');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
        $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');

        //run validation on form input
        if ($this->form_validation->run() == FALSE)
        {
            //validation fails
            $this->load->view('contact_form_view');
        }
        else
        {

            //get the form data
            $name = $this->input->post('name');
            $from_email = $this->input->post('email');
            $subject = $this->input->post('subject');
            $message = $this->input->post('message');
            $phone = $this->input->post('phone');

            //set to_email id to which you want to receive mails
            //$to_email = 'devtest@hydekites.com';

            //configure email settings
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = '';
            $config['smtp_port'] = '2525';
            $config['smtp_user'] = '';
            $config['smtp_pass'] = '';
            $config['mailtype'] = 'html';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n"; //use double quotes
            //$this->load->library('email', $config);
            $this->email->initialize($config);                        



            //send mail
            $this->email->from($from_email, $name);
            $this->email->to('devtest@yahoo.com, odoo@hydesailss.com.ph, zquallaiz@hydesailss.com.ph');
            $this->email->subject($subject);
            $this->email->message(
                'Message from : '.$name.''."<br>".'Email : '.$from_email.''."<br>". 'Phone number : '.$phone.''."<br>".
                'Message :'.''."<br>".$message. ' Thanks!!'
            );

            if ($this->email->send())
            {
                // mail sent
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Your mail has been sent successfully!</div>');
                redirect('contactform');
            }
            else
            {
                //error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">There is error in sending mail! Please try again later</div>');
                redirect('contactform');
            }
        }
    }
    
    //custom validation function to accept only alphabets and space input
    function alpha_space_only($str)
    {
        if (!preg_match("/^[a-zA-Z ]+$/",$str))
        {
            $this->form_validation->set_message('alpha_space_only', 'The %s field must contain only alphabets and space');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
}
?>