
<?php $records = $this->App_Model->get_campaigns(); ?>

<section class="actions-wrapper">
	<div class="row">
	    <div class="col-md-6">
	    	<div class="row breadcrumbs-top">
              <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0"><i class="bx bxs-group"></i>&nbsp;Campaigns</h5>
                <div class="breadcrumb-wrapper col-12">
                  <ol class="breadcrumb p-0 mb-0"> 
                    <li class="breadcrumb-item"><a href="#">Components</a> </li>
                    <li class="breadcrumb-item"> <i class="bx bx-chevrons-right">  </i> </li> 
                    <li class="breadcrumb-item active">All Campaigns </li>
                  </ol>
                </div>
              </div>
            </div>
	    </div>
	    <div class="col-md-6">
	    	<ul class="action-btns default-actions pull-right">
	    		<li>
	    			<button type="button" class="btn btn-icon btn-primary open-model"  data="<?php echo get_json(array('id'=>'0','view'=>'models/form-campaign')); ?>"><i class="bx bx-plus"></i></button>
	    		</li>
	    		 
	    		<li>
	    			<button type="button" class="btn btn-icon btn-info open-model" data="<?php echo get_json(array('id'=>'0','view'=>'models/form-user')); ?>" title="Import Records"><i class="bx bx-upload"></i></button>
	    		</li>
	    		<li>
	    			<button type="button" class="btn btn-icon btn-success page-sidebar-open" target="quick-report-sidebar" title="Quick Reports"><i class="bx bxs-report"></i></button>
	    		</li>
	    		
	    		<li>
	    			<div class="btn-group" role="group" aria-label=" "> 
	                  <button type="button" class="btn btn-icon btn-white page-sidebar-open" target="filter-sidebar"><i class="bx bxs-filter-alt"></i></button>
	                  <button type="button" class="btn btn-icon btn-warning page-sidebar-open" target="sort-sidebar"><i class="bx bx-sort"></i></button>
	                </div>
	    		</li>
	    		
	    	</ul>
	    	<ul class="action-btns selected-actions pull-right hide">
	    		
	    		<li>
	    			<button type="button" class="btn btn-icon btn-light" title="Reload Page"><i class="bx bx-loader-alt"></i></button>
	    		</li>

	    		<li>
	    			<div class="btn-group" role="group" aria-label=" "> 
	                  <button type="button" class="btn btn-icon btn-white page-sidebar-open" target="filter-sidebar"><i class="bx bxs-filter-alt"></i></button>
	                  <button type="button" class="btn btn-icon btn-warning page-sidebar-open" target="sort-sidebar"><i class="bx bx-sort"></i></button>
	                </div>
	    		</li>
	    		<li>
	    			<div class="dropdown">
		                <button type="button" class="btn btn-icon dropdown-toggle btn-white action-icon" id="tag" data-toggle="dropdown"
		                  aria-haspopup="true" aria-expanded="false">
		                  <span class="fonticon-wrap">
		                    <i class="bx bx-check" >
		                    </i>
		                  </span>
		                </button>
		                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="tag">
		                  <a href="#" class="dropdown-item align-items-center">
		                    <span class="bullet bullet-success bullet-sm"></span>
		                    <span> &nbsp;Export All</span>
		                  </a>
		                  <a href="#" class="dropdown-item align-items-center">
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
			  <div class="table-responsive">
			  	<table class="table table-hover mb-0">
				    <thead>
				      <tr> 
				      	<th class="table-checkbox table_record_checkbox"> 
				        	<div class="checkbox checkbox-success">
		                        <input type="checkbox" id="colorCheckbox0" class="table_head_checkbox" table="campaigns"> 
		                        <label for="colorCheckbox0"></label>
		                    </div>
				        </th>
				        <th>Title </th>
				        <th>Description </th>
				        <th>Date Added</th>
				        <th>Status</th>
				        <th>ACTION</th>
				      </tr>
				    </thead>
				    <tbody class="campaigns table-records">
				        
					      	<?php 
					      	if($records->num_rows() > 0){
					      		foreach ($records->result() as $key => $value) { 
					      			$checked ="";
					      			if($value->status == 1){
					      				$checked = 'checked';
					      			}
					      	?>
					      			<tr class="rec-<?=$value->id ;?>">
					      				<td  class="table-checkbox">
								      		<div class="checkbox checkbox-success">
						                        <input type="checkbox" class="table_record_checkbox" id="colorCheckbox<?=$value->id ;?>"> 
						                        <label for="colorCheckbox<?=$value->id ;?>"></label>
						                    </div>
				      					</td>
								      	<td class="text-bold-500"><?php echo $value->title;?></td>
								        <td><?php echo substr($value->description,0,80);?></td>
								        <td class="text-bold-500"><?php echo $value->date_added;?></td>
								        <td> 
								        	<div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
								                <input type="checkbox" <?= $checked ;?> class="custom-control-input change-status" table="campaigns"  id="customSwitchcolor<?=$key ?>" table-id="<?= $value->id;?>">
								                <label class="custom-control-label" for="customSwitchcolor<?=$key ?>"></label>
							                </div>
          								</td>
								        <td>
											<div class="dropdown">
							                  <button type="button" class="action-dropdown dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							                   <i class="bx bx-dots-vertical-rounded"></i>
							                  </button>
							                  <div class="dropdown-menu dropdown-menu-right">
							                    <a class="dropdown-item open-model" data="<?php echo get_json(array('id'=>$value->id,'view'=>'models/form-campaign')); ?>" href="javascript:;">Edit</a>
							                    <a class="dropdown-item open-model" href="javascript:;" data="<?php echo get_json(array('id'=>$value->id,'view'=>'models/view-campaign')); ?>">View</a>
							                    <a class="dropdown-item delete" data="<?php echo get_json(array('id'=>$value->id,'table'=>'campaigns')); ?>" href="javascript:;">Delete</a>
							                  </div>
							                </div>
				                        </td>
							        </tr>
					      			
					      	<?php }};?>
				        

				    </tbody>
			  	</table>
			  </div> 
			  <div class="pagination-wrapper row">
			  	<div class="col-md-6">
			  		<div class="row">
			  			<div class="col-12">
			  				<div class="row">
			  					<div class="col-2"><label>Per Page</label></div>
			  					<div class="col-2">
			  						<div class="page-records">
							  		  
							            <select class="form-control select2 per-page-rec">
							            	<option value="5">5</option>
							            	<option value="100">100</option>
							            	<option value="500">500</option>
							            	<option value="0">All</option>

							            </select>
						        	</div>
						        </div>
						        <div class="col-2"></div>
						        <div class="col-6"></div>
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
				     <form method="post" autocomplete="off" action="<?= base_url('App/filter_campaigns'); ?>" enctype="multipart/form-data" class="filter-records">
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
		                                <input type="text" class="form-control filter-text-field" id="basicInput" placeholder="Enter Title" name="title">
		                            </fieldset>

		                            <fieldset class="form-group">
		                                <label for="description">Description</label>
		                                <input type="text" class="form-control filter-text-field" id="description" name="description">
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
				             
				          </div>
				        </div>
				        <div class="card-footer d-flex justify-content-end">
				         
				        </div>
				      </form>
				      <!-- form start end-->
				    </div>
				</div>
			</div>
			<div class="col-3 quick-report-sidebar page-sidebar hide">
				<div class="filter-side-content">
				    <div class="card shadow-none quill-wrapper">
				      <div class="card-header d-flex justify-content-between align-items-center border-bottom px-2 py-1">
				        <h3 class="card-title">Report Records</h3>
				        <button type="button" class="close close-icon page-sidebar-close">
				          <i class="bx bx-x"></i>
				        </button>
				      </div>
				      <!-- form start -->
				      <form class="edit-kanban-item">
				        <div class="card-content">
				          <div class="card-body">
				             
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
 
	<footer class="footer footer-static footer-light">
	    <ul class="">
	    	<li><span>Selected Record :</span><span id="total_selected_number" class="total_records">0</span></li>
	    </ul>
	</footer>
</div>
<script>
	$(".select2").select2({'width':'100%'});

	$(document).ready(function(){
		$('.filter-records').trigger('submit');
	});
</script>
 