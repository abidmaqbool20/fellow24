<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_Model extends CI_Model {
 	
 	public function __construct(){
 		parent::__construct();
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

	public function get_country_cities($country)
    {
        $this->db->where(array("cities.deleted" => 0, "countries.id" => $country));
        $this->db->select("cities.id,cities.name");
        $this->db->join("states", "states.id = cities.state", "left");
        $this->db->join("countries", "states.country = countries.id", "left");
        $this->db->from("cities");
        return $rec = $this->db->get();
    }

	public function get_countries_rec($id){
		$this->db->where(array("countries.deleted" => 0,'id'=>$id));
        $this->db->select("countries.*");
        $this->db->from("countries");
        return $rec = $this->db->get();
	}

	public function get_states($country)
    {
        $this->db->where(array("states.deleted" => 0, "country" => $country));
        $this->db->select("states.*");
        $this->db->from("states");
        return $rec = $this->db->get();
    }

    public function get_state_cities($state)
    {
        $this->db->where(array("cities.deleted" => 0, "cities.state" => $state));
        $this->db->select("cities.id,cities.name");
        $this->db->join("states", "states.id = cities.state", "left");
        $this->db->join("countries", "states.country = countries.id", "left");
        $this->db->from("cities");
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
    
    public function get_childs($data)
    {
        return $this->db->get_where($data['table'], array($data['key'] => $data['key_id'], "deleted" => 0, "status" => 1));
    }

















    //start Campaigns Function 
    public function get_campaign_rec($id){
        $this->db->where(array("campaigns.deleted" => 0,'id'=>$id));
       $this->db->select("campaigns.*");
       $this->db->from("campaigns");
       return $rec = $this->db->get();

    }

	public function get_campaigns(){
		$this->db->where(array("campaigns.deleted" => 0));
        $this->db->select("campaigns.*");
        $this->db->from("campaigns");
        return $rec = $this->db->get();
	}

	public function get_filtered_campaigns($data = array()){

        $limit = 16;
        $offset = 0;

           $this->db->where(array('campaigns.deleted'=>0));

            if(isset($data['added_by']) && $data['added_by'] != ''){ 
                $this->db->where(array('campaigns.added_by'=>$data['added_by']));
            }

            if(isset($data['title']) && $data['title'] != ''){
               
                $this->db->where(array('campaigns.title'=>$data['title']));
            }

            if(isset($data['description']) && $data['description'] != ''){
               
                $this->db->where(array('campaigns.description'=>$data['description']));
            }

            if(isset($data['status']) && $data['status'] != ''){
               
                $this->db->where(array('campaigns.status'=>$data['status']));
            }


           
            if(isset($data['search_string']) && $data['search_string'] != ''){
                $this->db->group_start(); 
                $this->db->or_like('users.name',$data['search_string'],'both');
                $this->db->or_like('campaigns.title',$data['search_string'],'both');
                $this->db->or_like('campaigns.description',$data['search_string'],'both');
                $this->db->or_like('campaigns.id',$data['search_string'],'both');
                $this->db->group_end();
            }

            if(isset($data['per_page']) && $data['per_page'] > 0){
                $limit = $data['per_page'];
            }
            else{
                $limit = 5000000000;
            }

            if(isset($data['page']) && $data['page'] > 0){
                $offset = ($data['page'] - 1) * $limit;
            }

            $this->db->select("campaigns.*,users.name as added_by_name,modified.name as modified_by_name");
            $this->db->from("campaigns");
            $this->db->join("users","campaigns.added_by = users.id","left");
            $this->db->join("users as modified","campaigns.modified_by = modified.id","left");
            $tempdb = clone $this->db; 
            $total_records = $tempdb->count_all_results();
            $this->db->limit($limit,$offset);
            $this->db->order_by("campaigns.title","ASC");
            $rec = $this->db->get();
            $result['total_records'] = $total_records;
            $result['records'] = $rec;
            //echo $this->db->last_query();
            return $result;
	}

	public function get_campaigns_for_excel($ids){
		$this->db->where_in("campaigns.id",$ids);
        $this->db->where(array("campaigns.deleted"=>0));
        $this->db->select("campaigns.title,campaigns.description");
        $this->db->from("campaigns");
        return $rec = $this->db->get();
	}

        















    //start Employees Function 
    public function get_all_employees(){
        $this->db->where(array("employees.deleted" => 0));
        $this->db->select("employees.*");
        $this->db->from("employees");
        return $rec = $this->db->get();
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

    public function get_filtered_employees($data = array()){

        $limit = 16;
        $offset = 0;

           $this->db->where(array('employees.deleted'=>0));

            if(isset($data['added_by']) && $data['added_by'] != ''){ 
                $this->db->where(array('employees.added_by'=>$data['added_by']));
            }

            if(isset($data['first_name']) && $data['first_name'] != ''){
               
                $this->db->where(array('employees.first_name'=>$data['first_name']));
            }

            if(isset($data['last_name']) && $data['last_name'] != ''){
               
                $this->db->where(array('employees.last_name'=>$data['last_name']));
            }

            if(isset($data['father_name']) && $data['father_name'] != ''){
               
                $this->db->where(array('employees.father_name'=>$data['father_name']));
            }

            if(isset($data['phone']) && $data['phone'] != ''){ 
                $this->db->where(array('employees.phone'=>$data['phone']));
            }

            if(isset($data['gender']) && $data['gender'] != ''){
               
                $this->db->where(array('employees.gender'=>$data['gender']));
            }

            if(isset($data['national_id']) && $data['national_id'] != ''){
               
                $this->db->where(array('employees.national_id'=>$data['national_id']));
            }

            if(isset($data['martial_status']) && $data['martial_status'] != ''){
               
                $this->db->where(array('employees.martial_status'=>$data['martial_status']));
            }

            if(isset($data['doj']) && $data['doj'] != ''){ 
                $this->db->where(array('employees.doj'=>$data['doj']));
            }

            if(isset($data['dob']) && $data['dob'] != ''){
               
                $this->db->where(array('employees.dob'=>$data['dob']));
            }

            if(isset($data['country_id']) && $data['country_id'] != ''){
               
                $this->db->where(array('employees.country_id'=>$data['country_id']));
            }

            if(isset($data['state_id']) && $data['state_id'] != ''){
               
                $this->db->where(array('employees.state_id'=>$data['state_id']));
            }

            if(isset($data['city_id']) && $data['city_id'] != ''){ 
                $this->db->where(array('employees.city_id'=>$data['city_id']));
            }

            if(isset($data['zip_code']) && $data['zip_code'] != ''){
               
                $this->db->where(array('employees.zip_code'=>$data['zip_code']));
            }

            if(isset($data['address']) && $data['address'] != ''){
               
                $this->db->where(array('employees.address'=>$data['address']));
            }

            if(isset($data['mobile_1']) && $data['mobile_1'] != ''){
               
                $this->db->where(array('employees.mobile_1'=>$data['mobile_1']));
            }

            if(isset($data['mobile_2']) && $data['mobile_2'] != ''){ 
                $this->db->where(array('employees.mobile_2'=>$data['mobile_2']));
            }

            if(isset($data['email']) && $data['email'] != ''){
               
                $this->db->where(array('employees.email'=>$data['email']));
            }

            if(isset($data['basic_salary']) && $data['basic_salary'] != ''){
               
                $this->db->where(array('employees.basic_salary'=>$data['basic_salary']));
            }


            if(isset($data['department_id']) && $data['department_id'] != ''){
               
                $this->db->where(array('employees.department_id'=>$data['department_id']));
            }

            if(isset($data['designation_id']) && $data['designation_id'] != ''){
               
                $this->db->where(array('employees.designation_id'=>$data['designation_id']));
            }

            if(isset($data['payscale_id']) && $data['payscale_id'] != ''){
               
                $this->db->where(array('employees.payscale_id'=>$data['payscale_id']));
            }

            if(isset($data['organization_id']) && $data['organization_id'] != ''){
               
                $this->db->where(array('employees.organization_id'=>$data['organization_id']));
            }

            if(isset($data['role_id']) && $data['role_id'] != ''){
               
                $this->db->where(array('employees.role_id'=>$data['role_id']));
            }

            if(isset($data['status']) && $data['status'] != ''){
               
                $this->db->where(array('employees.status'=>$data['status']));
            }


           
            if(isset($data['search_string']) && $data['search_string'] != ''){
                $this->db->group_start(); 
                $this->db->or_like('users.name',$data['search_string'],'both');
                $this->db->or_like('employees.first_name',$data['search_string'],'both');
                $this->db->or_like('employees.last_name',$data['search_string'],'both');
                $this->db->or_like('employees.phone',$data['search_string'],'both');
                $this->db->or_like('employees.gender',$data['search_string'],'both');
                $this->db->or_like('employees.father_name',$data['search_string'],'both');
                $this->db->or_like('employees.national_id',$data['search_string'],'both');
                $this->db->or_like('employees.martial_status',$data['search_string'],'both');
                $this->db->or_like('employees.doj',$data['search_string'],'both');
                $this->db->or_like('employees.dob',$data['search_string'],'both');
                $this->db->or_like('employees.zip_code',$data['search_string'],'both');
                $this->db->or_like('employees.address',$data['search_string'],'both');
                $this->db->or_like('employees.mobile_1',$data['search_string'],'both');
                $this->db->or_like('employees.mobile_2',$data['search_string'],'both');
                $this->db->or_like('employees.email',$data['search_string'],'both');
                $this->db->or_like('employees.basic_salary',$data['search_string'],'both');
                $this->db->or_like('employees.id',$data['search_string'],'both');
                $this->db->group_end();
            }

            if(isset($data['per_page']) && $data['per_page'] > 0){
                $limit = $data['per_page'];
            }
            else{
                $limit = 5000000000;
            }

            if(isset($data['page']) && $data['page'] > 0){
                $offset = ($data['page'] - 1) * $limit;
            }

            $this->db->select("employees.*,
            users.name as added_by_name,
            modified.name as modified_by_name,
            departments.name as depart_name,
            designations.name as designa_name,
            pay_scales.name as scale_name,
            organizations.name as org_name,
            roles.name as roll_name,
            countries.name as country_name,
            states.name as state_name,
            cities.name as city_name");
            $this->db->from("employees");
            $this->db->join("users","employees.added_by = users.id","left");
            $this->db->join("users as modified","employees.modified_by = modified.id","left");
            $this->db->join("departments","employees.department_id = departments.id","left");
            $this->db->join("designations","employees.designation_id = designations.id","left");
            $this->db->join("pay_scales","employees.payscale_id = pay_scales.id","left");
            $this->db->join("organizations","employees.organization_id = organizations.id","left");
            $this->db->join("roles","employees.role_id = roles.id","left");
            $this->db->join("countries","employees.country_id = countries.id","left");
            $this->db->join("states","employees.state_id = states.id","left");
            $this->db->join("cities","employees.city_id = cities.id","left");
            $tempdb = clone $this->db; 
            $total_records = $tempdb->count_all_results();
            $this->db->limit($limit,$offset);
            $this->db->order_by("employees.id","ASC");
            $this->db->group_by("employees.id");
            $rec = $this->db->get();
            $result['total_records'] = $total_records;
            $result['records'] = $rec;
            //echo $this->db->last_query();
            return $result;
    }

	public function get_employees_for_excel($ids){
		$this->db->where_in("employees.id",$ids);
        $this->db->where(array("employees.deleted"=>0));
        $this->db->select("employees.first_name,employees.last_name,
        employees.phone,employees.gender,
        employees.father_name,employees.national_id,
        employees.martial_status,employees.doj,
        employees.dob,employees.zip_code,
        employees.address,employees.mobile_1,
        employees.mobile_2,employees.email,
        employees.basic_salary");
        $this->db->from("employees");
        return $rec = $this->db->get();


    }

















    //Start opportunity Functions
	public function get_opportunity_rec($id){
		    $this->db->where(array('opportunities.deleted'=>0,'opportunities.id'=>$id));
		    $this->db->select("opportunities.*,campaigns.title as campaign_name,countries.name as country,cities.name as city,states.name as state,users.name as added_by_name,modified.name as modified_by_name");
		    $this->db->from("opportunities");
            $this->db->join("campaigns","opportunities.campaign_id = campaigns.id","left");
            $this->db->join("countries","opportunities.country_id = countries.id","left");
            $this->db->join("states","opportunities.state_id = states.id","left");
            $this->db->join("cities","opportunities.city_id = cities.id","left");
            $this->db->join("users","opportunities.added_by = users.id","left");
            $this->db->join("users as modified","opportunities.modified_by = modified.id","left");
            return $rec = $this->db->get();
	}

	public function get_filtered_opportunities($data = array()){

        $limit = 5;
        $offset = 0;

           $this->db->where(array('opportunities.deleted'=>0));

            if(isset($data['added_by']) && $data['added_by'] != ''){ 
                $this->db->where(array('opportunities.added_by'=>$data['added_by']));
            }
            if(isset($data['country_id']) && $data['country_id'] != ''){ 
                $this->db->where(array('opportunities.country_id'=>$data['country_id']));
            }
            if(isset($data['state_id']) && $data['state_id'] != ''){ 
                $this->db->where(array('opportunities.state_id'=>$data['state_id']));
            }
            if(isset($data['city_id']) && $data['city_id'] != ''){ 
                $this->db->where(array('opportunities.city_id'=>$data['city_id']));
            }

            if(isset($data['client_name']) && $data['client_name'] != ''){
               
                $this->db->where(array('opportunities.client_name'=>$data['client_name']));
            }
             if(isset($data['email']) && $data['email'] != ''){
               
                $this->db->where(array('opportunities.email'=>$data['email']));
            }

            if(isset($data['description']) && $data['description'] != ''){
               
                $this->db->where(array('opportunities.description'=>$data['description']));
            }

            if(isset($data['status']) && $data['status'] != ''){
               
                $this->db->where(array('opportunities.status'=>$data['status']));
            }


           
            if(isset($data['search_string']) && $data['search_string'] != ''){
                $this->db->group_start(); 
                $this->db->or_like('users.name',$data['search_string'],'both');
                $this->db->or_like('opportunities.client_name',$data['search_string'],'both');
                $this->db->or_like('opportunities.description',$data['search_string'],'both');
                $this->db->or_like('opportunities.id',$data['search_string'],'both');
                $this->db->group_end();
            }

            if(isset($data['per_page']) && $data['per_page'] > 0){
                $limit = $data['per_page'];
            }
            else{
                $limit = 5000000000;
            }

            if(isset($data['page']) && $data['page'] > 0){
                $offset = ($data['page'] - 1) * $limit;
            }

            $this->db->select("opportunities.*,campaigns.title as campaign_name,countries.name as country,cities.name as city,states.name as state,users.name as added_by_name,modified.name as modified_by_name");
            $this->db->from("opportunities");
            $this->db->join("campaigns","opportunities.campaign_id = campaigns.id","left");
            $this->db->join("countries","opportunities.country_id = countries.id","left");
            $this->db->join("states","opportunities.state_id = states.id","left");
            $this->db->join("cities","opportunities.city_id = cities.id","left");
            $this->db->join("users","opportunities.added_by = users.id","left");
            $this->db->join("users as modified","opportunities.modified_by = modified.id","left");
            $tempdb = clone $this->db; 
            $total_records = $tempdb->count_all_results();
            $this->db->limit($limit,$offset);
            $this->db->order_by("opportunities.id","ASC");
            $this->db->group_by('opportunities.id');
            $rec = $this->db->get();
            $result['total_records'] = $total_records;
            $result['records'] = $rec;
            //echo $this->db->last_query();
            return $result;
	}

	public function get_opportunities_states(){
        $this->db->where(array("opportunities.deleted"=>0));
        $this->db->select("states.id,states.name as state");
        $this->db->join("states", "opportunities.state_id = states.id", "left");
        $this->db->from("opportunities");
        $this->db->group_by('opportunities.id');
        return $rec = $this->db->get();

	}

	public function get_opportunities_cities(){
        $this->db->where(array("opportunities.deleted"=>0));
        $this->db->select("cities.id,cities.name as city");
        $this->db->join("cities", "opportunities.city_id = cities.id", "left");
        $this->db->from("opportunities");
        $this->db->group_by('opportunities.id');
        return $rec = $this->db->get();

    }
    
    public function get_opportunities_for_excel($ids){
		$this->db->where_in("opportunities.id",$ids);
        $this->db->where(array("opportunities.deleted"=>0));
        $this->db->select("campaigns.title as campaign,opportunities.client_name,opportunities.email,phone,opportunities.mobile1,opportunities.mobile2,countries.name as country,states.name as state,cities.name as city,opportunities.description");
        $this->db->from("opportunities");
        $this->db->join("campaigns","opportunities.campaign_id = campaigns.id","left");
        $this->db->join("countries","opportunities.country_id = countries.id","left");
        $this->db->join("states","opportunities.state_id = states.id","left");
        $this->db->join("cities","opportunities.city_id = cities.id","left");
         $this->db->group_by('opportunities.id');
        return $rec = $this->db->get();
	}
	 
}
