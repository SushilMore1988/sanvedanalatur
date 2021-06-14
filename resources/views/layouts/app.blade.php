<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="this is Ecommerce website">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ $page_title }}</title>
	<link rel="stylesheet" type="text/css" href="{{url('vendor/slick-slider/css/slick.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('vendor/slick-slider/css/slick-theme.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('vendor/datepicker/new-datepicker/bootstrap-datepicker.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('css/app.css')}}">
	<style type="text/css" media="screen">
	</style>
	{{ $style }}
    @livewireStyles
</head>
<body>
	<header class="home-header fixed-top bg-white" >
		<div class="container px-md-0">
			<nav class="navbar px-0 justify-content-between align-items-center">
				<a class="navbar-brand p-semibold text-primary text-left" href="#"> 
					<img src="{{url('img/logoeng.png')}}" class="img-fluid">
				</a>
				<ul class="navbar-nav flex-row align-items-center d-md-flex d-none">
					<li class="nav-item  px-lg-3 px-md-2 pr-sm-4 pr-3">
						<a  href="{{route('home')}}" class="nav-link active pb-0 p-medium text-nav-color f-14">HOME </a>
					</li>
					<li class="nav-item px-lg-2 px-md-2 px-sm-4 px-3">
						<a  href="#" class="nav-link p-medium text-nav-color f-14 pb-0">SCHEME</a>
					</li>
					<li class="nav-item px-lg-2 px-md-2 pl-sm-4 pl-3 ">
						<a  href="#" class="nav-link p-medium text-nav-color f-14 pb-0">REPORT</a>
					</li>
					<li class="nav-item px-lg-2 px-md-2 pl-sm-4 pl-3">
						<a class="nav-link p-medium f-14 text-nav-color pb-0" href="#"  >
						  DIVYANG LOGIN
						</a>
					</li>
					<li class="nav-item pl-lg-2 pr-lg-1 px-md-2 pl-sm-4 pl-3">
						<a  href="{{route('divyang.create')}}" class="btn btn-primary p-medium f-13 px-2 py-1">DIVYANG REGISTRATION</a>
					</li>
					<li class="nav-item pl-lg-1 pr-lg-0 px-md-2 px-sm-4 px-3">
						<a  href="{{route('login')}}" class="p-medium btn btn-primary f-13 px-2 py-1">LOGIN</a>
					</li>
				</ul>
				<span class="navbutton1 d-md-none d-block ml-auto" onclick="myFunction(this)">
					<div class="menubar bar1"></div>
					<div class="menubar bar2"></div>
					<div class="menubar bar3"></div>
				</span>
				<div class="overlayNav" id="overlayNavBar">
					<div class="overlayNav-content container-fluid">
						<ul class="w-100">
							<li class="nav-item  px-sm-3 pl-0">
								<a  href="#" class="nav-link p-medium text-nav-color f-14">HOME </a>
							</li>
							<li class="nav-item px-sm-3 pl-0">
								<a  href="#" class="nav-link p-medium text-nav-color f-14">REGISTRATION</a>
							</li>
							<li class="nav-item px-sm-3 pl-0">
								<a  href="#" class="nav-link p-medium text-nav-color f-14">SCHEME</a>
							</li>
							<li class="nav-item px-sm-3 pl-0 ">
								<a  href="#" class="nav-link p-medium text-nav-color f-14">REPORT</a>
							</li>
							<li class="nav-item px-sm-3 pl-0" >
								<a class="nav-link p-medium f-14 text-nav-color dropdown-toggle " data-toggle="collapse" href="#collapseExample" id="navbarDropdown">
								 USER LOG
								</a>
								<div class="collapse pl-sm-5 pl-4" id="collapseExample">
									<ul class="border">
										<li>
											<a class="dropdown-item p-medium text-nav-color f-14 border-bottom " href="#"> Municipal Corporation</a>
										</li>
										<li>
											<a class="dropdown-item p-medium text-nav-color f-14 border-bottom" href="#"> Nagar Panchayat / Nagarpalika</a>
										</li>
										<li>
											<a class="dropdown-item p-medium text-nav-color f-14" href="#">District Council</a>
										</li>
									</ul>
									  
								</div>
							</li>
							<li class="nav-item px-sm-3 pl-0">
								<a href="#" class="nav-link p-medium text-nav-color f-14">ADMINISTRATION</a>
							</li>
						</ul>
					</div>
				</div>
				
			</nav>
		</div>
	</header>

	{{ $slot }}

	<footer class="shadow">
		<div class="footer-second bg-light">
			<div class="container py-sm-5 py-3">
				<div class="row">
					<div class="col-lg-3 col-md-4 col-sm-6 col-9 pl-sm-0" >
						<a class="navbar-brand p-semibold text-primary text-left" href="#"> 
							<img src="{{url('img/logoeng.png')}}" class="img-fluid">
						</a>
						
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 col-12 pt-sm-0 pt-4">
						<h4 class="p-medium f-18 text-dark"><u>CONTACT</u></h4>
						<div class="media mt-4">
							<i class="fas fa-home mr-3 pt-1 text-primary"></i>
							<div class="media-body">
								<address class="p-light f-14 text-dark ">DDRC Office Latur.</address>
							</div>
						</div>
						<div class="media ">
							<i class="fas fa-envelope mr-3 pt-1 text-primary"></i>
							<div class="media-body">
								<a href="mailto:contact@ddrc.com" class="p-light f-14 text-dark">contact@ddrc.com</a>
							</div>
						</div>
						<div class="media pt-3">
							<i class="fas fa-phone-alt mr-3 pt-1 text-primary"></i>
							<div class="media-body">
								<a href="tel:1234567890" class="p-light f-14 text-dark">+91-1234567890</a>
							</div>
						</div>
						
					</div>
					<div class="col-lg-2 col-md-4 col-sm-5 col-6 pt-md-0 pt-5">
						<h4 class="p-medium f-18 text-dark"><u>QUICK LINKS</u></h4>
							<ul class="pl-0 pt-3">
								<li>
									<a href="#" class="p-light f-14 text-dark">Home</a>
									</a>
								</li>
								<li >
									<a href="#" class="p-light f-14 text-dark">Registration
									</a>
								</li>
								<li >
									<a href="#" class="p-light f-14 text-dark">Schemes
									</a>
								</li>
								<li >
									<a href="#" class="p-light f-14 text-dark">Report
									</a>
								</li>
								<li >
									<a href="#" class="p-light f-14 text-dark">Administration
									</a>
								</li>
								
							</ul>
							
					</div>
					<div class="col-lg-3 col-md-4 col-sm-7 col-6 pt-md-0 pt-5 pl-sm-5 ">
						<h4 class="p-medium f-18 text-dark"><u>USER LOG</u></h4>
						<ul class="pl-0 pt-3 ">
							<li>
								<a href="#" class="p-light f-14 text-dark">Municipal Corporation</a>
								</a>
							</li>
							<li >
								<a href="#" class="p-light f-14 text-dark"> Nagar Panchayat / Nagarpalika
								</a>
							</li>
							<li >
								<a href="#" class="p-light f-14 text-dark">District Council
								</a>
							</li>
							
						</ul>
						
					</div>
				</div>
			</div>
		</div>
		<div class="footer-second bg-dark">
			<div class="container py-2 text-center">
				<p class="p-light f-14 text-white mb-0">Copyright © 2018 District Social Welfare Department, Latur,  All Rights Reserved.</p>
			</div>
		</div>
	</footer>

    @livewireScripts
	<script type="text/javascript" src="{{url('js/app.js')}}"></script>
	<script type="text/javascript" src="{{url('vendor/slick-slider/js/slick.min.js')}}"></script>
	<script type="text/javascript" src="{{url('vendor/datepicker/new-datepicker/bootstrap-datepicker.min.js')}}"></script>
	<script type="text/javascript" src="{{url('vendor/datepicker/new-datepicker/bootstrap.bundle.min.js')}}"></script>
	<script type="text/javascript" src="{{url('vendor/slick-slider/js/slick.min.js')}}"></script>
		<script type="text/javascript">
			$('.slick-slider').slick({
				infinite: true,
				autoplay: true,
				autoplaySpeed: 2000,
				nextArrow: '<div class="slick-next slick-arrow"><img src="{{url('img/right-arrow.svg ')}}"/></div>',
				prevArrow: '<div class="slick-prev slick-arrow"><img src="{{url('img/left-arrow.svg')}}" /></div>',
			});
			$('.vertical-slider').slick({
			    dots: true,
			    autoplay: true,
			    autoplaySpeed: 2500,
			    vertical: true,
			    slidesToShow: 3	,
			    slidesToScroll: 1,
			    verticalSwiping: true,
			    responsive: [
			    {
			      breakpoint: 992,
			      settings: {
			        slidesToShow: 2,
			       
			      }
			    },
			    {
			      breakpoint: 768,
			      settings: {
			        slidesToShow: 2,
			      }
			    },
			    {
			      breakpoint: 480,
			      settings: {
			        slidesToShow: 2,
			      }
			    }
			    
			  ]
			  });
			$('.barter-multiple-items').slick({
			  dots: true,
			  infinite: false,
			  autoplay: true,
			    autoplaySpeed: 2500,
			  slidesToShow: 5,
			  slidesToScroll: 1,
			 nextArrow: '<div class="slick-next slick-arrow"><img src="{{url('img/right-arrow.svg ')}}"/></div>',
				prevArrow: '<div class="slick-prev slick-arrow"><img src="{{url('img/left-arrow.svg')}}" /></div>',
			  responsive: [
			    {
			      breakpoint: 1024,
			      settings: {
			        slidesToShow: 3,
			        slidesToScroll: 3,
			        infinite: true,
			        dots: true
			      }
			    },
			    {
			      breakpoint: 768,
			      settings: {
			        slidesToShow: 2,
			        slidesToScroll: 2
			      }
			    },
			    {
			      breakpoint: 480,
			      settings: {
			        slidesToShow: 1,
			        slidesToScroll: 1
			      }
			    }
			  ]
			});
			$('.testimonial-slider').slick({
			  dots: true,
			  infinite: true,
			  autoplay: true,
			  autoplaySpeed: 2000,
			  fade: true,
			  arrow:true,
			 nextArrow: '<div class="slick-next slick-arrow"><img src="{{url('img/right-arrow.svg ')}}"/></div>',
				prevArrow: '<div class="slick-prev slick-arrow"><img src="{{url('img/left-arrow.svg')}}" /></div>',
			});
			function myFunction(x) {
				var y = document.getElementById("overlayNavBar");
			  	x.classList.toggle("change");
				if (y.style.height === "calc(100vh - 45px)") {
				    y.style.height = "0";
				} else {
				   y.style.height = "calc(100vh - 45px)";
				}	
			}
		</script>

	{{ $javascript }}
</body>
</html>
