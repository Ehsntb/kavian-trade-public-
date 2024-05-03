<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="فروشگاه محصولات شمال">
    <meta name="keywords" content="ازگیل شاپ">
    <meta name="author" content="حسین محمدزاده">
    <link rel="icon" href="{{ $appAzgilInfo->logo }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ $appAzgilInfo->logo }}" type="image/x-icon">
    <title>پنل ادمین - ازگیل شاپ</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="/NewAdmin/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="/NewAdmin/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="/NewAdmin/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="/NewAdmin/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="/NewAdmin/css/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="/NewAdmin/css/prism.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="/NewAdmin/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="/NewAdmin/css/style.css">
    <link id="color" rel="stylesheet" href="/NewAdmin/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="/NewAdmin/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="/NewAdmin/css/select2.css">

    <style>
        body {
            direction: rtl !important;
            font-family: 'B Yekan', sans-serif !important;
            font-size: 16px;
        }

        .border-radius {
            border-radius: 15px;
        }
    </style>
    @livewireStyles
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="rtl">
<!-- Loader starts-->
<div class="loader-wrapper">
    <div class="theme-loader">
        <div class="loader-p"></div>
    </div>
</div>
<!-- Loader ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    <div class="page-main-header">
        <div class="main-header-right row m-0">
            <div class="main-header-left">
                <div class="logo-wrapper"><a href="/admin"><img class="img-fluid" src="{{ $appAzgilInfo->logo }}" alt="" height="23" width="80"></a></div>
                <div class="dark-logo-wrapper"><a href="/admin"><img class="img-fluid" src="{{ $appAzgilInfo->logo }}" alt="" height="20" width="70"></a></div>
                <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i></div>
            </div>
            <div class="nav-right col pull-right right-menu p-0">
                <ul class="nav-menus">
                    <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
                    <li class="onhover-dropdown">
                        <div class="bookmark-box"><i data-feather="star"></i></div>
                        <div class="bookmark-dropdown onhover-show-div">
                            <div class="form-group mb-0">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-search"></i></span></div>
                                    <input class="form-control" type="text" placeholder="Search for bookmark...">
                                </div>
                            </div>
                            <ul class="m-t-5">
                                <li class="add-to-bookmark"><i class="bookmark-icon" data-feather="inbox"></i>Email<span class="pull-right"><i data-feather="star"></i></span></li>
                                <li class="add-to-bookmark"><i class="bookmark-icon" data-feather="message-square"></i>Chat<span class="pull-right"><i data-feather="star"></i></span></li>
                                <li class="add-to-bookmark"><i class="bookmark-icon" data-feather="command"></i>Feather Icon<span class="pull-right"><i data-feather="star"></i></span></li>
                                <li class="add-to-bookmark"><i class="bookmark-icon" data-feather="airplay"></i>Widgets<span class="pull-right"><i data-feather="star">   </i></span></li>
                            </ul>
                        </div>
                    </li>
                    <li class="onhover-dropdown">
                        <div class="notification-box"><i data-feather="bell"></i><span class="dot-animated"></span></div>
                        <ul class="notification-dropdown onhover-show-div">
                            <li>
                                <p class="f-w-700 mb-0">You have 3 Notifications<span class="pull-right badge badge-primary badge-pill">4</span></p>
                            </li>
                            <li class="noti-primary">
                                <div class="media"><span class="notification-bg bg-light-primary"><i data-feather="activity"> </i></span>
                                    <div class="media-body">
                                        <p>Delivery processing </p><span>10 minutes ago</span>
                                    </div>
                                </div>
                            </li>
                            <li class="noti-secondary">
                                <div class="media"><span class="notification-bg bg-light-secondary"><i data-feather="check-circle"> </i></span>
                                    <div class="media-body">
                                        <p>Order Complete</p><span>1 hour ago</span>
                                    </div>
                                </div>
                            </li>
                            <li class="noti-success">
                                <div class="media"><span class="notification-bg bg-light-success"><i data-feather="file-text"> </i></span>
                                    <div class="media-body">
                                        <p>Tickets Generated</p><span>3 hour ago</span>
                                    </div>
                                </div>
                            </li>
                            <li class="noti-danger">
                                <div class="media"><span class="notification-bg bg-light-danger"><i data-feather="user-check"> </i></span>
                                    <div class="media-body">
                                        <p>Delivery Complete</p><span>6 hour ago</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="mode"><i class="fa fa-moon-o"></i></div>
                    </li>
                    <li class="onhover-dropdown"><i data-feather="message-square"></i>
                        <ul class="chat-dropdown onhover-show-div">
                            <li>
                                <div class="media"><img class="img-fluid rounded-circle me-3" src="/NewAdmin/images/user/4.jpg" alt="">
                                    <div class="media-body"><span>Ain Chavez</span>
                                        <p class="f-12 light-font">Lorem Ipsum is simply dummy...</p>
                                    </div>
                                    <p class="f-12">32 mins ago</p>
                                </div>
                            </li>
                            <li>
                                <div class="media"><img class="img-fluid rounded-circle me-3" src="/NewAdmin/images/user/1.jpg" alt="">
                                    <div class="media-body"><span>Erica Hughes</span>
                                        <p class="f-12 light-font">Lorem Ipsum is simply dummy...</p>
                                    </div>
                                    <p class="f-12">58 mins ago</p>
                                </div>
                            </li>
                            <li>
                                <div class="media"><img class="img-fluid rounded-circle me-3" src="/NewAdmin/images/user/2.jpg" alt="">
                                    <div class="media-body"><span>Kori Thomas</span>
                                        <p class="f-12 light-font">Lorem Ipsum is simply dummy...</p>
                                    </div>
                                    <p class="f-12">1 hr ago</p>
                                </div>
                            </li>
                            <li class="text-center"> <a class="f-w-700" href="javascript:void(0)">See All</a></li>
                        </ul>
                    </li>
                    <li class="onhover-dropdown p-0">
                        <button class="btn btn-primary-light" type="button"><a href="login_two.html"><i data-feather="log-out"></i>Log out</a></button>
                    </li>
                </ul>
            </div>
            <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
        </div>
    </div>
    <!-- Page Header Ends                              -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper horizontal-menu">
        <!-- Page Sidebar Start-->
        <header class="main-nav">
            <div class="sidebar-user text-center">
                <img class="img-90 rounded-circle" src="/NewAdmin/images/dashboard/1.png" alt="">
                <a href="#">
                    <h6 class="mt-3 f-14 f-w-600">{{ auth()->user()->username }}</h6>
                </a>
                @if(auth()->user()->is_superuser)
                    <h5 class="mb-0">مدیر سیستم</h5>
                @elseif(auth()->user()->is_staff)
                    <h5 class="mb-0">ادمین</h5>
                @elseif(auth()->user()->is_agent)
                    <h5 class="mb-0">نماینده</h5>
                @endif
            </div>
            <nav>
                <div class="main-navbar">
                    <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                    <div id="mainnav">
                        <ul class="nav-menu custom-scrollbar">
                            <li class="back-btn">
                                <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                            </li>
                            <li class="sidebar-main-title">
                                <div>
                                    <h6>اصلی</h6>
                                </div>
                            </li>
                            <li><a class="nav-link" href="/"><i data-feather="home"></i><span>خانه</span></a></li>
                            <li><a class="nav-link" href="/admin"><i data-feather="layout"></i><span>داشبورد</span></a></li>

                            <li class="sidebar-main-title">
                                <div>
                                    <h6>کاربران</h6>
                                </div>
                            </li>

                            <li><a class="nav-link" href="/admin/users"><i data-feather="layout"></i><span>نمایش کاربران</span></a></li>
                            <li><a class="nav-link" href="/admin/personalinfo"><i data-feather="layout"></i><span>اطلاعات شخصی</span></a></li>

                            <li class="sidebar-main-title">
                                <div>
                                    <h6>تنظیمات وب سایت</h6>
                                </div>
                            </li>

                            <li><a class="nav-link" href="/admin/azgilinfo"><i data-feather="layout"></i><span>تنظیمات ازگیل</span></a></li>
                            <li><a class="nav-link" href="/admin/sliders"><i data-feather="layout"></i><span>اسلایدر صفحه اصلی</span></a></li>
                            <li><a class="nav-link" href="/admin/categories"><i data-feather="layout"></i><span>دسته بندی</span></a></li>
                            <li><a class="nav-link" href="/admin/brands"><i data-feather="layout"></i><span>برند ها</span></a></li>
                            <li><a class="nav-link" href="/admin/sendways"><i data-feather="layout"></i><span>روش های ارسال</span></a></li>
                            <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="airplay"></i><span>سیستم اجازه دسترسی</span></a>
                                <ul class="nav-submenu menu-content">
                                    <li><a href="/admin/role">مقام ها</a></li>
                                    <li><a href="/admin/permission">دسترسی ها</a></li>
                                </ul>
                            </li>

                            <li class="sidebar-main-title">
                                <div>
                                    <h6>محصولات</h6>
                                </div>
                            </li>

                            <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="airplay"></i><span>سفارش ها</span></a>
                                <ul class="nav-submenu menu-content">
                                    <li><a href="/admin/orders">همه سفارشات</a></li>
                                    <li><a href="/admin/PaidOrders">پرداخت شده</a></li>
                                    <li><a href="/admin/PreparationOrders">پرداخت شده (درحال آماده سازی)</a></li>
                                    <li><a href="/admin/PostedOrders">ارسال شده</a></li>
                                    <li><a href="/admin/ReceivedOrders">دریافت شده توسط مشتری</a></li>
                                    <li><a href="/admin/CancelOrders">پرداخت شده (در انتظار کنسل شدن!)</a></li>
                                    <li><a href="/admin/CanceledOrders">پرداخت شده (کنسل شده)</a></li>
                                    <li><a href="/admin/UnpaidOrders">پرداخت نشده</a></li>
                                </ul>
                            </li>

                            <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="airplay"></i><span>سفارش های عمده</span></a>
                                <ul class="nav-submenu menu-content">
                                    <li><a href="/admin/BulkOrders">همه سفارشات</a></li>
                                    <li><a href="/admin/BulkPaidOrders">پرداخت شده</a></li>
                                    <li><a href="/admin/BulkPreparationOrders">پرداخت شده (درحال آماده سازی)</a></li>
                                    <li><a href="/admin/BulkPostedOrders">ارسال شده</a></li>
                                    <li><a href="/admin/BulkReceivedOrders">دریافت شده توسط مشتری</a></li>
                                    <li><a href="/admin/BulkCancelOrders">پرداخت شده (در انتظار کنسل شدن!)</a></li>
                                    <li><a href="/admin/BulkCanceledOrders">پرداخت شده (کنسل شده)</a></li>
                                    <li><a href="/admin/BulkUnpaidOrders">پرداخت نشده</a></li>
                                </ul>
                            </li>

                            <li><a class="nav-link" href="/admin/products"><i data-feather="layout"></i><span>نمایش محصولات</span></a></li>
                            <li><a class="nav-link" href="/admin/weights"><i data-feather="layout"></i><span>وزن ها</span></a></li>

                            <li class="sidebar-main-title">
                                <div>
                                    <h6>دیگر صفحات</h6>
                                </div>
                            </li>

                            <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="airplay"></i><span>نظر ها</span></a>
                                <ul class="nav-submenu menu-content">
                                    <li><a href="/admin/comments">همه نظر ها</a></li>
                                    <li><a href="/admin/comments/waiting">در انتظار تائید</a></li>
                                    <li><a href="/admin/comments/rejected">نظر های رد شده</a></li>
                                </ul>
                            </li>
                            <li><a class="nav-link" href="/admin/tickets"><i data-feather="layout"></i><span>تیکت ها</span></a></li>
                            <li><a class="nav-link" href="/admin/magazine"><i data-feather="layout"></i><span>مجله ها</span></a></li>
                            <li><a class="nav-link" href="/admin/discounts"><i data-feather="layout"></i><span>تخفیف ها</span></a></li>
                            <li><a class="nav-link" href="{{ route('profit.orders') }}"><i data-feather="layout"></i><span>سیستم محاسبه سود</span></a></li>
                            <li><a class="nav-link" href="#"><i data-feather="layout"></i><span></span></a></li>
                            <li><a class="nav-link" href="#"><i data-feather="layout"></i><span></span></a></li>
                        </ul>
                    </div>
                    <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                </div>
            </nav>
        </header>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
            @yield('profilecontent')
        </div>
        <!-- footer start-->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 footer-copyright">
                        @include('layouts.AppSection.NexusKnit')
                    </div>
                    <div class="col-md-6">
                        <p class="pull-right mb-0">Hand crafted & made with <i class="fa fa-heart font-secondary"></i></p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<!-- latest jquery-->
