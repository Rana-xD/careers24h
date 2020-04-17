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
								<h3>@lang('interview_room.online')</h3>
                            <div class="job-grid-sec">
                                <div class="row">
									@foreach ($jobs as $job)
										@foreach ($job->onlineInview as $item)
										<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
											<div class="job-grid border">
												<div class="job-title-sec cv__Info">
													<input type="hidden" name="" class="applicant-id" value="{{ $item->jobseekerProfile->id }}">
													<div class="c-logo"> <img src="{{$item->jobSeekerProfile->user_profile}}"  withd="235" height="115" alt="" /> </div>
													<h3 style="text-align: center">{{ $item->jobSeekerProfile->full_name }}</h3>
													<p style="color: #232323">{{ App\Models\JobUser::find($item->pivot->id)->job->job_title }}</p>
													<p>{{ $item->pivot->interview_date }}</p>
													<span><a class="resume__CV">@lang('interview_room.resume')</a></span>
													<span style="float: right"><a class="video__CV">@lang('interview_room.video_cv')</a></span>
													
												</div>
												<a  href="/interview_room/{{$item->pivot->room_name}}" target="_blank">@lang('interview_room.join_room')</a>
											</div><!-- JOB Grid -->
										</div>
										@endforeach
									@endforeach
                                    
									
                                </div>
							</div>
							
							</div>

							<div class="emply-resume-sec">
								<h3>@lang('interview_room.offline')</h3>
                            <div class="job-grid-sec">
                                <div class="row">
									@foreach ($jobs as $job)
										@foreach ($job->offlineInview as $item)
										<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
											<div class="job-grid border">
												<div class="job-title-sec cv__Info">
													<input type="hidden" name="" class="applicant-id" value="{{ $item->jobseekerProfile->id }}">
													<div class="c-logo"> <img src="{{$item->jobSeekerProfile->user_profile}}"  withd="235" height="115" alt="" /> </div>
													<h3 style="text-align: center">{{ $item->jobSeekerProfile->full_name }}</h3>
													<p style="color: #232323">{{ App\Models\JobUser::find($item->pivot->id)->job->job_title }}</p>
													<p>{{ $item->pivot->interview_date }}</p>
													<span><a class="resume__CV">@lang('interview_room.resume')</a></span>
													<span style="float: right"><a class="video__CV">@lang('interview_room.video_cv')</a></span>
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
<div class="modal-contents">	
</div>
@include('partials.footer_script')
</body>
<script>
	jQuery(document).ready(function($){
		
		$('.video__CV').on('click',CAREER24H.company.showVideoCVModal);
		$('.resume__CV').on('click',CAREER24H.company.showResumeModal);
		
	});
</script>
</html>

