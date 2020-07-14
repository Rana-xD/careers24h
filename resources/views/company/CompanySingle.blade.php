<!DOCTYPE html>
<html>
<head>
	@include('partials.header')
	
</head>
<body>


<div class="theme-layout" id="scrollup">
	
	@include('partials.navbar')

	<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url(https://careers24h.s3-ap-southeast-1.amazonaws.com/imageSlider/Webp.net-compress-image-2.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
							
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
				 	<div class="col-lg-12 column">
				 		<div class="job-single-sec style3">
				 			<div class="job-head-wide">
				 				<div class="row">
				 					<div class="col-lg-10">
				 						<div class="job-single-head3 emplye">
										 	<div class="job-thumb"> <img src="{{ $company->company_logo }}" width="160" height="150" alt="" /></div>
							 				<div class="job-single-info3">
							 					<h3>{{ $company->name }}</h3>
							 					<span><i class="la la-link"></i>{{ $company->website }}</span>
							 					<ul class="tags-jobs">
												 	<li><i class="la la-phone"></i>{{ $company->phone_number }}</li>
								 					<li><i class="la la-envelope-o"></i>{{ $company->email }}</li>
								 				</ul>
							 				</div>
							 			</div><!-- Job Head -->
				 					</div>
				 					<div class="col-lg-2">
				 						<div class="share-bar">
											@if ($social_media->linkedin)
										 		<a class="share-linkedin social-media" data-id="{{$social_media->linkedin}}"><i class="la la-linkedin" data-id="{{$social_media->linkedin}}"></i></a>
											@endif
											@if ($social_media->facebook)
												<a class="share-fb social-media" data-id="{{$social_media->facebook}}"><i class="fa fa-facebook" data-id="{{$social_media->facebook}}"></i></a>
											@endif
											@if ($social_media->twitter)
												<a class="share-twitter social-media" data-id="{{ $social_media->twitter }}"><i class="fa fa-twitter" data-id="{{ $social_media->twitter }}"></i></a>
											@endif
											@if ($social_media->instagram)
												<a class="share-instagram social-media" data-id="{{ $social_media->instagram }}"><i class="fa fa-instagram" data-id="{{ $social_media->instagram }}"></i></a>
											@endif
							 			</div>
								 		<div class="emply-btns">
								 			{{-- <a class="seemap" href="#" title=""><i class="la la-map-marker"></i> See On Map</a>
								 			<a class="followus" href="#" title=""><i class="la la-paper-plane"></i> Follow us</a> --}}
								 		</div>
				 					</div>
				 				</div>
				 			</div>
				 			<div class="job-wide-devider">
							 	<div class="row">
							 		<div class="col-lg-8 column">		
							 			<div class="job-details">
										 	<h3>@lang('company.about') {{$company->name}}</h3>
							 				{!! $company->info  !!}
							 			</div>
								 		<div class="recent-jobs">
							 				<h3>@lang('company.job_from') {{$company->name}}</h3>
							 				<div class="job-list-modern">
											 	<div class="job-listings-sec no-border">
													 @foreach ($company->activeJobs as $job)
													 	<div class="job-listing wtabs noimg">
															<div class="job-title-sec">
																<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
																   <h3><a href="/job/{{ $job->uuid }}" title="">{{ $job->job_title }}</a></h3>
																<div class="job-lctn"><i class="la la-map-marker"></i>{{ __('city.'.$job->sourceOfCity->name) }}, @lang('city.Cambodia')</div>
															</div>
															<div class="job-style-bx">
																 	<span>{{$job->offer_salary}}</span>
																	<span class="job-is {{ $job->getJobTypeCSSClass() }} ">{{ __('job_type.'.$job->working_term) }}</span>
																	<i>{{ $job->created_at->diffForHumans() }}</i>
															</div>
														</div>
													 @endforeach
												</div>
											 </div>
							 			</div>
							 		</div>
							 		<div class="col-lg-4 column">
							 			<div class="job-overview">
								 			<h3>@lang('company.company_information')</h3>
								 			<ul>
												 <li><i class="la la-file-text"></i><h3>@lang('company.post_job')</h3><span>{{count($company->activeJobs)}}</span></li>
											 	<li><i class="la la-map"></i><h3>@lang('company.location')</h3><span>{{__('city.'.$company->sourceOfCity->name)}}, @lang('city.Cambodia')</span></li>
											 	<li><i class="la la-bars"></i><h3>@lang('company.industry')</h3><span>{{$company->industry}}</span></li>
								 				<li><i class="la la-clock-o"></i><h3>@lang('company.since')</h3><span>{{$company->start_year}}</span></li>
												 <li><i class="la la-users"></i><h3>@lang('company.team_size')</h3><span>{{$company->team_size}}</span></li>
												 <li><i class="la la-eye"></i><h3>@lang('company.view')</h3><span>{{$company->view_count}}</span></li>
								 			</ul>
								 		</div><!-- Job Overview -->
							 		</div>
							 	</div>
							 </div>
					 	</div>
				 	</div>
				</div>
			</div>
		</div>
	</section>

	@include('partials.footer')

</div>

@include('partials.footer_script')

</body>
<script>
	jQuery(document).ready(function($){
		$('.social-media').on('click',CAREER24H.main.handleOpenSocailMediaLinkInNewTab);
	});
</script>
</html>

