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
						<div class="inner-header wform">
							<div class="job-search-sec">
								<div class="job-search">
									
								</div>
							</div>
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
				 		
				 		<div class="filterbar">
				 			<h5>{{count($jobs)}} @lang('job.job_vacancy')</h5>
				 		</div>
				 		<div class="job-grid-sec">
							<div class="row">
								@foreach ($jobs as $job)
								<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
									<div class="job-grid border">
										<div class="job-title-sec">
											<div class="c-logo"> <img src="{{$job->companyLogo()}}" alt="" width="160" height="150"/> </div>
											<h3><a href="/job/{{ $job->uuid }}" title="">{{$job->job_title}}</a></h3>
											<span>{{ $job->offer_salary }}</span>
											<span  style="float: right;color: {{$job->getColorCode()}}">{{ __('job_type.'.$job->working_term) }}</span>
										</div>
										<span class="job-lctn">{{ __('city.'.$job->sourceOfCity->name) }}, @lang('city.Cambodia')</span>
									</div><!-- JOB Grid -->
								</div>
								@endforeach
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
</html>

