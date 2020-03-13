$base_url =  $(location).attr('href').split("/")[0]+"/fellow24";
$csrf_token = $('meta[name="csrf_token"]').attr('content');

$internet_connection = false;

var check_connectivity = {
    
    is_internet_connected: function() {
        return $.get({
            url: $base_url+"/app/check_connectivity/",
            dataType: 'text',
            cache: false
        });
    } 
    
};


check_connectivity.is_internet_connected().done(function() {
    $internet_connection = true;
}).fail(function(jqXHR, textStatus, errorThrown) {
	alert("failed");
     toast_error_message('Failed!',"It seems you don't have internet connection. Please check!");
});


$(document).on("click",".open-model",function(){
	if($internet_connection){
		$data = $(this).attr("data");  
		$url = new URL(window.location.href);
		if($url.search && $url.search != ''){
			$previous_search = remove_modal_variables($url.search); 
			$modal_url = $base_url+'/app'+$previous_search+"&"+generate_browser_url_for_modal($data);
			history.pushState(null, null, $modal_url);
		}
		else
		{
			$modal_url = $base_url+'/app'+"?"+generate_browser_url_for_modal($data);
			history.pushState(null, null, $modal_url);
		}

		load_modal($data);
	}

});



function load_modal($data){
	if($internet_connection){
		if($data != ''){
			add_loader();
		    $(".model-content").html('').load($base_url+"/app/load_form",{data:$data,csrf_token:$csrf_token},function(){
		    	remove_loader();
		    	$(".page-overlay").addClass("show");
		    	$(".model-first").addClass("show"); 
		    	$(".select2").select2({ width: '100%' });
		    });
		}
	}
}



// browser history manager


function remove_modal_variables($search_string){
	if($search_string != '')
	{
		pairs = $search_string.slice(1).split('&');
		var result = '?';
	    pairs.forEach(function(pair) {
	        pair = pair.split('=');
	        if(pair[0].indexOf('modal') !== 0)
	        result += pair[0]+"="+decodeURIComponent(pair[1] || '')+"&";
	    });
	    result = result.replace(/&\s*$/, "");
	    return result;
	}
}

 


$(document).on("click",".close-model",function(){
	$(".model-first").removeClass("show");
	$(".page-overlay").removeClass("show");
	$url = new URL(window.location.href);
    $browser_url = $url.search;
    $pairs = $url.search.slice(1).split('&');
    $data = QueryStringToJSON($pairs);
    // if($data != "")
    // load_page($data,true);
	if($data != ""){
		$browser_url = $base_url+"?"+generate_browser_url($data);
		history.pushState(null, null, $browser_url);
	}
});


$(window).on("load",function(){

	$url = new URL(window.location.href);
    $browser_url = $url.search;
    $pairs = $url.search.slice(1).split('&');
    $data = QueryStringToJSON($pairs);


   $modaldata = QueryStringToJSONforModal($pairs);
   if($data != "")
   load_page($data,false);

   if(!jQuery.isEmptyObject($modaldata)){
   	load_modal($modaldata);
   }
   else{
   	$(".model-first").removeClass("show");
   	$(".page-overlay").removeClass("show");
   }

});


$( '.app-sidebar' ).delegate( "li", "click", function(e) { 
	e.preventDefault();
	page_loader($(this));
});

function page_loader($this='',$data=''){
	if($internet_connection){
		if($($this).hasClass('clickable')){ 
			$(".app-sidebar li").removeClass("active");
			$($this).addClass("active");
			$data = $($this).find('a').attr('data');
		}

		if($data != '')
		load_page($data,true);
	}
}

$(document).on("click",".reload",function(){
	if($internet_connection){
		$data = $(this).attr('data');
		load_page($data,true);
	}
});
function load_page($data,$push_url){
	if($internet_connection){
		if($data != ''){
			add_loader();
			$(".page-loader").html('').load($base_url+'/app/view_loader',{data:$data,csrf_token:$csrf_token},function(){
				if($push_url){
					$browser_url = $base_url+"/app?"+generate_browser_url($data);
					history.pushState(null, null, $browser_url);
				}
				remove_loader();
			});
		}
	}
}

window.onpopstate = function() {
   $url = new URL(window.location.href);
   $browser_url = $url.search;
   $pairs = $url.search.slice(1).split('&');
   $data = QueryStringToJSON($pairs);
   $modaldata = QueryStringToJSONforModal($pairs);
   if($data != "")
   load_page($data,false);

   if(!jQuery.isEmptyObject($modaldata)){
   	load_modal($modaldata);
   }
   else{
   	$(".model-first").removeClass("show");
   	$(".page-overlay").removeClass("show");

   }
};

function generate_browser_url($data){

	var query = '';
	if(typeof $data !='object'){
		$data = $.parseJSON($data);
	}

	if($data != ""){
		return  Object.keys($data).map(function(key) {
                    return encodeURIComponent(key) + '=' +
                        encodeURIComponent($data[key]);
                }).join('&');
	}
	return query;
}

function generate_browser_url_for_modal($data){

	var query = '';
	if(typeof $data !='object'){
		$data = $.parseJSON($data);
	}

	if($data != ""){
		return  Object.keys($data).map(function(key) {
                    return "modal-"+encodeURIComponent(key) + '=' +
                        encodeURIComponent($data[key]);
                }).join('&');
	}
	return query;
}


function QueryStringToJSON(pairs='') {
   // var pairs = location.search.slice(1).split('&');
    var result = {};
    pairs.forEach(function(pair) {
        pair = pair.split('=');
        if(pair[0].indexOf('modal') !== 0)
        result[pair[0]] = decodeURIComponent(pair[1] || '');
    });

    return JSON.parse(JSON.stringify(result));
}

function QueryStringToJSONforModal(pairs='') {
   // var pairs = location.search.slice(1).split('&');
    var result = {};
    pairs.forEach(function(pair) {
        pair = pair.split('=');
        if(pair[0].indexOf('modal') == 0){
        	$var = pair[0].split("modal-");
        	result[$var[1]] = decodeURIComponent(pair[1] || '');
        }

    });

    return JSON.parse(JSON.stringify(result));
}





// End browser history manager 
 $(document).on('click','.page-sidebar-open',function(){

    $(".page-data").removeClass("col-12");
    $(".page-data").addClass("col-9");
    $(".page-sidebar").addClass("hide");
    
    $target = $(this).attr('target');  
    $("."+$target).removeClass("hide");
    $("."+$target).addClass("show");
});

