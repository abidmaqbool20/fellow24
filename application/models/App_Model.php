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

 	public function get_departments(){
 		$this->db->where(array("departments.deleted" => 0));
        $this->db->select("departments.*");
        $this->db->from("departments");
        return $rec = $this->db->get();

 	}

 	public function get_department_rec($id){
 	    $this->db->where(array("departments.deleted" => 0,'id'=>$id));
        $this->db->select("departments.*");
        $this->db->from("departments");
        return $rec = $this->db->get();

 	}

 	public function get_payscales(){
 		$this->db->where(array("pay_scales.deleted" => 0));
        $this->db->select("pay_scales.*");
        $this->db->from("pay_scales");
        return $rec = $this->db->get();
 	}
 	public function get_payscale_rec($id){
 		$this->db->where(array("pay_scales.deleted" => 0,'id'=>$id));
        $this->db->select("pay_scales.*");
        $this->db->from("pay_scales");
        return $rec = $this->db->get();
 	}

 	public function designations(){
 		$this->db->where(array("designations.deleted" => 0));
        $this->db->select("designations.*,pay_scales.name as payscale");
        $this->db->join('pay_scales','designations.payscale_id = pay_scales.id','left');
        $this->db->from("designations");
        return $rec = $this->db->get();
 	}

 		public function get_designation_rec($id){
 	    $this->db->where(array("designations.deleted" => 0,'id'=>$id));
        $this->db->select("designations.*");
        $this->db->from("designations");
        return $rec = $this->db->get();

 	}
 	
	 
}
