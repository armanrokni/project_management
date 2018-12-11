<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link href="{{asset('')}}public/adminPanel/assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="{{asset('')}}public/adminPanel/assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" />
        <link href="{{asset('')}}public/adminPanel/assets/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="{{asset('')}}public/adminPanel/assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('')}}public/adminPanel/assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
        <link href="{{asset('')}}public/adminPanel/assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />


        <link rel="shortcut icon" href="{{asset('public/adminPanel/assets/images/favicon_1.ico')}}">

        <link rel="stylesheet" href="{{asset('public/adminPanel/assets/plugins/magnific-popup/css/magnific-popup.css')}}" />
        <link rel="stylesheet" href="{{asset('public/adminPanel/assets/plugins/jquery-datatables-editable/datatables.css')}}" />

        <title></title>

        <link href="{{asset('')}}public/adminPanel/assets/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('')}}public/adminPanel/assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('')}}public/adminPanel/assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('')}}public/adminPanel/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('')}}public/adminPanel/assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('')}}public/adminPanel/assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="{{asset('')}}public/adminPanel/assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left topbar-left-sm">
                    <div class="text-center">
                        <a href="index.html" class="logo"><i class="icon-magnet icon-c-logo"></i><img style="height:40px;" src="{{asset("")}}public/adminPanel/logo/avand logo.png"></a>
                        <!-- Image Logo here -->
                        <!--<a href="index.html" class="logo">-->
                            <!--<i class="icon-c-logo"> <img src="assets/images/logo_sm.png" height="42"/> </i>-->
                            <!--<span><img src="assets/images/logo_light.png" height="20"/></span>-->
                        <!--</a>-->
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left waves-effect waves-light">
                                    <i class="md md-menu"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>






                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown top-menu-item-xs">
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        <i class="icon-bell"></i> <span class="badge badge-xs badge-danger">3</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="notifi-title"><span class="label label-default pull-right">New 3</span>Notification</li>
                                        <li class="list-group slimscroll-noti notification-list">
                                           <!-- list item-->
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left p-r-10">
                                                    <em class="fa fa-diamond noti-primary"></em>
                                                 </div>
                                                 <div class="media-body">
                                                    <h5 class="media-heading">A new order has been placed A new order has been placed</h5>
                                                    <p class="m-0">
                                                        <small>There are new settings available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>

                                           <!-- list item-->
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left p-r-10">
                                                    <em class="fa fa-cog noti-warning"></em>
                                                 </div>
                                                 <div class="media-body">
                                                    <h5 class="media-heading">New settings</h5>
                                                    <p class="m-0">
                                                        <small>There are new settings available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>

                                           <!-- list item-->
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left p-r-10">
                                                    <em class="fa fa-bell-o noti-custom"></em>
                                                 </div>
                                                 <div class="media-body">
                                                    <h5 class="media-heading">Updates</h5>
                                                    <p class="m-0">
                                                        <small>There are <span class="text-primary font-600">2</span> new updates available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>

                                           <!-- list item-->
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left p-r-10">
                                                    <em class="fa fa-user-plus noti-pink"></em>
                                                 </div>
                                                 <div class="media-body">
                                                    <h5 class="media-heading">New user registered</h5>
                                                    <p class="m-0">
                                                        <small>You have 10 unread messages</small>
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>

                                            <!-- list item-->
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left p-r-10">
                                                    <em class="fa fa-diamond noti-primary"></em>
                                                 </div>
                                                 <div class="media-body">
                                                    <h5 class="media-heading">A new order has been placed A new order has been placed</h5>
                                                    <p class="m-0">
                                                        <small>There are new settings available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>

                                           <!-- list item-->
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left p-r-10">
                                                    <em class="fa fa-cog noti-warning"></em>
                                                 </div>
                                                 <div class="media-body">
                                                    <h5 class="media-heading">New settings</h5>
                                                    <p class="m-0">
                                                        <small>There are new settings available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="list-group-item text-right">
                                                <small class="font-600">See all notifications</small>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="far fa-comments"></i></a>
                                </li>
                                <li class="dropdown top-menu-item-xs">
                                    <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img src="{{url('public').'/'.\Auth()->user()->avatar}}" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)"><i class="ti-user m-r-10 text-custom"></i> Profile</a></li>
                                        <li><a href="javascript:void(0)"><i class="ti-settings m-r-10 text-custom"></i> Settings</a></li>
                                        <li><a href="javascript:void(0)"><i class="ti-lock m-r-10 text-custom"></i> Lock screen</a></li>
                                        <li class="divider"></li>
                                        <li><a href="{{url('logout')}}"><i class="ti-power-off m-r-10 text-danger"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu side-menu-sm">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>

                        	<li class="text-muted menu-title">Navigation</li>

                            <li class="has_sub">
                                <a href="{{url('/')}}" class="waves-effect"><i class="fa fa-home"></i> <span> Dashboard </span> </a>

                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-project-diagram"></i> <span>projects</span>  </a>
                                <ul class="list-unstyled">
                                    <li><a href="ui-buttons.html">submenue</a></li>
                                    <li><a href="ui-loading-buttons.html">submenue</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-cog"></i><span> technologies </span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="components-grid.html">submenue</a></li>
                                    <li><a href="components-widgets.html">submenue</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-users"></i> <span> users </span>  </a>
                                <ul class="list-unstyled">
                                	<li><a href="{{url('admin/users/insert')}}">افزودن</a></li>
                                  <li><a href="{{url('admin/users')}}">همه کاربران</a></li>
                                  <li><a href="{{url('profile')}}">پروفایل</a></li>
                                </ul>
                            </li>



                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="btn-group pull-right m-t-15">

                                    <ul class="dropdown-menu drop-menu-right" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>

                            </div>
                            <div class="col-sm-12">
                                @yield('content')
                            </div>
                        </div>

                        <div style="min-height: 1000px;"></div>



                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    © 2016. All rights reserved.
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <div class="side-bar right-bar nicescroll">
                <h4 class="text-center">Chat</h4>
                <div class="contact-list nicescroll">
                    <ul class="list-group contacts-list">
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="{{asset('')}}public/adminPanel/assets/images/users/avatar-1.jpg" alt="">
                                </div>
                                <span class="name">Chadengle</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="{{asset('')}}public/adminPanel/assets/images/users/avatar-2.jpg" alt="">
                                </div>
                                <span class="name">Tomaslau</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="{{asset('')}}public/adminPanel/assets/images/users/avatar-3.jpg" alt="">
                                </div>
                                <span class="name">Stillnotdavid</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="{{asset('')}}public/adminPanel/assets/images/users/avatar-4.jpg" alt="">
                                </div>
                                <span class="name">Kurafire</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="{{asset('')}}public/adminPanel/assets/images/users/avatar-5.jpg" alt="">
                                </div>
                                <span class="name">Shahedk</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="{{asset('')}}public/adminPanel/assets/images/users/avatar-6.jpg" alt="">
                                </div>
                                <span class="name">Adhamdannaway</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="{{asset('')}}public/adminPanel/assets/images/users/avatar-7.jpg" alt="">
                                </div>
                                <span class="name">Ok</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="{{asset('')}}public/adminPanel/assets/images/users/avatar-8.jpg" alt="">
                                </div>
                                <span class="name">Arashasghari</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="{{asset('')}}public/adminPanel/assets/images/users/avatar-9.jpg" alt="">
                                </div>
                                <span class="name">Joshaustin</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="{{asset('')}}public/adminPanel/assets/images/users/avatar-10.jpg" alt="">
                                </div>
                                <span class="name">Sortino</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{asset('')}}public/adminPanel/assets/js/jquery.min.js"></script>
        <script src="{{asset('')}}public/adminPanel/assets/js/bootstrap-rtl.min.js"></script>
        <script src="{{asset('')}}public/adminPanel/assets/js/detect.js"></script>
        <script src="{{asset('')}}public/adminPanel/assets/js/fastclick.js"></script>
        <script src="{{asset('')}}public/adminPanel/assets/js/jquery.slimscroll.js"></script>
        <script src="{{asset('')}}public/adminPanel/assets/js/jquery.blockUI.js"></script>
        <script src="{{asset('')}}public/adminPanel/assets/js/waves.js"></script>
        <script src="{{asset('')}}public/adminPanel/assets/js/wow.min.js"></script>
        <script src="{{asset('')}}public/adminPanel/assets/js/jquery.nicescroll.js"></script>
        <script src="{{asset('')}}public/adminPanel/assets/js/jquery.scrollTo.min.js"></script>

        <script src="{{asset('')}}public/adminPanel/assets/plugins/tiny-editable/mindmup-editabletable.js"></script>
        <script src="{{asset('')}}public/adminPanel/assets/pages/datatables.editable.init.js"></script>
        <script src="{{asset('')}}public/adminPanel/assets/plugins/magnific-popup/js/jquery.magnific-popup.min.js"></script>
        <script src="{{asset('')}}public/adminPanel/assets/plugins/tiny-editable/numeric-input-example.js"></script>
        <script src="{{asset('')}}public/adminPanel/assets/plugins/jquery-datatables-editable/jquery.dataTables.js"></script>
  	    <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>

        <script src="{{asset('')}}public/adminPanel/assets/js/jquery.core.js"></script>
        <script src="{{asset('')}}public/adminPanel/assets/js/jquery.app.js"></script>

        <script type="text/javascript" src="{{asset('')}}public/adminPanel/assets/pages/jquery.form-advanced.init.js"></script>
        <script src="{{asset('')}}public/adminPanel/assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
        <script src="{{asset('')}}public/adminPanel/assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
        <script src="{{asset('')}}public/adminPanel/assets/plugins/switchery/js/switchery.min.js"></script>
        <script type="text/javascript" src="{{asset('')}}public/adminPanel/assets/plugins/multiselect/js/jquery.multi-select.js"></script>
        <script type="text/javascript" src="{{asset('')}}public/adminPanel/assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
        <script src="{{asset('')}}public/adminPanel/assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
        <script src="{{asset('')}}public/adminPanel/assets/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
        <script src="{{asset('')}}public/adminPanel/assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
        <script src="{{asset('')}}public/adminPanel/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>

        <script type="text/javascript" src="{{asset('')}}public/adminPanel/assets/plugins/autocomplete/jquery.mockjax.js"></script>
        <script type="text/javascript" src="{{asset('')}}public/adminPanel/assets/plugins/autocomplete/jquery.autocomplete.min.js"></script>
        <script type="text/javascript" src="{{asset('')}}public/adminPanel/assets/plugins/autocomplete/countries.js"></script>
        <script type="text/javascript" src="{{asset('')}}public/adminPanel/assets/pages/autocomplete.js"></script>
        <script>
  			$('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();

  		</script>
    </body>
</html>
