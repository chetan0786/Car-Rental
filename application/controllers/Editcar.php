<?php

class EditCar extends CI_Controller
{
    public function __construct() {
        
        parent::__construct();
        $this->load->model('User');
		$this->load->library('session');
    }

    function index()
    {
        if($this->session->has_userdata('id') && $this->session->userdata('type') == 'agency') 
        {
            $this->load->view("common/header");
            $this->load->view("editcar/index");
        }
        else
        {
            redirect('dashboard');
        }

    }

    function edit()
    {
       
        if($this->session->userdata('id'))
        {
        $car_data = $this->input->post();
        $response_data = $this->User->editCar($car_data);
        if ($response_data === -1){
            echo '';
        }
        else{
            echo 'Car Edited Successfully';
            redirect('dashboard');
        }
    }
    else
    {
        redirect('login');
    }
    }
    
    
}