$(document).on('click','.page-sidebar-close',function(){
    $(".page-sidebar").removeClass("show"); 
    $(".page-sidebar").addClass("hide");
    $(".page-data").removeClass("col-9");
    $(".page-data").addClass("col-12");
});














$(document).on("keyup",".table-search", function() {
    var value = $(this).val().toLowerCase();
    $("#SearchTable .searchSection").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});

$(document).on("click",'.filter-form-btn',function(){
    $('.filter-form').toggle("slow");
});



function add_loader()
{
	// $(".loader").css("display","block");
	var $white = '#fff';
	$('.block-element').on('click', function () {
	    var block_ele = $('.page-loader');
	    $(block_ele).block({
	      message: '<div class="bx bx-revision icon-spin font-medium-2"></div>',
	      timeout: 200000000, //unblock after 2 seconds
	      overlayCSS: {
	        backgroundColor: $white,
	        opacity: 0.8,
	        cursor: 'wait'
	      },
	      css: {
	        border: 0,
	        padding: 0,
	        backgroundColor: 'transparent'
	      }
	    });
	});
}

function remove_loader()
{
	// $(".loader").css("display","none");
	var $white = '#fff';
	$('.block-element').on('click', function () {
	    var block_ele = $('.page-loader');
	    $(block_ele).block({
	      message: '<div class="bx bx-revision icon-spin font-medium-2"></div>',
	      timeout: 10, //unblock after 2 seconds
	      overlayCSS: {
	        backgroundColor: $white,
	        opacity: 0.8,
	        cursor: 'wait'
	      },
	      css: {
	        border: 0,
	        padding: 0,
	        backgroundColor: 'transparent'
	      }
	    });
	});
}

function change_status($table,$id)
{
	add_loader();

	$.ajax({
        type: "POST",
        url: $base_url+"/admin/change-status",
        data: {table:$table,id:$id},
        success: function(result) {
            swal(
			      'Successful!',
			       "Status is changed successfully",
			      'success'
				);

        },
        error:function(){
        	swal(
			      'Error!',
			       "Sorry! status is not changed.",
			      'error'
				);

        },
        complete: function(){
        	remove_loader();
        }
    });
}


$(document).on("click",".delete",function(){

	$data = $.parseJSON($(this).attr("data"));
	$record = $(this);
	swal({
        title: "Are you sure?",
        text: "You will not be able to recover this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ff5f28",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: true
    }, function(){

        add_loader();
		$.ajax({
			        type: "POST",
			        url: $base_url+"/app/delete_record",
			        data: {table:$data.table,id:$data.id,csrf_token:$csrf_token},
			        async:false,
			        success: function(result) {
			           $($record).closest("#rec_"+$data.id).remove();
			        },
			        error:function(){
			        	swal(
						      'Error!',
						       "Sorry! Record can't be deleted.",
						      'error'
							);

			        },
			        complete: function(){
			        	remove_loader();
			        	toast_success_message('Success!',"Record is deleted successfully...");
			        }
			    });

		return true;
    });

	return false;
});

$(document).on("click",".delete_emp_contract",function(){

	$data = $.parseJSON($(this).attr("data"));
	$record = $(this);
	swal({
        title: "Are you sure?",
        text: "It will update previous record & You will not be able to recover this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ff5f28",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: true
    }, function(){

        add_loader();
		$.ajax({
			        type: "POST",
			        url: $base_url+"/app/delete_emp_contract_record",
			        data: {table:$data.table,id:$data.id,csrf_token:$csrf_token},
			        async:false,
			        success: function(result) {
			           $($record).closest("#rec_"+$data.id).remove();
			        },
			        error:function(){
			        	swal(
						      'Error!',
						       "Sorry! Record can't be deleted.",
						      'error'
							);

			        },
			        complete: function(){
			        	remove_loader();
			        	toast_success_message('Success!',"Record is deleted successfully...");
			        }
			    });

		return true;
    });

	return false;
});

function toast_success_message($heading='',$message='',$position='',$duration=''){

	if($message == '')
		$message = 'No message found';
	if($position == '')
		$position = 'top-right';
	if($duration == '')
		$duration = 3500;

	$.toast({
				heading: $heading,
				text: $message,
				position: $position,
				loaderBg: '#fec107',
				icon: 'success',
				hideAfter: $duration,
				stack: 6
			});
}

function toast_error_message($heading='',$message='',$position='',$duration=''){

	if($message == '')
		$message = 'No message found';
	if($position == '')
		$position = 'top-right';
	if($duration == '')
		$duration = 3500;

	$.toast({
				heading: $heading,
				text: $message,
				position: $position,
				loaderBg: '#fec107',
				icon: 'error',
				hideAfter: $duration,
				stack: 6
			});
}

function toast_warning_message($heading='',$message='',$position='',$duration=''){

	if($message == '')
		$message = 'No message found';
	if($position == '')
		$position = 'top-right';
	if($duration == '')
		$duration = 3500;

	$.toast({
				heading: $heading,
				text: $message,
				position: $position,
				loaderBg: '#ff2a00',
				icon: 'warning',
				hideAfter: $duration,
				stack: 6
			});
}

$(document).on('submit','.general-form',function(e){
	e.preventDefault();
	var formData = new FormData(this);
	$form = $(this);
	$.ajax({
		    type:'POST',
		    url: $(this).attr("action"),
		    data: formData,
		   	cache: false,
	        contentType: false,
	        processData: false,
		    beforeSend:function(){
		    	  add_loader();
		    },

		    success:function(response)
		    {
		    	 $message = $.parseJSON(response);
		    	 if($message['success'])
		    	 {
	    	 		swal(
					      'Successful!',
					       $message['message'],
					      'success'
						);

	    	 		$form.trigger('reset');

	    	 		$(".select2").select2();

		    	 }
		    	 else
		    	 {

		    	 	swal(
					      'Error!',
					       $message['message'],
					      'error'
					    );

		    	 }
		    },
		    error:function(msg){
		    	console.log(msg);
		    	 swal(
					      'Error!',
					      'error'
					 );
		    },
		    complete:function(){
		    	 remove_loader();
		    }
		  });

});


