<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description"
          content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Ma'rifat Monitoring tizimi</title>
    <link rel="apple-touch-icon" href="{{asset('app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
          rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/core/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/quill.snow.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/core/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/core/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/core/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/core/components.min.css')}}">

    <!-- BEGIN: Page CSS-->

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/core/app-invoice.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/form-quill-editor.min.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/core/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/form-flat-pickr.min.css')}}">
    <!-- END: Page CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <script language="JavaScript"  src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>

    <!-- END: Custom CSS-->

</head>
<style>
    .ck-editor__editable[role="textbox"] {
        /* editing area */
        min-height: 200px;
    }
    .butt{
        padding: 13px 30px;
        margin: 0;
    }
    .name,.surname{
        padding: 13px;
        width: 110%;
        margin-right: 20px;
    }
    .select{
        padding: 11px 84px 11px 15px;
        width: 100%;
    }
    .p{
        padding: 20px 20px 10px 10px;
    }
    .margin{
        margin-right: 50px;
    }
</style>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
      data-menu="vertical-menu-modern" data-col="">

<!-- END: Header-->


<!-- BEGIN: Main Menu-->

<!-- END: Main Menu-->

<!-- BEGIN: Content-->
@yield('content')
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- BEGIN: Vendor JS-->
<script src="{{asset('assets/js/core/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('assets/js/plugins/flatpickr.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/quill.min.js')}}"></script>
<!-- END: Page Vendor JS-->


<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('assets/js/plugins/apexcharts.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('assets/js/plugins/form-pickers.min.js')}}"></script>
<script src="{{asset('assets/js/core/app-invoice.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/form-quill-editor.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/form-number-input.min.js')}}"></script>
<!-- END: Page JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('assets/js/core/app-menu.min.js')}}"></script>
<script src="{{asset('assets/js/core/app.min.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('assets/js/core/card-analytics.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>
<script src="{{asset('assets/js/plugins/components-popovers.js')}}"></script>

<!-- END: Page JS-->


<script>






</script>

</body>
<!-- END: Body-->
@yield('script')
</html>
