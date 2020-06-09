<!DOCTYPE html>
<html lang="en">
<head>
     @include('partials.header')
</head>
<body>

	<div class="theme-layout" id="scrollup">
		
		@include('partials.navbar')
	
		<section>
			<div class="block no-padding">
				<div class="container fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="main-featured-sec">
								<div class="new-slide">
									<img src="https://careers24h.s3-ap-southeast-1.amazonaws.com/imageSlider/Webp.net-compress-image-2.jpg" alt="" />
								</div>
								<div class="job-search-sec">
									<div class="job-search">
										<h3>The Easiest Way to Get Your New Job</h3>
										<span>Find Jobs, Employment & Career Opportunities</span>
										<form action="" method="GET" id="filterInHomePage">
											<div class="row">
												<div class="col-lg-7 col-md-5 col-sm-12 col-xs-12">
													<div class="job-field">
														<input type="text" placeholder="Jobs, Employment & Career Opportunities title" name="job_title" id="job_title"/>
														<i class="la la-keyboard-o"></i>
													</div>
												</div>
												<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
													<div class="job-field">
														<select data-placeholder="City, province or region" class="chosen-city" name="city" id="city">
															<option value=""></option>
															@foreach (config('global.city') as $item)
												 			<option value="{{ $item }}">{{__('city.'.$item)}}</option>
													 		@endforeach
														</select>
														<i class="la la-map-marker"></i>
													</div>
												</div>
												<div class="col-lg-1 col-md-2 col-sm-12 col-xs-12">
													<button type="submit"><i class="la la-search"></i></button>
												</div>
											</div>
										</form>
										{{-- <div class="or-browser">
											<span>Browse job offers by</span>
											<a href="#" title="">Category</a>
										</div> --}}
									</div>
								</div>
								<div class="scroll-to">
									<a href="#scroll-here" title=""><i class="la la-arrow-down"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	
		<section id="scroll-here">
			<div class="block">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="heading">
								<h2>Popular Categories</h2>
								{{-- <span>37 jobs live - 0 added today.</span> --}}
							</div><!-- Heading -->
							<div class="cat-sec">
								<div class="row no-gape">
									@foreach ($categories as $category)
									<div class="col-lg-3 col-md-3 col-sm-6">
										<div class="p-category">
											<a href="javascript:void(0);" title="">
												{{-- <i class="la la-bullhorn"></i> --}}
												<span>{{$category->name}}</span>
												<p>({{$category->popular_count}} open positions)</p>
											</a>
										</div>
									</div>
									@endforeach
								</div>
							</div>
							
						</div>
						<div class="col-lg-12">
							<div class="browse-all-cat">
								<a href="/jobs" title="">Browse All Categories</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	
		<section>
			<div class="block double-gap-top double-gap-bottom">
				<div data-velocity="-.1" style="background: url(http://placehold.it/1920x1000) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible layer color"></div><!-- PARALLAX BACKGROUND IMAGE -->
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="simple-text-block">
								<h3>Make a Difference with Your Online Resume!</h3>
								<span>Your resume in minutes with JobHunt resume assistant is ready!</span>
								<a href="/signup" title="">Create an Account</a>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</section>
		<section>
			<div class="block">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="heading">
								<h2>Featured Jobs</h2>
								<span>Leading Employers already using job and talent.</span>
							</div><!-- Heading -->
							@foreach ($jobs as $job)
								<div class="job-listings-sec">
									<div class="job-listing">
										<div class="job-title-sec">
											<div class="c-logo"> <img src="{{ $job->companyProfile->company_logo }}" alt="" width="100" height="90"/> </div>
											<h3><a href="/job/{{ $job->uuid }}" title="">{{ $job->job_title  }}</a></h3>
											<span>{{ $job->companyProfile->name }}</span>
										</div>
										{{-- <span class="job-lctn">{{$job->offer_salary}}</span> --}}
										<span class="job-lctn"><i class="la la-map-marker"></i>{{ __('city.'.$job->city) }}, @lang('city.Cambodia')</span>
										<span class="job-lctn salary">{{ $job->offer_salary }}</span>
										<span class="job-is {{ $job->getJobTypeCSSClass() }}">{{ __('job_type.'.$job->working_term) }}</span>
									</div><!-- Job -->
							</div>
							@endforeach
						</div>
						<div class="col-lg-12">
							<div class="browse-all-cat">
								<a href="/jobs" title="">Load more listings</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	
		<section>
			<div class="block" style="background: #8b91dd;">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="heading">
								<h2 style="color:white;">Companies We've Helped</h2>
								<span style="color:white;">Some of the companies we've helped recruit excellent applicants over the years.</span>
							</div><!-- Heading -->
							<div class="comp-sec">
								<div class="company-img">
									<a href="#" title=""><img src="http://placehold.it/180x80" alt="" /></a>
								</div><!-- Client  -->
								<div class="company-img">
									<a href="#" title=""><img src="http://placehold.it/180x80" alt="" /></a>
								</div><!-- Client  -->
								<div class="company-img">
									<a href="#" title=""><img src="http://placehold.it/180x80" alt="" /></a>
								</div><!-- Client  -->
								<div class="company-img">
									<a href="#" title=""><img src="http://placehold.it/180x80" alt="" /></a>
								</div><!-- Client  -->
								<div class="company-img">
									<a href="#" title=""><img src="http://placehold.it/180x80" alt="" /></a>
								</div><!-- Client  -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	
		<section>
			<div class="block">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="heading">
								<h2>For Company</h2>
							</div><!-- Heading -->
							<div class="plans-sec">
								<div class="row">
									<div class="col-lg-6">
										<div class="pricetable">
											<div class="pricetable-head">
												<h3>Basic Plan</h3>
												<h2>Free</h2>
											</div><!-- Price Table -->
											<ul>
												<li>5 jobs posting</li>
												<li>0 featured job</li>
												<li>Job displayed for 20 days</li>
												<li>Resume Search</li>
												<li>Online Interview 5 hours/week</li>
												<li>5 online appointments</li>
											</ul>
											<a href="/signup" title="">REGISTER NOW</a>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="pricetable active">
											<div class="pricetable-head">
												<h3>Pro Plan</h3>
												<h2><i>$</i>30</h2>
												<span>290$ Annual</span>
											</div><!-- Price Table -->
											<ul>
												<li>Unlimited jobs posting</li>
												<li>10 featured job</li>
												<li>Job displayed for 30 days</li>
												<li>Resume Search</li>
												<li>Candidate Hunting</li>
												<li>Online Interview 20 hours/week</li>
												<li>unlimited online appointments</li>
											</ul>
											<a href="/signup" title="">SUBSCRIBE NOW</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="heading">
								<h2>For Job Seeker</h2>
							</div><!-- Heading -->
							<div class="plans-sec">
								<div class="row">
									<div class="col-lg-6">
										<div class="pricetable">
											<div class="pricetable-head">
												<h3>Basic Plan</h3>
												<h2>Free</h2>
											</div><!-- Price Table -->
											<ul>
												<li>Public Account</li>
												<li>Single Video CV</li>
												<li>2-3 CV Template</li>
											</ul>
											<a href="/signup" title="">REGISTER NOW</a>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="pricetable active">
											<div class="pricetable-head">
												<h3>Pro Plan</h3>
												<h2><i>$</i>3</h2>
												<span>25$ Annual</span>
											</div><!-- Price Table -->
											<ul>
												<li>Private Account</li>
												<li>Multiple Video CV</li>
												<li>Unlimited CV Templates</li>
												<li>Job Alert</li>
												<li>Follow Company</li>
											</ul>
											<a href="/signup" title="">SUBSCRIBE NOW</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	
		<section>
			<div class="block no-padding">
				<div class="container fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="simple-text">
								<h3>Gat a question?</h3>
								<span>We're here to help. Check out our FAQs, send us an email or call us at 1 (800) 555-5555</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	
	
		@include('partials.footer')
		@include('partials.footer_script')
	
	</div>
	</body>
	<script>
		jQuery(document).ready(function($){
			$('#filterInHomePage').on('submit',CAREER24H.main.handleFilterJobInHomePage);
		});
	</script>
</html>