$(document).on('submit','.upload-emp-profile-img',function(e){
	e.preventDefault();
	var formData = new FormData(this);
	$form = $(this);
	var file = $('#profile_picture')[0].files[0];
	//alert(file);
	console.log(file);
	if(file){

		//$transfer_type = formData.get('transfer_type');
		if($transfer_type != ""){
			$.ajax({
			    type:'POST',
			    url: $(this).attr("action"),
			    data: formData,
			   	cache: false,
		        contentType: false,
		        processData: false,
			    beforeSend:function(){
			    	  add_loader();
			    },

			    success:function(response)
			    {
			    	 $message = $.parseJSON(response);
			    	 if($message['success'])
			    	 {
		    	 		swal(
						      'Successful!',
						       $message['message'],
						      'success'
							);

		    	 		$form.trigger('reset');
			    	 }
			    	 else
			    	 {

			    	 	swal(
						      'Error!',
						       $message['message'],
						      'error'
						    );

			    	 }
			    },
			    error:function(msg){
			    	console.log(msg);
			    	 swal(
						      'Error!',
						      'error'
						 );
			    },
			    complete:function(){
			    	 remove_loader();
			    }
			});
		}
	}
});

$(document).on('submit','.save-transfer',function(e){
	e.preventDefault();
	var formData = new FormData(this);
	$form = $(this);
	$transfer_type = formData.get('transfer_type');
	if($transfer_type != ""){
		$.ajax({
		    type:'POST',
		    url: $(this).attr("action"),
		    data: formData,
		   	cache: false,
	        contentType: false,
	        processData: false,
		    beforeSend:function(){
		    	  add_loader();
		    },

		    success:function(response)
		    {
		    	 $message = $.parseJSON(response);
		    	 if($message['success'])
		    	 {
	    	 		swal(
					      'Successful!',
					       $message['message'],
					      'success'
						);
	    	 		fetch_emp_data_for_transfer($emp_id);
					 $form.trigger('reset');
					 $(".select2").select2();
		    	 }
		    	 else
		    	 {

		    	 	swal(
					      'Error!',
					       $message['message'],
					      'error'
					    );

		    	 }
		    },
		    error:function(msg){
		    	console.log(msg);
		    	 swal(
					      'Error!',
					      'error'
					 );
		    },
		    complete:function(){
		    	 remove_loader();
		    }
		});
	}
});
$(document).on('submit','.save-promotion',function(e){
	e.preventDefault();
	var formData = new FormData(this);
	$form = $(this);
	$transfer_type = formData.get('transfer_type');
	if($transfer_type != ""){
		$.ajax({
		    type:'POST',
		    url: $(this).attr("action"),
		    data: formData,
		   	cache: false,
	        contentType: false,
	        processData: false,
		    beforeSend:function(){
		    	  add_loader();
		    },

		    success:function(response)
		    {
		    	 $message = $.parseJSON(response);
		    	 if($message['success'])
		    	 {
	    	 		swal(
					      'Successful!',
					       $message['message'],
					      'success'
						);
	    	 		fetch_emp_data_for_promotion($emp_id);
	    	 		$form.trigger('reset');
		    	 }
		    	 else
		    	 {

		    	 	swal(
					      'Error!',
					       $message['message'],
					      'error'
					    );

		    	 }
		    },
		    error:function(msg){
		    	console.log(msg);
		    	 swal(
					      'Error!',
					      'error'
					 );
		    },
		    complete:function(){
		    	 remove_loader();
		    }
		});
	}
});

$(document).on('submit','.save-emp-contracts',function(e){
	e.preventDefault();
	var formData = new FormData(this);
	$form = $(this);
	$edit_record_id = formData.get('edit_record_id');
	$emp_id = formData.get('emp_id');
	$eoc = formData.get('eoc');
	$ext_eoc = formData.get('ext_eoc');
	$run_ajax=false;
	if ($edit_record_id != '' && $edit_record_id > 0) {
		if (($ext_eoc != "" && $ext_eoc != '0000-00-00')) {
			$run_ajax=true;
		}
	}
	else if ($eoc != "" && $eoc != '0000-00-00') {
		$run_ajax=true;
	}
	
	if($run_ajax){
		$.ajax({
		    type:'POST',
		    url: $(this).attr("action"),
		    data: formData,
		   	cache: false,
	        contentType: false,
	        processData: false,
		    beforeSend:function(){
		    	  add_loader();
		    },

		    success:function(response)
		    {
		    	 $message = $.parseJSON(response);
		    	 if($message['success'])
		    	 {
	    	 		swal(
					      'Successful!',
					       $message['message'],
					      'success'
						);
	    	 		fetch_contract_employees($emp_id);
	    	 		$form.trigger('reset');
		    	 }
		    	 else
		    	 {

		    	 	swal(
					      'Error!',
					       $message['message'],
					      'error'
					    );

		    	 }
		    },
		    error:function(msg){
		    	console.log(msg);
		    	 swal(
					      'Error!',
					      'error'
					 );
		    },
		    complete:function(){
		    	 remove_loader();
		    }
		});
	}
});

$(document).on('submit','.save-jobplacement',function(e){
	e.preventDefault();
	var formData = new FormData(this);
	$form = $(this);
	$institute_id = formData.get('institute_id');
	if($institute_id != "" && $institute_id > 0){
		$.ajax({
		    type:'POST',
		    url: $(this).attr("action"),
		    data: formData,
		   	cache: false,
	        contentType: false,
	        processData: false,
		    beforeSend:function(){
		    	  add_loader();
		    },

		    success:function(response)
		    {
		    	 $message = $.parseJSON(response);
		    	 if($message['success'])
		    	 {
	    	 		swal(
					      'Successful!',
					       $message['message'],
					      'success'
						);

	    	 		$form.trigger('reset');
		    	 }
		    	 else
		    	 {

		    	 	swal(
					      'Error!',
					       $message['message'],
					      'error'
					    );

		    	 }
		    },
		    error:function(msg){
		    	console.log(msg);
		    	 swal(
					      'Error!',
					      'error'
					 );
		    },
		    complete:function(){
		    	 remove_loader();
		    }
		});
	}
});


$(document).on('submit','.employee-form',function(e){
	e.preventDefault();
	var formData = new FormData(this);
	$form = $(this);
	$.ajax({
		    type:'POST',
		    url: $(this).attr("action"),
		    data: formData,
		   	cache: false,
	        contentType: false,
	        processData: false,
		    beforeSend:function(){
		    	  add_loader();
		    },

		    success:function(response)
		    {
		    	 $message = $.parseJSON(response);
		    	 if($message['success'])
		    	 {
		    	 	if($.inArray('edit_record_id')){
		    	 		$form.find('#edit_record_id').val($message['edit_record_id']);
		    	 	}
	    	 		swal(
					      'Successful!',
					       $message['message'],
					      'success'
						);
					$(".emp-sub-forms").trigger("submit");
	    	 		$form.trigger('reset');
		    	 }
		    	 else
		    	 {

		    	 	swal(
					      'Error!',
					       $message['message'],
					      'error'
					    );

		    	 }
		    },
		    error:function(msg){
		    	console.log(msg);
		    	 swal(
					      'Error!',
					      'error'
					 );
		    },
		    complete:function(){
		    	 remove_loader();
		    }
		  });

});

