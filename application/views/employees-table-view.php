
<section class="actions-wrapper">
	<div class="row">
		<div class="col-md-6">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h5 class="content-header-title float-left pr-1 mb-0"><i class="bx bxs-group"></i>&nbsp;Employees</h5>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb p-0 mb-0"> 
							<li class="breadcrumb-item"><a href="javascript:;">Home</a> </li>
							<li class="breadcrumb-item"> <i class="bx bx-chevrons-right">  </i> </li> 
							<li class="breadcrumb-item active">All Employees </li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<ul class="action-btns default-actions pull-right">

				<li>
					<button type="button" class="btn btn-icon btn-theme open-model"  data="<?php echo get_json(array('id'=>'0','view'=>'models/form-employee')); ?>"><i class="bx bx-plus"></i></button>
				</li>
				<li>
					<button type="button" class="btn btn-icon btn-info page-sidebar-open" target="import-records-sidebar" title="Import Records"><i class="bx bx-upload"></i></button>
				</li>

				<li>
					<button type="button" class="btn btn-icon btn-light page-sidebar-open" target="filter-sidebar"><i class="bx bxs-filter-alt"></i></button>
				</li>
				<li>
					<button type="button" class="btn btn-icon btn-warning page-sidebar-open" target="sort-sidebar"><i class="bx bx-sort"></i></button>
				</li> 
				<li>
					<button type="button" class="btn btn-icon btn-danger reload-page load-view" data="<?php echo get_json(array('id'=>'0','view'=>'employees-table-view','type'=>'table')); ?>"  title="Refresh Page"><i class="bx bx-refresh"></i></button>
				</li>
				<li>
					<div class="btn-group" role="group" aria-label="Basic example">
						<button type="button" data="<?php echo get_json(array('id'=>'0','view'=>'employees-table-view','type'=>'table')); ?>" class="btn active load-view"><i class="bx bx-table"></i></button>
						<button type="button" data="<?php echo get_json(array('id'=>'0','view'=>'employees-card-view','type'=>'card')); ?>" class="btn load-view"><i class="bx bxs-widget"></i></button>
					</div>
				</li>	 
			</ul>
			<ul class="action-btns selected-actions pull-right hide"> 

				<li>
					<button type="button" class="btn btn-icon btn-white page-sidebar-open" target="filter-sidebar"><i class="bx bxs-filter-alt"></i></button>
				</li>
				<li>
					<button type="button" class="btn btn-icon btn-warning page-sidebar-open" target="sort-sidebar"><i class="bx bx-sort"></i></button>
				</li> 
				<li>
					<div class="dropdown">
						<button type="button" class="btn btn-icon dropdown-toggle btn-theme action-icon" id="tag" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false">
						<span class="fonticon-wrap">
							<i class="bx bx-check" >
							</i>
						</span>
					</button>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="tag">
						<a href="javascript:;" class="dropdown-item align-items-center export-all-data " function="export_all_employees">
							<span class="bullet bullet-success bullet-sm"></span>
							<span> &nbsp;Export All</span>
						</a>
						<a href="javascript:;" function="export_employees" class="dropdown-item align-items-center export-data">
							<span class="bullet bullet-success bullet-sm"></span>
							<span> &nbsp;Export Selected Only</span>
						</a>
						<a href="javascript:;" parent-div="table-records" table="employees" class="dropdown-item align-items-center delete-bulk">
							<span class="bullet bullet-primary bullet-sm"></span>
							<span> &nbsp;Delete</span>
						</a>

					</div>
				</div>
			</li>
		   </ul>
	    </div>
	</div>
