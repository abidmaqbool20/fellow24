<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {	
	 

	public function __construct() 
	{ 
        parent::__construct();      
    }

	public function index()
	{
		$this->load->view('index');
	}

	public function login_validation()
	{  

		$data = $this->input->post(); 

		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required' );  

        if ($this->form_validation->run() == FALSE)
        {  
            $this->index();
        }
        else
        { 
        	// print_r($data);
        	// die();
        	$username = $this->input->post("email");
			$password = $this->input->post("password");
			if($username != "" && $password != "")
			{
				$validation = array(
					"email" => $username,
					"password" => $password,
					"deleted" => 0,
					"status" => 1
			    );

				$users = $this->db->get_where("users",$validation);
				// echo $this->db->last_query();
				// die();
				if($users->num_rows() > 0)
				{	//$this->session->sess_destroy();
					$user_data = $users->result_array();
					$user_info = $user_data[0];
					//print_r($user_info);
					$userdata = array( 
						"user_id" => $user_info['id'] ,
						"logedin" => true,
						"user_type" => 'master-user' 
					);
					 
					$this->session->set_userdata($userdata); 
					redirect('app'); 
				}
				else
				{
					$this->session->set_flashdata("message",'Invalid email or password.');
					$this->index();
				} 
				
			}
			else
			{
				$this->index();
			}
                
        } 
		
 
	}
}
