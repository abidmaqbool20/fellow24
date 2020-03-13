<div class="page-body-modal-window">
    <div class="card shadow-none quill-wrapper">
      <div class="card-header d-flex justify-content-between align-items-center border-bottom px-2 py-1">
        <h3 class="card-title">UI Design</h3>
        <button type="button" class="close close-icon close-modal">
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
        </div>

<!-- END: Footer-->
<!-- BEGIN: Vendor JS-->
<script src="app-assets/vendors/js/vendors.min.js"></script>
<script src="app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.min.js"></script>
<script src="app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.min.js"></script>
<script src="app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>


<script src="app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
<script src="app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
<script src="app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
<script src="app-assets/vendors/js/tables/datatable/responsive.bootstrap.min.js"></script>

 

<script src="app-assets/vendors/js/jkanban/jkanban.min.js"></script>
<script src="app-assets/vendors/js/editors/quill/quill.min.js"></script>
<script src="app-assets/vendors/js/pickers/pickadate/picker.js"></script>
<script src="app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>

 
<!-- BEGIN Vendor JS-->
<!-- BEGIN: Page Vendor JS-->
<script src="app-assets/vendors/js/charts/apexcharts.min.js"></script>
<script src="app-assets/vendors/js/extensions/dragula.min.js"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="app-assets/js/core/app-menu.min.js"></script>
<script src="app-assets/js/core/app.min.js"></script>
<script src="app-assets/js/scripts/components.min.js"></script>
<script src="app-assets/js/scripts/footer.min.js"></script>
<script src="app-assets/js/scripts/customizer.min.js"></script>
<!-- END: Theme JS-->
<!-- BEGIN: Page JS-->
<script src="app-assets/js/scripts/pages/dashboard-analytics.min.js"></script>
<script src="http://unpkg.com/boxicons@latest/dist/boxicons.js"></script>

<script type="text/javascript">
    $(document).on('click','.open-modal',function(){
        $(".page-overlay").addClass("show");
        $(".page-body-modal-window").addClass("show");
    });
    $(document).on('click','.close-modal',function(){
        $(".page-overlay").removeClass("show");
        $(".page-body-modal-window").removeClass("show");
    });

    $(document).on('click','.close-modal',function(){
        $(".page-overlay").removeClass("show");
        $(".page-body-modal-window").removeClass("show");
    });
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

    
</script>
<!-- END: Page JS-->
</body>

</html>