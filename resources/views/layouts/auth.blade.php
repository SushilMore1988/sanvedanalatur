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
    @stack('styles')
    
    @livewireStyles
</head>
<body>
    <header class="home-header fixed-top bg-white">
        <div class="container-fluid">
            <nav class="navbar px-0 justify-content-between align-items-center">
                <a class="navbar-brand p-semibold text-primary text-left" href="{{route('home')}}"> 
                    <img src="{{url('img/logoeng.png')}}" class="img-fluid">
                </a>
                @auth
                <ul class="navbar-nav flex-row align-items-center d-md-flex d-none">
                    <li class="nav-item dropdown">
                        <a class="nav-link p-medium f-14 text-nav-color dropdown-toggle px-lg-3 px-md-2 pl-sm-4 pl-3 " href="#" id="navbarDropdown" data-toggle="dropdown" >
                            {{ Auth::user()->name }}
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
    <section class="common-mt unic-table">
        <div class="d-flex toggled" id="wrapper">
            <div class="border-right toggled" id="sidebar-wrapper">
                <div class="list-group list-group-flush">
                    <ul class="pl-0 accordion" id="accordion">
                        @can('home')
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
                        @endcan
                        @can('role-list')
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
                        @endcan
                        @can('permissions-list')
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
                        @endcan
                        @can('divyang-list')
                        <li>
                            <div class="media">
                                <i class="fas fa-user mr-3"></i> 
                                <div class="media-body">
                                    <a href="{{route('divyang.index')}}" class="list-group-item ">
                                        <p class=" p-semibold f-14 mb-0">Divyang List</p>
                                    </a>
                                </div>
                            </div>
                        </li>
                        @endcan
                        @can('admin-list')
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
                        @endcan
                        @can('ahwal-list')
                        <li>
                            <div class="media">
                                <i class="far fa-file-alt mr-3"></i> 
                                <div class="media-body">
                                    <div class="collapsed heading list-group-item " data-toggle="collapse" href="#collapseDivyangFields">
                                        <p class=" p-semibold f-14 mb-0"> Ahwal</p>
                                    </div>
                                </div>
                            </div>
                            <div id="collapseDivyangFields" class="collapse pl-3" data-parent="#accordion">
                                <ul class="pl-0">
                                    <li>
                                        <div class="media py-0">
                                            <i class="fas fa-user pt-2"></i> 
                                            <div class="media-body">
                                                <a href="{{route('ahwal.education')}}" class="list-group-item ">
                                                    <p class=" p-semibold f-14 mb-0">Education Wise List</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media py-0">
                                            <i class="fas fa-user pt-2"></i> 
                                            <div class="media-body">
                                                <a href="{{route('ahwal.caste')}}" class="list-group-item ">
                                                    <p class=" p-semibold f-14 mb-0">Caste Wise List</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media py-0">
                                            <i class="fas fa-user pt-2"></i> 
                                            <div class="media-body">
                                                <a href="{{route('ahwal.marital-status')}}" class="list-group-item ">
                                                    <p class=" p-semibold f-14 mb-0">Marital Status Wise List</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media py-0">
                                            <i class="fas fa-user pt-2"></i> 
                                            <div class="media-body">
                                                <a href="{{route('ahwal.poverty-line')}}" class="list-group-item ">
                                                    <p class=" p-semibold f-14 mb-0">Poverty Line Wise List</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media py-0">
                                            <i class="fas fa-user pt-2"></i> 
                                            <div class="media-body">
                                                <a href="{{route('ahwal.st-pass')}}" class="list-group-item ">
                                                    <p class=" p-semibold f-14 mb-0">S.T. Pass Wise List</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media py-0">
                                            <i class="fas fa-user pt-2"></i> 
                                            <div class="media-body">
                                                <a href="{{route('ahwal.gov-scheme')}}" class="list-group-item ">
                                                    <p class=" p-semibold f-14 mb-0">Government Schemes Advantage Wise List</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media py-0">
                                            <i class="fas fa-user pt-2"></i> 
                                            <div class="media-body">
                                                <a href="{{route('ahwal.personal-toilet')}}" class="list-group-item ">
                                                    <p class=" p-semibold f-14 mb-0">Personal Toilet Availability Wise List</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media py-0">
                                            <i class="fas fa-user pt-2"></i> 
                                            <div class="media-body">
                                                <a href="{{route('ahwal.home')}}" class="list-group-item ">
                                                    <p class=" p-semibold f-14 mb-0">Home Availability Wise List</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endcan
                        @canany(['disability-type-list', 'disability-area-list', 'disability-reason-list', 'divyang-goods-list', 'identity-proof-list', 'address-proof-list', 'hospital-list', 'occupation-list'])
                        <li>
                            <div class="media">
                                <i class="far fa-file-alt mr-3"></i> 
                                <div class="media-body">
                                    <div class="collapsed heading list-group-item " data-toggle="collapse" href="#collapseDivyangFields">
                                        <p class=" p-semibold f-14 mb-0"> Divyang Fields</p>
                                    </div>
                                </div>
                            </div>
                            <div id="collapseDivyangFields" class="collapse pl-3" data-parent="#accordion">
                                <ul class="pl-0">
                                    @can('disability-type-list')
                                    <li>
                                        <div class="media py-0">
                                            <i class="fas fa-user pt-2"></i> 
                                            <div class="media-body">
                                                <a href="{{route('disability-types.index')}}" class="list-group-item ">
                                                    <p class=" p-semibold f-14 mb-0">Disability Types</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    @endcan
                                    @can('disability-area-list')
                                    <li>
                                        <div class="media py-0">
                                            <i class="fas fa-user pt-2"></i> 
                                            <div class="media-body">
                                                <a href="{{route('disability-areas.index')}}" class="list-group-item ">
                                                    <p class=" p-semibold f-14 mb-0">Disability Areas</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    @endcan
                                    @can('disability-reason-list')
                                    <li>
                                        <div class="media py-0">
                                            <i class="fas fa-user pt-2"></i> 
                                            <div class="media-body">
                                                <a href="{{route('disability-reasons.index')}}" class="list-group-item ">
                                                    <p class=" p-semibold f-14 mb-0">Disability Reasons</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    @endcan
                                    @can('divyang-goods-list')
                                    <li>
                                        <div class="media py-0">
                                            <i class="fas fa-user pt-2"></i> 
                                            <div class="media-body">
                                                <a href="{{route('divyang-goods.index')}}" class="list-group-item ">
                                                    <p class=" p-semibold f-14 mb-0">Divyang Goods</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    @endcan
                                    @can('identity-proof-list')
                                    <li>
                                        <div class="media py-0">
                                            <i class="fas fa-user pt-2"></i> 
                                            <div class="media-body">
                                                <a href="{{route('identity-proofs.index')}}" class="list-group-item ">
                                                    <p class=" p-semibold f-14 mb-0">Identity Proofs</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    @endcan
                                    @can('address-proof-list')
                                    <li>
                                        <div class="media py-0">
                                            <i class="fas fa-user pt-2"></i> 
                                            <div class="media-body">
                                                <a href="{{route('address-proofs.index')}}" class="list-group-item ">
                                                    <p class=" p-semibold f-14 mb-0">Address Proofs</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    @endcan
                                    @can('hospital-list')
                                    <li>
                                        <div class="media py-0">
                                            <i class="fas fa-user pt-2"></i> 
                                            <div class="media-body">
                                                <a href="{{route('hospitals.index')}}" class="list-group-item ">
                                                    <p class=" p-semibold f-14 mb-0">Hospitals</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    @endcan
                                    @can('occupation-list')
                                    <li>
                                        <div class="media py-0">
                                            <i class="fas fa-user pt-2"></i> 
                                            <div class="media-body">
                                                <a href="{{route('occupations.index')}}" class="list-group-item ">
                                                    <p class=" p-semibold f-14 mb-0">Occupations</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    @endcan
                                </ul>
                            </div>
                        </li>
                        @endcanany
                        <li>
                            <div class="media">
                                <i class="far fa-file-alt mr-3"></i> 
                                <div class="media-body">
                                    <div class="collapsed heading list-group-item " data-toggle="collapse" href="#collapseAddressFields">
                                        <p class=" p-semibold f-14 mb-0">Address Fields</p>
                                    </div>
                                </div>
                            </div>
                            <div id="collapseAddressFields" class="collapse pl-3" data-parent="#accordion">
                                <ul class="pl-0">
                                    @can('country-list')
                                    <li>
                                        <div class="media py-0">
                                            <i class="fas fa-user pt-2"></i> 
                                            <div class="media-body">
                                                <a href="{{route('country.index')}}" class="list-group-item ">
                                                    <p class=" p-semibold f-14 mb-0">Countries</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    @endcan
                                    @can('state-list')
                                    <li>
                                        <div class="media py-0">
                                            <i class="fas fa-user pt-2"></i> 
                                            <div class="media-body">
                                                <a href="{{route('states.index')}}" class="list-group-item ">
                                                    <p class=" p-semibold f-14 mb-0">States</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    @endcan
                                    @can('district-list')
                                    <li>
                                        <div class="media py-0">
                                            <i class="fas fa-user pt-2"></i> 
                                            <div class="media-body">
                                                <a href="{{route('districts.index')}}" class="list-group-item ">
                                                    <p class=" p-semibold f-14 mb-0">Districts</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    @endcan
                                    @can('taluka-list')
                                    <li>
                                        <div class="media py-0">
                                            <i class="fas fa-user pt-2"></i> 
                                            <div class="media-body">
                                                <a href="{{route('talukas.index')}}" class="list-group-item ">
                                                    <p class=" p-semibold f-14 mb-0">Talukas</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    @endcan
                                    @can('village-list')
                                    <li>
                                        <div class="media py-0">
                                            <i class="fas fa-user pt-2"></i> 
                                            <div class="media-body">
                                                <a href="{{route('villages.index')}}" class="list-group-item ">
                                                    <p class=" p-semibold f-14 mb-0">Villages</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    @endcan
                                    {{-- @can('city-list')
                                    <li>
                                        <div class="media py-0">
                                            <i class="fas fa-user pt-2"></i> 
                                            <div class="media-body">
                                                <a href="{{route('cities.index')}}" class="list-group-item ">
                                                    <p class=" p-semibold f-14 mb-0">Cities</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    @endcan --}}
                                    @can('mahanagarpalika-list')
                                    <li>
                                        <div class="media py-0">
                                            <i class="fas fa-user pt-2"></i> 
                                            <div class="media-body">
                                                <a href="{{route('mahangarpalikas.index')}}" class="list-group-item ">
                                                    <p class=" p-semibold f-14 mb-0">Mahangarpalikas</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    @endcan
                                    @can('mahanagarpalika-zone-list')
                                    <li>
                                        <div class="media py-0">
                                            <i class="fas fa-user pt-2"></i> 
                                            <div class="media-body">
                                                <a href="{{route('mahangarpalika-zones.index')}}" class="list-group-item ">
                                                    <p class=" p-semibold f-14 mb-0">Mahangarpalika Zones</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    @endcan
                                    @can('mahanagarpalika-ward-list')
                                    <li>
                                        <div class="media py-0">
                                            <i class="fas fa-user pt-2"></i> 
                                            <div class="media-body">
                                                <a href="{{route('mahangarpalika-wards.index')}}" class="list-group-item ">
                                                    <p class=" p-semibold f-14 mb-0">Mahangarpalika Wards</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    @endcan
                                    @can('nagarparishad-list')
                                    <li>
                                        <div class="media py-0">
                                            <i class="fas fa-user pt-2"></i> 
                                            <div class="media-body">
                                                <a href="{{route('nagarparishads.index')}}" class="list-group-item ">
                                                    <p class=" p-semibold f-14 mb-0">Nagarparishads</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    @endcan
                                    @can('nagarparishad-ward-list')
                                    <li>
                                        <div class="media py-0">
                                            <i class="fas fa-user pt-2"></i> 
                                            <div class="media-body">
                                                <a href="{{route('nagarparishad-wards.index')}}" class="list-group-item ">
                                                    <p class=" p-semibold f-14 mb-0">Nagarparishad Wards</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    @endcan
                                </ul>
                            </div>
                        </li>
                        {{-- @can('') --}}
                        <li>
                            <div class="media">
                                <i class="fas fa-user mr-3"></i> 
                                <div class="media-body">
                                    <a href="{{route('about.index')}}" class="list-group-item ">
                                        <p class=" p-semibold f-14 mb-0">AboutUs</p>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <i class="fas fa-user mr-3"></i> 
                                <div class="media-body">
                                    <a href="{{route('goverment.index')}}" class="list-group-item ">
                                        <p class=" p-semibold f-14 mb-0">Goverment</p>
                                    </a>
                                </div>
                            </div>
                        </li>
                        
                        <li>
                            <div class="media">
                                <i class="fas fa-user mr-3"></i> 
                                <div class="media-body">
                                    <a href="{{route('testimonial.index')}}" class="list-group-item ">
                                        <p class=" p-semibold f-14 mb-0">Testimonials</p>
                                    </a>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="media">
                                <i class="fas fa-user mr-3"></i> 
                                <div class="media-body">
                                    <a href="{{route('nagarparishad-wards.index')}}" class="list-group-item ">
                                        <p class=" p-semibold f-14 mb-0">Settings</p>
                                    </a>
                                </div>
                            </div>
                        </li>
                        
                        {{-- @endcan --}}
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
    @stack('scripts')
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