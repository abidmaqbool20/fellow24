<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_Model extends CI_Model {
 	
 	public function __construct(){
 		parent::__construct();
 	}

 	public function get_campaigns(){
 		$this->db->where(array("campaigns.deleted" => 0));
        $this->db->select("campaigns.*");
        $this->db->from("campaigns");
        return $rec = $this->db->get();
 	}

 	public function get_campaign_rec($id){
 		$this->db->where(array("campaigns.deleted" => 0,'id'=>$id));
        $this->db->select("campaigns.*");
        $this->db->from("campaigns");
        return $rec = $this->db->get();

 	}
 	
	 
}