$(document).on("change",".parent-dropdown",function(){
	$value = $(this).val();
	$data = $(this).attr("data");
	if($data != ""){
		$data = $.parseJSON($data);
		$data['key_id'] = $value;

		add_loader();
	$.ajax({
        type: "POST",
        url: $base_url+"/app/get_childs",
        data: {data:$data,csrf_token:$csrf_token},
        success: function(result) {
        	$options = '<option value="0">Select</option>';
        	
        	if(result != 'false'){
	            if(result && result != ''){
	             	$result = $.parseJSON(result);
	             	$.each($result,function(key,record){
	             		$selected = "";
	             		if(record.id == $data['selected']){ $selected = 'selected="selected"'; }
	             		$options += '<option '+$selected+' value="'+record.id+'">'+record.name+'</option>';
	             	});
	            }
	        }

	        $("#"+$data.target).html($options);

        },
        error:function(error){
        	 console.log(error);

        },
        complete: function(){
        	remove_loader();
        }
    });
	}
});

$(document).on("change",".parentdropdown",function(){
	$value = $(this).val();
	$data = $(this).attr("data");

	if($data != ""){
		$data = $.parseJSON($data);
		$data['key_id'] = $value;

		add_loader();
	$.ajax({
        type: "POST",
        url: $base_url+"/app/get_childs",
        data: {data:$data,csrf_token:$csrf_token},
        success: function(result) {
        	$options = '<option value="0">All Institute</option>';
        	if(result != 'false'){
	            if(result && result != ''){
	             	$result = $.parseJSON(result);
	             	$.each($result,function(key,record){
	             		$selected = "";
	             		if(record.id == $data['selected']){ $selected = 'selected="selected"'; }
	             		
	             		$options += '<option '+$selected+' value="'+record.id+'">'+record.name+'</option>';
	             	});
	            }
	        }

	        $("#"+$data.target).html($options);

        },
        error:function(error){
        	 console.log(error);

        },
        complete: function(){
        	remove_loader();
        }
    });
	}
});

$(document).on("change",".dept_employees",function(){
	$value = $(this).val();
	$data = $(this).attr("data");
	if($data != ""){
		$data = $.parseJSON($data);
		$data['key_id'] = $value;

		add_loader();
	$.ajax({
        type: "POST",
        url: $base_url+"/app/get_childs",
        data: {data:$data,csrf_token:$csrf_token},
        success: function(result) {
        	$options = '<option value="">Select</option>';
        	if(result != 'false'){
	            if(result && result != ''){
	             	$result = $.parseJSON(result);
	             	$.each($result,function(key,record){
	             		$selected = "";
	             		if(record.id == $data['selected']){ $selected = 'selected="selected"'; }
	             		$options += '<option '+$selected+' value="'+record.id+'">'+record.first_name+' '+record.last_name+'</option>';
	             	});
	            }
	        }

	        $("#"+$data.target).html($options);

        },
        error:function(error){
        	 console.log(error);

        },
        complete: function(){
        	remove_loader();
        }
    });
	}
});

$(document).on("submit",".filter-records",function(e){
	e.preventDefault();  

	var formData = new FormData(this);
	formData.append("csrf_token", $csrf_token);
	$.ajax({
			    type:'POST',
			    url: $(this).attr("action"),
			    data: formData,
			   	cache: false,
		        contentType: false,
		        processData: false,
			    beforeSend:function(){
			    	  add_loader();
			    },

			    success:function(response)
			    {
			    	if(response){
			    		$result = $.parseJSON(response);
			    		$('.table-records').html($result.records); 
			    	    $(".data-pagination").html($result.links);
			    		$(document).find(".total_records").html($result.total_records);
			    		   
			    	}

			    },
			    error:function(msg){

			    	 swal(
						      'Error!',
						      'error'
						 );
			    },
			    complete:function(){
			    	 remove_loader();
			    }
			});

	return false;
});

$(document).on("click",".clear-form",function(){
	$(this).closest("form").trigger("reset");
	$(".select2").select2();
	 
	$form_url = $(this).closest("form").attr("url");
 	if($form_url && $form_url != ''){
 		$form_url = $(this).closest("form").attr("action");
 	}

	// var to = $form_url.lastIndexOf('/'); 
	// to = to == -1 ? $form_url.length : to + 1;
	// $form_url = $form_url.substring(0, to);

	// $form_acttion = $(this).closest("form").attr("action").split('?')[0];
	$(this).closest("form").attr("action",$form_url);
	$(this).closest("form").trigger("submit");
});

$(document).on('click', '.pagination a', function(event){
	event.preventDefault();
	var url = $(this).attr('href'); 
	// var page = $(this).attr('href').split('page=')[1];
	fetch_data(url);
});

function fetch_data($url)
{ 
    $(".filter-records").attr("action",$url);
    $(".filter-records").trigger("submit");
}

function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}

$(document).on("click",".load-file-data",function(e){
	e.preventDefault();
	$data = $.parseJSON($(this).attr('data'));
	var formData = new FormData();
	formData.append($data.file_input_name, $("#"+$data.file_input_name).prop('files')[0]);
	formData.append("file_name", $data.file_input_name);
	formData.append("csrf_token", $csrf_token);
	$.ajax({
		    type:'POST',
		    url: $data.url,
		    data: formData,
		   	cache: false,
	        contentType: false,
	        processData: false,
		    beforeSend:function(){
		    	  add_loader();
		    },

		    success:function(response)
		    {
		    	 $result = $.parseJSON(response);
		    	 if($result['success'])
		    	 {

	    	 		 if($result['data'].length > 0){
	    	 		 	 
	    	 		 }
		    	 }
		    	 else
		    	 {

		    	 	swal(
					      'Error!',
					       $result['message'],
					      'error'
					    );

		    	 }
		    },
		    error:function(msg){
		    	console.log(msg);
		    	 swal(
					      'Error!',
					      'error'
					 );
		    },
		    complete:function(){
		    	 remove_loader();
		    }
		  });
});


