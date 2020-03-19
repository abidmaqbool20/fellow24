<?php
  if (isset($id) && $id > 0) {
    $record = $this->App_Model->get_employees_rec($id);
    if ($record->num_rows() > 0) {
      $record_data = $record->row();
    }
    
  }
?>
<style>
  .select2-container .select2-selection--single .select2-selection__rendered {
    padding-left: 34px !important;
}
</style>
<div class="page-body-modal-window cus-model-window model-first show large-model"> 
  <div class="model-content">
    <div class="card shadow-none quill-wrapper">
      <div class="card-header d-flex justify-content-between align-items-center border-bottom px-2 py-1">
        <h3 class="card-title">Employee Form</h3>
        <button type="button" class="close close-icon close-modal close-model">
          <i class="bx bx-x"></i>
        </button>
      </div>
      <?php  
        // echo "<pre>";print_r($record_data);
        // die();
      ?>
      <!-- form start -->
      <form class="edit-kanban-item general-form" method="post" autocomplete="off" action="<?= base_url('app/save_form'); ?>" enctype="multipart/form-data">
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <input type="hidden" name="table_name" id="table_name" value="employees">
        <input type="hidden" name="edit_record_id" id="edit_record_id" value="<?php if (isset($record_data)) {echo $record_data->id;} ?>">
        <div class="card-content">
          <div class="card-body">
            <div class="row">

            <div class="col-md-12 change-color">
              <h4 class="h4 ">Basic Information</h4>
            </div>
            <hr>
            <div class="col-md-12 col-lg-12 col-sm-12 change-heading-color">
              <div class="row"> 
                <div class="col-md-3 col-lg-3 col-sm-3">
                  <div class="form-group">
                    <label for="first-name-icon"><span class="required-label">*</span>First Name</label>
                    <div class="position-relative has-icon-left">
                      <input type="text" id="first-name-icon" class="form-control first_name" name="first_name" placeholder="First Name" required="required" value="<?php if (isset($record_data)) {echo $record_data->first_name;} ?>">
                      <div class="form-control-position">
                        <i class="bx bx-user"></i>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-3">
                  <div class="form-group">
                    <label for="last-name-icon"><span class="required-label">*</span>Last Name</label>
                    <div class="position-relative has-icon-left">
                      <input type="text" id="last-name-icon" class="form-control last_name" name="last_name" placeholder="Last Name" required="required" value="<?php if (isset($record_data)) {echo $record_data->last_name;} ?>">
                      <div class="form-control-position">
                        <i class="bx bx-user"></i>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-3">
                  <div class="form-group">
                    <label for="father-name-icon"><span class="required-label">*</span>Father Name</label>
                    <div class="position-relative has-icon-left">
                      <input type="text" id="father-name-icon" class="form-control father_name" name="father_name" placeholder="Father Name" required="required" value="<?php if (isset($record_data)) {echo $record_data->father_name;} ?>">
                      <div class="form-control-position">
                        <i class="bx bx-user"></i>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-3">
                  <div class="form-group">
                   <label for="national-name-icon"><span class="required-label">*</span>National ID</label>
                    <div class="position-relative has-icon-left">
                      <input type="text" id="national-name-icon" class="form-control national_id" name="national_id" placeholder="National ID" required="required" value="<?php if (isset($record_data)) {echo $record_data->national_id;} ?>">
                      <div class="form-control-position">
                        <i class="bx bx-id-card"></i> 
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-lg-4 col-sm-4">
                  <div class="form-group">
                    <label class="form-label" for="password-name-icon"><span class="required-label">*</span>Password</label>
                    <div class="position-relative has-icon-left">
                      <input type="text" id="password-name-icon" class="form-control password" name="password" placeholder="password" required="required" value="<?php if (isset($record_data)) {echo $record_data->password;} ?>">
                      <div class="form-control-position">
                        <i class="bx bx-key"></i> 
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-lg-4 col-sm-4">
                  <div class="form-group">
                    <label class="form-label" for="doj-name-icon"><span class="required-label">*</span>Date of Joining</label>
                    <div class="position-relative has-icon-left">
                      <input type="text" name="doj" id="doj-name-icon" placeholder="Date of Joining" class="form-control pickadate-months-year datepicker required doj" required="required" value="<?php if (isset($record_data)) {echo $record_data->doj;} ?>">
                      <div class="form-control-position">
                        <i class="bx bx-calendar"> </i> 
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-lg-4 col-sm-4">
                  <div class="form-group">
                    <label class="form-label" for="dob-name-icon" ><span class="required-label">*</span>Date of Birth</label>
                    <div class="position-relative has-icon-left">
                      <input type="text" id="dob-name-icon" name="dob" placeholder="Date of Birth" class="form-control  datepicker required dob" required="required" value="<?php if (isset($record_data)) {echo $record_data->dob;} ?>">
                      <div class="form-control-position">
                        <i class="bx bx-calendar"> </i> 
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-3">
                  <div class="form-group">
                    <label class="form-label" for="martial-name-icon"><span class="required-label">*</span>Martial Status</label>
                    <div class="position-relative has-icon-left">
                      <select class="select2 form-control" name='martial_status' id='martial-name-icon' class='martial_status'>
                        <option value=''>Select</option>
                        <option value='Single' <?php if (isset($record_data)) {if($record_data->martial_status == 'Single'){ echo "selected='selected'";}} ?>>Single</option>
                        <option value='Married' <?php if (isset($record_data)) {if($record_data->martial_status == 'Married'){ echo "selected='selected'";}} ?>>Married</option>
                      </select>
                      <div class="form-control-position">
                        <i class="bx bx-donate-heart"></i> 
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-3">
                  <div class="form-group">
                    <label class="form-label" for="gender-name-icon"><span class="required-label">*</span>Gender</label>
                    <div class="position-relative has-icon-left">
                      <select class="select2 form-control" name='gender' id='gender-name-icon' class='gender'>
                        <option value=''>Select</option>
                        <option value='Male' <?php if (isset($record_data)) {if($record_data->martial_status == 'Single'){ echo "selected='selected'";}} ?>>Male</option>
                        <option value='Female' <?php if (isset($record_data)) {if($record_data->martial_status == 'Single'){ echo "selected='selected'";}} ?>>Female</option>
                      </select>
                      <div class="form-control-position">
                        <i class="bx bx-male bx-male-sign"><i class="bx bx-female-sign"></i></i> 
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-3">
                  <div class="form-group">
                    <label class="form-label" for="profile-name-icon"><span class="required-label">*</span>Profile Pic</label>
                    <div class="position-relative has-icon-left">
                      <input type="file" name="profile_pic" id="profile-name-icon" class="form-control required pic" value="">
                      <div class="form-control-position">
                        <i class="bx bx-image"></i> 
                      </div>
                    </div>
                  </div>
                </div>

                
                
              </div>
            </div>

              <div class="col-md-12">
                <h4 class="h4 address-color">Address Information</h4>
              </div>
              <hr>

              <div class="col-md-12 col-lg-12 col-sm-12 change-heading-address-color">
                <div class="row">
                  <div class="col-md-3 col-lg-3 col-sm-3">
                    <div class="form-group">
                      <label class="form-label" for="country_id"><span class="required-label">*</span>Country</label>
                      <div class="position-relative has-icon-left">
                      <?php $selected_country = 0;
                        if (isset($record_data)) {
                          $selected_country = $record_data->country_id;
                        } 
                      ?>
                        <select class="select2 form-control parent-dropdown" data="<?php echo get_json(array('target' => 'state_id', 'selected' => $selected_country, 'table' => 'states', 'key' => 'country')); ?>" name='country_id' id='country_id' class='country_id'>
                          <option value=''>Select Country</option>
                          <?php 
                            $countries = $this->App_Model->get_countries();
                            $selected = "";
                            if(isset($record_data)){
                              if($countries->num_rows() > 0){
                                foreach($countries->result() as $key => $value){
                                  if($value->id == $record_data->country_id){
                                    $selected = "selected='selected'";
                                  }
                                  echo "<option value='$value->id' $selected >$value->name</option>";
                                }
                              }
                            }
                          ?>
                        </select>
                        <div class="form-control-position">
                          <i class="bx bx-world"> </i> 
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3 col-lg-3 col-sm-3">
                    <div class="form-group">
                      <label class="form-label" for="state_id" ><span class="required-label">*</span>State</label>
                      <div class="position-relative has-icon-left">
                      <?php $selected_state = 0;
                        if (isset($record_data)) {
                            $selected_state = $record_data->state_id;
                        } 
                      ?>
                        <select class="select2 form-control parent-dropdown" name='state_id' id='state_id' class='state_id' data="<?php echo get_json(array('target' => 'city_id', 'selected' => $selected_state, 'table' => 'cities', 'key' => 'state')); ?>">
                          <option value=''>Select State</option>
                          <?php 
                            $states = $this->App_Model->get_states($record_data->country_id);
                            $selected = "";
                            if(isset($record_data)){
                              if($states->num_rows() > 0){
                                foreach($states->result() as $key => $value){
                                  if($value->id == $record_data->state_id){
                                    $selected = "selected='selected'";
                                  }
                                  echo "<option value='$value->id' $selected >$value->name</option>";
                                }
                              }
                            }
                          ?>
                        </select>
                        <div class="form-control-position">
                          <i class="bx bx-world"> </i> 
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3 col-lg-3 col-sm-3">
                    <div class="form-group">
                      <label class="form-label" for="city_id"><span class="required-label">*</span>City</label>
                      <div class="position-relative has-icon-left">
                        <select class="select2 form-control" name='city_id' id='city_id' class='city_id'>
                          <option value=''>Select City</option>
                          <?php 
                            $cities = $this->App_Model->get_cities($record_data->state_id);
                            $selected = "";
                            if(isset($record_data)){
                              if($cities->num_rows() > 0){
                                foreach($cities->result() as $key => $value){
                                  if($value->id == $record_data->city_id){
                                    $selected = "selected='selected'";
                                  }
                                  echo "<option value='$value->id' $selected >$value->name</option>";
                                }
                              }
                            }
                          ?>
                        </select>
                        <div class="form-control-position">
                          <i class="bx bx-world"> </i> 
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3 col-lg-3 col-sm-3">
                    <div class="form-group">
                      <label class="form-label" for="zip_code"><span class="required-label">*</span>Zip-Code</label>
                        <div class="position-relative has-icon-left">
                        <input type="text" name="zip_code" placeholder="ZipCode" id="zip_code" class="form-control required zip_code" required="required" value="<?php if (isset($record_data)) {echo $record_data->zip_code;} ?>">
                        <div class="form-control-position">
                          <i class="bx bx-world"> </i> 
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="form-group">
                      <label class="form-label" for="address"><span class="required-label">*</span>Address</label>
                      <textarea name="address" required class="form-control" id="address" cols="5" rows="6"><?php if (isset($record_data)) {echo $record_data->address;} ?></textarea>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <h4 class="h4 contact-color">Contact Information</h4>
              </div>
              <hr>

              <div class="col-md-12 col-lg-12 col-sm-12 change-heading-contact-color">
                <div class="row">
                  <div class="col-md-3 col-lg-3 col-sm-3">
                    <div class="form-group">
                      <label class="form-label" for="phone"><span class="required-label">*</span>Phone</label>
                      <div class="position-relative has-icon-left">
                        <input type="text" name="phone" id="phone" placeholder="Phone" class="form-control required phone"  required="required" value="<?php if (isset($record_data)) {echo $record_data->phone;} ?>">
                        <div class="form-control-position">
                          <i class="bx bx-phone"> </i> 
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-lg-3 col-sm-3">
                    <div class="form-group">
                      <label class="form-label" for="mobile_1"><span class="required-label">*</span>Mobile 1</label>
                      <div class="position-relative has-icon-left">
                        <input type="text" name="mobile_1"  id="mobile_1" placeholder="Mobile 1" class="form-control required mobile_1"  required="required" value="<?php if (isset($record_data)) {echo $record_data->mobile_1;} ?>">
                        <div class="form-control-position">
                          <i class="bx bx-mobile-alt"> </i> 
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-lg-3 col-sm-3">
                    <div class="form-group">
                      <label class="form-label" for="mobile_2"><span class="required-label">*</span>Mobile 2</label>
                      <div class="position-relative has-icon-left">
                        <input type="text" name="mobile_2" id="mobile_2" placeholder="Mobile 2" class="form-control required mobile_2"  required="required" value="<?php if (isset($record_data)) {echo $record_data->mobile_2;} ?>">
                        <div class="form-control-position">
                          <i class="bx bx-mobile-alt"> </i> 
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-lg-3 col-sm-3">
                    <div class="form-group">
                      <label class="form-label" for="email"><span class="required-label">*</span>Email</label>
                      <div class="position-relative has-icon-left">
                        <input type="text" id="email" name="email" placeholder="Email" class="form-control required email" required="required" value="<?php if (isset($record_data)) {echo $record_data->email;} ?>">
                        <div class="form-control-position">
                          <i class="bx bx-mail-send"> </i> 
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <h4 class="h4 organization-color">Organization Information</h4>
              </div>
              <hr>

              <div class="col-md-12 col-lg-12 col-sm-12 change-heading-organization-color">
                <div class="row">
                  <div class="col-md-3 col-lg-3 col-sm-3">
                    <div class="form-group">
                      <label class="form-label" for="basic_salary"><span class="required-label">*</span>Basic Salary</label>
                      <div class="position-relative has-icon-left">
                        <input type="text" name="basic_salary" placeholder="Basic Salary" class="form-control required basic_salary" id="basic_salary" required="required" value="<?php if (isset($record_data)) {echo $record_data->basic_salary;} ?>">
                        <div class="form-control-position">
                          <i class="bx bx-money"> </i> 
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3 col-lg-3 col-sm-3">
                    <div class="form-group">
                      <label class="form-label" for="department_id"><span class="required-label">*</span>Department</label>
                      <div class="position-relative has-icon-left">
                        <select class="select2 form-control" name='department_id' id='department_id' class='department_id'>
                          <option value=''>Select Department</option>
                          <?php 
                            $department = $this->App_Model->get_departments();
                            $selected = "";
                            if(isset($record_data)){
                              if($department->num_rows() > 0){
                                foreach($department->result() as $key => $value){
                                  if($value->id == $record_data->department_id){
                                    $selected = "selected='selected'";
                                  }
                                  echo "<option value='$value->id' $selected >$value->name</option>";
                                }
                              }
                            }
                          ?>
                        </select>
                        <div class="form-control-position">
                          <i class="bx bx-arch"> </i> 
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3 col-lg-3 col-sm-3">
                    <div class="form-group">
                      <label class="form-label" for="designation_id"><span class="required-label">*</span>Designation</label>
                      <div class="position-relative has-icon-left">
                        <select class="select2 form-control" name='designation_id' id='designation_id' class='designation_id'>
                          <option value=''>Select Designation</option>
                          <?php 
                            $designation = $this->App_Model->designations();
                            $selected = "";
                            if(isset($record_data)){
                              if($designation->num_rows() > 0){
                                foreach($designation->result() as $key => $value){
                                  if($value->id == $record_data->designation_id){
                                    $selected = "selected='selected'";
                                  }
                                  echo "<option value='$value->id' $selected >$value->name</option>";
                                }
                              }
                            }
                          ?>
                        </select>
                        <div class="form-control-position">
                            <i class="bx bx-detail"> </i> 
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3 col-lg-3 col-sm-3">
                    <div class="form-group">
                      <label class="form-label" for="payscale_id"><span class="required-label">*</span>Pay-Scale</label>
                      <div class="position-relative has-icon-left">
                        <select class="select2 form-control" name='payscale_id' id='payscale_id' class='payscale_id'>
                          <option value=''>Select Pay-Scale</option>
                          <?php 
                            $payscale = $this->App_Model->get_payscales();
                            $selected = "";
                            if(isset($record_data)){
                              if($payscale->num_rows() > 0){
                                foreach($payscale->result() as $key => $value){
                                  if($value->id == $record_data->payscale_id){
                                    $selected = "selected='selected'";
                                  }
                                  echo "<option value='$value->id' $selected >$value->name</option>";
                                }
                              }
                            }
                          ?>
                        </select>
                        <div class="form-control-position">
                            <i class="bx bx-ruler"> </i> 
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3 col-lg-3 col-sm-3">
                    <div class="form-group">
                      <label class="form-label" for="organization_id"><span class="required-label">*</span>Organization</label>
                      <div class="position-relative has-icon-left">
                        <select class="select2 form-control" name='organization_id' id='organization_id' class='organization_id'>
                          <option value=''>Select Organization</option> 
                          <?php 
                            $organization = $this->App_Model->get_organizations();
                            $selected = "";
                            if(isset($record_data)){
                              if($organization->num_rows() > 0){
                                foreach($organization->result() as $key => $value){
                                  if($value->id == $record_data->organization_id){
                                    $selected = "selected='selected'";
                                  }
                                  echo "<option value='$value->id' $selected >$value->name</option>";
                                }
                              }
                            }
                          ?>
                        </select>
                        <div class="form-control-position">
                            <i class="bx bx-buildings"> </i> 
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3 col-lg-3 col-sm-3">
                    <div class="form-group">
                      <label class="form-label" for="role_id"><span class="required-label">*</span>Role Name</label>
                      <div class="position-relative has-icon-left">
                        <select class="select2 form-control" name='role_id' id='role_id' class='role_id'>
                          <option value=''>Select Role</option>
                          <?php 
                            $roles = $this->App_Model->get_roles();
                            $selected = "";
                            if(isset($record_data)){
                              if($roles->num_rows() > 0){
                                foreach($roles->result() as $key => $value){
                                  if($value->id == $record_data->role_id){
                                    $selected = "selected='selected'";
                                  }
                                  echo "<option value='$value->id' $selected >$value->name</option>";
                                }
                              }
                            }
                          ?>
                        </select>
                        <div class="form-control-position">
                            <i class="bx bx-accessibility"> </i> 
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


            </div>
            <!--  <button type="button" class="btn btn-icon btn-info open-model" data="<?php echo get_json(array('id'=>'0','view'=>'models/form-user')); ?>" title="Import Records"><i class="bx bx-upload"></i></button> -->
          </div>
        </div>
        <div class="card-footer d-flex justify-content-end">
          <button type="reset" class="btn btn-light-danger delete-kanban-item d-flex align-items-center mr-1">
            <i class='bx bx-trash mr-50'></i>
            <span>Delete</span>
          </button>
          <button class="btn btn-primary glow update-kanban-item d-flex align-items-center">
            <i class='bx bx-send mr-50'></i>
            <span>Save</span>
          </button>
        </div>
      </form> 
    </div>
  </div>
