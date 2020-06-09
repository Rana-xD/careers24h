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
			<div data-velocity="-.1" style="background: url(http://placehold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
							<h3></h3>
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
				 	<div class="col-lg-8 column">
				 		<div class="job-single-sec">
				 			<div class="job-single-head2">
							 	<input type="hidden" name="jobId" id="jobId" value="{{ $job->id }}">
							 	<div class="job-title2"><h3>{{ $job->job_title }}</h3><span class="job-is {{ $job->getJobTypeCSSClass() }}">{{ __('job_type.'.$job->working_term) }}</span></div>
				 				<ul class="tags-jobs">
									 <li><i class="la la-map-marker"></i> {{ __('city.'.$job->city) }}, @lang('city.Cambodia')</li>
									 <li><i class="la la-money"></i> @lang('job.offer_salary') : <span>{{ $job->offer_salary }}</span></li>
									 <li><i class="la la-calendar-times-o"></i> @lang('job.deadline'): {{ date('M d, Y', strtotime($job->deadline))  }}</li>
									 <li><i class="la la-eye"></i> @lang('job.view'): {{$job->view_count}}</li> 
								</ul>
								<ul class="tags-jobs">
									<li><i class="la la-calendar"></i> @lang('job.work_day'): <span>{{ $work_day->from }}-{{ $work_day->to }}</span></li>
									<li><i class="la la-dashboard"></i> @lang('job.work_time'): <span>{{ $work_time->from }} - {{ $work_time->to }}</span></li>
				 				</ul>
							 </div><!-- Job Head -->
							 <div class="job-overview">
								<h3>Job Overview</h3>
								<ul>
									<li><i class="la la-users"></i><h3>@lang('job.pax')</h3><span>{{ $job->pax }}</span></li>
									<li><i class="la la-mars-double"></i><h3>@lang('job.gender')</h3><span>{{ $job->is_specific_gender ? $job->gender : 'Both' }}</span></li>
									<li><i class="la la-thumb-tack"></i><h3>@lang('job.career_level')</h3><span>{{ $job->career_level }}</span></li>
									<li><i class="la la-puzzle-piece"></i><h3>@lang('job.category')</h3><span>{{ $job->sourceOfCategory->name }}</span></li>
									<li><i class="la la-shield"></i><h3>@lang('job.experience')</h3><span>{{ $job->years_of_experience }} Years</span></li>
								<li><i class="la la-line-chart "></i><h3>@lang('job.qualification')</h3><span>{{ $job->qualification  }}</span></li>
								</ul>
							</div>
				 			<div class="job-details">
				 				<h3>@lang('job.job_description')</h3>
				 					{!! $job->description !!}
				 				<h3>@lang('job.responsibility')</h3>
									{!! $job->responsibility  !!}
								 <h3>@lang('job.required_skill')</h3>
								 	{!! $job->required_skill  !!}
								 <h3>@lang('job.benefit')</h3>
				 					{!! $job->benefit  !!}
				 			</div>
				 			<!-- Job Overview -->
				 			<div class="share-bar">
				 				{{-- <span>Share</span><a href="#" title="" class="share-fb"><i class="fa fa-facebook"></i></a><a href="#" title="" class="share-twitter"><i class="fa fa-twitter"></i></a> --}}
				 			</div>
						 </div>
						 <div class="recent-jobs">
							<h3>@lang('job.recent_job')</h3>
							@foreach ($job->recentJob() as $item)
							<div class="job-list-modern">
								<div class="job-listings-sec no-border">
								   <div class="job-listing wtabs">
									   <div class="job-title-sec">
										   <div class="c-logo"> <img src="{{$item->companyProfile->company_logo}}" width="100" height="90" alt="" /> </div>
									   	   <h3><a href="/job/{{ $item->uuid }}" title="">{{ $item->job_title }}</a></h3>
										   <div class="job-lctn"><i class="la la-map-marker"></i>{{ __('city.'.$item->city) }}, @lang('city.Cambodia')</div>
									   </div>
									   <div class="job-style-bx">
											<span>{{$item->offer_salary}}</span>
									   		<span class="job-is {{ $item->getJobTypeCSSClass() }} ">{{ __('job_type.'.$item->working_term) }}</span>
										   <i>{{ $item->created_at->diffForHumans() }}</i>
									   </div>
								   </div><!-- Job -->
							   </div>
							</div>
							@endforeach
						</div>
				 	</div>
				 	<div class="col-lg-4 column">
				 		<div class="job-single-head style2">
						 	<div> <a href="/company/{{$job->companyProfile->uuid}}"><img class="company-logo" src="{{ $job->companyProfile->company_logo  }}"  width="160" height="150" alt="" /></a> </div>
			 				<div class="job-head-info">
							 	<h4><a href="/company/{{$job->companyProfile->uuid}}">{{ $job->companyName()  }}</a></h4>
			 					<span>{{ $job->companyAddress() }}</span>
							 	@if ($job->companyWebsite())
									<p><i class="la la-unlink"></i> {{ $job->companyWebsite() }}</p> 
								@endif
								@if ($job->companyPhoneNumber())
							 		<p><i class="la la-phone"></i>{{ $job->companyPhoneNumber() }}</p>
								@endif
								@if ($job->companyWebsite())
							 		<p><i class="la la-envelope-o"></i> {{ $job->companyWebsite() }}</p>
								@endif
			 				</div>
			 				<a id="applyJob" class="apply-job-linkedin"><i class="la la-paper-plane"></i>@lang('job.apply')</a>
							<a href="/job/company/{{$job->companyProfile->uuid}}" title="" class="viewall-jobs">@lang('job.view_all_job')</a>
			 			</div><!-- Job Head -->
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
		$('#applyJob').on('click',CAREER24H.main.handleApplyJob);
	});
</script>
</html>