$(document).on("change",".per_page_rec",function(){

	$(document).find("#per_page").val($(this).val());
	$total_records = $(".total_records").html();
	if($(this).val() >= $total_records){
		$(".per_page").val(0);
	}

	$(".filter-records").trigger("submit");
});



$counter = 0; $processing = false;
function selectallrecords($this,$table)
{ 
	add_loader();
	$counter = 0;
	 
	if($($this).is(":checked"))
	{	
		 
		$($this).prop("checked",true); 
	  	$("."+$table).find(".table_record_checkbox").each(function(){
	  		$(this).prop("checked",true);
	  		$(this).closest("tr").find("td").css("background-color","rgb(225, 235, 255)");
	  		$counter = $counter + 1;
	  	}); 

		$("#total_selected_number").html($counter);

	}
	else
	{  
		$($this).prop("checked",false);
	  	$("."+$table).find(".table_record_checkbox").each(function(){
	  		$(this).prop("checked",false);
	  		$(this).closest("tr").find("td").css("background-color","");
	  	});

	  	$("#total_selected_number").html(0);
	}
	 

	remove_loader();
	
} 
 

$(document).on('click', '.table_record_checkbox', function () {
    if($(this).is(":checked"))
	{	 
		$(this).closest("tr").find("td").css("background-color","rgb(225, 235, 255)");
	    $counter = $counter + 1;
		$("#total_selected_number").html($counter);
	}
	else
	{  
		$(this).closest("tr").find("td").css("background-color","");
	    $counter = $counter - 1;
		$("#total_selected_number").html($counter); 
	}
});

$(document).on('click', '.report-data', function () {
	
	$ids =   $('.table_record_checkbox:checked').map(function() 
		 	 {
			   return this.value;
			 }).get(); 
	if($ids.length > 0){
		$url = "";
		$data = $(this).attr("data");
		if($data != ""){
			$data = $.parseJSON($data);
			if($data.table != ""){
				if($data.table == 'employees')
					$url = $data.url;
			}
		}
		 
		if($url != ""){ 
			
			$.ajax({
				    type:'POST',
				    url: $url,
				    data: {ids:$ids,csrf_token:$csrf_token},
				   	 
				    beforeSend:function(){
				    	  add_loader();
				    },

				    success:function(response)
				    {
				    	var file_url = response; 
				    	// $("body").append("<a href='"+file_url+"' download id='download-excel'></a>");
				    	// $("body").find("#download-excel").trigger("click");
				    	// $("body").find("#download-excel").remove();
						window.open(file_url, '_blank');
						//swal("Success!", "The selected records have been exported successfully", "success");
				    },
				    error:function(msg){
				    	console.log(msg);
				    	 swal(
							      'Error!',
							      'error'
							 );
				    },
				    complete:function(){
				    	 remove_loader();
				    }
			}); 
		}
	}
	else{
			swal(
			      'Error!',
			       'Select records to export',
			      'error'
			    );
	}
});


$(document).on('submit','.report-form',function(e){
	e.preventDefault();
	var formData = new FormData(this);
	$form = $(this);
	$.ajax({
		    type:'POST',
		    url: $form.attr("action"),
		    data: formData,
		   	cache: false,
	        contentType: false,
	        processData: false,
		    beforeSend:function(){
		    	  add_loader();
		    },

		    success:function(response)
		    {
		    	var url = response; 
			    window.open(url, '_blank');
		    },
		    error:function(msg){
		    	console.log(msg);
		    	 swal(
					      'Error!',
					      'error'
					 );
		    },
		    complete:function(){
		    	 remove_loader();
		    }
		  });

});

$(document).on('change','.fetch-employees',function(e){
	
	$id = $(this).attr("id");
	$val = $(this).val();

	$.ajax({
		    type:'POST',
		    url: $base_url+'/app/fetch_sepcific_employees',
		    data: {id:$id,val:$val,csrf_token:$csrf_token},
		    
		    beforeSend:function(){
		    	  add_loader();
		    },

		    success:function(response)
		    {
		    	$(".fetched-employees").html(response);
		    	$(".select2").select2();
		    },
		    error:function(msg){
		    	console.log(msg);
		    	 swal(
					      'Error!',
					      'error'
					 );
		    },
		    complete:function(){
		    	 remove_loader();
		    }
		  });

}); 

$(document).on('change','.contract_employees',function(){
	
	$val=$(this).val();
	fetch_contract_employees($val);
	
});

function fetch_contract_employees($emp_id){
	if ($emp_id != '') {
			$.ajax({
				type:'POST',
				url: $base_url+'/app/fetch_contract_employees',
				data: {id:$emp_id,csrf_token:$csrf_token},
				success:function(response)
					{
						$("#contract_his_employees").html(response);
					},
				error:function(msg){
					console.log(msg);
					 swal(
						  'Error!',
						  'error'
						 );
				}
			});
		}
}

	$(document).on('click','.contract_employees_on_save',function(){

		//alert('Hello');
		$emp_id = $(this).closest('form').find('#emp_id').val();
		setTimeout(function(){
	    fetch_contract_employees($emp_id);
	    
		},1000);
		
	});

function fetch_contract_employees($emp_id){
	if ($emp_id != '') {
			$.ajax({
				type:'POST',
				url: $base_url+'/app/fetch_contract_employees',
				data: {id:$emp_id,csrf_token:$csrf_token},
				success:function(response)
					{
						$("#contract_his_employees").html(response);
					},
				error:function(msg){
					console.log(msg);
					 swal(
						  'Error!',
						  'error'
						 );
				}
			});
		}
}


$(document).on('change','.transfer_employees',function(){
	
	$val=$(this).val();
	fetch_emp_data_for_transfer($val);
	
});

function fetch_emp_data_for_transfer($emp_id){
	if ($emp_id != '') {
		$.ajax({
			type:'POST',
			url: $base_url+'/app/fetch_employees_for_transfer',
			data: {id:$emp_id,csrf_token:$csrf_token},
			success:function(response)
			    {
			    	$("#fetch_emp_data_for_transfer").html(response);
			    },
		    error:function(msg){
		    	console.log(msg);
		    	 swal(
					  'Error!',
					  'error'
					 );
		    }
		});
	}
}

$(document).on('change','.promotion_employees',function(){
	
	$val=$(this).val();
	fetch_emp_data_for_promotion($val);
	
});

