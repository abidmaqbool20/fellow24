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

<<<<<<< HEAD
	}
	 
	public function get_employees(){
		$this->db->where(array("employees.deleted" => 0));
		$this->db->select("employees.*");
		$this->db->join("departments", "employees.department_id = departments.id", 'left');
		$this->db->join("designations", "employees.designation_id = designations.id", 'left');
		$this->db->join("pay_scales", "employees.payscale_id = pay_scales.id", 'left');
		$this->db->join("organizations", "employees.organization_id = organizations.id", 'left');
		$this->db->join("cities", "employees.city_id = cities.id", 'left');
		$this->db->join("countries", "employees.country_id = countries.id", 'left');
		$this->db->join("states", "employees.state_id = states.id", 'left');
	   	$this->db->from("employees");
	   	return $rec = $this->db->get();
	}

	public function get_employees_rec($id){
		$this->db->where(array("employees.deleted" => 0,'employees.id'=>$id));
		$this->db->select("employees.*");
		$this->db->join("departments", "employees.department_id = departments.id", 'left');
		$this->db->join("designations", "employees.designation_id = designations.id", 'left');
		$this->db->join("pay_scales", "employees.payscale_id = pay_scales.id", 'left');
		$this->db->join("organizations", "employees.organization_id = organizations.id", 'left');
		$this->db->join("cities", "employees.city_id = cities.id", 'left');
		$this->db->join("countries", "employees.country_id = countries.id", 'left');
		$this->db->join("states", "employees.state_id = states.id", 'left');
		$this->db->from("employees");
		return $rec = $this->db->get();
	}
	
	public function get_organizations(){
		$this->db->where(array("organizations.deleted" => 0));
        $this->db->select("organizations.*");
        $this->db->from("organizations");
        return $rec = $this->db->get();
	}

	public function get_organizations_rec($id){
		$this->db->where(array("organizations.deleted" => 0,'id'=>$id));
        $this->db->select("organizations.*");
        $this->db->from("organizations");
        return $rec = $this->db->get();
	}

	public function get_departments(){
		$this->db->where(array("departments.deleted" => 0));
        $this->db->select("departments.*");
        $this->db->from("departments");
        return $rec = $this->db->get();
	}

	public function get_departments_rec($id){
		$this->db->where(array("departments.deleted" => 0,'id'=>$id));
        $this->db->select("departments.*");
        $this->db->from("departments");
        return $rec = $this->db->get();
	}

	public function get_pay_scales(){
		$this->db->where(array("pay_scales.deleted" => 0));
        $this->db->select("pay_scales.*");
        $this->db->from("pay_scales");
        return $rec = $this->db->get();
	}

	public function get_pay_scales_rec($id){
		$this->db->where(array("pay_scales.deleted" => 0,'id'=>$id));
        $this->db->select("pay_scales.*");
        $this->db->from("pay_scales");
        return $rec = $this->db->get();
	}

	public function get_designations(){
		$this->db->where(array("designations.deleted" => 0));
        $this->db->select("designations.*");
        $this->db->from("designations");
        return $rec = $this->db->get();
	}

	public function get_designations_rec($id){
		$this->db->where(array("designations.deleted" => 0,'id'=>$id));
        $this->db->select("designations.*");
        $this->db->from("designations");
        return $rec = $this->db->get();
	}

	public function get_cities(){
		$this->db->where(array("cities.deleted" => 0));
        $this->db->select("cities.*");
        $this->db->from("cities");
        return $rec = $this->db->get();
	}

	public function get_cities_rec($id){
		$this->db->where(array("cities.deleted" => 0,'id'=>$id));
        $this->db->select("cities.*");
        $this->db->from("cities");
        return $rec = $this->db->get();
	}
	public function get_countries(){
		$this->db->where(array("countries.deleted" => 0));
        $this->db->select("countries.*");
        $this->db->from("countries");
        return $rec = $this->db->get();
	}

	public function get_countries_rec($id){
		$this->db->where(array("countries.deleted" => 0,'id'=>$id));
        $this->db->select("countries.*");
        $this->db->from("countries");
        return $rec = $this->db->get();
	}

	public function get_states(){
		$this->db->where(array("states.deleted" => 0));
        $this->db->select("states.*");
        $this->db->from("states");
        return $rec = $this->db->get();
	}

	public function get_states_rec($id){
		$this->db->where(array("states.deleted" => 0,'id'=>$id));
        $this->db->select("states.*");
        $this->db->from("states");
        return $rec = $this->db->get();
	}

	public function get_roles(){
		$this->db->where(array("roles.deleted" => 0));
        $this->db->select("roles.*");
        $this->db->from("roles");
        return $rec = $this->db->get();
	}

	public function get_roles_rec($id){
		$this->db->where(array("roles.deleted" => 0,'id'=>$id));
        $this->db->select("roles.*");
        $this->db->from("roles");
        return $rec = $this->db->get();
	}
=======
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
 	
>>>>>>> a698dd01fc9f5e11dd8fc981b88054164defbfe4
	 
}