</section>
<div class="page-body">
	<section class=""> 
		<div class="row">
			<div class="col-12 page-data p-r-0">
				<div class="table-view">
					<div class="table-responsive">
						<table class="table table-hover mb-0 page-table" id="table-sortable">
							<thead>
								<tr> 
									<th class="table-checkbox table_record_checkbox"> 
										<div class="checkbox theme-checkbox ">
											<input type="checkbox" id="colorCheckbox0" class="table_head_checkbox" table="employees"> 
											<label for="colorCheckbox0"></label>
										</div>
									</th>
									<th class="col-title">Name <i class="bx bx-sort"></i></th>
									<th class="col-description">Email <i class="bx bx-sort"></i></th>
									<th class="col-description">National ID<i class="bx bx-sort"></i></th>
									<th class="col-description">Gender <i class="bx bx-sort"></i></th>
									<th class="col-description">Date Of Joining <i class="bx bx-sort"></i></th>
									<th class="col-date_added">Date Added <i class="bx bx-sort"></i></th>
									<th class="col-date_modification hide">Date Modification <i class="bx bx-sort"></i></th>
									<th class="col-added_by hide">Added By <i class="bx bx-sort"></i></th>
									<th class="col-modified_by hide">Modified By <i class="bx bx-sort"></i></th>
									<th class="col-status">Status <i class="bx bx-sort"></i></th>
									<th>ACTION</th>
								</tr>
							</thead>
							<tbody class="employees table-records">     	
							</tbody>
						</table>
					</div> 
				</div>
				<div class="pagination-wrapper row">
					<div class="col-6">
						<div class="row">
							<div class="col-12">
								<div class="row">
									<div class="col-2 col-sm-2 per-page-label no-pad"><label>Per Page</label></div>
									<div class="col-2 col-sm-2 no-pad">
										<div class="page-records">

											<select class="form-control select2 per-page-rec">
												<option value="16">16</option>
												<option value="50">50</option>
												<option value="100">100</option>

											</select>
										</div>
									</div>
									<div class="col-7 col-sm-7 no-pad ">
										<ul class="selected-record">
											<li><span>Selected Record :</span><span id="total_selected_number" class="total_records">0</span></li>
										</ul>
									</div>

								</div>
							</div>
						</div>
					</div> 
					<div class="col-md-6">
						<div class="row">
							<div class="col-12">
								<div class="row">
									<div class="col-2"></div>
									<div class="col-4"></div>
									<div class="col-6">
										<nav aria-label="Page navigation example ">
											<ul class="pagination data-pagination pull-right mr-3 ">

											</ul>
										</nav>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="col-3 filter-sidebar page-sidebar hide">
				<div class="filter-side-content">
					<div class="card shadow-none quill-wrapper">
						<div class="card-header d-flex justify-content-between align-items-center border-bottom px-2 py-1">
							<h3 class="card-title">Filter Records</h3>
							<button type="button" class="close close-icon page-sidebar-close">
								<i class="bx bx-x"></i>
							</button>
						</div>
						<!-- form start -->
						<form method="post" autocomplete="off" action="<?= base_url('App/filter_employees'); ?>" enctype="multipart/form-data" class="filter-records">
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
							<input type="hidden" name="per_page" id="per_page" value="10" class="per_page">
							<div class="card-content">
								<div class="card-body">
									<div class="row">
										<div class="col-md-12">
											<fieldset class="form-group">
												<label for="search_string">Search Like</label>
												<input type="text" class="form-control filter-text-field" id="search_string" placeholder="" name="search_string">
											</fieldset>
											<fieldset class="form-group">
												<label for="first_name">First Name</label>
												<input type="text" class="form-control filter-text-field" id="first_name" placeholder="Enter First Name" name="first_name">
											</fieldset>

											<fieldset class="form-group">
												<label for="last_name">Last Name</label>
												<input type="text" class="form-control filter-text-field" placeholder="Enter First Name" id="last_name" name="last_name">
											</fieldset>

											<fieldset class="form-group">
												<label for="phone">Phone</label>
												<input type="text" class="form-control filter-text-field" id="phone" placeholder="Enter Phone" name="phone">
											</fieldset>

											<fieldset class="form-group">
												<label for="gender">Gender</label>
												<select class="form-control filter-dropdown select2" id="gender" name="gender">
													<option value="">Select Gender</option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
											</fieldset>

											<fieldset class="form-group">
												<label for="father_name">Father Name</label>
												<input type="text" class="form-control filter-text-field" id="father_name" placeholder="Enter Father Name" name="father_name">
											</fieldset>

											<fieldset class="form-group">
												<label for="national_id">National ID</label>
												<input type="text" class="form-control filter-text-field" placeholder="Enter National ID" id="national_id" name="national_id">
											</fieldset>

											<fieldset class="form-group">
												<label for="martial_status">Martial Status</label>
												<select class="form-control filter-dropdown select2" id="martial_status" name="martial_status">
													<option value="">Select Martial Status</option>
													<option value="Single">Single</option>
													<option value="Married">Married</option>
												</select>											
											</fieldset>

											<fieldset class="form-group">
												<label for="doj">Date of Joining</label>
												<input type="text" class="form-control filter-text-field pickadate-months-year datepicker" id="doj" name="doj">
											</fieldset>

											<fieldset class="form-group">
												<label for="dob">Date of Birth</label>
												<input type="text" class="form-control filter-text-field pickadate-months-year datepicker" id="dob" name="dob">
											</fieldset>

											<fieldset class="form-group">
												<label for="country_id">Country</label>
												<select class="select2 form-control filter-dropdown"  name='country_id' id='country_id' class='country_id'>
													<option value=''>Select Country</option>
													<?php 
														$countries = $this->App_Model->get_countries();                            
														if($countries->num_rows() > 0){
															foreach($countries->result() as $key => $value){
															$selected = "";
															echo "<option value='$value->id' $selected >$value->name</option>";
															}
														}
													?>
												</select>
											</fieldset>

											<fieldset class="form-group">
												<label for="state_id">State</label>
												<select class="select2 form-control filter-dropdown" name='state_id' id='state_id' class='state_id' >
													<option value=''>Select State</option>
													<?php 
														$states = $this->App_Model->get_states($record_data->country_id);
														if($states->num_rows() > 0){
															foreach($states->result() as $key => $value){
															$selected = "";
															echo "<option value='$value->id' $selected >$value->name</option>";
															}
														}
													?>
												</select>
											</fieldset>

											<fieldset class="form-group">
												<label for="city_id">City</label>
												<select class="select2 form-control filter-dropdown" name='city_id' id='city_id' class='city_id'>
													<option value=''>Select City</option>
													<?php 
														$cities = $this->App_Model->get_state_cities($record_data->state_id);
														if($cities->num_rows() > 0){
															foreach($cities->result() as $key => $value){
															$selected = "";
															echo "<option value='$value->id' $selected >$value->name</option>";
															}
														}
													?>
												</select>
											</fieldset>

											<fieldset class="form-group">
												<label for="zip_code">Zip Code</label>
												<input type="text" class="form-control filter-text-field" id="zip_code" placeholder="Enter Zip-code" name="zip_code">
											</fieldset>

											<fieldset class="form-group">
												<label for="mobile_1">Mobile</label>
												<input type="text" class="form-control filter-text-field" placeholder="Enter Mobile" id="mobile_1" name="mobile_1">
											</fieldset>

											<fieldset class="form-group">
												<label for="email">Email</label>
												<input type="text" class="form-control filter-text-field" id="email" placeholder="Enter Email" name="email">
											</fieldset>

											<fieldset class="form-group">
												<label for="basic_salary">Basic Salary</label>
												<input type="text" class="form-control filter-text-field" placeholder="Enter Basic Salary" id="basic_salary" name="basic_salary">
											</fieldset>

											<fieldset class="form-group">
												<label for="department_id">Department</label>
												<select class="select2 form-control filter-dropdown" name='department_id' id='department_id' class='department_id'>
													<option value=''>Select Department</option>
													<?php 
														$department = $this->App_Model->get_departments();
														$selected = "";
														if(isset($record_data)){
														if($department->num_rows() > 0){
															foreach($department->result() as $key => $value){
															echo "<option value='$value->id' $selected >$value->name</option>";
															}
														}
														}
													?>
												</select>
											</fieldset>

											<fieldset class="form-group">
												<label for="designation_id">Designation</label>
												<select class="select2 form-control filter-dropdown" name='designation_id' id='designation_id' class='designation_id'>
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
											</fieldset>

											<fieldset class="form-group">
												<label for="payscale_id">Pay-Scale</label>
												<select class="select2 form-control filter-dropdown" name='payscale_id' id='payscale_id' class='payscale_id'>
													<option value=''>Select Pay-Scale</option>
													<?php 
														$payscale = $this->App_Model->get_payscales();
														if(isset($record_data)){
														if($payscale->num_rows() > 0){
															foreach($payscale->result() as $key => $value){
															$selected = "";
															echo "<option value='$value->id' $selected >$value->name</option>";
															}
														}
														}
													?>
												</select>
											</fieldset>

											<fieldset class="form-group">
												<label for="organization_id">Organization</label>
												<select class="select2 form-control filter-dropdown" name='organization_id' id='organization_id' class='organization_id'>
													<option value=''>Select Organization</option> 
													<?php 
														$organization = $this->App_Model->get_organizations();
														$selected = "";
														if(isset($record_data)){
														if($organization->num_rows() > 0){
															foreach($organization->result() as $key => $value){
															echo "<option value='$value->id' $selected >$value->name</option>";
															}
														}
														}
													?>
												</select>
											</fieldset>

											<fieldset class="form-group">
												<label for="role_id">Role</label>
												<select class="select2 form-control filter-dropdown" name='role_id' id='role_id' class='role_id'>
													<option value=''>Select Role</option>
													<?php 
														$roles = $this->App_Model->get_roles();
														if(isset($record_data)){
														if($roles->num_rows() > 0){
															foreach($roles->result() as $key => $value){
															$selected = "";
															if($value->id == $record_data->role_id){
																$selected = "selected='selected'";
															}
															echo "<option value='$value->id' $selected >$value->name</option>";
															}
														}
														}
													?>
													</select>
											</fieldset>

											<fieldset class="form-group">
												<label for="added_by">Added By</label>
												<select class="form-control select2 filter-dropdown" required="required" name="added_by" id="added_by">
													<option value="">Select</option>
													<?php
													$records = $this->App_Model->get_all_employees(); 
													if($records->num_rows() > 0){
														foreach ($records->result() as $key => $value) {
															echo '<option value="'.$value->id.'">'.$value->first_name.' '.$value->last_name.'</option>';
														}
													}
													?>
												</select>
											</fieldset>

											<fieldset class="form-group">
												<label for="status">Status</label>
												<select class="form-control select2 filter-dropdown" required="required" name="status" id="status">
													<option value="">Select</option>
													<option value="1">Active</option>
													<option value="0">Inactive</option>

												</select>
											</fieldset>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer d-flex justify-content-end">

							</div>
						</form>
						<!-- form start end-->
					</div>
				</div>
			</div>
			<div class="col-3 sort-sidebar page-sidebar hide">
				<div class="filter-side-content">
					<div class="card shadow-none quill-wrapper">
						<div class="card-header d-flex justify-content-between align-items-center border-bottom px-2 py-1">
							<h3 class="card-title">Sort Records</h3>
							<button type="button" class="close close-icon page-sidebar-close">
								<i class="bx bx-x"></i>
							</button>
						</div>
						<!-- form start -->
						<form class="edit-kanban-item">
							<div class="card-content">
								<div class="card-body">
									<div class="col-12">
										<div class="row">
											<div class="col-12">
												<h4>Show & Hide Table Columns</h4>
											</div>
											<div class="col-12">
												<p>Use these checkboxes to show or hide the table columns to increase the readability</p>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="row">
											<div class="col-12 mb-1">
												<div class="checkbox checkbox-success">
													<input type="checkbox" class="table-column" checked="checked" value="first_name" id="tbl-col-checkbox-1" name ="tbl-col-checkbox-1"> 
													<label for="tbl-col-checkbox-1">Name </label>
												</div>
											</div>
											<!-- <div class="col-12 mb-1">
												<div class="checkbox checkbox-success">
													<input type="checkbox" class="table-column"  value="last_name" id="tbl-col-checkbox-2" name ="tbl-col-checkbox-2"> 
													<label for="tbl-col-checkbox-2">Last Name</label>
												</div>
											</div> -->

											<div class="col-12 mb-1">
												<div class="checkbox checkbox-success">
													<input type="checkbox" class="table-column" value="phone" id="tbl-col-checkbox-3" name ="tbl-col-checkbox-3"> 
													<label for="tbl-col-checkbox-1">Phone</label>
												</div>
											</div>
											<div class="col-12 mb-1">
												<div class="checkbox checkbox-success">
													<input type="checkbox" class="table-column" checked="checked" value="gender" id="tbl-col-checkbox-4" name ="tbl-col-checkbox-4"> 
													<label for="tbl-col-checkbox-2">Gender</label>
												</div>
											</div>

											<div class="col-12 mb-1">
												<div class="checkbox checkbox-success">
													<input type="checkbox" class="table-column" value="father_name" id="tbl-col-checkbox-5" name ="tbl-col-checkbox-5"> 
													<label for="tbl-col-checkbox-1">Father Name </label>
												</div>
											</div>
											<div class="col-12 mb-1">
												<div class="checkbox checkbox-success">
													<input type="checkbox" class="table-column" value="martial_status" id="tbl-col-checkbox-6" name ="tbl-col-checkbox-6"> 
													<label for="tbl-col-checkbox-2">Martial Status</label>
												</div>
											</div>

											<div class="col-12 mb-1">
												<div class="checkbox checkbox-success">
													<input type="checkbox" class="table-column" checked="checked" value="doj" id="tbl-col-checkbox-7" name ="tbl-col-checkbox-7"> 
													<label for="tbl-col-checkbox-1">Date of Joining</label>
												</div>
											</div>
											<div class="col-12 mb-1">
												<div class="checkbox checkbox-success">
													<input type="checkbox" class="table-column" value="dob" id="tbl-col-checkbox-8" name ="tbl-col-checkbox-8"> 
													<label for="tbl-col-checkbox-2">Date Of Birth</label>
												</div>
											</div>

											<div class="col-12 mb-1">
												<div class="checkbox checkbox-success">
													<input type="checkbox" class="table-column" value="zip_code" id="tbl-col-checkbox-9" name ="tbl-col-checkbox-9"> 
													<label for="tbl-col-checkbox-1">Zip-code </label>
												</div>
											</div>
											<div class="col-12 mb-1">
												<div class="checkbox checkbox-success">
													<input type="checkbox" class="table-column" value="address" id="tbl-col-checkbox-10" name ="tbl-col-checkbox-10"> 
													<label for="tbl-col-checkbox-2">Address</label>
												</div>
											</div>

											<div class="col-12 mb-1">
												<div class="checkbox checkbox-success">
													<input type="checkbox" class="table-column" value="mobile_1" id="tbl-col-checkbox-11" name ="tbl-col-checkbox-11"> 
													<label for="tbl-col-checkbox-1">Mobile 1 </label>
												</div>
											</div>
											<div class="col-12 mb-1">
												<div class="checkbox checkbox-success">
													<input type="checkbox" class="table-column" value="last_name" id="tbl-col-checkbox-12" name ="tbl-col-checkbox-12"> 
													<label for="tbl-col-checkbox-2">Mobile 2</label>
												</div>
											</div>

											<div class="col-12 mb-1">
												<div class="checkbox checkbox-success">
													<input type="checkbox" class="table-column" checked="checked" value="email" id="tbl-col-checkbox-13" name ="tbl-col-checkbox-13"> 
													<label for="tbl-col-checkbox-1">Email </label>
												</div>
											</div>
											<div class="col-12 mb-1">
												<div class="checkbox checkbox-success">
													<input type="checkbox" class="table-column" value="basic_salary" id="tbl-col-checkbox-14" name ="tbl-col-checkbox-14"> 
													<label for="tbl-col-checkbox-2">Basic Salary</label>
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>
							<div class="card-footer d-flex justify-content-end">

							</div>
						</form>
						<!-- form start end-->
					</div>
				</div>
			</div>
			
			<div class="col-3 import-records-sidebar page-sidebar hide">
				<div class="filter-side-content">
					<div class="card shadow-none quill-wrapper">
						<div class="card-header d-flex justify-content-between align-items-center border-bottom px-2 py-1">
							<h3 class="card-title">Import employees </h3>
							<button type="button" class="close close-icon page-sidebar-close">
								<i class="bx bx-x"></i>
							</button>
						</div>
						<!-- form start -->
						<form method="post" autocomplete="off" action="<?= base_url('App/import_employees_csv_file'); ?>" enctype="multipart/form-data" class="import-csv-form">
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
							<input type="hidden" name="per_page" id="per_page" value="10" class="per_page">
							<div class="card-content">
								<div class="card-body">
									<div class="row">
										<div class="col-md-12">
											<fieldset class="form-group hide">
												<label for="search_string">Choose Excel File </label>
												<input type="file" class="form-control upload-csv-file" id="excel_file" placeholder="" name="import_file">
											</fieldset>


											<fieldset class="form-group">
												<div class="upload-file">
													<i class="bx bx-cloud-upload"></i>
												</div>
											</fieldset>

										</div>
										<div class="col-12"><hr></div>
										<div class="col-12">
											<p>Click the button below to download the importable Sample File</p>
											<fieldset style="text-align: center" class="form-group">
												<button type="button" class="btn btn-theme btn-sm sample-import-file" target="employees.csv"><i class="bx bx-cloud-download"></i> Download Sample</button>
											</fieldset>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer d-flex justify-content-end">

							</div>
						</form>
						<!-- form start end-->
					</div>
				</div>
			</div>
		</div>  
	</section>

	<footer class="footer footer-static footer-light"></footer>
</div>
<script>
	$(".select2").select2({'width':'100%'});

	$(document).ready(function(){
		$('.filter-records').trigger('submit');
	});
</script>

<script>
//   $('.datepicker').pickadate({
//     selectYears: true,
//     selectMonths: true,
//     format: 'yyyy,mmm,dd',
//     formatSubmit: 'yyyy-mm-dd',
// 	hiddenPrefix: 'prefix__',
// 	enable: [{ from: -10, to: true }],
//     hiddenSuffix: '__suffix'
//   });

  $('.datepicker').daterangepicker();
 </script>