function fetch_emp_data_for_promotion($emp_id){
	if ($emp_id != '') {
		$.ajax({
			type:'POST',
			url: $base_url+'/app/fetch_employees_for_promotion',
			data: {id:$emp_id,csrf_token:$csrf_token},
			success:function(response)
			    {
			    	$("#fetch_emp_data_for_promotion").html(response);
			    },
		    error:function(msg){
		    	console.log(msg);
		    	 swal(
					  'Error!',
					  'error'
					 );
		    }
		});
	}
}




$(document).on('change','.salary_increments_employees',function(){
	
	$val=$(this).val();
	fetch_salary_increments_employees($val);
	fetch_previous_salary_employees($val);
});

function fetch_salary_increments_employees($emp_id){
	if ($emp_id != '') {
		$.ajax({
			type:'POST',
			url: $base_url+'/app/fetch_salary_increments_employees',
			data: {id:$emp_id,csrf_token:$csrf_token},
			success:function(response)
				{
					$("#increment_his_employees").html(response);
				},
			error:function(msg){
				console.log(msg);
				swal(
					'Error!',
					'error'
					);
			}
		});
	}
}

function fetch_previous_salary_employees($emp_id){
	if ($emp_id != '') {
		$.ajax({
			type:'POST',
			url: $base_url+'/app/fetch_previous_salary_employees',
			data: {id:$emp_id,csrf_token:$csrf_token},
			success:function(response)
			{
				$("#previous-salary").html(response);
				$("#previous_salary").val(response);
			},
			error:function(msg){
				console.log(msg);
				swal(
					'Error!',
					'error'
				);
			}
		});
	}
}
$(document).on("change",".fetch-institute",function(){
	$value = $(this).val();
	fetch_job_placement_employees($value);
	fetch_job_placement_institue($value);
});

function fetch_job_placement_employees($emp_id){
	if ($emp_id != '') {
			$.ajax({
				type:'POST',
				url: $base_url+'/app/fetch_job_placement_employees',
				data: {id:$emp_id,csrf_token:$csrf_token},
				success:function(response)
					{
						$("#fetch_emp_data_job_placement").html(response);
					},
				error:function(msg){
					console.log(msg);
					 swal(
						  'Error!',
						  'error'
						 );
				}
			});
		}
}
function fetch_job_placement_institue($emp_id){
	if ($emp_id != '') {
		add_loader();
		$.ajax({
			type: "POST",
			url: $base_url+"/HRM_Account/fetch_institute",
			data: {employee:$emp_id,csrf_token:$csrf_token},
			success: function(result) {
				$options = '<option value="0">Select</option>';
				if(result != 'false'){
					if(result && result != ''){
						 $result = $.parseJSON(result);
						 $.each($result,function(key,record){
							 $selected = "";
							 if(record.id == $data['selected']){ $selected = 'selected="selected"'; }
							 $options += '<option '+$selected+' value="'+record.id+'">'+record.name+'</option>';
						 });
					}
				}
	
				$("#inst_ids").html($options);
	
			},
			error:function(error){
				 console.log(error);
	
			},
			complete: function(){
				remove_loader();
			}
		}); 
	}
}

$(document).on("click",".shift_attendance_btn",function(){

	var payscale_id = $('#payscale_id').val();
	var designation_id = $('#designation_id').val();
	var dep_id = $('#dep_id').val();
	var emp_id = $('#emp_id').val();
	var employee_hr_id = $('#employee_hr_id').val();
	var inst_id = $('#inst_id').val();
	var brnh_id = $('#brnh_id').val();
	var from_date = $('#from_date').val();
	var to_date = $('#to_date').val();
	var report = $('#report').val(); 
	var report_type = $('#report_type').val();
	var saturday_sunday = $('#saturday_sunday').val()
	var no_late_coming = $('#on_no_late_comings').val();
	var late_coming_leave_consider = $('#late_coming_leave_consider').val();
	var no_early_goings = $('#on_no_early_goings').val();
	var early_going_consider_leave = $('#early_going_leave_consider').val();
	var no_short_leave = $('#on_no_of_short_leaves').val();
	var short_leave_consider = $('#short_leave_consdier').val();

        add_loader();
		$.ajax({
			        type: "POST",
			        url: $base_url+"/app/get_emp_for_shift_attendance",
			        data: {employee_hr_id:employee_hr_id,designation_id:designation_id,payscale_id:payscale_id,emp_id:emp_id,saturday_sunday:saturday_sunday,report_type:report_type,inst_id:inst_id,brnh_id:brnh_id,report:report,dep_id:dep_id,to_date:to_date,from_date:from_date,short_leave_consider:short_leave_consider,no_short_leave:no_short_leave,no_late_coming:no_late_coming,late_coming_leave_consider:late_coming_leave_consider,no_early_goings:no_early_goings,early_going_consider_leave:early_going_consider_leave,csrf_token:$csrf_token},
			        async:false,
			        success: function(result) {	
			        	  add_loader();
			        $('.table-emp-attendance-record').html(result);
			        },
			        error:function(){
			        	swal(
						      'Error!',
						       "Sorry! No Record Found.",
						      'error'
							);

			        },
			        complete:function(){
				    	 remove_loader();
				    }
			    });

		return true;
    });

$(document).on('submit','.emp-application-history-form',function(e){
	e.preventDefault();
	var formData = new FormData(this);
	$form = $(this);
	$.ajax({
		    type:'POST',
		    url: $form.attr("action"),
		    data: formData,
		   	cache: false,
	        contentType: false,
	        processData: false,
		    beforeSend:function(){
		    	  add_loader();
		    },

		    success:function(response)
		    {
		    	$('.search-record').html(response);
		    },
		    error:function(msg){
		    	console.log(msg);
		    	 swal(
					      'Error!',
					      'error'
					 );
		    },
		    complete:function(){
		    	 remove_loader();
		    }
		});

	return false;

});
// $(document).on("click",".application_btn",function(){
// 	var emp_id = $('#app_emp_id').val();
// 	var app_from_date = $('#app_from_date').val();
// 	var app_to_date = $('#app_to_date').val();
// 	var leave_type_id = $('#leave_type_id').val();

// 	add_loader();
// 		$.ajax({
// 			        type: "POST",
// 			        url: $base_url+"/app/emp_leave_applications",
// 			        data: {emp_id:emp_id,app_to_date:app_to_date,from_date:from_date,leave_type_id:leave_type_id},
// 			        async:true,
// 			        success: function(result) {	
// 			        	$('.search-record').html(result);
// 			        },
// 			        error:function(){
// 			        	swal(
// 						      'Error!',
// 						       "Sorry! No Record Found.",
// 						      'error'
// 							);

