
<section class="actions-wrapper">
	<div class="row">
		<div class="col-md-6">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h5 class="content-header-title float-left pr-1 mb-0"><i class="bx bxs-group"></i>&nbsp;Pay-Scale</h5>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb p-0 mb-0"> 
							<li class="breadcrumb-item"><a href="#">Home</a> </li>
							<li class="breadcrumb-item"> <i class="bx bx-chevrons-right">  </i> </li> 
							<li class="breadcrumb-item active">All Pay-Scale Cards </li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<ul class="action-btns default-actions pull-right">

				<li>
					<button type="button" class="btn btn-icon btn-theme open-model"  data="<?php echo get_json(array('id'=>'0','view'=>'models/form-pay-scales')); ?>"><i class="bx bx-plus"></i></button>
				</li>
				<li>
					<button type="button" class="btn btn-icon btn-info page-sidebar-open" target="import-records-sidebar" title="Import Records"><i class="bx bx-upload"></i></button>
				</li>
				<li>
					<button type="button" class="btn btn-icon btn-light page-sidebar-open" target="filter-sidebar"><i class="bx bxs-filter-alt"></i></button>
				</li>
				
				<li>
					<button type="button" class="btn btn-icon btn-danger reload-page load-view" data="<?php echo get_json(array('id'=>'0','view'=>'pay-scales-card-view','type'=>'card')); ?>"  title="Refresh Page"><i class="bx bx-refresh"></i></button>
				</li> 
				<li>
					<div class="btn-group" role="group" aria-label="Basic example">
						<button type="button" data="<?php echo get_json(array('id'=>'0','view'=>'pay-scales-table-view','type'=>'table')); ?>" class="btn load-view"><i class="bx bx-table"></i></button>
						<button type="button" data="<?php echo get_json(array('id'=>'0','view'=>'pay-scales-card-view','type'=>'card')); ?>" class="btn active  load-view"><i class="bx bxs-widget"></i></button>
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
						<a href="javascript:;" class="dropdown-item align-items-center export-all-data " function="export_all_pay_scales">
							<span class="bullet bullet-success bullet-sm"></span>
							<span> &nbsp;Export All</span>
						</a>
						<a href="javascript:;" function="export_pay_scales" class="dropdown-item align-items-center export-data">
							<span class="bullet bullet-success bullet-sm"></span>
							<span> &nbsp;Export Selected Only</span>
						</a>
						<a href="javascript:;" class="dropdown-item align-items-center">
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
				<div class="card-view table-responsive">
					<div class="">
						<div class="card-deck-wrapper">
					        <div class="card-deck">
					          <div class="row no-gutters pay_scales table-records">
					          </div>
					        </div>
					    </div>
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
						<form method="post" autocomplete="off" action="<?= base_url('App/filter_pay_scales'); ?>" enctype="multipart/form-data" class="filter-records">
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
												<label for="basicInput">Title</label>
												<input type="text" class="form-control filter-text-field" id="name" placeholder="Enter Title" name="name">
											</fieldset>

											<fieldset class="form-group">
												<label for="basicInput">Job Nature</label>
												<select class="form-control select2 filter-dropdown" required="required" name="job_nature_id" id="job_nature_id">
													<option value="">Select</option>
													<?php
													$records = $this->App_Model->get_nature_of_jobs(); 
													if($records->num_rows() > 0){
														foreach ($records->result() as $key => $value) {
															echo '<option value="'.$value->id.'">'.$value->name.'</option>';
														}
													}
													?>
												</select>
											</fieldset>

											<fieldset class="form-group">
												<label for="description-for">Salary Package</label>
												<input type="text" class="form-control filter-text-field" id="salary_package-detail" name="salary_package">
											</fieldset>

											<fieldset class="form-group">
												<label for="description-for">Terms</label>
												<input type="text" class="form-control filter-text-field" id="terms-detail" name="terms">
											</fieldset>

											<fieldset class="form-group">
												<label for="description-for">Job Responsibility</label>
												<input type="text" class="form-control filter-text-field" id="job_resp-detail" name="job_resp">
											</fieldset>

											<fieldset class="form-group">
												<label for="description-for">Description</label>
												<input type="text" class="form-control filter-text-field" id="description-detail" name="description">
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
													<input type="checkbox" class="table-column" checked="checked" value="title" id="tbl-col-checkbox-1" name ="tbl-col-checkbox-1"> 
													<label for="tbl-col-checkbox-1">Title </label>
												</div>
											</div>
											<div class="col-12 mb-1">
												<div class="checkbox checkbox-success">
													<input type="checkbox" class="table-column" checked="checked" value="description" id="tbl-col-checkbox-2" name ="tbl-col-checkbox-2"> 
													<label for="tbl-col-checkbox-2">Job Nature</label>
												</div>
											</div>
											<div class="col-12 mb-1">
												<div class="checkbox checkbox-success">
													<input type="checkbox" class="table-column" checked="checked" value="description" id="tbl-col-checkbox-2" name ="tbl-col-checkbox-2"> 
													<label for="tbl-col-checkbox-2">Salary Package</label>
												</div>
											</div>
											<div class="col-12 mb-1">
												<div class="checkbox checkbox-success">
													<input type="checkbox" class="table-column" checked="checked" value="description" id="tbl-col-checkbox-2" name ="tbl-col-checkbox-2"> 
													<label for="tbl-col-checkbox-2">Terms</label>
												</div>
											</div>
											<div class="col-12 mb-1">
												<div class="checkbox checkbox-success">
													<input type="checkbox" class="table-column" checked="checked" value="description" id="tbl-col-checkbox-2" name ="tbl-col-checkbox-2"> 
													<label for="tbl-col-checkbox-2">Job Responsibility</label>
												</div>
											</div>
											<div class="col-12 mb-1">
												<div class="checkbox checkbox-success">
													<input type="checkbox" class="table-column" checked="checked" value="description" id="tbl-col-checkbox-2" name ="tbl-col-checkbox-2"> 
													<label for="tbl-col-checkbox-2">Description</label>
												</div>
											</div>
											<div class="col-12 mb-1">
												<div class="checkbox checkbox-success">
													<input type="checkbox" class="table-column" checked="checked" value="status" id="tbl-col-checkbox-3" name ="tbl-col-checkbox-3"> 
													<label for="tbl-col-checkbox-3">Status</label>
												</div>
											</div>
											<div class="col-12 mb-1">
												<div class="checkbox checkbox-success">
													<input type="checkbox" class="table-column" value="added_by" id="tbl-col-checkbox-4" name ="tbl-col-checkbox-4"> 
													<label for="tbl-col-checkbox-4">Added By</label>
												</div>
											</div>
											<div class="col-12 mb-1">
												<div class="checkbox checkbox-success">
													<input type="checkbox" class="table-column" value="modified_by" id="tbl-col-checkbox-5" name ="tbl-col-checkbox-5"> 
													<label for="tbl-col-checkbox-5">Modified By</label>
												</div>
											</div>

											<div class="col-12 mb-1">
												<div class="checkbox checkbox-success">
													<input type="checkbox" class="table-column" checked="checked" value="date_added" id="tbl-col-checkbox-6" name ="tbl-col-checkbox-6"> 
													<label for="tbl-col-checkbox-6">Date Added</label>
												</div>
											</div>
											<div class="col-12 mb-1">
												<div class="checkbox checkbox-success">
													<input type="checkbox" class="table-column" value="date_modification" id="tbl-col-checkbox-7" name ="tbl-col-checkbox-7"> 
													<label for="tbl-col-checkbox-7">Date Modification</label>
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
							<h3 class="card-title">Import Pay-Scales </h3>
							<button type="button" class="close close-icon page-sidebar-close">
								<i class="bx bx-x"></i>
							</button>
						</div>
						<!-- form start -->
						<form method="post" autocomplete="off" action="<?= base_url('App/import_pay_scales_csv_file'); ?>" enctype="multipart/form-data" class="import-csv-form">
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
												<button type="button" class="btn btn-theme btn-sm sample-import-file" target="pay_scales.csv"><i class="bx bx-cloud-download"></i> Download Sample</button>
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

