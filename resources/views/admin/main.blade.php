<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel CMS | </title>

    <!-- Bootstrap -->
    <link href="{{asset('lcw/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('lcw/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('lcw/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('lcw/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{asset('lcw/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('lcw/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('lcw/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{asset('lcw/build/css/custom.min.css')}}" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>Laravel CMS</span></a>
                </div>
                <div class="clearfix"></div>
                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic"></div>
                    <div style="margin-left:35px;text-align: center" class="profile_info">
                        <span>Welcome,</span>
                        <h2>{{auth()->user()->name}}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->
                <br />
                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li>
                                <a href="{{route('name_admin.main')}}"><i class="fa fa-home"></i>Ana Sayfa</a>
                            </li>
                            <li><a><i class="fa fa-edit"></i> Kategori <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('name_list_category')}}">Kategori Listesi</a></li>
                                    <li><a><i class="fa fa-edit"></i> Kategori Ekle <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('name_add.main.menu')}}">Ana Kategori Ekle</a></li>
                                            <li><a href="{{route('name_add.sub.cate1')}}">Alt Kategori 1 Ekle</a></li>
                                            <li><a href="{{route('name_select_main_cate')}}">Alt Kategori 2 Ekle</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-desktop"></i> Özellik <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('name_get_list')}}">Özellik Listesi</a></li>
                                    <li><a><i class="fa fa-desktop"></i> Özellik Ekle<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('name_add_main_property')}}">Ana Özellik Ekle</a></li>
                                            <li><a href="{{route('name_add.sub.property')}}">Alt Özellik Ekle</a></li>
                                            <li><a href="{{route('name_add.property.to.category')}}">Kategoriye Özellik Ekle</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-desktop"></i> Ürün <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('product.listController.getProductList')}}">Ürün Listesi</a></li>
                                    <li><a href="{{route('name_product.main.controller')}}">Ürün Ekle</a></li>
                                    <li><a href="{{route('product.addProperty.selectCategories')}}">Ürüne Özellik Ekle</a></li>
                                    <li><a href="{{route('product.addPrice.selectCategory')}}">Ürüne Fiyat Ekle</a></li>
                                </ul>
                            </li>

                            <li><a><i class="fa fa-desktop"></i> Roller <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('role.roleController')}}">Rol Listesi</a></li>
                                    <li><a href="{{route('role.roleController.getUserRoleList')}}">Kullanıcı-Rol</a></li>
                                    <li><a href="{{route('role.roleController.createRole')}}">Rol Ekle</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="menu_section">
                        <ul class="nav side-menu">
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->
                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="#">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                {{auth()->user()->name}}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="{{route('logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
            @yield('content');
            Ana Sayfa :D
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
            <div class="pull-right"></div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="{{asset('lcw/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('lcw/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('lcw/vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{asset('lcw/vendors/nprogress/nprogress.js')}}"></script>
<!-- Chart.js -->
<script src="{{asset('lcw/vendors/Chart.js/dist/Chart.min.js')}}"></script>
<!-- gauge.js -->
<script src="{{asset('lcw/vendors/gauge.js/dist/gauge.min.js')}}"></script>
<!-- bootstrap-progressbar -->
<script src="{{asset('lcw/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('lcw/vendors/iCheck/icheck.min.js')}}"></script>
<!-- Skycons -->
<script src="{{asset('lcw/vendors/skycons/skycons.js')}}"></script>
<!-- Flot -->
<script src="{{asset('lcw/vendors/Flot/jquery.flot.js')}}"></script>
<script src="{{asset('lcw/vendors/Flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('lcw/vendors/Flot/jquery.flot.time.js')}}"></script>
<script src="{{asset('lcw/vendors/Flot/jquery.flot.stack.js')}}"></script>
<script src="{{asset('lcw/vendors/Flot/jquery.flot.resize.js')}}"></script>
<!-- Flot plugins -->
<script src="{{asset('lcw/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
<script src="{{asset('lcw/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
<script src="{{asset('lcw/vendors/flot.curvedlines/curvedLines.js')}}"></script>
<!-- DateJS -->
<script src="{{asset('lcw/vendors/DateJS/build/date.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('lcw/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
<script src="{{asset('lcw/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
<script src="{{asset('lcw/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{asset('lcw/vendors/moment/min/moment.min.js')}}"></script>
<script src="{{asset('lcw/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- Custom Theme Scripts -->
<script src="{{asset('lcw/build/js/custom.min.js')}}"></script>
@yield('scripts')
</body>
</html>