// 			        },
// 			        complete:function(){
// 				    	 remove_loader();
// 				    }
// 			    });

// 		return true;
// });

$(document).on("click",".brnh_attendance_btn",function(){

	var brnh_id = $('#brnh_id').val();
	var from_date = $('#from_date').val();
	var to_date = $('#to_date').val();
	var no_late_coming = $('#on_no_late_comings').val();
	var late_coming_leave_consider = $('#late_coming_leave_consider').val();
	var no_early_goings = $('#on_no_early_goings').val();
	var early_going_consider_leave = $('#early_going_leave_consider').val();
	var no_short_leave = $('#on_no_of_short_leaves').val();
	var short_leave_consider = $('#short_leave_consdier').val();

        add_loader();
		$.ajax({
			        type: "POST",
			        url: $base_url+"/app/get_emp_for_brnh_attendance",
			        data: {brnh_id:brnh_id,to_date:to_date,from_date:from_date,short_leave_consider:short_leave_consider,no_short_leave:no_short_leave,no_late_coming:no_late_coming,late_coming_leave_consider:late_coming_leave_consider,no_early_goings:no_early_goings,early_going_consider_leave:early_going_consider_leave,csrf_token:$csrf_token},
			        async:false,
			        success: function(result) {	
			        $('.table-emp-attendance-record').html(result);
			        },
			        error:function(){
			        	swal(
						      'Error!',
						       "Sorry! No Record Found.",
						      'error'
							);

			        },
			        complete:function(){
				    	 remove_loader();
				    }
			    });

		return true;
    });

$(document).on('click', '.print-data', function () {
      var printContent = $('.table-emp-attendance-record').html();
      var dept_name = $("#dep_id").val();
      var start_date = $('.att_sheet_from_date').val();
      var to_date = $('.att_sheet_to_date').val();

      
        $.ajax({
              type:'POST',
              url: $base_url+"/app/get_printable_attendance_sheet",
              data: {dept_name:dept_name,start_date:start_date,to_date:to_date,html:printContent,csrf_token:$csrf_token},
               
              beforeSend:function(){
                  add_loader();
              },

              success:function(response)
              {
                var WinPrint = window.open('', '', 'width=900,height=650');
                WinPrint.document.write(response);
                WinPrint.document.close();
                WinPrint.focus();
                WinPrint.print();
                WinPrint.close();
              },
              error:function(msg){
                console.log(msg);
                 swal(
                      'Error!',
                      'error'
                 );
              },
              complete:function(){
                 remove_loader();
              }
        }); 
      }); 

$(document).on("click",".payscale_wise_attendance",function(){

	var payscale_id = $('#payscale_id').val();
	var inst_id = $('#inst_id').val();
	var brnh_id = $('#brnh_id').val();
	var from_date = $('#from_date').val();
	var to_date = $('#to_date').val();
	var report = $('#report').val(); 
	var saturday_sunday = $('#saturday_sunday').val()
	var report_type = $('#report_type').val();
	var no_late_coming = $('#on_no_late_comings').val();
	var late_coming_leave_consider = $('#late_coming_leave_consider').val();
	var no_early_goings = $('#on_no_early_goings').val();
	var early_going_consider_leave = $('#early_going_leave_consider').val();
	var no_short_leave = $('#on_no_of_short_leaves').val();
	var short_leave_consider = $('#short_leave_consdier').val();
	

        add_loader();
		$.ajax({
			        type: "POST",
			        url: $base_url+"/app/get_emp_pay_scale_attendance",
			        data: {saturday_sunday:saturday_sunday,report_type:report_type,inst_id:inst_id,brnh_id:brnh_id,report:report,payscale_id:payscale_id,to_date:to_date,from_date:from_date,short_leave_consider:short_leave_consider,no_short_leave:no_short_leave,no_late_coming:no_late_coming,late_coming_leave_consider:late_coming_leave_consider,no_early_goings:no_early_goings,early_going_consider_leave:early_going_consider_leave,csrf_token:$csrf_token},
			        async:false,
			        success: function(result) {	
			        $('.table-emp-attendance-record').html(result);
			        },
			        error:function(){
			        	swal(
						      'Error!',
						       "Sorry! No Record Found.",
						      'error'
							);

			        },
			        complete:function(){
				    	 remove_loader();
				    }
			    });

		return true;
});
	
$(document).on("click","#emp_profile_status",function(){
	$emp_id = $('#edit_record_id').val();
	$current_status = $(this).val();
	//alert($current_status);
	add_loader();
	$.ajax({
		type: "POST",
		url: $base_url+"/app/get_emp_profile_history",
		data: {emp_id:$emp_id, csrf_token:$csrf_token},
		async:false,
		success: function (result) {	
			$result = $.parseJSON(result);
			//console.log($result);
			$options = '';
			$options = '<h5>Profile Status Change</h5>' +
				'<hr>' +
				'<div class="col-md-6">' +
					'<div class="form-group">' +
						'<label class="form-label"><span class="required-label">*</span>Applicable Date</label>' +
						'<input type="text" class="form-control datepickers" data-language="en" data-date-format="yyyy-mm-dd" name="status_applicable_date" id="status_applicable_date" placeholder="Applicable Date">' +
					'</div>' +
				'</div>' +
				'<div class="col-md-12">' +
					'<div class="form-group">' +
						'<label class="form-label"><span class="required-label">*</span>Reason</label>' +
						'<textarea class="form-control" row="3" name="profile_status_reason" id="profile_status_reason" placeholder="Reason For Active OR Deactive"></textarea>' +
					'</div>' +
				'</div>';
			if(result != 'false'){
				if(result && result != ''){
					
							$options += '<div class="col-md-12"><hr></div>'+
							'<table class="table table-hover table-bordered mb-0 table-responsive">'+
								'<tr><td colspan="4"><h6 align="center">'+$result[0]['first_name']+' '+$result[0]['middle_name']+' '+$result[0]['last_name']+' Profile Status History</h6></td></tr>'+
								'<tr>' +
									'<th style="font-weight: 900;font-size: medium;">Profile Status</th>'+
									'<th style="font-weight: 900;font-size: medium;">Applicable Date</th>'+
									'<th style="font-weight: 900;font-size: medium;">Reason</th>'+
									'<th style="font-weight: 900;font-size: medium;">Date Added</th>'+
								'</tr>';
					$.each($result, function (key, record) {
						$options += '<tr>' +
										'<td>' + record.profile_status + '</td>' +
										'<td>' + record.applicable_date + '</td>' +
										'<td>' + record.reason + '</td>' +
										'<td>' + record.date_added + '</td>' +
									'</tr>';
					});
					$options += '</table>';
				}
			}

			$(".status-reason").html($options);
			$(".datepickers").datepicker({ 
				autoClose: true, 
				todayHighlight: true,
		 	 });
		},
		error:function(error){
			console.log(error);

		},
		complete:function(){
				remove_loader();
		}
	});

	return true;
});

