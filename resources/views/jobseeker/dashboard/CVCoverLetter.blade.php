<!DOCTYPE html>
<html>
<head>
	@include('partials.header')	
</head>
<body>

<div class="theme-layout" id="scrollup">
	@include('partials.navbar')
	@include('partials.jobseeker_top_content')
	<section>
		<div class="block no-padding">
			<div class="container">
				 <div class="row no-gape">
					@include('partials.jobseeker_sidebar')
				 	<div class="col-lg-9 column">
				 		<div class="padding-left">
					 		<div class="manage-jobs-sec">
					 			<h3>@lang('cover_letter.cover_letter_video_cv')</h3>
						 		<div class="contact-edit">
						 			<form>
										 {{-- @csrf --}}
						 				<div class="row">
						 					{{-- <div class="col-lg-6">
						 						<span class="pf-title">Select Your CV</span>
						 						<div class="pf-field">
						 							<select data-placeholder="Select Your CV" class="chosen">
														<option>alitufan-cv</option>
														<option>alitufan-cv old</option>
													</select>
						 						</div>
						 					</div> --}}
						 					<div class="col-lg-12">
												 {{-- <span class="pf-title">Cover Letter</span> --}}
												 <h3>@lang('cover_letter.cover_letter')</h3>
						 						<div class="pf-field">
						 							<textarea id="coverLetter"></textarea>
						 						</div>
						 					</div>
						 					<div class="col-lg-12">
						 						<button type="button" id ="updateCoverLetter">@lang('cover_letter.update')</button>
						 					</div>
						 				</div>
									 </form>
									 
								 </div>
								 
							 	</div>
							 	<div class="contact-edit">
								<form>
									@csrf
									<div class="row">
										<div class="col-lg-12">
											<h3>@lang('cover_letter.video_cv')</h3>
										</div>
										<div class="col-lg-12">
											<span class="pf-title" style="color:red">** @lang('cover_letter.maximum_video')</span>
										</div>
										<div class="col-lg-12 video-content">
											<input type="file" accept="video/*" style="display:none" id="videoCV"/>
											@if (!empty($videoCV))
												<video controls width="100%" height="600px" src="{{ $videoCV->url }}"></video>
											@else
											<img src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg" class="img-fluid" alt="" id="videoThumnail" width="100%" height="600px"/>
											@endif
										</div>
										<div class="col-lg-12">
											<button type="button" id ="uploadVideo">@lang('cover_letter.upload')</button>
											<button type="button" id ="browseVideo" style="margin-right:30px">@lang('cover_letter.browse')</button>
											<button type="button" id ="videoSample" style="float: left">@lang('cover_letter.sample')</button>
										</div>
									</div>
								</form>
							 </div>
					 	</div>
					</div>
				 </div>
			</div>
		</div>
	</section>

</div>

<div class="profile-sidebar">
	<span class="close-profile"><i class="la la-close"></i></span>
	<div class="can-detail-s">
		<div class="cst"><img src="http://placehold.it/145x145" alt="" /></div>
		<h3>David CARLOS</h3>
		<span><i>UX / UI Designer</i> at Atract Solutions</span>
		<p>creativelayers088@gmail.com</p>
		<p>Member Since, 2017</p>
		<p><i class="la la-map-marker"></i>Istanbul / Turkey</p>
	</div>
	<div class="tree_widget-sec">
		<ul>
				 					<li><a href="candidates_profile.html" title=""><i class="la la-file-text"></i>My Profile</a></li>
									<li><a href="candidates_my_resume.html" title=""><i class="la la-briefcase"></i>My Resume</a></li>
									<li><a href="candidates_shortlist.html" title=""><i class="la la-money"></i>Shorlisted Job</a></li>
									<li><a href="candidates_applied_jobs.html" title=""><i class="la la-paper-plane"></i>Applied Job</a></li>
									<li><a href="candidates_job_alert.html" title=""><i class="la la-user"></i>Job Alerts</a></li>
									<li><a href="candidates_cv_cover_letter.html" title=""><i class="la la-file-text"></i>Cv & Cover Letter</a></li>
									<li><a href="candidates_change_password.html" title=""><i class="la la-flash"></i>Change Password</a></li>
									<li><a href="#" title=""><i class="la la-unlink"></i>Logout</a></li>
				 				</ul>
	</div>
</div><!-- Profile Sidebar -->

<div class="modal fade" id="sampleVideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">

	  <!--Content-->
	  <div class="modal-content">

		<!--Body-->
		<div class="modal-body mb-0 p-0">

		  <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
			<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/vlDzYIIOYmM"
			  allowfullscreen></iframe>
		  </div>

		</div>

	  </div>
	  <!--/.Content-->

	</div>
  </div>
@include('partials.footer_script')

</body>
<script>
	jQuery(document).ready(function($){
			let coverLetter = `<?php echo $coverLetter ?>`
			if(coverLetter) $('#coverLetter').summernote('code',coverLetter)
			$('#updateCoverLetter').on('click',CAREER24H.jobseeker.updateCoverLetter);
			$('#browseVideo').on('click',()=>{
				$('#videoCV').click();
			})

			$('#videoCV').on('change',CAREER24H.jobseeker.handleVideoInput);
			$('#uploadVideo').on('click',CAREER24H.jobseeker.handleVideoUpload);
			$('#videoSample').on('click',()=>{
				console.log("HELLO");
				$('#sampleVideo').modal('show');
			})
	});
</script>
</html>

