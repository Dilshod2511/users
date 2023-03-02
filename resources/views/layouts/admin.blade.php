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
      .margin{
          margin-right: 50px;
      }
</style>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="">
    @include('sweetalert::alert')
    <!-- BEGIN: Header-->
    <nav
        class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon"
                                data-feather="menu"></i></a></li>
                </ul>
                <ul class="nav navbar-nav bookmark-icons">
                    <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon"
                                data-feather="search"></i></a>
                        <div class="search-input">
                            <div class="search-input-icon"><i data-feather="search"></i></div>
                            <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="-1"
                                data-search="search">
                            <div class="search-input-close"><i data-feather="x"></i></div>
                            <ul class="search-list search-list-main"></ul>
                        </div>
                    </li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                        id="dropdown-user" >
                        <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder">{{auth()->user()->name}} {{auth()->user()->surname}}</span><span
                                class="user-status">{{auth()->user()->position}}</span></div><span class="avatar">
                              @if(auth()->user()->avatar!=null)
                                  <img class="round"
                                src="{{asset('upload/'.auth()->user()->avatar)}}" alt="avatar" height="40"
                                width="40">
                            @else
                                <img class="round"
                                     src="{{asset('upload/'."default_avatar.png")}}" alt="avatar" height="40"
                                     width="40">
                                  @endif


                    </a>

                </li>
            </ul>
        </div>
    </nav>
    <ul class="main-search-list-defaultlist d-none">
        <li class="d-flex align-items-center"><a href="#">
                <h6 class="section-label mt-75 mb-0">Files</h6>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                href="app-file-manager.html">
                <div class="d-flex">
                    <div class="me-75"><img src="app-assets/images/icons/xls.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing
                            Manager</small>
                    </div>
                </div><small class="search-data-size me-50 text-muted">&apos;17kb</small>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                href="app-file-manager.html">
                <div class="d-flex">
                    <div class="me-75"><img src="app-assets/images/icons/jpg.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd
                            Developer</small>
                    </div>
                </div><small class="search-data-size me-50 text-muted">&apos;11kb</small>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                href="app-file-manager.html">
                <div class="d-flex">
                    <div class="me-75"><img src="app-assets/images/icons/pdf.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital
                            Marketing Manager</small>
                    </div>
                </div><small class="search-data-size me-50 text-muted">&apos;150kb</small>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                href="app-file-manager.html">
                <div class="d-flex">
                    <div class="me-75"><img src="app-assets/images/icons/doc.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web
                            Designer</small>
                    </div>
                </div><small class="search-data-size me-50 text-muted">&apos;256kb</small>
            </a></li>
        <li class="d-flex align-items-center"><a href="#">
                <h6 class="section-label mt-75 mb-0">Members</h6>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                href="app-user-view-account.html">
                <div class="d-flex align-items-center">
                    <div class="avatar me-75"><img src="app-assets/images/portrait/small/avatar-s-8.jpg" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                href="app-user-view-account.html">
                <div class="d-flex align-items-center">
                    <div class="avatar me-75"><img src="app-assets/images/portrait/small/avatar-s-1.jpg" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd
                            Developer</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                href="app-user-view-account.html">
                <div class="d-flex align-items-center">
                    <div class="avatar me-75"><img src="app-assets/images/portrait/small/avatar-s-14.jpg" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing
                            Manager</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                href="app-user-view-account.html">
                <div class="d-flex align-items-center">
                    <div class="avatar me-75"><img src="app-assets/images/portrait/small/avatar-s-6.jpg" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
                    </div>
                </div>
            </a></li>
    </ul>
    <ul class="main-search-list-defaultlist-other-list d-none">
        <li class="auto-suggestion justify-content-between"><a
                class="d-flex align-items-center justify-content-between w-100 py-50">
                <div class="d-flex justify-content-start"><span class="me-75"
                        data-feather="alert-circle"></span><span>No results found.</span></div>
            </a></li>
    </ul>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header mb-3">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto"><a class="navbar-brand"
                        href="/"><img src="{{asset('app-assets/images/ico/marifat.png')}}" width="200" alt="">

                    </a>
                </li>

            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="li1 {{request()->segment(1)==''?'active':''}} nav-item"><a class="d-flex align-items-center" href="/"><i
                            data-feather="home"></i><span class="menu-title text-truncate">Bosh sahifa</span></a>
                </li>
{{--                <li class=" li2 nav-item {{request()->segment(1)=='users'||request()->segment(1)=='reports'?'active':''}} "><a class="d-flex align-items-center" href="{{route('users.index')}}"><i--}}
{{--                            data-feather="user"></i><span class="menu-title text-truncate">Jamiyat a'zolari</span></a>--}}
{{--                </li>--}}

{{--                @if(auth()->user()->role==1)--}}
{{--                <li class="li nav-item {{request()->segment(1)=='regions'||request()->segment(1)=='show-region-users'?'active':''}}"><a class="d-flex align-items-center" href="{{route('regions.index')}}"><i--}}
{{--                            data-feather="map-pin"></i><span class="menu-title text-truncate">Viloyatlar</span></a>--}}
{{--                </li>--}}
{{--                @endif--}}

{{--                <li class="li nav-item {{request()->segment(1)=='rate'?'active':''}}"><a class="d-flex align-items-center" href="{{route('rate')}}"><i--}}
{{--                            data-feather="award"></i><span class="menu-title text-truncate">Reyting</span></a>--}}
{{--                </li>--}}
{{--                @if(auth()->user()->role==1)--}}
{{--                <li class="li nav-item {{request()->segment(1)=='categories'?'active':''}}"><a class="d-flex align-items-center" href="{{route('categories.index')}}"><i--}}
{{--                            data-feather="grid"></i><span class="menu-title text-truncate">Kategoriyalar</span></a>--}}
{{--                </li>--}}
{{--                <li class="li nav-item {{request()->segment(1)=='admins'?'active':''}}"><a class="d-flex align-items-center" href="{{route('admins.index')}}"><i--}}
{{--                            data-feather="users"></i><span class="menu-title text-truncate"> Hudud yetakchilari</span></a>--}}
{{--                </li>--}}
{{--                @endif--}}
{{--                <li class="li nav-item {{request()->segment(1)=='logout'?'active':''}}"><a class="d-flex align-items-center" onclick="if (!confirm('tizimdan chiqmoqchimisiz?')) { return false }" href="{{route('logout')}}"><i--}}
{{--                            data-feather="award"></i><span class="menu-title text-truncate">Tizimdan chiqish</span></a>--}}
{{--                </li>--}}
            </ul>
        </div>
    </div>
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

            $(window).on('load', function () {

            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
                localStorage.setItem("data",'');
            }


        })







        ClassicEditor
            .create( document.querySelector( '.editor' ),{
                ckfinder:{
                    uploadUrl: "{{route('ckeditor.upload').'?_token='.csrf_token()}}"
                }
            } )
            .catch( error => {
                console.error( error );
            } );




        $(document).ready(function () {





// $(document).on('click','#user',function(){
//  let id =$(this).data('id');
//  let deletes=$(this).data('delete');

//   delete_user(id,deletes)



// })

// function delete_user(id,deletes)
// {

//     var url = '{{ route("show-delete-user",":id") }}';
//      url = url.replace(':id', id);


//  $.ajax({
//    type:"GET",
//    url:url,
//    success : function(response){
//       console.log(response)
//       var urll = '{{ route("users.destroy", ":id") }}';
//      urll = urll.replace(':id',response['user'].id);
//      $(deletes).html('')
//       $(deletes).append(`

//       <form action=${urll} method="POST">
//         @csrf
//            @method('DELETE')
//                          <div class="col-12 text-center">
//                           <button type="submit" class="btn btn-danger me-1 mt-1 waves-effect waves-float waves-light">Xa, ochirish</button>
//                           <button type="reset" class="btn btn-outline-secondary mt-1 waves-effect" data-bs-dismiss="modal"
//                           aria-label="Close">
//                               Bekor qilish
//                           </button>
//                       </div>
//                         </form>

//       `)

//   }


//  })






// }



})




    </script>

</body>
<!-- END: Body-->
@yield('script')
</html>
