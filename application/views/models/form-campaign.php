<div class="page-body-modal-window cus-model-window model-first show small-model"> 
  <div class="model-content">
    <div class="card shadow-none quill-wrapper">
      <div class="card-header d-flex justify-content-between align-items-center border-bottom px-2 py-1">
        <h3 class="card-title">Campaign Form</h3>
        <button type="button" class="close close-icon close-modal close-model">
          <i class="bx bx-x"></i>
        </button>
      </div>
      <!-- form start -->
      <form class="edit-kanban-item">
        <div class="card-content">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="form-group">
                  <label class="form-label"><span class="required-label">*</span>Title</label>
                  <input type="text" name="name" class="form-control required" required="required" value="">
                </div>
              </div>

              <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="form-group">
                  <label class="form-label"><span class="required-label">*</span>Description</label>
                 <textarea name="description" class="form-control" id="description" cols="5" rows="5"></textarea>
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