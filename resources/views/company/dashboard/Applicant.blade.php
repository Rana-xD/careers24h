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
													<li><a href="#" title="">Linked-in Profile</a></li>
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
<div class="modal-contents">

</div>
</body>
<script>
	jQuery(document).ready(function($){
		$('.cover__letter').on('click',CAREER24H.company.showCoverLetterModal);
		$('.video__CV').on('click',CAREER24H.company.showVideoCVModal);
		$('.resume__CV').on('click',CAREER24H.company.showResumeModal);
		$('.accept-applicant').on('click',CAREER24H.company.handleAcceptApplicant);
		$('.reject-applicant').on('click',CAREER24H.company.handleRejectApplicant);
	});
</script>
</html>

