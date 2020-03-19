<?php
if (isset($id) && $id > 0) {
  $record = $this->App_Model->get_opportunity_rec($id);
  if ($record->num_rows() > 0) {
    $record_data = $record->row();
  }
  
}
?>

<div class="page-body-modal-window cus-model-window model-first show medium-model"> 
  <div class="model-content">
    <div class="card shadow-none quill-wrapper">
      <div class="card-header d-flex justify-content-between align-items-center border-bottom px-2 py-1">
        <h3 class="card-title">Form Opportunity</h3>
        <button type="button" class="close close-icon close-modal close-model">
          <i class="bx bx-x"></i>
        </button>
      </div>
      <!-- form start -->
      <form class="edit-kanban-item general-form" method="post" autocomplete="off" action="<?= base_url('app/save_form'); ?>" enctype="multipart/form-data">
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <input type="hidden" name="table_name" id="table_name" value="opportunities">
        <input type="hidden" name="edit_record_id" id="edit_record_id" value="<?php if (isset($record_data)) {echo $record_data->id;} ?>">
        <div class="card-content">
          <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label class="form-label"><span class="required-label">*</span>Campaign</label>
                        <select class="form-control select2 " required="required" name="campaign_id" id="campaign_id">
                          <option value="">Select</option>
                          <?php
                          if(isset($id)){
                                $campaigns = $this->App_Model->get_campaigns(); 
                                if($campaigns->num_rows() > 0){
                                   foreach ($campaigns->result() as $key => $value) {
                                      $selected = "";
                                      if(isset($record_data)){
                                         if($value->id == $record_data->campaign_id){ $selected = 'selected="selected"'; }
                                      }
                                      echo '<option '.$selected.' value="'.$value->id.'">'.$value->title.'</option>';
                                   }
                                }
                             }
                          ?>
                        </select>
                    </div>
                </div>
               <div class="col-md-6 col-lg-6 col-sm-12">
                <div class="form-group">
                  <label class="form-label"><span class="required-label">*</span>Client Name</label>
                  <input type="text" name="client_name" class="form-control required" required="required" value="<?php if (isset($record_data)) {echo $record_data->client_name;} ?>">
                </div>
              </div>
              <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label class="form-label"><span class="required-label">*</span>Country</label>
                          <?php $country_id = 0; if(isset($record_data)){ $country_id = $record_data->country_id; } ?>
                        <select name="country_id" class="form-control select2 parent-dropdown" id="country_id" data="<?php echo get_json(array('target'=>'state_id','selected'=>$country_id,'table'=>'states','key'=>'country')); ?>">
                            <option value="">Select Country</option>
                            <?php 
                               $countries = $this->App_Model->get_countries(); 
                               if($countries->num_rows() > 0){
                                  foreach ($countries->result() as $key => $value) {
                                     $selected = "";
                                     if(isset($record_data)){
                                        if($value->id == $record_data->country_id){ $selected = 'selected="selected"'; }
                                     }
                                     echo '<option '.$selected.' value="'.$value->id.'">'.$value->name.'</option>';
                                  }
                               }
                               
                               ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label class="form-label"><span class="required-label">*</span>States</label>
                         <?php $state_id = 0; if(isset($record_data)){ $state_id = $record_data->state_id; } ?>
                        <select class="form-control parent-dropdown select2 " required="required" name="state_id" id="state_id" data="<?php echo get_json(array('target'=>'city_id','selected'=>$state_id,'table'=>'cities','key'=>'state')); ?>">
                          <option value="">Select State</option>
                          <?php
                          if(isset($record_data)){
                                $states = $this->App_Model->get_states($record_data->country_id); 
                                if($states->num_rows() > 0){
                                   foreach ($states->result() as $key => $value) {
                                      $selected = "";
                                      if(isset($record_data)){
                                         if($value->id == $record_data->state_id){ $selected = 'selected="selected"'; }
                                      }
                                      echo '<option '.$selected.' value="'.$value->id.'">'.$value->name.'</option>';
                                   }
                                }
                             }
                          ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label class="form-label"><span class="required-label">*</span>City</label>
                        <select class="form-control select2 " required="required" name="city_id" id="city_id">
                          <option value="">Select City</option>
                          <?php
                          if(isset($record_data)){
                                $cities = $this->App_Model->get_state_cities($record_data->state_id); 
                                if($cities->num_rows() > 0){
                                   foreach ($cities->result() as $key => $value) {
                                      $selected = "";
                                      if(isset($record_data)){
                                         if($value->id == $record_data->city_id){ $selected = 'selected="selected"'; }
                                      }
                                      echo '<option '.$selected.' value="'.$value->id.'">'.$value->name.'</option>';
                                   }
                                }
                             }
                          ?>
                        </select>
                    </div>
                </div>

              <div class="col-md-6 col-lg-6 col-sm-12">
                <div class="form-group">
                  <label class="form-label"><span class="required-label">*</span>Email</label>
                  <input type="text" name="email" class="form-control required" required="required" value="<?php if (isset($record_data)) {echo $record_data->email;} ?>">
                </div>
              </div>

              <div class="col-md-6 col-lg-6 col-sm-12">
                <div class="form-group">
                  <label class="form-label"><span class="required-label">*</span>Phone</label>
                  <input type="text" name="phone" class="form-control" value="<?php if (isset($record_data)) {echo $record_data->phone;} ?>">
                </div>
              </div>
              <div class="col-md-6 col-lg-6 col-sm-12">
                <div class="form-group">
                  <label class="form-label"><span class="required-label">*</span>Mobile 1</label>
                  <input type="text" name="mobile1" class="form-control required" required="required" value="<?php if (isset($record_data)) {echo $record_data->mobile1;} ?>">
                </div>
              </div>

              <div class="col-md-6 col-lg-6 col-sm-12">
                <div class="form-group">
                  <label class="form-label">Mobile 2</label>
                  <input type="text" name="mobile2" class="form-control required" required="required" value="<?php if (isset($record_data)) {echo $record_data->mobile2;} ?>">
                </div>
              </div>

              <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="form-group">
                  <label class="form-label">Description</label>
                  <textarea name="description" class="form-control" id="description" cols="5" rows="6"><?php if (isset($record_data)) {echo $record_data->description;} ?></textarea>
                </div>
              </div>

            </div>
            <!--  <button type="button" class="btn btn-icon btn-info open-model" data="<?php echo get_json(array('id'=>'0','view'=>'models/form-user')); ?>" title="Import Records"><i class="bx bx-upload"></i></button> -->
          </div>
        </div>
        <div class="card-footer d-flex justify-content-end">
          <button type="reset" class="btn btn-light-danger delete-kanban-item d-flex align-items-center mr-1 close-model ">
            <i class='bx bx-x mr-50'></i>
            <span>Cancel</span>
          </button>
          <button class="btn btn-primary glow update-kanban-item d-flex align-items-center">
            <i class='bx bx-check mr-50'></i>
            <span>Save</span>
          </button>
        </div>
      </form> 
    </div>
  </div>
</div>

<script>
  loadEditor('description');
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
  }

  
</script>