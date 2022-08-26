<?php

class Dashboard extends CI_Controller
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
        $register_id = $this->session->userdata('id');
		$role = $this->session->userdata('type');
		$data['allcars'] = $this->User->getcarsinfo($register_id, $role);
        }
        else{
            $data['allcars'] = $this->User->getcarsinfo(0, 0);
        }
        $this->load->view("common/header");
        $this->load->view("dashboard/index",$data);

    }

    function book_car($car_id)
    {
        if($this->User->notavailable($car_id))
        {
            redirect('dashboard');
        }
        if($this->session->has_userdata('id')) {

			$data['car'] = $this->User->getcardetails($car_id);
			$this->load->view("common/header");
            $this->load->view("bookcar/index",$data);
		} else {

			redirect('Login');
		}
    }
    function edit_car($car_id)
    {
        if($this->User->checkcarowner($car_id,$this->session->userdata('id')))
        {
            redirect('dashboard');
        }
        if($this->session->has_userdata('id')) {

			$data['car'] = $this->User->getcardetails($car_id);
			$this->load->view("common/header");
            $this->load->view("editcar/index",$data);
		} else {

			redirect('Login');
		}
    }

    function rent_car($car_id)
    {
        if($this->session->has_userdata('id')) {

			$car_details = $this->User->getcardetails($car_id);
		    $response = $this->User->rent_car($car_details,$this->session->userdata('id'));
            echo $response;
		} else {

			redirect('Login');
		}
    }   
    
}