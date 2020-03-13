<div class="card shadow-none quill-wrapper">
  <div class="card-header d-flex justify-content-between align-items-center border-bottom px-2 py-1">
    <h3 class="card-title">Form User <?= rand('9999','12354689') ?></h3>
    <button type="button" class="close close-icon close-modal close-model">
      <i class="bx bx-x"></i>
    </button>
  </div>
  <!-- form start -->
  <form class="edit-kanban-item">
    <div class="card-content">
      <div class="card-body">
         <button type="button" class="btn btn-icon btn-info open-model" data="<?php echo get_json(array('id'=>'0','view'=>'models/form-user')); ?>" title="Import Records"><i class="bx bx-upload"></i></button>
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