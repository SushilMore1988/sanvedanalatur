<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="INSPIRO" />
    <meta name="description" content="Themeforest Template Polo">
    <title>{{ $page_title }}</title>
    <link href="{{url('vendor/datatables/datatables.min.css')}}" rel='stylesheet' />
    <link rel="stylesheet" type="text/css" href="{{url('vendor/taginput/taginput.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('vendor/multi-select/multiselect.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/app.css')}}">
    <script type="text/javascript" src="{{url('vendor/multi-select/multiselect.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/app.js')}}"></script>
    <script type="text/javascript" src="{{url('vendor/taginput/taginput.js')}}"></script>
    <script src="{{url('vendor/datatables/datatables.min.js')}}"></script>
    <script src="{{url('js/bootstrap-bundle.min.js')}}"></script>
    
    <style type="text/css">
        body {
          overflow-x: hidden;
        }
    </style>
    {{ $style }}
    @livewireStyles
</head>
<body>
    <header class="home-header fixed-top bg-white" >
        <div class="container-fluid ">
            <nav class="navbar px-0 justify-content-between align-items-center">
                <a class="navbar-brand p-semibold text-primary text-left" href="{{route('home')}}"> 
                    <img src="{{url('img/logoeng.png')}}" class="img-fluid">
                </a>
                @auth
                <ul class="navbar-nav flex-row align-items-center d-md-flex d-none">
                    <li class="nav-item dropdown">
                        <a class="nav-link p-medium f-14 text-nav-color dropdown-toggle px-lg-3 px-md-2 pl-sm-4 pl-3 " href="#" id="navbarDropdown" data-toggle="dropdown" >
                        <i class="fas fa-user-circle fs-25"></i>
                        </a>
                        <div class="dropdown-menu position-absolute dropdown-menu-right border-0 py-0" >
                            <a href="javascript:void(0)" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-power-off"></i> Log Out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
               
                <span class="navbutton1 d-md-none d-block ml-auto" onclick="myFunction(this)">
                    <div class="menubar bar1"></div>
                    <div class="menubar bar2"></div>
                    <div class="menubar bar3"></div>
                </span>
                 @endauth
            </nav>
        </div>
    </header>
    {{-- <section class="register-mt position-relative common-mt ">
        <div class="container">
            <div class="register-create d-flex flex-column justify-content-center">
                <div class="align-self-center w-100">
                    <div class="register-banner d-flex flex-column justify-content-center background-none">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <section class="common-mt unic-table">
        <div class="d-flex" id="wrapper">
            
            <div class="border-right" id="sidebar-wrapper">
                <div class="list-group list-group-flush">
                    <ul class="pl-0 accordion" id="accordion">
                        <li>
                            <div class="media">
                                <i class="fas fa-home mr-3 align-selft-center "></i> 
                                <div class="media-body">
                                    <a href="{{route('home')}}" class="list-group-item ">
                                        <p class=" p-semibold f-14 mb-0">Home</p>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <i class="fas fa-user mr-3"></i> 
                                <div class="media-body">
                                    <a href="{{route('roles.index')}}" class="list-group-item ">
                                        <p class=" p-semibold f-14 mb-0">Roles</p>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <i class="fas fa-user mr-3"></i> 
                                <div class="media-body">
                                    <a href="{{route('permissions.index')}}" class="list-group-item ">
                                        <p class=" p-semibold f-14 mb-0">Permissions</p>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <i class="fas fa-user mr-3"></i> 
                                <div class="media-body">
                                    <a href="{{route('admin.index')}}" class="list-group-item ">
                                        <p class=" p-semibold f-14 mb-0">Admin List</p>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <i class="far fa-file-alt mr-3"></i> 
                                <div class="media-body">
                                    <div class="collapsed heading list-group-item " data-toggle="collapse" href="#collapseAhwal">
                                        <p class=" p-semibold f-14 mb-0"> Ahwal</p>
                                    </div>
                                </div>
                            </div>
                            <div id="collapseAhwal" class="collapse pl-3" data-parent="#accordion">
                                <ul class="pl-5">
                                    {{-- <li class="pb-2">
                                        <a href="{{route('super-admin.education-wise-list')}}" class="text-primary  p-medium f-14"> Education Wise List</a>
                                    </li>
                                    <li class="pb-2">
                                        <a href="{{route('super-admin.caste-wise-list')}}" class="text-primary  p-medium f-14">Caste Wise List</a>
                                    </li>
                                    <li class="pb-2">
                                        <a href="{{route('super-admin.marital-status-wise-list')}}" class="text-primary  p-medium f-14">Marital Status Wise List</a>
                                    </li>
                                    <li class="pb-2">
                                        <a href="{{route('super-admin.poverty-line-wise-list')}}" class="text-primary  p-medium f-14">  Poverty Line Wise List</a>
                                    </li>
                                    <li class="pb-2">
                                        <a href="{{route('super-admin.ST-pass-wise-list')}}" class="text-primary  p-medium f-14"> S.T travel pass Wise List</a>
                                    </li>
                                    <li class="pb-2">
                                        <a href="{{route('super-admin.goverment-scheme-wise-list')}}" class="text-primary  p-medium f-14"> Government Scheme Advantage Wise List</a>
                                    </li>
                                    <li class="pb-2">
                                        <a href="{{route('super-admin.personal-toilet-wise-list')}}" class="text-primary  p-medium f-14"> Personal Toilet Availability Wise List</a>
                                    </li>
                                    <li class="pb-2">
                                        <a href="{{route('super-admin.home-wise-list')}}" class="text-primary  p-medium f-14"> Home Availability Wise List</a>
                                    </li> --}}
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <i class="fas fa-user mr-3"></i> 
                                <div class="media-body">
                                    {{-- <a href="{{route('home-page-scheme')}}" class="list-group-item ">
                                        <p class=" p-semibold f-14 mb-0">Home Page Setting</p>
                                    </a> --}}
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div id="page-content-wrapper" class="bg-white">
                <div class="container-fluid pb-5 main-pr whole-wrapper">
                    <nav class="navbar navbar-expand-lg px-0">
                        <span class="navbutton1 text-left" id="menu-toggle">
                            <div class="menubar bar1 m"></div>
                            <div class="menubar bar2"></div>
                            <div class="menubar bar3"></div>
                        </span>
                    </nav>
                    {{$slot}}
                </div>
            </div>
        </div>
    </section>
    
    @livewireScripts
    {{ $javascript }}
    <script>
        $("#menu-toggle").click(function(e) {
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
          $(this).toggleClass("change");
          $(".whole-wrapper").toggleClass("main-pr");
        });
        $(document).ready(function() {
            var table = $('#datatable').DataTable( {
                buttons: [
                        {
                            extend: 'print',
                            title: 'Test Data export',
                            exportOptions: {
                                columns: "thead th:not(.noExport)"
                            }
                            
                        },{
                            extend: 'pdf',
                            title: 'Test Data export',
                            exportOptions: {
                                columns: "thead th:not(.noExport)"
                            }
                        },{
                            extend: 'excel',
                            title: 'Test Data export',
                            exportOptions: {
                                columns: "thead th:not(.noExport)"
                            }
                        }, 
                    ],
                    "displayLength": 25,
            } );
         
            table.buttons().container().appendTo( '#export_buttons' );
         
            $("#export_buttons .btn").removeClass('btn-secondary').addClass('btn-light');
        } );
    </script>
</body>

</html>