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
								<h3>Interview</h3>
                            <div class="job-grid-sec">
                                <div class="row">
									@foreach ($interview_jobs as $job)	
										<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
											<div class="job-grid border">
												<div class="job-title-sec cv__Info">
													<div class="c-logo"> <img src="{{$job->companyProfile->company_logo}}"  withd="235" height="115" alt="" /> </div>
													<h3 style="text-align: center">{{ $job->companyProfile->name }}</h3>
													<p style="color: #232323">{{ $job->job_title }}</p>
													<p>{{ $job->pivot->interview_date }}</p>
												</div>
												<a  href="/interview_room/{{$job->pivot->room_name}}" target="_blank">Join Room</a>
											</div><!-- JOB Grid -->
										</div>										
									@endforeach
                                    
									
                                </div>
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
</body>
<script>
	jQuery(document).ready(function($){
		
	});
</script>
</html>

