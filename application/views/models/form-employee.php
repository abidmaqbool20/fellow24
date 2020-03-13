<div class="page-body-modal-window cus-model-window model-first show large-model"> 
  <div class="model-content">
    <div class="card shadow-none quill-wrapper">
      <div class="card-header d-flex justify-content-between align-items-center border-bottom px-2 py-1">
        <h3 class="card-title">Employee Form</h3>
        <button type="button" class="close close-icon close-modal close-model">
          <i class="bx bx-x"></i>
        </button>
      </div>
      <!-- form start -->
      <form class="edit-kanban-item">
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
                    <label class="form-label"><span class="required-label">*</span>First Name</label>
                    <input type="text" name="first_name" placeholder="First Name" class="form-control required first_name" required="required" value="">
                  </div>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-3">
                  <div class="form-group">
                    <label class="form-label"><span class="required-label">*</span>Last Name</label>
                    <input type="text" name="last_name" placeholder="Last Name" class="form-control required last_name" required="required" value="">
                  </div>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-3">
                  <div class="form-group">
                    <label class="form-label"><span class="required-label">*</span>Father Name</label>
                    <input type="text" name="father_name" placeholder="Father Name" class="form-control required father_name" required="required" value="">
                  </div>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-3">
                  <div class="form-group">
                    <label class="form-label"><span class="required-label">*</span>National ID</label>
                    <input type="text" name="first_name" placeholder="First Name" class="form-control required national_id" required="required" value="">
                  </div>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-3">
                  <div class="form-group">
                    <label class="form-label"><span class="required-label">*</span>Martial Status</label>
                    <select class="select2 form-control" name='martial_status' id='martial_status' class='martial_status'>
                      <option value=''>Select</option>
                      <option value='Single'>Single</option>
                      <option value='Married'>Married</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-3">
                  <div class="form-group">
                    <label class="form-label"><span class="required-label">*</span>Password</label>
                    <input type="text" name="password" placeholder="Password" class="form-control required password" required="required" value="">
                  </div>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-3">
                  <div class="form-group">
                    <label class="form-label"><span class="required-label">*</span>Gender</label>
                    <select class="select2 form-control" name='gender' id='gender' class='gender'>
                      <option value=''>Select</option>
                      <option value='Male'>Male</option>
                      <option value='Female'>Female</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-3">
                  <div class="form-group">
                    <label class="form-label"><span class="required-label">*</span>Date of Birth</label>
                    <input type="text" name="dob" placeholder="Date of Birth" class="form-control pickadate picker__input required dob" required="required" value="">
                  </div>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-3">
                  <div class="form-group">
                    <label class="form-label"><span class="required-label">*</span>Date of Joining</label>
                    <input type="text" name="doj" placeholder="Date of Joining" class="form-control required doj" required="required" value="">
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
                      <label class="form-label"><span class="required-label">*</span>Country</label>
                      <select class="select2 form-control " name='country_id' id='country_id' class='country_id'>
                        <option value=''>Select Country</option>
                        <option value='Female'>pakistan</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-3 col-lg-3 col-sm-3">
                    <div class="form-group">
                      <label class="form-label"><span class="required-label">*</span>State</label>
                      <select class="select2 form-control" name='state_id' id='state_id' class='state_id'>
                        <option value=''>Select State</option>
                        <option value='Female'>Punjab</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-3 col-lg-3 col-sm-3">
                    <div class="form-group">
                      <label class="form-label"><span class="required-label">*</span>City</label>
                      <select class="select2 form-control" name='city_id' id='city_id' class='city_id'>
                        <option value=''>Select City</option>
                        <option value='Female'>Lahore</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-3 col-lg-3 col-sm-3">
                    <div class="form-group">
                      <label class="form-label"><span class="required-label">*</span>ZipCode</label>
                      <input type="text" name="zipcode" placeholder="ZipCode" class="form-control required zipcode" required="required" value="">
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
                      <label class="form-label"><span class="required-label">*</span>Phone</label>
                      <input type="text" name="phone" placeholder="Phone" class="form-control required phone" id="phone" required="required" value="">
                    </div>
                  </div>
                  <div class="col-md-3 col-lg-3 col-sm-3">
                    <div class="form-group">
                      <label class="form-label"><span class="required-label">*</span>Mobile 1</label>
                      <input type="text" name="mobile-1" placeholder="Mobile 1" class="form-control required mobile-1" id="mobile-1" required="required" value="">
                    </div>
                  </div>
                  <div class="col-md-3 col-lg-3 col-sm-3">
                    <div class="form-group">
                      <label class="form-label"><span class="required-label">*</span>Mobile 2</label>
                      <input type="text" name="mobile_2" placeholder="Mobile 2" class="form-control required mobile_2" id="mobile_2" required="required" value="">
                    </div>
                  </div>
                  <div class="col-md-3 col-lg-3 col-sm-3">
                    <div class="form-group">
                      <label class="form-label"><span class="required-label">*</span>Email</label>
                      <input type="text" name="email" placeholder="Email" class="form-control required email" id="email" required="required" value="">
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
                      <label class="form-label"><span class="required-label">*</span>Basic Salary</label>
                      <input type="text" name="basic_salary" placeholder="Basic Salary" class="form-control required basic_salary" id="basic_salary" required="required" value="">
                    </div>
                  </div>

                  <div class="col-md-3 col-lg-3 col-sm-3">
                    <div class="form-group">
                      <label class="form-label"><span class="required-label">*</span>Department</label>
                      <select class="select2 form-control" name='department_id' id='department_id' class='department_id'>
                        <option value=''>Select State</option>
                        <option value='Female'>Punjab</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-3 col-lg-3 col-sm-3">
                    <div class="form-group">
                      <label class="form-label"><span class="required-label">*</span>Designation</label>
                      <select class="select2 form-control" name='designation_id' id='designation_id' class='designation_id'>
                        <option value=''>Select State</option>
                        <option value='Female'>Punjab</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-3 col-lg-3 col-sm-3">
                    <div class="form-group">
                      <label class="form-label"><span class="required-label">*</span>Pay-Scale</label>
                      <select class="select2 form-control" name='payscale_id' id='payscale_id' class='payscale_id'>
                        <option value=''>Select State</option>
                        <option value='Female'>Punjab</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-3 col-lg-3 col-sm-3">
                    <div class="form-group">
                      <label class="form-label"><span class="required-label">*</span>Organization</label>
                      <select class="select2 form-control" name='organization_id' id='organization_id' class='organization_id'>
                        <option value=''>Select State</option>
                        <option value='Female'>Punjab</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-3 col-lg-3 col-sm-3">
                    <div class="form-group">
                      <label class="form-label"><span class="required-label">*</span>Role Name</label>
                      <select class="select2 form-control" name='role_id' id='role_id' class='role_id'>
                        <option value=''>Select State</option>
                        <option value='Female'>Punjab</option>
                      </select>
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
  // loadEditor('description');
  // function loadEditor(id){
  // CKEDITOR.replace( id, {
  // toolbar: [
  // { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [  'Undo', 'Redo' ] },
  // { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-' ] },
  // { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList',   'Blockquote',  'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] },
  // { name: 'links', items: [ 'Link'  ] } ,
  // { name: 'tools', items: [ 'Maximize' ] }
  // ]
  // });
  // }

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

    // $(".change-heading-color").hover(function(){
    //   $('.change-color').css("background-color", "yellow");
    //   }, function(){
    //   $('.change-color').css("background-color", "pink");
    // });
</script>