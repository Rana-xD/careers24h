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
							 @foreach ($jobs as $job)
							 	@if (count($job->applicants))
								 <div class="emply-resume-sec">
									<h3>{{ $job->job_title}}: {{ count($job->applicants) }}</h3>
									@foreach ($job->applicants as $applicant)
									<div class="emply-resume-list">
										<input type="hidden" name="" class="applicant-id" value="{{ $applicant->jobseekerProfile->id }}">
										<input type="hidden" name="" class="pivot-id" value="{{ $applicant->pivot->id }}">
										<div class="emply-resume-thumb">
											<img src="{{ $applicant->jobseekerProfile->user_profile }}" alt="" />
										</div>
										<div class="emply-resume-info">
												<h3><a href="/candidate/profile/{{$applicant->jobseekerProfile->uuid}}" target="_blank">{{ $applicant->jobseekerProfile->full_name }}</a></h3>
												   <p style="color: {{ App\Models\JobUser::find($applicant->pivot->id)->getCSS() }}">{{ $applicant->pivot->status}}</p>
												   @if (!empty($applicant->pivot->interview_date))
												   <p style="color: #2980b9">{{ $applicant->pivot->interview_date}}</p>
												   @endif
												   @if (!empty($applicant->pivot->is_online))
												  <p style="color: #fb236a"><a href="/interview_room/{{$applicant->pivot->room_name}}" target="_blank">Join Room</a></p>
												   @endif
												   
										</div>
										<div class="action-resume">
										   <div class="action-resume-view">
											   <span><a class="cover__letter">Cover Letter</a></span>
										   </div>
									   </div>
									   <div class="action-resume">
										   <div class="action-resume-view">
											   <span><a class="video__CV">Video CV</a></span>
										   </div>
									   </div>
									   <div class="action-resume">
										   <div class="action-resume-view">
											   <span><a class="resume__CV">View CV</a></span>
										   </div>
									   </div>
										<div class="action-resume" style="padding-right: 10px;">
											<div class="action-center">
												<span>Action <i class="la la-angle-down"></i></span>
												<ul>
													<li><a class="accept-applicant">Accept</a></li>
													<li><a class="reject-applicant">Reject</a></li>
													@if ($applicant->pivot->status === 'Accept')
														<li><a class="interview-date">Interview Date</a></li>
													@endif
												</ul>
											</div>
										</div>
									</div><!-- Emply List -->
									@endforeach
								</div>
							 	@endif
							 @endforeach
					 		
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
		CAREER24H.company.initializeDateTimePicker();
		$('.cover__letter').on('click',CAREER24H.company.showCoverLetterModal);
		$('.video__CV').on('click',CAREER24H.company.showVideoCVModal);
		$('.resume__CV').on('click',CAREER24H.company.showResumeModal);
		$('.accept-applicant').on('click',CAREER24H.company.handleAcceptApplicant);
		$('.reject-applicant').on('click',CAREER24H.company.handleRejectApplicant);
		$('.interview-date').on('click',CAREER24H.company.handleInterviewDate);
		$('#setInterviewDate').on('click',CAREER24H.company.handleSetInterviewDate);
		
	});
</script>
</html>

