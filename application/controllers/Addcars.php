<?php

class AddCars extends CI_Controller
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
            $this->load->view("addcars/index");
        }
        else
        {
            redirect('dashboard');
        }

    }

    function add()
    {
        if($this->session->userdata('id'))
        {
        $car_data = $this->input->post();
        $response_data = $this->User->addCar($car_data,$this->session->userdata("id"));
        if ($response_data === -1){
            echo 'Car already present';
        }
        else{
            redirect('dashboard');
        }
    }
    else
    {
        redirect('login');
    }
    }
    
    
}