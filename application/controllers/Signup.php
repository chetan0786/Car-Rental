<?php

class Signup extends CI_Controller
{
    public function __construct() {
        
        parent::__construct();
        $this->load->model('User');
		$this->load->library('session');
    }

    function index()
    {
        if($this->session->has_userdata('id'))
        {
            redirect('dashboard');
        }
        $this->load->view("common/header");
        $this->load->view("signup/index");

    }
    
    function signup_agency()
    {
        if($this->session->has_userdata('id'))
        {
            redirect('dashboard');
        }
        $this->load->view("common/header");
        $this->load->view("signupagency/index");

    }
    function signupasagency()
    {
        $Signup_data =$this->input->post();
        
        $response_data = $this->User->signup_as_agency($Signup_data);
        if($response_data === -1)
        {
         echo 'User already exists';
        }
        else{
         $session_data = array(
             'id' => $response_data[0]['id'],
             'type' => $response_data[0]['type']);
     
             $this->session->set_userdata($session_data);
             
        }
        redirect('dashboard');
    }
    function signup()
    {
        $Signup_data =$this->input->post();
        
       $response_data = $this->User->signup($Signup_data);
       if($response_data === -1)
       {
        echo 'User already exists';
       }
       else{
        $session_data = array(
            'id' => $response_data[0]['id'],
            'type' => $response_data[0]['type']);
    
            $this->session->set_userdata($session_data);
            
       }
       redirect('dashboard');
       
    }
}