<script src="/NewAdmin/js/jquery-3.5.1.min.js"></script>
<!-- feather icon js-->
<script src="/NewAdmin/js/icons/feather-icon/feather.min.js"></script>
<script src="/NewAdmin/js/icons/feather-icon/feather-icon.js"></script>
<!-- Sidebar jquery-->
<script src="/NewAdmin/js/sidebar-menu.js"></script>
<script src="/NewAdmin/js/config.js"></script>
<!-- Bootstrap js-->
<script src="/NewAdmin/js/bootstrap/popper.min.js"></script>
<script src="/NewAdmin/js/bootstrap/bootstrap.min.js"></script>
<!-- Plugins JS start-->
<script src="/NewAdmin/js/prism/prism.min.js"></script>
<script src="/NewAdmin/js/clipboard/clipboard.min.js"></script>
<script src="/NewAdmin/js/custom-card/custom-card.js"></script>
<script src="/NewAdmin/js/tooltip-init.js"></script>
<!-- Plugins JS Ends-->
<script src="/NewAdmin/js/select2/select2.full.min.js"></script>
<script src="/NewAdmin/js/select2/select2-custom.js"></script>
<!-- Theme js-->
<script src="/NewAdmin/js/script.js"></script>
<script src="/NewAdmin/js/theme-customizer/customizer.js"></script>
<!-- login js-->
<!-- Plugin used-->
@yield('script')
@include('sweetalert::alert')
@livewireScripts
</body>
</html>
