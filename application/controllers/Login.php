<?php

class Login extends CI_Controller
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
        $this->load->view("login/index");

    }
    
    function submit()
    {
      $login_data =$this->input->post();
      $response_data = $this->User->get_user_from_email_and_password($login_data["email"],$login_data["password"]);
      if($response_data == 1)
      {
        echo 'Wrong Email ID';
      }
      else if($response_data == 2)
      {
        echo 'Wrong Password';
      }
      else
      {
      $session_data = array(
        'id' => $response_data[0]['id'],
        'type' => $response_data[0]['type']);

        $this->session->set_userdata($session_data);
       
      }

      redirect('dashboard');

    //var_dump($this->session->get_userdata());
    }

    function logout()
    {
      if($this->session->has_userdata('id')) {
			
        $this->session->unset_userdata(array('id', 'type'));
        $this->session->sess_destroy();
      }
      redirect('dashboard');
    }
}