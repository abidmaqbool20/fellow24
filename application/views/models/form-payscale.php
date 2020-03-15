<?php
if (isset($id) && $id > 0) {
  $record = $this->App_Model->get_payscale_rec($id);
  if ($record->num_rows() > 0) {
    $record_data = $record->row();
  }
  
}
?>

<div class="page-body-modal-window cus-model-window model-first show small-model"> 
  <div class="model-content">
    <div class="card shadow-none quill-wrapper">
      <div class="card-header d-flex justify-content-between align-items-center border-bottom px-2 py-1">
        <h3 class="card-title">Payscale Form</h3>
        <button type="button" class="close close-icon close-modal close-model">
          <i class="bx bx-x"></i>
        </button>
      </div>
      <!-- form start -->
      <form class="edit-kanban-item general-form" method="post" autocomplete="off" action="<?= base_url('app/save_form'); ?>" enctype="multipart/form-data">
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <input type="hidden" name="table_name" id="table_name" value="pay_scales">
        <input type="hidden" name="edit_record_id" id="edit_record_id" value="<?php if (isset($record_data)) {echo $record_data->id;} ?>">
        <div class="card-content">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="form-group">
                  <label class="form-label"><span class="required-label">*</span>Payscale Title</label>
                  <input type="text" name="name" class="form-control required" required="required" value="<?php if (isset($record_data)) {echo $record_data->name;} ?>">
                </div>
              </div>

              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class="form-label"><span class="required-label">*</span>Salary Package</label>
                         <input type="number" min="0" name="salary_package" class="form-control required" required="required" value="<?php if (isset($record_data)) {echo $record_data->salary_package;} ?>">
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