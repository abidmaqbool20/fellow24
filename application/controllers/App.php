<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends My_Controller {
 	
    public $datetime = null; 
    public $date = null; 
    
    

 	public function __construct(){
 		parent::__construct();
        date_default_timezone_set("Asia/Karachi");
        $this->date = date('Y-m-d H:i:s'); 
        $this->just_date = date('Y-m-d'); 
        $this->time = date('H:i:s');     

        ini_set('post_max_size','750M');
        ini_set('upload_max_filesize','750M');
        ini_set('max_execution_time','5000');
        ini_set('max_input_time','5000');
        ini_set('memory_limit','1000M'); 
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

   
    public function generate_excel_file($filename,$file_title,$function,$ids)
    { 
        $response = '';
        if(!empty($ids))
        {
            $records = $this->App_Model->$function($ids);
            if($records->num_rows() > 0){
                $records_array = $records->result_array(); 
                $file_columns = array_keys($records_array[0]);
                $xls = generate_excel($filename,$file_title,$file_columns,$records_array);
                $response = base_url($xls);
            }
        }
        
        return $response;
        
    }


    public function generate_pdf($html,$report_name) 
    {  

        if($html != ""){

            $report_name = $report_name."-".strtotime(date("Y-m-d H:i:s"));
            $this->load->library('pdf'); 

            $this->pdf->loadHtml($html);

            $this->pdf->render();
            $path = "assets/system/reports/".$report_name.".pdf";
            $this->pdf->stream($path, array("Attachment"=>0));
            return base_url($path);
        } 

	}
	
	public function delete_record(){ 
        $data = $this->input->post();
        if($data['id'] != "" && $data['id'] > 0 && $data['table'] != "" && $data['table'] != ''){
            return $deleted = $this->db->update($data['table'],array("deleted"=>1,"deleted_by"=>$this->master_id,"date_deleted"=>$this->date),array("id"=>$data['id']));
        }
    } 

    public function get_module_permissions(){
        $data = $this->input->post();
        $perm_list = "";
        if($data['id'] > 0){
           $permissions = $this->HRM_Model->get_module_permissions($data['id']);
           if($permissions->num_rows() > 0){ 
              foreach($permissions->result() as $key => $permission){
                $perm_list .= '<li id="row_'.$permission->id.'" class="list-group-item d-flex justify-content-between listitem-content">
                                 '.$permission->name.'  
                                <a href="javascript:;" class="delete pull-right" data="'.get_json(array('id'=>$permission->id,'table'=>'permissions')).'">
                                  <span class="badge badge-danger"><i class="fa fa-times"></i></span>
                                </a>
                              </li>';
              }                          
           }
        }

        echo $perm_list;
    }

    public function get_childs(){
         
        $data = $this->input->post();

        if(count($data['data']) > 0){ 
            $data = $data['data'];
            $records = $this->HRM_Model->get_childs($data); 
            if($records->num_rows() > 0){
                echo json_encode($records->result());
            }
            else{
                echo 'false';
            } 
        } 
    } 


    public function load_file_data(){
        $employees = array();
        $ok = true;
        $file_name = $this->input->post('file_name');
        $file = $_FILES[$file_name]['tmp_name'];
        $handle = fopen($file, "r");
        if ($file == NULL) {
          error(_('Please select a file to import')); 
        }
        else{
              $i = 0;
            while(($filesop = fgetcsv($handle, 20000, ",")) !== false){ 
                if($i > 0){

                    $employee_data = array(); 
                    $employee_data['hr_file_id'] = $filesop[0];
                    $employee_data['first_name'] = $filesop[1];
                    $employee_data['last_name'] = $filesop[2];
                    $employee_data['father_name'] = $filesop[3];
                    $employee_data['husband_name'] = $filesop[4];
                    $employee_data['salutation'] = $filesop[5];
                    $employee_data['cnic'] = str_replace("-", "", $filesop[6]);
                    $employee_data['cnic_exp_date'] = date("Y-m-d",strtotime($filesop[7]));
                    $employee_data['gender'] = $filesop[8];
                    $employee_data['martial_status'] = $filesop[9];
                    $employee_data['joining_date'] = date("Y-m-d",strtotime($filesop[10]));
                    $employee_data['religion'] = $filesop[11];
                    $employee_data['nationality'] = $filesop[12]; 
                    $employee_data['dob'] = date("Y-m-d",strtotime($filesop[13]));
                    $employee_data['birth_country'] = $filesop[14]; 
                    $employee_data['perm_country'] = $filesop[15];
                    $employee_data['perm_state'] = $filesop[16];
                    $employee_data['perm_city'] = $filesop[17]; 
                    $employee_data['perm_address'] = $filesop[18];
                    $employee_data['temp_country'] = $filesop[19];
                    $employee_data['temp_state'] = $filesop[20];
                    $employee_data['temp_city'] = $filesop[21]; 
                    $employee_data['temp_address'] = $filesop[22]; 
                    $employee_data['rank'] = $filesop[23];
                    $employee_data['emp_cat_id'] = $filesop[24];
                    $employee_data['emp_type_id'] = $filesop[25];
                    $employee_data['dep_id'] = $filesop[26];
                    $employee_data['fac_category'] = $filesop[27];
                    $employee_data['job_nature_id'] = $filesop[28];
                    $employee_data['fac_regist_type'] = $filesop[29];
                    $employee_data['pmdc_number'] = $filesop[30]; 
                    $employee_data['pmdc_certificate_expiry'] = $filesop[31];
                    $employee_data['pmdc_card_expiry'] = $filesop[32];
                    $employee_data['designation_id'] = $filesop[33];
                    $employee_data['qualification'] = $filesop[34];
                    $employee_data['police_verification'] = $filesop[35];
                    $employee_data['phone1'] = $filesop[36];
                    $employee_data['mobile1'] = $filesop[37];
                    $employee_data['mobile2'] = $filesop[38];
                    $employee_data['email'] = $filesop[39]; 
                    $employee_data['work_placement'] = $filesop[40]; 
                    $employee_data['pay_scale_id'] = $filesop[41];
                    $employee_data['hod'] = $filesop[42];


                    if(isset($employee_data['salutation']) && $employee_data['salutation'] != ''){
                        $this->db->select('id');
                        $salutation_rec = $this->db->get_where("salutations",array("name"=>$employee_data['salutation']));
                        if($salutation_rec->num_rows() > 0){
                           $employee_data['salutation'] = $salutation_rec->row()->id;
                        }
                    }

                    if(isset($employee_data['martial_status']) && $employee_data['martial_status'] != ''){
                        $this->db->select('id');
                        $martial_status_rec = $this->db->get_where("martial_status",array("name"=>$employee_data['martial_status']));
                        if($martial_status_rec->num_rows() > 0){
                           $employee_data['martial_status'] = $martial_status_rec->row()->id;
                        }
                    } 

                    if(isset($employee_data['religion']) && $employee_data['religion'] != ''){
                        $this->db->select('id');
                        $religion_rec = $this->db->get_where("religions",array("name"=>$employee_data['religion']));
                        if($religion_rec->num_rows() > 0){
                           $employee_data['religion'] = $religion_rec->row()->id;
                        }
                    }

                    if(isset($employee_data['nationality']) && $employee_data['nationality'] != ''){
                        $this->db->select('id');
                        $nationality_rec = $this->db->get_where("countries",array("name"=>$employee_data['nationality']));
                        if($nationality_rec->num_rows() > 0){
                           $employee_data['nationality'] = $nationality_rec->row()->id;
                        }
                    }

                    if(isset($employee_data['birth_country']) && $employee_data['birth_country'] != ''){
                        $this->db->select('id');
                        $country_rec = $this->db->get_where("countries",array("name"=>$employee_data['birth_country']));
                        if($country_rec->num_rows() > 0){
                           $employee_data['birth_country'] = $country_rec->row()->id;
                        }
                    }

                    if(isset($employee_data['birth_city']) && $employee_data['birth_city'] != ''){
                        $this->db->select('id');
                        $birth_city_rec = $this->db->get_where("cities",array("name"=>$employee_data['birth_city']));
                        if($birth_city_rec->num_rows() > 0){
                           $employee_data['birth_city'] = $birth_city_rec->row()->id;
                        }
                    }

                    if(isset($employee_data['perm_country']) && $employee_data['perm_country'] != ''){
                        $this->db->select('id');
                        $perm_country_rec = $this->db->get_where("countries",array("name"=>$employee_data['perm_country']));
                        if($perm_country_rec->num_rows() > 0){
                           $employee_data['perm_country'] = $perm_country_rec->row()->id;
                        }
                    }

                    if(isset($employee_data['perm_state']) && $employee_data['perm_state'] != ''){
                        $this->db->select('id');
                        $perm_state_rec = $this->db->get_where("states",array("name"=>$employee_data['perm_state']));
                        if($perm_state_rec->num_rows() > 0){
                           $employee_data['perm_state'] = $perm_state_rec->row()->id;
                        }
                    }

                    if(isset($employee_data['perm_city']) && $employee_data['perm_city'] != ''){
                        $this->db->select('id');
                        $perm_city_rec = $this->db->get_where("cities",array("name"=>$employee_data['perm_city']));
                        if($perm_city_rec->num_rows() > 0){
                           $employee_data['perm_city'] = $perm_city_rec->row()->id;
                        }
                    }  

                    if(isset($employee_data['temp_country']) && $employee_data['temp_country'] != ''){
                        $this->db->select('id');
                        $temp_country_rec = $this->db->get_where("countries",array("name"=>$employee_data['temp_country']));
                        if($temp_country_rec->num_rows() > 0){
                           $employee_data['temp_country'] = $temp_country_rec->row()->id;
                        }
                    }

                    if(isset($employee_data['temp_state']) && $employee_data['temp_state'] != ''){
                        $this->db->select('id');
                        $temp_state_rec = $this->db->get_where("states",array("name"=>$employee_data['temp_state']));
                        if($temp_state_rec->num_rows() > 0){
                           $employee_data['temp_state'] = $temp_state_rec->row()->id;
                        }
                    }

                    if(isset($employee_data['temp_city']) && $employee_data['temp_city'] != ''){
                        $this->db->select('id');
                        $temp_city_rec = $this->db->get_where("cities",array("name"=>$employee_data['temp_city']));
                        if($temp_city_rec->num_rows() > 0){
                           $employee_data['temp_city'] = $temp_city_rec->row()->id;
                        }
                    }

                    if(isset($employee_data['emp_cat_id']) && $employee_data['emp_cat_id'] != ''){
                        $this->db->select('id');
                        $emp_cat_id_rec = $this->db->get_where("emp_categories",array("name"=>$employee_data['emp_cat_id']));
                        if($emp_cat_id_rec->num_rows() > 0){
                           $employee_data['emp_cat_id'] = $emp_cat_id_rec->row()->id;
                        }
                    }

                    if(isset($employee_data['emp_type_id']) && $employee_data['emp_type_id'] != ''){
                        $this->db->select('id');
                        $emp_type_id_rec = $this->db->get_where("emp_types",array("name"=>$employee_data['emp_type_id']));
                        if($emp_type_id_rec->num_rows() > 0){
                           $employee_data['emp_type_id'] = $emp_type_id_rec->row()->id;
                        }
                    }

                    if(isset($employee_data['dep_id']) && $employee_data['dep_id'] != ''){
                         
                        $dep_id_rec = $this->db->get_where("departments",array("name"=>$employee_data['dep_id']));
                        if($dep_id_rec->num_rows() > 0){
                           $employee_data['campus_id'] = $dep_id_rec->row()->campus;
                           $employee_data['inst_id'] = $dep_id_rec->row()->branch;
                           $employee_data['brnh_id'] = $dep_id_rec->row()->institute;
                           $employee_data['dep_id'] = $dep_id_rec->row()->id;
                       
                        }
                    }

                    if(isset($employee_data['fac_category']) && $employee_data['fac_category'] != ''){
                        $this->db->select('id');
                        $fac_category_rec = $this->db->get_where("faculty_categories",array("name"=>$employee_data['fac_category']));
                        if($fac_category_rec->num_rows() > 0){
                           $employee_data['fac_category'] = $fac_category_rec->row()->id;
                        }
                    }

                    if(isset($employee_data['job_nature_id']) && $employee_data['job_nature_id'] != ''){
                        $this->db->select('id');
                        $job_nature_id_rec = $this->db->get_where("nature_of_jobs",array("name"=>$employee_data['job_nature_id']));
                        if($job_nature_id_rec->num_rows() > 0){
                           $employee_data['job_nature_id'] = $job_nature_id_rec->row()->id;
                        }
                    }

                    if(isset($employee_data['designation_id']) && $employee_data['designation_id'] != ''){
                        $this->db->select('id');
                        $designation_id_rec = $this->db->get_where("designations",array("name"=>$employee_data['designation_id']));
                        if($designation_id_rec->num_rows() > 0){
                           $employee_data['designation_id'] = $designation_id_rec->row()->id;
                        }
                    }

                    if(isset($employee_data['pay_scale_id']) && $employee_data['pay_scale_id'] != ''){
                        $this->db->select('id');
                        $pay_scale_id_rec = $this->db->get_where("pay_scales",array("name"=>$employee_data['pay_scale_id']));
                        if($pay_scale_id_rec->num_rows() > 0){
                           $employee_data['pay_scale_id'] = $pay_scale_id_rec->row()->id;
                        }
                    }
 
                    $employees[] = $employee_data;

                    $this->db->insert('employees',$employee_data);
                }


                

                $i = $i + 1;
            }
        }


       // $this->db->insert_batch('employees',$employees);

        // echo "<pre>";
        // print_r($employees);

        $message['success'] = true; ;
        $message['data'] = $employees ;
        $message['message'] = 'Record is saved successfully!' ;
        echo json_encode($message); 
         
	} 
	
	public function save_hrm_file($file,$table,$id,$path){
        if(isset($_FILES[$file]['error']) && $_FILES[$file]['error'] == 0) 
        { 
            $filedata['table_id'] = $id;  
            $filedata['table_name'] = $table; 
            $filedata["original_name"] = $this->save_file($path,$file); 
            $filedata['file_name'] = $_FILES[$file]['name']; 
            $filedata['file_type'] = $_FILES[$file]['type']; 
            $filedata['file_size'] = $_FILES[$file]['size']; 
            $filedata['date_added'] = $this->date; 
            $filedata['added_by'] = $this->user_data['id']; 
            $filedata['modified_by'] = $this->user_data['id'];  
            $this->db->insert("files",$filedata); 
            $this->db->update($table,array($file => $filedata["original_name"]),array("id"=>$id)); 
        }
    }

    public function save_multiple_files($path,$files=array(),$table,$id) 
    { 
        $filedata = array(); 
        if (!file_exists($path)) {  mkdir($path, 0777, true); } 
        $filesCount = count($files); 

        for($i = 0; $i < $filesCount; $i++) 
        { 
            $_FILES['userFile']['name'] = $files[$i]['name']; 
            $_FILES['userFile']['type'] = $files[$i]['type']; 
            $_FILES['userFile']['tmp_name'] = $files[$i]['tmp_name']; 
            $_FILES['userFile']['error'] = $files[$i]['error']; 
            $_FILES['userFile']['size'] = $files[$i]['size']; 

            $config = array(); 
            $config['upload_path']          = $path; 
            $config['allowed_types']        = '*'; 
            $config['max_size']             = 1024*1024*1024*1024*1024*1024; 
            $config['encrypt_name']         = true; 

            $this->load->library('upload', $config); 
            $this->upload->initialize($config); 
            if($this->upload->do_upload('userFile'))
            { 
                $fileData = $this->upload->data(); 
                $filedata = array();

                $filedata['table_id']   =    $id;  
                $filedata['table_name'] =    $table; 
                $filedata["original_name"] = $fileData['file_name']; 
                $filedata['file_name'] =     $_FILES['userFile']['name'];  
                $filedata['file_type'] =     $_FILES['userFile']['type']; 
                $filedata['file_size'] =     $_FILES['userFile']['size']; 
                $filedata['date_added']=     $this->date; 
                $filedata['added_by']  =     $this->user_data['id']; 
                $filedata['modified_by'] =   $this->user_data['id']; 

                $this->db->insert("files",$filedata);   
            }

        }
 
        return true; 
    } 

    public function save_multiple_files_return_names($path,$files=array(),$table,$id) 
    { 
        $filedata = array(); 
        $uploaded_files = array();
        if (!file_exists($path)) {  mkdir($path, 0777, true); } 
        $filesCount = count($files); 

        for($i = 0; $i < $filesCount; $i++) 
        { 
            $_FILES['userFile']['name'] = $files[$i]['name']; 
            $_FILES['userFile']['type'] = $files[$i]['type']; 
            $_FILES['userFile']['tmp_name'] = $files[$i]['tmp_name']; 
            $_FILES['userFile']['error'] = $files[$i]['error']; 
            $_FILES['userFile']['size'] = $files[$i]['size']; 

            $config = array(); 
            $config['upload_path']          = $path; 
            $config['allowed_types']        = '*'; 
            $config['max_size']             = 1024*1024*1024*1024*1024*1024; 
            $config['encrypt_name']         = true; 

            $this->load->library('upload', $config); 
            $this->upload->initialize($config); 
            if($this->upload->do_upload('userFile'))
            { 
                $fileData = $this->upload->data(); 
                $filedata = array();

                $filedata['table_id']   =    $id;  
                $filedata['table_name'] =    $table; 
                $filedata["original_name"] = $fileData['file_name']; 
                $filedata['file_name'] =     $_FILES['userFile']['name'];  
                $filedata['file_type'] =     $_FILES['userFile']['type']; 
                $filedata['file_size'] =     $_FILES['userFile']['size']; 
                $filedata['date_added']=     $this->date; 
                $filedata['added_by']  =     $this->user_data['id']; 
                $filedata['modified_by'] =   $this->user_data['id']; 

                $this->db->insert("files",$filedata);   

                $uploaded_files[] = $fileData['file_name']; 
            }

        }
 
        return $uploaded_files; 
    }

    public function save_file($pathh,$name) 
    { 

        if (!file_exists($pathh)) {  mkdir($pathh, 0777, true); } 

        $config = array(); 
        $config['upload_path']          = $pathh; 
        $config['allowed_types']        = '*'; 
        $config['max_size']             = 1024*1024*1024*1024; 
        $config['encrypt_name']         = true; 

        $this->load->library('upload', $config); 

        if ( ! $this->upload->do_upload($name)) 
        { 
             $error = array('error' => $this->upload->display_errors());
        } 
        else 
        {  
            $data =  $this->upload->data(); 
            $files_name = $data['file_name']; 
            return $files_name; 
        } 
    } 

    public function reArrayFiles($file_post)  
    { 
        $file_ary = array(); 
        $file_count = count($file_post['name']); 
        $file_keys = array_keys($file_post); 

        for ($i=0; $i<$file_count; $i++) 
        { 
            foreach ($file_keys as $key) 
            { 
                $file_ary[$i][$key] = $file_post[$key][$i]; 
            } 
        } 

        return $file_ary; 
    } 

    public function JsonEncode($data='') 
    { 
        foreach ($data as $key => $val)  
        { 
           if(is_array($val))  
           { 
               $data[$key] = json_encode($val); 
           } 
        }  
        return $data; 
    } 

    
    public function save_form() 
    { 
        $save = false;   $message = array(); $id = "";   
        $data = $this->input->post();
        // print_r($data);
        // die();
      
        if(isset($data['edit_record_id']))  
            $id = $data['edit_record_id'];  

        $table = $data['table_name'];  
        unset($data['csrf_token'],$data['edit_record_id'],$data['table_name']);

        if($id == "") 
        {  
            $data['date_added'] = $this->date; 
            $data['added_by'] = $this->user_data['id'];   
            $data = $this->JsonEncode($data); 
            $this->db->insert($table,$data); 
            $id = $this->db->insert_id(); 
               
            $filedata = array(); 
            $path = "assets/admin/adminassets/".$table."/".$id."/"; 
            
            if(isset($_FILES) && sizeof($_FILES) > 0) 
            { 
                foreach ($_FILES as $key => $value)  
                { 
                    if(is_array($_FILES[$key]['name'])) 
                    { 
                        if($_FILES[$key]['error'][0] == 0) 
                        { 
                            $files =  $this->reArrayFiles($_FILES[$key]); 
                            $this->save_multiple_files($path,$files,$table,$id); 
                        } 
                    } 
                    else 
                    { 
                        if($_FILES[$key]['error'] == 0) 
                        { 
                            $filedata['table_id'] = $id;  
                            $filedata['table_name'] = $table; 
                            $filedata["original_name"] = $this->save_file($path,$key); 
                            $filedata['file_name'] = $_FILES[$key]['name']; 
                            $filedata['file_type'] = $_FILES[$key]['type']; 
                            $filedata['file_size'] = $_FILES[$key]['size']; 
                            $filedata['date_added'] = $this->date; 
                            $filedata['added_by'] = $this->user_data['id']; 
                            $filedata['modified_by'] = $this->user_data['id']; 

                            $this->db->insert("files",$filedata); 
                            $this->db->update($table,array($key => $filedata["original_name"]),array("id"=>$id));
                        } 
                    }  
                } 
            } 
            
            $alert  =  '<div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-ban"></i> Successful!</h4>
                             Record is saved successfully...
                        </div>';  
            $save = true;   
        } 
        else 
        { 
            $data['Date_Modification'] = $this->date; 
            $data['modified_by'] = $this->user_data['id'];  
            $data = $this->JsonEncode($data);  
 
            $files_allowed = true;
            $path = "assets/admin/adminassets/".$table."/".$id."/"; 
            if(isset($_FILES) && sizeof($_FILES) > 0) 
            { 
                $filedata = array(); 
                foreach ($_FILES as $key => $value)  
                { 
                    if(is_array($_FILES[$key]['name'])) 
                    { 
                        if($_FILES[$key]['error'][0] == 0) 
                        { 
                            $files =  $this->reArrayFiles($_FILES[$key]); 
                            $this->save_multiple_files($path,$files,$table,$id); 
                        } 
                    } 
                    else 
                    {  
                        if($_FILES[$key]['error'] == 0) 
                        { 
                            $filedata['table_id'] = $id;  
                            $filedata['table_name'] = $table; 
                            $filedata["original_name"] = $this->save_file($path,$key); 
                            $filedata['file_name'] = $_FILES[$key]['name']; 
                            $filedata['file_type'] = $_FILES[$key]['type']; 
                            $filedata['file_size'] = $_FILES[$key]['size']; 
                            $filedata['date_added'] = $this->date; 
                            $filedata['added_by'] = $this->user_data['id']; 
                            $filedata['modified_by'] = $this->user_data['id'];  
                            
                            $this->db->insert("files",$filedata); 
                            $this->db->update($table,array($key => $filedata["original_name"]),array("id"=>$id)); 
                        } 
                    }  
                }  
            }  

                            
            $this->db->update($table,$data,array("id"=>$id));  
            // echo $this->db->last_query();
     //        die();
            $alert  =  '<div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-ban"></i> Successful!</h4>
                             Record is updated successfully...
                        </div>'; 
            $save = true;   
        }  

        if($this->input->is_ajax_request()){
            $message['success'] = $save ;
            $message['message'] = 'Record is saved successfully!' ;
            echo json_encode($message);
        }
        else{ 
            $this->session->set_flashdata("message",$alert); 
            redirect($_SERVER['HTTP_REFERER']);
        }   
	}



    public function change_status()
    {
        $data = $this->input->post();
        if($data['id'] > 0)
        {
            $table = $data['table'];
            $table_rec = $this->db->get_where($table,array("id"=>$data['id']))->result_array();
            $current_status = $table_rec[0]['status'];

            if($current_status == 0)
            {
                $status = 1;
            }
            else
            {
                $status = 0;
            }

            $this->db->update($table,array("status"=>$status),array("id"=>$data['id']));
        }

        echo true;
    }

    public function filter_campaigns(){

            $data = $this->input->post(); 
            if($this->uri->segment(3) && $this->uri->segment(3) > 0){
               $data['page'] = $this->uri->segment(3);
            } 

            $records = '';
            $result = $this->App_Model->get_filtered_campaigns($data); 
            if($result['records']->num_rows() > 0){

                // echo "string";
               
                foreach ($result['records']->result() as $key => $value) {
                            $checked ="";
                            if($value->status == 1){
                                $checked = 'checked';
                            }
                            $rec_permissions = "";
                            $rec_permissions .= '<a class="dropdown-item open-model" data="'.get_json(array('id'=>$value->id,'view'=>'models/form-campaign')).'" href="javascript:;">Edit</a>';
                      
                       
                            $rec_permissions .= '<a class="dropdown-item open-model" href="javascript:;" data="'. get_json(array('id'=>$value->id,'view'=>'models/view-campaign')).'">View</a>';
                    
                      
                            $rec_permissions .= ' <a class="dropdown-item delete" data="'.get_json(array('id'=>$value->id,'table'=>'campaigns')).'" href="javascript:;">Delete</a>';
                      
                   
                                     $records .= ' <tr class="rec-'.$value->id.'">
                                        <td class="table-checkbox">
                                            <div class="checkbox checkbox-success">
                                                <input type="checkbox" class="table_record_checkbox" value="'.$value->id.'" id="colorCheckbox'.$value->id.'"> 
                                                <label for="colorCheckbox'.$value->id.'"></label>
                                            </div>
                                        </td>
                                        <td class="text-bold-500 col-title">'.$value->title.'</td>
                                        <td class="col-description">'.substr($value->description,0,80).'</td>
                                        <td class="col-date_added">'.$value->date_added.'</td>
                                        <td class="hide col-date_modification">'.$value->date_modification.'</td>
                                        <td class="hide col-added_by">'.$value->added_by_name.'</td>
                                        <td class="hide col-modified_by">'.$value->modified_by_name.'</td>
                                        <td class="col-status"> 
                                            <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                                <input type="checkbox" '.$checked.' class="custom-control-input change-status" table="campaigns"  id="customSwitchcolor'.$value->id.'" table-id="'.$value->id.'">
                                                <label class="custom-control-label" for="customSwitchcolor'.$value->id.'"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                              <button type="button" class="action-dropdown dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                               <i class="bx bx-dots-vertical-rounded"></i>
                                              </button>
                                              <div class="dropdown-menu dropdown-menu-right">
                                                
                                                '. $rec_permissions.'
                                               
                                              </div>
                                            </div>
                                        </td>
                                    </tr>';              
                }
            }


            $per_page = $data['per_page'];
            if( $per_page == 0)
                $per_page = 5000000000;
            $first_url = base_url('App/filter_campaigns');
            $links = $this->create_pagination($first_url,$result['total_records'], $per_page);
            $result['links']  = $links;
            $result['records']  = $records;
            $result['total_records']  = $result['total_records'];
            echo json_encode($result); 
    }

    public function create_pagination($url,$total_record,$per_page){

        $config['base_url'] = $url;
        $config['total_rows'] = $total_record;
        $config['per_page'] = $per_page;
        $config["uri_segment"] = 3; 
        $config['first_url'] = $url; 
        $config['num_links'] = 3;
        $config['use_page_numbers'] = TRUE;
        $config['reuse_query_string'] = FALSE;  
        $config['enable_query_strings']= FALSE; 
        $config['attributes'] = array('class' => 'page-link');
        $config['first_link'] = '<<';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>'; 
        $config['last_link'] = '>>';
        $config['last_tag_open'] = '<li class="page-item next">';
        $config['last_tag_close'] = '</li>'; 
        $config['next_link'] = '>';
        $config['next_tag_open'] = '<li class="page-item next">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '<';
        $config['prev_tag_open'] = '<li class="page-item previous">';
        $config['prev_tag_close'] = '</li>'; 
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="javascript:;">';
        $config['cur_tag_close'] = '</a></li>'; 
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        return $links = $this->pagination->create_links();

    }

    public function export_campaigns(){
        $data = $this->input->post();
        $response = $this->generate_excel_file('campaigns','Campaings ','get_campaigns_for_excel',$data['ids']);
        echo $response;
    }

    public function export_all_campaigns(){
        $data = $this->input->post();
        $records = $this->db->select('GROUP_CONCAT(id) as ids')->get_where('campaigns',array('deleted'=>0));

        if($records->num_rows() >0){
            $ids = $records->row()->ids;
            $ids = explode(',' ,$ids);
            $response = $this->generate_excel_file('campaigns','Campaings ','get_campaigns_for_excel',$ids);
            echo $response;
        }else{
            echo 'false';
        }   

    }

    public function import_campaign_csv_file(){
        $save = false; $alert = "";

        if(isset($_FILES['import_file'])){
            if($_FILES['import_file']['name'] != ""){
                $allowed = array('csv');
                $ext = pathinfo($_FILES['import_file']['name'], PATHINFO_EXTENSION);
                if (!in_array($ext, $allowed)) {
                    $alert  = ' The file type must be CSV ';
                    $save = false;  
                }else{
                    $file = $_FILES['import_file']['tmp_name'];
                    $handle = fopen($file, "r");
                    if ($file == NULL) {
                            $alert  = 'No File Uploaded...'; 
                            $save = false;  
                    }
                    else{
                            $i = 0;
                            $duplicate_records = $insert_records = 0;
                            while(($filesop = fgetcsv($handle, 10000, ",")) !== false){ 
                                if($i > 0){
                                    if(isset($filesop[0]) && isset($filesop[1])){  
                                        $record_data = array(); 
                                        if($filesop[0] !=""){
                                            $record_data['title'] = $this->validate_import_field_value($filesop[0]);
                                            $record_data['description'] = $this->validate_import_field_value($filesop[1]);
                                            $check = $this->db->get_where('campaigns',array('title'=>$record_data['title']));
                                            if($check->num_rows() < 1){
                                                $this->db->insert('campaigns',$record_data);
                                                $insert_records++;
                                            }else{
                                                $duplicate_records++;
                                            }
                                        }  
                                    }
                                }

                                $i++;
                            }     
                        if($insert_records > 0){
                             $alert  = $insert_records.' records has been imported successfully';  
                            $save = true; 
                        }else{
                             $alert  = 'No Record Imported';
                           
                            $save = true; 
                        }

                    }   

                }
            }
        }
        $message['message'] = $alert;
        $message['success'] = $save;
        echo json_encode($message);
    }

    public function download_sample_file(){
        $data = $this->input->post();
        if(isset($data['file_name'])){
            echo APP_ASSETS.'/sample-files/'.$data['file_name'];
        }
    }

    public function validate_import_field_value($input){
        if($input != "" && $input != 'NA'){
            return $input;
        } 
    }

}
