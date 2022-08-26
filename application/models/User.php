<?php 

class User extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_user_from_email_and_password($email , $password)
    {
            $sql1 = $this->db->get_where('users', array('email' => $email));
            if($sql1->num_rows() > 0) {

                $sql2 = $this->db->get_where('users', array('email' => $email, 'password' => $password));
                if($sql2->num_rows() > 0) {

                    return $sql2->result_array();
                } else {

                    return 2;
                }
            } else {

                return 1;
            }
        // $sql = "select id,type from users where email = ? and password = ? limit 1";
        // return $this->db->query($sql, array($email , $password))->result_array();
        
    }
    public function signup($signup_data)
    {
        $sql1 = $this->db->get_where('users', array('mobile_number' => $signup_data["phoneno"]));
        $sql2 = $this->db->get_where('users', array('email' => $signup_data["email"]));
            if($sql1->num_rows() == 0 && $sql2->num_rows() == 0) {

                $sql = "insert into users (name , email , password , type , address , mobile_number) values ( ? , ? , ? , ? , ? , ?)";
                $result= $this->db->query($sql, array($signup_data["name"],$signup_data["email"],$signup_data["password"],'customer',$signup_data["address"],$signup_data["phoneno"]));
                if ($result ==true){
                    $getdata = "select id,type from users where email = ?";
                    return $this->db->query(($getdata) , array('email' => $signup_data["email"]))->result_array();
                }
            } else {

                return -1;
            }
        
    }
    public function signup_as_agency($signup_data)
    {
        $sql1 = $this->db->get_where('users', array('mobile_number' => $signup_data["phoneno"]));
        $sql2 = $this->db->get_where('users', array('email' => $signup_data["email"]));
            if($sql1->num_rows() == 0 && $sql2->num_rows() == 0) {

                $sql = "insert into users (name , email , password , type , address , mobile_number) values ( ? , ? , ? , ? , ? , ?)";
                $result= $this->db->query($sql, array($signup_data["name"],$signup_data["email"],$signup_data["password"],'2',$signup_data["address"],$signup_data["phoneno"]));
                if ($result ==true){
                    $getdata = "select id,type from users where email = ?";
                    return $this->db->query(($getdata) , array('email' => $signup_data["email"]))->result_array();
                }
            } else {

                return -1;
            }
        
    }

    public function addCar($car_data,$user)
    {
        $sql1 = $this->db->get_where('vehicles_info', array('number' => $car_data["car_number"]));
        if($sql1->num_rows() == 0) {

            $query = "insert into vehicles_info (model , number , capacity , rent , owner_id) values ( ? , ? , ? , ? , ?)";
            return $this->db->query($query, array($car_data["car_name"],$car_data["car_number"],$car_data["capacity"],$car_data["rent"],$user));

        }
        else
        {
            return -1;
        }
    }

    public function editCar($car_data)
    {
        $sql1 = $this->db->get_where('vehicles_info', array('id' => $car_data["id"]));
        if($sql1->num_rows() > 0) {

            $query = "update vehicles_info set model = ? , number = ?, capacity = ? , rent = ? where id = ?";
            return $this->db->query($query, array($car_data["car_name"],$car_data["car_number"],$car_data["capacity"],$car_data["rent"] , $car_data["id"] ));

        }
        else
        {
            return -1;
        }
    }
    public function getcarsinfo($register_id , $role)
    {
        if($role == 'agency') {

            return $this->db->get_where('vehicles_info', array('owner_id' => $register_id, 'booked' => 0))->result_array();
        } else {

            return $this->db->get_where('vehicles_info', array('booked' => 0))->result_array();
        }
    }

   public function getcardetails($car_id)
   {
    return $this->db->get_where('vehicles_info', array('id' => $car_id, 'booked' => 0))->result_array();
   }

   public function rent_car($car_details,$customer_id)
   {
        extract($this->input->post());
        $booking['owner_id'] = $car_details[0]['owner_id'];
        $booking['car_id'] = $car_details[0]['id'];
        $booking['car_model'] = $car_details[0]['model'];
        $booking['car_number'] = $car_details[0]['number'];
        $booking['customer_id'] = $customer_id;
        $booking['booking_date'] = $start_date;
        $booking['booking_enddate'] = date('Y-m-d', strtotime($start_date.' + '.$rent_days.' days'));
        $booking['booking_days'] = $rent_days;
       
        
       
        $carinfo['booked'] = 1;

        if(!empty($rent_days) && !empty($start_date)) {

            $this->db->update('vehicles_info', $carinfo, array('id' => $car_details[0]['id']));
            $this->db->insert('car_bookings', $booking);
            return 1;
        } else {

            return 0;
        }
   }

   public function getbookingsinfo($register_id)
   {
     return $this->db->get_where('car_bookings', array('customer_id' => $register_id))->result_array();
   }

   public function getmybookingsinfo($register_id)
   {
     return $this->db->get_where('car_bookings', array('owner_id' => $register_id))->result_array();
   }

}

?>