</div>

<script>
  
  $(".change-heading-color").hover(function(){
      $('.change-color').css("text-shadow", "1px 1px 3px #f09721");
  },
  function(){
      $('.change-color').css("text-shadow", " 1px 1px white");
  });

  $(".change-heading-address-color").hover(function(){
      $('.address-color').css("text-shadow", "1px 1px 3px #f09721");
  },
  function(){
      $('.address-color').css("text-shadow", " 1px 1px white");
  });

  $(".change-heading-contact-color").hover(function(){
      $('.contact-color').css("text-shadow", "1px 1px 3px #f09721");
  },
  function(){
      $('.contact-color').css("text-shadow", " 1px 1px white");
  });

  $(".change-heading-organization-color").hover(function(){
      $('.organization-color').css("text-shadow", "1px 1px 3px #f09721");
  },
  function(){
      $('.organization-color').css("text-shadow", " 1px 1px white");
  });

  loadEditor('address');
  function loadEditor(id){
    CKEDITOR.replace( id, {
      toolbar: [
        { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [  'Undo', 'Redo' ] },
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-' ] },
        { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList',   'Blockquote',  'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] },
        { name: 'links', items: [ 'Link'  ] } ,
        { name: 'tools', items: [ 'Maximize' ] }
      ]
    });
    CKEDITOR.config.height = 100; 
  }
</script>

<script>
  $('.datepicker').pickadate({
    selectYears: true,
    selectMonths: true
  });
 </script>