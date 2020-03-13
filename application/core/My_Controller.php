<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	public $user_id = null; 
	public $user_data = null; 
  public function __construct() {

        parent::__construct(); 
        $userdata = $this->session->all_userdata(); 
        if(isset($userdata['user_id']) && $userdata['user_id'] != "" && $userdata['logedin'])
        { 
          $this->user_id = $userdata['user_id']; 
          $u_data = $this->db->get_where("users",array("id"=>$this->user_id))->result_array();  
          $this->user_data = $u_data[0];  
      	}
      	else
      	{
      		redirect("auth/login");
      	}

    	
    }	 

}

?>