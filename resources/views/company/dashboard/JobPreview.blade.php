<!DOCTYPE html>
<html>
<head>
	@include('partials.header')
	
</head>
<body>
<div class="theme-layout" id="scrollup">
	
    @include('partials.navbar')
    @include('partials.company_top_content')

	<section>
		<div class="block">
			<div class="container">
				<div class="row">
				 	<div class="col-lg-12 column">
				 		<div class="job-single-sec">
				 			<div class="job-single-head2">
							 <div class="job-title2"><h3>{{  $job->job_title }}</h3><span class="job-is {{ $job->getJobTypeCSSClass() }}">{{ __('job_type.'.$job->working_term) }}</span></div>
				 				<ul class="tags-jobs">
									<li><i class="la la-map-marker"></i> {{ __('city.'.$job->city) }}, @lang('city.Cambodia')</li>
									<li><i class="la la-money"></i> Monthly Salary : <span>{{ $job->offer_salary }}</span></li>
									<li><i class="la la-calendar-times-o"></i> Deadline: {{ date('M d, Y', strtotime($job->deadline))  }}</li>
									<li><i class="la la-eye"></i> Views: {{$job->view_count}}</li> 
								 </ul>
								 <ul class="tags-jobs">
									<li><i class="la la-calendar"></i> Working Date: <span>{{ $work_day->from }}-{{ $work_day->to }}</span></li>
									<li><i class="la la-dashboard"></i> Working Time: <span>{{ $work_time->from }} - {{ $work_time->to }}</span></li>
				 				</ul>
				 			</div><!-- Job Head -->
				 			<div class="job-details">
				 				<h3>Job Description</h3>
                                {!! $job->description !!}
				 				<h3>Responsibility</h3>
				 				<p>{!! $job->responsibility !!}</p>
				 				<h3>Required Skills</h3>
                                 <p>{!! $job->required_skill !!}</p>
                                 <h3>Benefits</h3>
				 				<p>{!! $job->benefit !!}</p>
				 			</div>
				 			<div class="job-overview">
					 			<h3>Job Overview</h3>
					 			<ul>
									<li><i class="la la-users"></i><h3>Number of Position</h3><span>{{ $job->pax }}</span></li>
                                 <li><i class="la la-mars-double"></i><h3>Gender</h3><span>{{ $job->is_specific_gender ? $job->gender : 'Both'  }}</span></li>
                                 <li><i class="la la-thumb-tack"></i><h3>Career Level</h3><span>{{ $job->career_level  }}</span></li>
                                 <li><i class="la la-puzzle-piece"></i><h3>Category</h3><span>{{ $job->category }}</span></li>
					 				<li><i class="la la-shield"></i><h3>Experience</h3><span>{{ $job->years_of_experience }} Years</span></li>
                                 <li><i class="la la-line-chart "></i><h3>Qualification</h3><span>{{ $job->qualification }}</span></li>
					 			</ul>
					 		</div><!-- Job Overview -->
				 		</div>
				 	</div>
				</div>
			</div>
		</div>
	</section>


</div>
@include('partials.footer_script')

</body>
</html>

