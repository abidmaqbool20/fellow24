<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('test_method'))
{
    function test_method($var = '')
    {
        return $var;
    }    

    function no_record_found()
    {
      return $no_record = '<div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="no_record_found">
                                <img class="no_results" src="'.ADMINASSETS.'/img/no-record-found.png">
                              </div> 
                            </div>';
    }

    function access_denied(){
      echo '<div class="col-md-12 col-sm-12 cl-lg-12 col-xs-12">
              <div class="row">
                <div class="no-result-img">
                  <img src="'.ADMINASSETS.'/img/access-denied.jpg">
                </div>
              </div>
            </div>';
    }

    function get_file_icon($ext)
    {
        $images_extensions = array("png","jpg","ai","bmp","gif","ico","jpeg","ps","psd","svg","tif","tiff");
        $videos_extensions = array("mp4","mkv","flv","webm","vob","avi","wmv","svi");
        $audios_extensions = array("mp3","aif","cda","mid","wav","wma","wpl","mpa");
        $compressed_extensions = array("7z","arj","pkg","deb","rar","rpm","tar.gz","z","zip");
        $excel_extensions = array("ods","xlr","xls","xlsx");
        $word_extensions = array("doc","docx","txt","wpd","wks","wps","rtf");
        $pdf_extensions = array("pdf");

        $file_ico = "";

        if(in_array($ext, $images_extensions))
        {
          $file_ico = "fa fa-file-image-o";
        }
        elseif(in_array($ext, $videos_extensions))
        {
          $file_ico = "fa fa-file-video-o";
        }
        elseif(in_array($ext, $audios_extensions))
        {
          $file_ico = "fa fa-file-audio-o";
        }
        elseif(in_array($ext, $compressed_extensions))
        {
          $file_ico = "fa fa-file-archive-o";
        }
        elseif(in_array($ext, $excel_extensions))
        {
          $file_ico = "fa fa-file-excel-o";
        }
        elseif(in_array($ext, $word_extensions))
        {
          $file_ico = "fa fa-file-word-o";
        }
        elseif(in_array($ext, $pdf_extensions))
        {
          $file_ico = "fa fa-file-pdf-o";
        }

        return $file_ico;
    }

    function get_file_type($ext)
    {
        $images_extensions = array("png","jpg","ai","bmp","gif","ico","jpeg","ps","psd","svg","tif","tiff");
        $videos_extensions = array("mp4","mkv","flv","webm","vob","avi","wmv","svi");
        $audios_extensions = array("mp3","aif","cda","mid","wav","wma","wpl","mpa");
        $compressed_extensions = array("7z","arj","pkg","deb","rar","rpm","tar.gz","z","zip");
        $excel_extensions = array("ods","xlr","xls","xlsx");
        $word_extensions = array("doc","docx","txt","wpd","wks","wps","rtf");
        $pdf_extensions = array("pdf");

        $file_type = "";

        if(in_array($ext, $images_extensions))
        {
          $file_type = "image";
        }
        elseif(in_array($ext, $videos_extensions))
        {
          $file_type = "video";
        }
        elseif(in_array($ext, $audios_extensions))
        {
          $file_type = "audio";
        }
        elseif(in_array($ext, $compressed_extensions))
        {
          $file_type = "zip";
        }
        elseif(in_array($ext, $excel_extensions))
        {
          $file_type = "excel";
        }
        elseif(in_array($ext, $word_extensions))
        {
          $file_type = "word";
        }
        elseif(in_array($ext, $pdf_extensions))
        {
          $file_type = "pdf";
        }

        return $file_type;
    }


    function date_difference($date_start='',$date_end='')
    {
         
        $d_start    = new DateTime($date_start); 
        $d_end      = new DateTime($date_end); 
        $diff = $d_start->diff($d_end); 
        // return all data 
        $difference['Year'] = $diff->format('%y'); 
        $difference['Month'] = $diff->format('%m'); 
        $difference['Day'] = $diff->format('%d'); 
        $difference['Hour'] = $diff->format('%h'); 
        $difference['Minuts'] = $diff->format('%i'); 
        $difference['Seconds'] = $diff->format('%s'); 
       
        return $difference;
    } 

    function get_json($data){
        return htmlentities(json_encode($data)); 
    }

    function parseTree($tree, $root = null) {
        $return = array();
        # Traverse the tree and search for direct children of the root
        foreach($tree as $child => $parent) {
            # A direct child is found
            if($parent == $root) {
                # Remove item from tree (we don't need to traverse this again)
                unset($tree[$child]);
                # Append the child into result array and parse its children
                $return[] = array(
                    'name' => $child,
                    'children' => parseTree($tree, $child)
                );
            }
        }
        return empty($return) ? null : $return;    
      }


    function printTree($tree,$role_modules,$mod_permissions) {
            // echo "<pre>";
            // print_r($role_modules);
            // print_r($mod_permissions);
            // die();
            if(!is_null($tree) && count($tree) > 0) {
                echo '<ul>';
                foreach($tree as $node) {
                      
                      $checked = ""; 
                      $node_parts = explode("_", $node['name']);
                      if($node_parts[0] == "Module"){ 
                        
                        if(in_array(end($node_parts),$role_modules)){
                          $checked = "checked='checked'";
                        } 

                        $chkbox_name = "modules";
                        $checkbox_val = end($node_parts);
                        unset($node_parts[0],$node_parts[count($node_parts)]); 
                        $checkbox_name = implode(" ", $node_parts);
                      }
                      else{ 
                        
                        if(isset($mod_permissions[$node_parts[count($node_parts)-2]])){
                          if(in_array(end($node_parts), $mod_permissions[$node_parts[count($node_parts)-2]])){ 
                            $checked = "checked='checked'";
                          }
                        }

                        $chkbox_name = "permissions";
                        $checkbox_val = $node_parts[count($node_parts)-2]."_".end($node_parts);
                        unset($node_parts[0],$node_parts[count($node_parts)],$node_parts[count($node_parts)]);
                        $checkbox_name = implode(" ", $node_parts);
                      }


                      echo  '<li> <span><i class="fa fa-minus"></i> </span>
                             <label class="ckbox ckbox-primary">
                                <input type="checkbox" '.$checked.' value="'.$checkbox_val.'" name="'.$chkbox_name.'[]" class="modules_checkbox"><span class="module_title">'.$checkbox_name.'</span>
                             </label>'; 
                    printTree($node['children'],$role_modules,$mod_permissions);
                    echo '</li>';
                }
                echo '</ul>';
            }
    }


     function count_minutes($start_date,$end_date)
     {
        $start_date = new DateTime($start_date);
        $end_date = new DateTime($end_date);
        $diff = $start_date->diff($end_date);
        $second_into_minutes = 0;
        if($diff->s >= 30)
            $second_into_minutes = 1;
       return $minutes = ($diff->days * 24 * 60) +
                   ($diff->h * 60) + $diff->i + $second_into_minutes;
     }

  
    function minutes_to_hours($time, $format = '%02d:%02d') {
        if ($time < 1) {
            return;
        }
        $hours = floor($time / 60);
        $minutes = ($time % 60);
        return sprintf($format, $hours, $minutes);
    }

    function count_days($from_date,$to_date)
    {
        $start_date  = strtotime($from_date);
        $end_date = strtotime($to_date);
        $fdate = date_create($from_date);
        $tdate = date_create($to_date);
        $diff = date_diff($fdate,$tdate);
       return $total_days = $diff->format("%a%");
    }

    function emp_leaves_counter($emp_id,$start_date,$end_date)
  {
        $ci =& get_instance();
        $emp_leaves_arr = array();
       if($emp_id > 0 && $emp_id != "" && $start_date != "" && $end_date != "")
       {
          $ci->db->select('leave_types.short_name,leave_types.name,leave_applications.*');
          $ci->db->where(array('leave_applications.emp_id'=>$emp_id,'leave_applications.deleted'=>0, 'leave_applications.application_status'=>'Approved','leave_applications.status'=>1,'leave_applications.from_date >=' =>$start_date));
          $ci->db->from('leave_applications');
          $ci->db->join('leave_types','leave_applications.leave_type = leave_types.id','left');
          $emp_leaves = $ci->db->get();
          if($emp_leaves->num_rows() >0){

            foreach ($emp_leaves->result() as $key => $value) {
                
                $total_days = count_days($value->from_date,$value->to_date);

                for($i=0;$i<=$total_days;$i++){

                    $leave_day = date('Y-m-d', strtotime("+$i day", strtotime($value->from_date)));
                    if($leave_day <= $end_date){
                        if(isset($emp_leaves_arr[$value->name])){
                            $emp_leaves_arr[$value->name] = $emp_leaves_arr[$value->name] + 1;
                        }
                        else{
                            $emp_leaves_arr[$value->name] = 1;
                        } 
                    }

                }
            }
          }  
       }

       return $emp_leaves_arr;
  }


  function get_ip() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {   //check ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   //to check ip is pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

} 