$(document).on("click",".btn_att_update",function(e){

   $user_id = $('#USERID').val();
   $emp_id = $('#emp_id').val();
   $checkin = $('#checkin').val();
   $checkout = $('#checkout').val();

   			$.ajax({
				type:'POST',
				url: $base_url+'/app/update_emp_att_rec',
				data: {emp_id:$emp_id,att_user_id:$user_id,check_in_time:$checkin,check_out_time:$checkout,csrf_token:$csrf_token},
				 success: function(result) {
		            swal(
					      'Successful!',
					       "Record is Updated Successfully",
					      'success'
						);

		        	},
				error:function(msg){
					console.log(msg);
					 swal(
						  'Error!',
						  'error'
						 );
				}
			});
  
});

$(document).on("submit",".att-general-form",function(e){
	e.preventDefault();
	var formData = new FormData(this);
	$form = $(this);
	$.ajax({
			    type:'POST',
			    url: $(this).attr("action"),
			    data: formData,
			   	cache: false,
		        contentType: false,
		        processData: false,
			    beforeSend:function(){
			    	  add_loader();
			    },

			    success:function(response)
			    {

			    	if(response){
			    		//$result = $.parseJSON(response);
			    		$('.att_rec').html(response); 
			    		   
			    	}

			    },
			    error:function(msg){

			    	 swal(
						      'Error!',
						      'error'
						 );
			    },
			    complete:function(){
			    	 remove_loader();
			    }
			});

	return false;
})

$(document).on("click",".emp-att-search-btn",function(e){
	e.preventDefault();
	$dep_id = $('#dep_id').val();
	$emp_id = $('#amend_emp_id').val();
	$from_date = $('#amend_from_date').val();
	$to_date = $('#amend_to_date').val();
	$.ajax({
			    type:'POST',
			    url: $base_url+'/app/ammend_emp_attendance',
			    data: {csrf_token:$csrf_token,dep_id:$dep_id,emp_id:$emp_id,from_date:$from_date,to_date:$to_date},
	
			    beforeSend:function(){
			    	  add_loader();
			    },

			    success:function(response)
			    {

			    	if(response){
			    		//$result = $.parseJSON(response);
			    		$('.att_rec').html(response); 
			    		   
			    	}

			    },
			    error:function(msg){

			    	 swal(
						      'Error!',
						      'error'
						 );
			    },
			    complete:function(){
			    	 remove_loader();
			    }
			});

	return false;
});




$(document).on('change','.salary_increments_employees',function(){
	
	$val=$(this).val();
	fetch_salary_increments_employees($val);
	fetch_previous_salary_employees($val);
});

function fetch_salary_increments_employees($emp_id){
	if ($emp_id != '') {
		$.ajax({
			type:'POST',
			url: $base_url+'/app/fetch_salary_increments_employees',
			data: {id:$emp_id,csrf_token:$csrf_token},
			success:function(response)
				{
					$("#increment_his_employees").html(response);
				},
			error:function(msg){
				console.log(msg);
				swal(
					'Error!',
					'error'
					);
			}
		});
	}
}

function fetch_previous_salary_employees($emp_id){
	if ($emp_id != '') {
		$.ajax({
			type:'POST',
			url: $base_url+'/app/fetch_previous_salary_employees',
			data: {id:$emp_id,csrf_token:$csrf_token},
			success:function(response)
			{
				$("#previous-salary").html(response);
				$("#previous_salary").val(response);
			},
			error:function(msg){
				console.log(msg);
				swal(
					'Error!',
					'error'
				);
			}
		});
	}
}

$(document).on("click",".delete_salary_increment",function(){

	$data = $.parseJSON($(this).attr("data"));
	$record = $(this);
	swal({
        title: "Are you sure?",
        text: "You will not be able to recover this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ff5f28",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: true
    }, function(){

        add_loader();
		$.ajax({
			        type: "POST",
			        url: $base_url+"/app/delete_salary_record",
			        data: {table:$data.table,id:$data.id,csrf_token:$csrf_token},
			        async:false,
			        success: function(result) {
			           $($record).closest("#rec_"+$data.id).remove();
			        },
			        error:function(){
			        	swal(
						      'Error!',
						       "Sorry! Record can't be deleted.",
						      'error'
							);

			        },
			        complete: function(){
			        	remove_loader();
			        	toast_success_message('Success!',"Record is deleted successfully...");
			        }
			    });

		return true;
    });

	return false;
});

$(document).on('change','.employee_allowances_history',function(){
	
	$val=$(this).val();
	fetch_employee_allowances_history($val);
	//alert($val);
	
});

function fetch_employee_allowances_history($emp_id){
	if ($emp_id != '') {
		$.ajax({
			type:'POST',
			url: $base_url+'/app/fetch_employee_allowances_history',
			data: {id:$emp_id,csrf_token:$csrf_token},
			success:function(response)
				{
					$("#employee_allowances_history_div").html(response);
				},
			error:function(msg){
				console.log(msg);
				swal(
					'Error!',
					'error'
					);
			}
		});
	}
}


$(document).on("click",".delete_contract",function(){

	$data = $.parseJSON($(this).attr("data"));
	$record = $(this);
	swal({
        title: "Are you sure?",
        text: "You will not be able to recover this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ff5f28",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: true
    }, function(){

        add_loader();
		$.ajax({
			        type: "POST",
			        url: $base_url+"/app/delete_contract_record",
			        data: {table:$data.table,id:$data.id,csrf_token:$csrf_token},
			        async:false,
			        success: function(result) {
			           $($record).closest("#rec_"+$data.id).remove();
			        },
			        error:function(){
			        	swal(
							  
							'Error!',
						    "Sorry! Record can't be deleted.",
						    'error'
						);
			        },
			        complete: function(){
			        	remove_loader();
			        	toast_success_message('Success!',"Record is deleted successfully...");
			        }
			    });

		return true;
    });

	return false;
});

	