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
		<div class="block no-padding">
			<div class="container">
				 <div class="row no-gape">
					@include('partials.company_sidebar')
				 	<div class="col-lg-9 column">
				 		<div class="padding-left">
							<div class="emply-resume-sec">
								<h3>Online</h3>
                            <div class="job-grid-sec">
                                <div class="row">
									@foreach ($jobs as $job)
										@foreach ($job->onlineInview as $item)
										<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
											<div class="job-grid border">
												<div class="job-title-sec cv__Info">
													<input type="hidden" name="" class="applicant-id" value="{{ $item->jobseekerProfile->id }}">
													<div class="c-logo"> <img src="{{$item->jobSeekerProfile->user_profile}}"  withd="235" height="115" alt="" /> </div>
													<h3 style="text-align: center"><a href="#" title="">{{ $item->jobSeekerProfile->full_name }}</a></h3>
													<p style="color: #232323">{{ App\Models\JobUser::find($item->pivot->id)->job->job_title }}</p>
													<p>{{ $item->pivot->interview_date }}</p>
													<span><a class="resume__CV">Resume</a></span>
													<span style="float: right"><a class="video__CV">Video CV</a></span>
													
												</div>
												<a  href="/interview_room/{{$item->pivot->room_name}}" target="_blank">Join Room</a>
											</div><!-- JOB Grid -->
										</div>
										@endforeach
									@endforeach
                                    
									
                                </div>
							</div>
							
							</div>

							<div class="emply-resume-sec">
								<h3>Offline</h3>
                            <div class="job-grid-sec">
                                <div class="row">
									@foreach ($jobs as $job)
										@foreach ($job->offlineInview as $item)
										<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
											<div class="job-grid border">
												<div class="job-title-sec cv__Info">
													<input type="hidden" name="" class="applicant-id" value="{{ $item->jobseekerProfile->id }}">
													<div class="c-logo"> <img src="{{$item->jobSeekerProfile->user_profile}}"  withd="235" height="115" alt="" /> </div>
													<h3 style="text-align: center"><a href="#" title="">{{ $item->jobSeekerProfile->full_name }}</a></h3>
													<p style="color: #232323">{{ App\Models\JobUser::find($item->pivot->id)->job->job_title }}</p>
													<p>{{ $item->pivot->interview_date }}</p>
													<span><a class="resume__CV">Resume</a></span>
													<span style="float: right"><a class="video__CV">Video CV</a></span>
												</div>
											</div><!-- JOB Grid -->
										</div>
										@endforeach
									@endforeach
                                    
									
                                </div>
							</div>
							
							</div>
					 	</div>
					</div>
				 </div>
			</div>
		</div>
	</section>
</div>
@include('partials.footer_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js" integrity="sha256-AdQN98MVZs44Eq2yTwtoKufhnU+uZ7v2kXnD5vqzZVo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" integrity="sha256-yMjaV542P+q1RnH6XByCPDfUFhmOafWbeLPmqKh11zo=" crossorigin="anonymous" />

<div class="modal-contents">	
</div>
@include('layouts.interview_date_modal')
</body>
<script>
	jQuery(document).ready(function($){
		
		$('.video__CV').on('click',CAREER24H.company.showVideoCVModal);
		$('.resume__CV').on('click',CAREER24H.company.showResumeModal);
		
	});
</script>
</html>

