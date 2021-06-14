<x-app-layout>
    
    <x-slot name="page_title">Home</x-slot>
    
    <x-slot name="style">
    </x-slot>

    <x-slot name="javascript">
    </x-slot>

    <section>
		<div class="home-banner common-mt">
            <div class="inner-banner bg-banner pb-md-0 pb-3">
                <div class="slick-slider">
                    <div class="slider-item" style="background-image:url('img/slide1.jpg')">
                    	<img src="{{url('img/slide1.jpg')}}" alt="slide1.jpg" class="img-fluid w-100 h-auto d-md-none d-block">
                    </div> 
                    <div class="slider-item" style="background-image:url('img/slide1.jpg')">
                    	<img src="{{url('img/slide1.jpg')}}" alt="slide1.jpg" class="img-fluid w-100 h-auto d-md-none d-block">
                    </div>
                </div>
									
                <div class="vertical-slider-wrapper my-md-0 my-3">
	                <div class="container-fluid h-100">
	                    <div class="row d-flex h-100">
	                        <div class="col-lg-4 col-md-5 align-self-center ml-auto px-lg-5">
	                            <div class="bg-white  pt-lg-3 pt-md-2 pt-sm-4 pt-3 h-100 px-lg-3 px-md-2 px-sm-4 px-2 shadow">
									<h2 class="p-semibold f-18 text-dark mb-3">SCHEMES</h2>
									<div class="vertical-slider mb-0 ">
										<?php 
											
										?>
										{{-- @foreach($schemeList as $scheme)
											<div class="pt-sm-3 sheme-info pb-1 shadow-sm mb-2 px-3 border">
												<h5 class="p-semibold f-16 text-primary mb-0">{!! $scheme->main_heading !!}</h5>
											  	<p class="f-14 p-regular text-nav-color mb-1 vertical-para">{!! $scheme->content !!}</p>
											  	<a href="#" class="p-regular text-banner"> <i class="fas fa-arrow-right "></i></a>
											</div>
										@endforeach --}}
									</div>
								</div>
	                        </div>
	                    </div>
	                </div>
	            </div>
            </div>
           
        </div>
	</section>
	<section class="about-us py-4">
		<div class="container">
			
			<h3 class="text-dark p-bold f-36 head d-inline-block">ABOUT US</h3>
			<!-- <p class="p-medium f-22 text-secondary">A leading industrial & manufacturing company<br class="d-sm-block d-none">Serving Since 2011</p> -->
			<div class="row pb-3 pt-md-0 pt-4">
				<div class="col-lg-6 align-self-center">
					{{-- <p class="p-regular f-16 text-nav-color">{!! $about_us->content !!}</p> --}}
					<!-- <a href="#" class="btn btn-warning rounded-0 p-regular f-14">Read More</a> -->
				</div>
				<div class="col-lg-6 pt-lg-0 pt-5 col-md-9 col-sm-10 col-10 mx-auto">
					<img src="{{url('img/samvedana-office.jpg')}}" alt="samarth-industry" class="img-fluid w-100 rounded-15">
				</div>
			</div>
		
		</div>
	</section>
	<section class="my-4 product-listing position-relative  pb-sm-5 " id="scrollHere">
		<div class="container py-5">
			<div class="text-center">
				<h3 class="text-dark p-bold f-36 head d-inline-block">GOVERNMENT DECISION</h3>
			</div>
			<div class="barter-multiple-items pt-5 slick-product mt-3">
				<div class="slider-items mx-2">
					<div class="card mb-2 rounded-0" >
						<div class="card-image">
							<div class="card-body px-2">
							    <p class="card-text p-regular f-14 text-nav-color mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel laoreet risus. Integer sed consectetur quam. Nullam sodales, elit eget volutpat ullamcorper, massa orci tempor mi, in commodo sapien lorem vel mauris. Cras molestie ultrices ipsum eu gravida. Donec id faucibus metus.</p>
							</div>
							<div class="overlay bg-white pl-2">
							    <a href="#" class="p-bold f-14 py-2 mb-0 text-dark">Read more</a>
							</div>
						</div>
					</div>
				</div>
				<div class="slider-items mx-2">
					<div class="card mb-2 rounded-0" >
						<div class="card-image">
							<div class="card-body px-2">
							    <p class="card-text p-regular f-14 text-nav-color mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel laoreet risus. Integer sed consectetur quam. Nullam sodales, elit eget volutpat ullamcorper, massa orci tempor mi, in commodo sapien lorem vel mauris. Cras molestie ultrices ipsum eu gravida. Donec id faucibus metus.</p>
							</div>
							<div class="overlay bg-white pl-2">
							    <a href="#" class="p-bold f-14 py-2 mb-0 text-dark">Read more</a>
							</div>
						</div>
					</div>
				</div>
				<div class="slider-items mx-2">
					<div class="card mb-2 rounded-0" >
						<div class="card-image">
							<div class="card-body px-2">
							    <p class="card-text p-regular f-14 text-nav-color mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel laoreet risus. Integer sed consectetur quam. Nullam sodales, elit eget volutpat ullamcorper, massa orci tempor mi, in commodo sapien lorem vel mauris. Cras molestie ultrices ipsum eu gravida. Donec id faucibus metus.</p>
							</div>
							<div class="overlay bg-white pl-2">
							    <a href="#" class="p-bold f-14 py-2 mb-0 text-dark">Read more</a>
							</div>
						</div>
					</div>
				</div>
				<div class="slider-items mx-2">
					<div class="card mb-2 rounded-0" >
						<div class="card-image">
							<div class="card-body px-2">
							    <p class="card-text p-regular f-14 text-nav-color mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel laoreet risus. Integer sed consectetur quam. Nullam sodales, elit eget volutpat ullamcorper, massa orci tempor mi, in commodo sapien lorem vel mauris. Cras molestie ultrices ipsum eu gravida. Donec id faucibus metus.</p>
							</div>
							<div class="overlay bg-white pl-2">
							    <a href="#" class="p-bold f-14 py-2 mb-0 text-dark">Read more</a>
							</div>
						</div>
					</div>
				</div>
				<div class="slider-items mx-2">
					<div class="card mb-2 rounded-0" >
						<div class="card-image">
							<div class="card-body px-2">
							    <p class="card-text p-regular f-14 text-nav-color mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel laoreet risus. Integer sed consectetur quam. Nullam sodales, elit eget volutpat ullamcorper, massa orci tempor mi, in commodo sapien lorem vel mauris. Cras molestie ultrices ipsum eu gravida. Donec id faucibus metus.</p>
							</div>
							<div class="overlay bg-white pl-2">
							    <a href="#" class="p-bold f-14 py-2 mb-0 text-dark">Read more</a>
							</div>
						</div>
					</div>
				</div>
				<div class="slider-items mx-2">
					<div class="card mb-2 rounded-0" >
						<div class="card-image">
							<div class="card-body px-2">
							    <p class="card-text p-regular f-14 text-nav-color mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel laoreet risus. Integer sed consectetur quam. Nullam sodales, elit eget volutpat ullamcorper, massa orci tempor mi, in commodo sapien lorem vel mauris. Cras molestie ultrices ipsum eu gravida. Donec id faucibus metus.</p>
							</div>
							<div class="overlay bg-white pl-2">
							    <a href="#" class="p-bold f-14 py-2 mb-0 text-dark">Read more</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="testimonial py-sm-5 px-sm-5 pt-3 pb-5">
		<div class="container">
			<div class="text-center">
				<h3 class="text-dark p-bold f-36 head d-inline-block ">TESTIMONIAL</h3>
				<h2 class="p-regular f-22 pt-2 text-nav-color text-center ">Thoughts About Our Work</h2>
			</div>
			<div class="row py-3">
				<div class="col-lg-9 mx-auto">
					<div class="testimonial-slider pt-5">
						<div class="slider-item">
							<div class="row">
								<div class="col-md-2 col-sm-6 col-8 mx-sm-auto text-center">
									<img src="{{url('img/defalut-profile.svg')}}" alt="testimonial-profile" class="img-fluid testimonial-img mx-sm-auto">
								</div>
								<div class="col-md-10 pt-md-0 pt-5">
									<div class="clearfix">
										<div class="float-left">
											<h4 class="p-semibold f-22 text-nav-color"> Devil Roy Barman</h4>
										</div>
									</div>
									<p class="n-semiBold f-16 text-black testimonial-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel mauris sit amet velit efficitur pharetra et sed odio. Mauris luctus sagittis mattis. Aliquam pellentesque metus sit amet leo malesuada tristique. Praesent auctor auctor erat. Vestibulum diam sem, blandit vitae nisi lacinia, sodales accumsan sapien. </p>	
								</div> 
							</div>
						</div>
						<div class="slider-item">
							<div class="row">
								<div class="col-md-2 col-sm-6 col-8 mx-sm-auto text-center">
									<img src="{{url('img/defalut-profile.svg')}}" alt="testimonial-profile" class="img-fluid testimonial-img mx-sm-auto">
								</div>
								<div class="col-md-10 pt-md-0 pt-5">
									<div class="clearfix">
										<div class="float-left">
											<h4 class="p-semibold f-22 text-nav-color">John Doe</h4>
										</div>
									</div>
									<p class="n-semiBold f-16 text-black testimonial-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel mauris sit amet velit efficitur pharetra et sed odio. Mauris luctus sagittis mattis. Aliquam pellentesque metus sit amet leo malesuada tristique. Praesent auctor auctor erat. Vestibulum diam sem, blandit vitae nisi lacinia, sodales accumsan sapien. </p>	
								</div> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</x-app-layout>