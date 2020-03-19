<?php
if (isset($id) && $id > 0) {
  $record = $this->App_Model->get_opportunity_rec($id);
  if ($record->num_rows() > 0) {
    $record_data = $record->row();
  }
  
}
?>

<div class="page-body-modal-window cus-model-window model-first show small-model"> 
  <div class="model-content">
    <div class="card shadow-none quill-wrapper">
      <div class="card-header d-flex justify-content-between align-items-center border-bottom px-2 py-1">
        <h3 class="card-title">Opportunity Information</h3>
        <button type="button" class="close close-icon close-modal close-model">
          <i class="bx bx-x"></i>
        </button>
      </div>
      <!-- card start -->

      <div class="card-content record-view">
          <div class="card-body ">
            <div class="row">

              <div class="col-12">
                <h4><?= $record_data->campaign_name ?></h4>
              </div>

              <div class="col-6">
                <th>Client: </th>
              </div>
              <div class="col-6">
                <h5><?= $record_data->client_name ?></h5>
              </div>

              <div class="col-6">
                <th>Country: </th>
              </div>
               <div class="col-6">
                <?= $record_data->country ?>
              </div>
              <div class="col-6">
                <th>City: </th>
              </div>
               <div class="col-6">
                <?= $record_data->city ?>
              </div>
              <div class="col-6">
                <th>State: </th>
              </div>
               <div class="col-6">
                <?= $record_data->state ?>
              </div>
              <div class="col-12 description">
                <?= $record_data->description ?>

              </div>
      
              <table class="table table-bordered table-hover record-info-table">
              
                  <tr>
                    <th>Added By</th>
                    <td>122</td>
                    <th>Last Modified By</th>
                    <td><?= $record_data->date_modification ?></td>
                  </tr>
                  <tr>
                    <th>Date Added</th>
                    <td><?= $record_data->date_added ?></td>
                     <th>Date Modification</th>
                    <td><?= $record_data->date_modification ?></td>
                  </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="card-footer d-flex justify-content-end">
           <button type="reset" class="btn btn-light-primary d-flex align-items-center mr-1 open-model" data="<?php echo get_json(array('id'=>$id,'view'=>'models/form-campaign')); ?>" href="javascript:;">
            <i class='bx bx-edit mr-50'></i>
            <span>Edit</span>
          </button>
          <button type="reset" class="btn btn-light-danger delete-kanban-item d-flex align-items-center mr-1 close-model ">
            <i class='bx bx-x mr-50'></i>
            <span>Cancel</span>
          </button>

          
        </div>
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