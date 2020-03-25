<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
   <div class="navbar-header">
      <ul class="nav navbar-nav flex-row">
         <li class="nav-item hover-style mr-auto">
            <a class="navbar-brand" href="dashboard.php">
               <div class="brand-logo"><img class="logo" src="<?= APP_ASSETS ?>/images/logo/logo.png"/></div>
               <h2 class="brand-text mb-0">Fellow24</h2>
            </a>
         </li>
         <li class="nav-item hover-style nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="bx bx-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="bx-disc"></i></a></li>
      </ul>
   </div>
   <div class="shadow-bottom"></div>
   <div class="main-menu-content">
      <ul class="navigation navigation-main app-sidebar"  >
         <li class="nav-item hover-style">
            <a href="javascript:;" >
               <i class="bx bx-home-alt"></i>
               <span class="menu-title" data-i18n="Dashboard">Dashboard</span>
               <span class="badge badge-light-danger badge-pill badge-round float-right mr-2">2</span>
            </a>
            <ul class="">
               <li class="clickable">
                  <a href="javascript:;" data="<?php echo get_json(array('id'=>'0','view'=>'dashboard')); ?>">
                     <i class="bx bx-right-arrow-alt"></i>
                     <span class="menu-item" data-i18n="eCommerce">eCommerce</span>
                  </a>
               </li>
               <li class="clickable">
                  <a href="javascript:;" data="<?php echo get_json(array('id'=>'0','view'=>'dashboard')); ?>">
                     <i class="bx bx-right-arrow-alt"></i>
                     <span class="menu-item" data-i18n="Analytics">Analytics</span>
                  </a>
               </li>
            </ul>
         </li>

         <li class=" navigation-header"><span>System Defaults</span></li> 
         <li class="nav-item hover-style">
            <a href="#"><i class="bx bx-user"></i><span class="menu-title" data-i18n="HR">HR</span></a>
            <ul class="">
               <li class="clickable" ><a href="javascript:;"  data="<?php echo get_json(array('id'=>'0','view'=>'employees-table-view','type'=>'table')); ?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Invoice List">Employees</span></a></li>
               <li class="clickable"><a href="javascript:;" data="<?php echo get_json(array('id'=>'0','view'=>'designations-table-view')); ?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Invoice">Designations</span></a></li>
               <li class="clickable"><a href="javascript:;" data="<?php echo get_json(array('id'=>'0','view'=>'departments-table-view')); ?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Invoice Edit">Departments</span></a></li>
               <li class="clickable"><a href="javascript:;" data="<?php echo get_json(array('id'=>'0','view'=>'pay-scales-table-view')); ?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Invoice Add">Pay-Scales</span></a></li>
               <li class="clickable"><a href="javascript:;" data="<?php echo get_json(array('id'=>'0','view'=>'roles-table-view')); ?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Invoice Add">Roles</span></a></li>
               <li class="clickable"><a href="javascript:;" data="<?php echo get_json(array('id'=>'0','view'=>'organizations-table-view')); ?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Invoice Add">Organizations</span></a></li>
            </ul>
         </li>
          <li class=" navigation-header"><span>Sales</span></li> 
         <li class="nav-item hover-style">
            <a href="#"><i class="bx bx-file"></i><span class="menu-title" data-i18n="HR">Campaigns</span></a>
            <ul class="">
               <li class="clickable" ><a href="javascript:;"  data="<?php echo get_json(array('id'=>'0','view'=>'campaigns-table-view','type'=>'table')); ?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Invoice List">Manage Campaigns</span></a></li>
                <li class="clickable" ><a href="javascript:;"  data="<?php echo get_json(array('id'=>'0','view'=>'opportunities-table-view','type'=>'table')); ?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Invoice List">Opportunities</span></a></li>
               <li><a href="designations.php"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Invoice"></span></a></li>
               <li><a href="departments.php"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Invoice Edit">Departments</span></a></li>
               <li><a href="payscales.php"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Invoice Add">Payscales</span></a></li>
            </ul>
         </li>
          
          
      </ul>
   </div>
</div>