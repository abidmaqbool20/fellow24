<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends My_Controller {
 	
    public $datetime = null; 
    public $date = null; 
    
    

 	public function __construct(){
 		parent::__construct();
 	}

	public function index(){ 
        $data['view'] = 'page-loader';
        $this->load->view('template',$data);

        $this->datetime = date("Y-m-d H:i:s");
        $this->date = date("Y-m-d");
    } 

    public function save_request(){
        $datetime = date("Y-m-d H:i:s");
        $data = $this->input->post();
        if(isset($data['data'])){
            $insert_data = array('user_id' => $this->user_id, 'ip' => get_ip(), 'request_data' => $data['data'], 'date_added' => $datetime,'request_type' => $data['request_type']);

            if($this->db->insert('views_history',$insert_data))
            echo $id = $this->db->insert_id();
            else
            echo false;
        }
    }

    public function view_loader(){ 
        $request_data = array();
        // $data = $this->input->post('data');
        $request_id = $this->input->post('request_id');
        if($request_id > 0){
            $view_rec  = $this->db->get_where("views_history",array("id" => $request_id));
            if($view_rec->num_rows() > 0){
                $request_data = $view_rec->row()->request_data;
            }
        }
        if(is_array($request_data)){
            $request_data = (array) json_decode(json_encode($request_data));
        }
        else{ 
            $request_data = (array) json_decode($request_data);
        } 
        
        if(is_object($request_data)){
             $request_data = (array) json_decode(json_encode($request_data));
        }
        
        echo $this->load->view($request_data['view'],$request_data,TRUE);
    }
 

    public function load_form(){

        // $data = $this->input->post('data');
        $request_data = array();
        // $data = $this->input->post('data');
        $request_id = $this->input->post('request_id');
        if($request_id > 0){
            $view_rec  = $this->db->get_where("views_history",array("id" => $request_id));
            if($view_rec->num_rows() > 0){
                $request_data = $view_rec->row()->request_data;
            }
        }
        
        if(is_array($request_data)){
            $request_data = (array) json_decode(json_encode($request_data));
        }
        else{ 
            $request_data = (array) json_decode($request_data);
        } 
        
        if(is_object($request_data)){
             $request_data = (array) json_decode(json_encode($request_data));
        }
 
        echo $this->load->view($request_data['view'],$request_data,TRUE);
    }

    public function dashboard(){
    	$this->load->view('dashboard');
    }

    public function check_connectivity(){
        $connected = @fsockopen("http://127.0.0.1/fellow24", 80);           
        if ($connected){
            $is_conn = true;  
            fclose($connected);
        }else{
            $is_conn = false; 
        }
        return $is_conn;
    }

    


}
