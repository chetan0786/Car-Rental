<?php

class Mybookings extends CI_Controller
{
    public function __construct() {
        
        parent::__construct();
        $this->load->model('User');
		$this->load->library('session');
    }

    function index()
    {
        if($this->session->has_userdata('id') && $this->session->userdata('type') == 'customer')
        {
            $register_id = $this->session->userdata('id');
		    $data['bookings'] = $this->User->getbookingsinfo($register_id);

            $this->load->view("common/header");
            $this->load->view("mybookings/index",$data);
        }
        else
        {
            redirect('dashboard');
        }
        

    }
   
    
}