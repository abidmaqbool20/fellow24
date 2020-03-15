
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
	    	<ul class="action-btns pull-right">
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
		                    <span> &nbsp;Export</span>
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
			<div class="col-12 page-data">
			  <div class="table-responsive">
			  	<table class="table table-hover mb-0">
				    <thead>
				      <tr> 
				        <th>Title </th>
				        <th>Description </th>
				        <th>Date Added</th>
				        <th>Status</th>
				        <th>ACTION</th>
				      </tr>
				    </thead>
				    <tbody>
				        
					      	<?php 
					      	if($records->num_rows() > 0){
					      		foreach ($records->result() as $key => $value) { 
					      			$checked ="";
					      			if($value->status == 1){
					      				$checked = 'checked';
					      			}
					      	?>
					      			<tr class="rec-<?=$value->id ;?>">
								      	<td class="text-bold-500"><?php echo $value->title;?></td>
								        <td><?php echo $value->description;?></td>
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
							                    <a class="dropdown-item" href="">View</a>
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
			  	<div class="col-md-6"></div> 
			  	<div class="col-md-6">
			  		<nav aria-label="Page navigation example">
		              <ul class="pagination  pull-right mr-3">
		                <li class="page-item previous disabled">
		                	<a class="page-link" href="#">
			                    <i class="bx bx-chevron-left"></i>
			                </a>
		              	</li>
		                <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
		                <li class="page-item"><a class="page-link" href="#">2</a></li>
		                <li class="page-item"><a class="page-link" href="#">3</a></li>
		                <li class="page-item"><a class="page-link" href="#">4</a></li>
		                <li class="page-item"><a class="page-link" href="#">5</a></li>
		                <li class="page-item"><a class="page-link" href="#">6</a></li>
		                <li class="page-item"><a class="page-link" href="#">7</a></li>
		                <li class="page-item next"><a class="page-link" href="#">
		                    <i class="bx bx-chevron-right"></i>
		                  </a></li>
		              </ul>
		            </nav>
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
				      <form class="edit-kanban-item">
				        <div class="card-content">
				          <div class="card-body">
				             
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
				      <!-- form start end-->
				    </div>
				</div>
			</div>
		</div>  
	</section>
 
	<footer class="footer footer-static footer-light">
	    <p class="clearfix mb-0"><span class="float-left d-inline-block"><?= date("Y"); ?> &copy; Fellow24</span><span class="float-right d-sm-inline-block d-none">Crafted with<i class="bx bxs-heart pink mx-50 font-small-3"></i>by<a class="text-uppercase" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Fellow24</a></span>
	    <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="bx bx-up-arrow-alt"></i></button>
	</p>
	</footer>
</div>
 