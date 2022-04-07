  <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> HR System  </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
     <link rel="icon" type="image/x-icon" href="<?= base_url('uploads/logo-mini.png') ?>">
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <!-- Ionicons 2.0.0 -->
    <link href="<?php echo base_url(); ?>assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css" />
    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>assets/css/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fontawesome.all.min.css"> -->
    <style>
    	.error{
    		color:red;
    		font-weight: normal;
    	}
    </style>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script> -->

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <!--  <script>tinymce.init({ selector:'textarea#description' });</script> -->

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url('home'); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini" style="background: #fff"> <img style="width: 35px;" src="<?= base_url('uploads/logo-mini.png') ?>"> </span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg" style="background: #fff;color:#000"> <img src="<?= base_url('uploads/logo1.png') ?>"> </span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class=" tasks-menu">
              <i class="fa fa-bars toggle_menu" style="font-size: 20px; color: #fff; position: absolute; top: 15px; left: 10px; cursor: pointer; display: none;"></i>           
              </li>
              <li class=" tasks-menu">
                <a href="<?= base_url('profile') ?>"  aria-expanded="true">
                <b> John Lim </b>
                </a>               
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class=" user user-menu">
                <a href="<?= base_url('changepassword') ?>" >
                 <b> Change Password </b>
                  <span class="hidden-xs"> </span>
                </a>
              </li>
               <li class=" user user-menu">
                <a href="<?= base_url() ?>">
                  <b> Log Out </b>
                  <span class="hidden-xs"> </span>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li>
            <a href="#" class="sidebar-toggle left-right" data-toggle="push-menu" role="button">
            <i class="fa  fa-long-arrow-left"></i>
          </a>
          <script type="text/javascript">
            $('.left-right').click(function(){
                $(this).find('i').toggleClass('fa-long-arrow-left fa-long-arrow-right')
            });
          </script>
            </li>
            <li>
              <a href="<?php echo base_url('home'); ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
              <li>
              <a href="<?php echo base_url(); ?>companyprofile">
                <i class="fa fa-building-o"></i>
                <span>Company Profile</span>
              </a>
            </li>
			      <li>
              <a href="<?php echo base_url(); ?>employees">
                <i class="fa fa-users"></i>
                <span>Employees</span>
              </a>
            </li>
           <li>
              <a href="<?php echo base_url(); ?>payroll">
                <i class="fa fa-money"></i>
                <span>Payroll</span>
              </a>
            </li>         
            <li>
              <a href="<?php echo base_url(); ?>feedback">
                <i class="fa fa-comments-o"></i>
                <span>Feedback</span>
              </a>
            </li>
             <li>
              <a href="<?php echo base_url(); ?>monthlyaccounts">
                <i class="fa fa-credit-card"></i>
                <span>Monthly Accounts</span>
              </a>
            </li>
          </ul>
            
        </section>
        <!-- /.sidebar -->
      </aside>

      <style type="text/css">
          .skin-blue .main-header .logo:hover {
            background-color: #fff !important;
          }
          .skin-blue .main-header .logo {
            background-color: #fff !important;
          }
          .main-header .logo .logo-lg {
            display: block;
            width: 140px;
          }
          table thead{
            background-color: #222d32;
            color: #FFF;
          }

          @media only screen and (max-width: 767px){
            .toggle_menu{
              display: block !important;
            }
            .main-sidebar{
              display: none;
            }
          }

      </style>

      <script>
        $(document).ready(function(){
          $(".toggle_menu").click(function(){
            $(".main-sidebar").toggle();
          });
        });
      </script>