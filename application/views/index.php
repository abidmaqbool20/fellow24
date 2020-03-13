<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Frest admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Frest admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Fellow24</title>
    <link rel="apple-touch-icon" href="<?= APP_ASSETS ?>/images/ico/apple-icon-120.html">
    <link rel="shortcut icon" type="image/x-icon" href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/<?= APP_ASSETS ?>/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">
    <!-- BEGIN: Vendor CSS-->
    <link href='http://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="<?= APP_ASSETS ?>/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?= APP_ASSETS ?>/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="<?= APP_ASSETS ?>/vendors/css/extensions/dragula.min.css">
    <!-- END: Vendor CSS-->
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?= APP_ASSETS ?>/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= APP_ASSETS ?>/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="<?= APP_ASSETS ?>/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="<?= APP_ASSETS ?>/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="<?= APP_ASSETS ?>/css/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="<?= APP_ASSETS ?>/css/themes/semi-dark-layout.min.css">
    <!-- END: Theme CSS-->
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?= APP_ASSETS ?>/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="<?= APP_ASSETS ?>/css/pages/dashboard-analytics.min.css">
    <!-- END: Page CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->
  </head>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern boxicon-layout no-card-shadow 1-column  navbar-sticky footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row"> </div>
        <div class="content-body">
          <section id="auth-login" class="row flexbox-container">
            <div class="col-xl-8 col-11">
              <div class="card bg-authentication mb-0">
                <div class="row m-0">
                  <!-- left section-login -->
                  <div class="col-md-6 col-12 px-0">
                    <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                      <div class="card-header pb-1">
                        <div class="card-title">
                          <h4 class="text-center mb-2">Welcome Back</h4>
                        </div>
                      </div>
                      <div class="card-content">
                        <div class="card-body"> 
                          <?php  if($this->session->flashdata('message')){  ?>  
                          <div class="alert alert-danger alert-dismissible mb-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                            <div class="d-flex align-items-center">
                              <i class="bx bx-error"></i>
                              <span>
                                <?= $this->session->flashdata('message'); ?>
                              </span>
                            </div>
                          </div>
                          <?php } ?>
                          <div class="divider">
                            <div class="divider-text text-uppercase text-muted"><small>login with
                              email</small>
                            </div>
                          </div>
                          <form method="post" action="<?= base_url('auth/login-validation'); ?>" >
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                            <div class="form-group mb-50">
                              <label class="text-bold-600" >Email address</label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="Email address">
                            </div>
                            <div class="form-group">
                              <label class="text-bold-600">Password</label>
                              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                            <div
                              class="form-group d-flex flex-md-row flex-column justify-content-between align-items-center">
                              <div class="text-left">
                                <div class="checkbox checkbox-sm">
                                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                  <label class="checkboxsmall" for="exampleCheck1"><small>Keep me logged
                                  in</small></label>
                                </div>
                              </div>
                              <div class="text-right"><a href="auth-forgot-password.html"
                              class="card-link"><small>Forgot Password?</small></a></div>
                            </div>
                            <button type="submit" class="btn btn-primary glow w-100 position-relative">Login<i
                            id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                          </form>
                          <hr>
                          <div class="text-center"><small class="mr-25">Don't have an account?</small><a
                          href="auth-register.html"><small>Sign up</small></a></div>
                        </div>
                      </div>
                    </div>
                  </div> 
                  <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
                    <div class="card-content">
                      <img class="img-fluid" src="<?= APP_ASSETS ?>/images/pages/login.png" alt="branding logo">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </section>
          </div>
        </div>
      </div>
    
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <script src="<?= APP_ASSETS ?>/vendors/js/vendors.min.js"></script>
    <script src="<?= APP_ASSETS ?>/fonts/LivIconsEvo/js/LivIconsEvo.tools.min.js"></script>
    <script src="<?= APP_ASSETS ?>/fonts/LivIconsEvo/js/LivIconsEvo.defaults.min.js"></script>
    <script src="<?= APP_ASSETS ?>/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
    <!-- BEGIN Vendor JS-->
    <!-- BEGIN: Page Vendor JS-->
    <script src="<?= APP_ASSETS ?>/vendors/js/charts/apexcharts.min.js"></script>
    <script src="<?= APP_ASSETS ?>/vendors/js/extensions/dragula.min.js"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Theme JS-->
    <script src="<?= APP_ASSETS ?>/js/core/app-menu.min.js"></script>
    <script src="<?= APP_ASSETS ?>/js/core/app.min.js"></script>
    <script src="<?= APP_ASSETS ?>/js/scripts/components.min.js"></script>
    <script src="<?= APP_ASSETS ?>/js/scripts/footer.min.js"></script>
    <script src="<?= APP_ASSETS ?>/js/scripts/customizer.min.js"></script>
    <!-- END: Theme JS-->
    <!-- BEGIN: Page JS-->
    <script src="<?= APP_ASSETS ?>/js/scripts/pages/dashboard-analytics.min.js"></script>
    <script src="http://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
    <!-- END: Page JS-->
  </body>
</html>