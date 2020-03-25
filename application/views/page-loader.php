 
<div class="page-loader">
	<?php  $this->load->view("dashboard"); ?>
</div>
 

 
<div class="page-body-modal-window cus-model-window model-first"> 
  <div class="model-content">
    
  </div>
</div>


<?php
 $theme_font_color = '#fff';
 $theme_color = '#306750';
 $link_color = '#fdac41';
?>
<style>
.card-view .card h4{
    color : <?= $theme_color ;?> !important;
}
.card-view .card h4 a{
    color : <?= $theme_color ;?> !important;
}

.card-view .card h4 a:hover{
    color : <?= $link_color ;?> !important;
}

.btn-theme{
	background-color: <?=$theme_color ;?>;
	color: <?=$theme_font_color ;?>;
}
.navbar-wrapper {
    background: <?=$theme_color ;?>;
}
.pagination .page-item.active .page-link, .pagination .page-item.active .page-link:hover{
	background-color: <?=$theme_color ;?> !important;
	color: <?=$theme_font_color ;?> !important;
}
.breadcrumb-item.active {
	color: <?=$theme_color ;?> !important;
}
.btn.active{
	color: <?=$theme_font_color ;?> !important;
	background-color: <?=$theme_color ;?> !important;
	border: 1px solid <?=$theme_color ;?> !important;
}
.pagination .page-item.first .page-link, .pagination .page-item.last .page-link, .pagination .page-item.next .page-link, .pagination .page-item.previous .page-link{
	color: <?= $theme_color ;?> !important;
}

.theme-switch .custom-control-input:checked~.custom-control-label::before{
	background-color: <?=$theme_color ;?> !important;	
}
.checkbox.theme-checkbox input:checked~label::before, .checkbox.radio-success input:checked~label::before, .radio.theme-checkbox input:checked~label::before, .radio.radio-success input:checked~label::before{
	background-color: <?=$theme_color ;?> !important;
	/* border: 1px solid <?=$theme_color ;?> !important; */	

}
.checkbox.theme-checkbox input:checked~label:after{
	 border-color: <?=$theme_font_color ;?> !important;  
}
a{
	color: <?= $theme_color; ?> !important;
}
a:hover{
	color: <?= $link_color; ?> !important;
}

.main-menu.menu-light .navigation>li.nav-item.open>a i, .main-menu.menu-light .navigation>li.nav-item.sidebar-group-active>a i {
    color: <?= $link_color; ?> !important;
}

</style>