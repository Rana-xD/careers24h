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
					 		<div class="profile-title">
					 			<h3>My Profile</h3>
					 			<div class="upload-img-bar">
								 <span class="round"><img src="{{  $jobseeker_profile->user_profile }}" alt="" id="ProfileImage"/></span>
					 				<div class="upload-info">
										 <a id="openFileInput">Browse</a>
										 <input type="file" name="logo" id="JobseekerImage" style="display:none">
					 					<span>Max file size is 1MB, Minimum dimension: 270x210 And Suitable files are .jpg & .png</span>
					 				</div>
					 			</div>
					 		</div>
					 		<div class="profile-form-edit">
					 			<form>
									 @csrf
					 				<div class="row">
					 					<div class="col-lg-5">
					 						<span class="pf-title">Full Name</span>
					 						<div class="pf-field">
											 <input type="text" placeholder="Ali TUFAN" name="full_name" id="full_name" value="{{ $jobseeker_profile->full_name }}"/>
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">Age</span>
					 						<div class="pf-field">
											 <input type="text" placeholder="21" name="age" id="age" value="{{  $jobseeker_profile->age }}"/>
					 						</div>
										 </div>
										 <div class="col-lg-4">
											<span class="pf-title">Gender</span>
											<div class="pf-field">
											<select data-placeholder="Allow In Search" class="chosen" name="gender" id="gender" value="{{ $jobseeker_profile->gender }}">
													<option value="MALE">MALE</option>
													<option value="FEMALE">FEMALE</option>
													<option value="OTHER">OTHER</option>
												</select>
											</div>
										</div>
					 					<div class="col-lg-6">
											<span class="pf-title">Experience</span>
											<div class="pf-field">
											<input type="text" placeholder="2" name="experience" id="experience" value="{{ $jobseeker_profile->experience }}"/>
											</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Industry</span>
					 						<div class="pf-field">
											 <select data-placeholder="Please Select Industry" class="chosen" name="industry" id="industry" value="{{ $jobseeker_profile->industry }}">
													<option value=""></option>
													@foreach ($industry as $item)
												 			<option value="{{ $item }}">{{ $item }}</option>
													 @endforeach
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Education Levels</span>
					 						<div class="pf-field">
												 <select data-placeholder="Please Select Education Level" class="chosen" name="education_level" id="education_level" value="{{ $jobseeker_profile->education_level }}">
													<option value=""></option>
													 @foreach ($education_level as $item)
												 			<option value="{{ $item }}">{{ $item }}</option>
													 @endforeach
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Career Levels</span>					 						
					 						<div class="pf-field">
						 						<div class="pf-field">
													 <select data-placeholder="Please Select Career Level" class="chosen" name="career_level" id="career_level" value="{{ $jobseeker_profile->career_level }}">
														<option value=""></option>
														@foreach ($career_level as $item)
												 			<option value="{{ $item }}">{{ $item }}</option>
													 @endforeach
													</select>
						 						</div>
											</div>
					 					</div>
					 					{{-- <div class="col-lg-12">
					 						<span class="pf-title">Categories</span>					 						
					 						<div class="pf-field no-margin">
						 						<ul class="tags">
										           <li class="addedTag">Photoshop<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden" name="tags[]" value="Photoshop"></li>
										           <li class="addedTag">Digital & Creative<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden" name="tags[]" value="Digital"></li>
										           <li class="addedTag">Agency<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden" name="tags[]" value="Agency"></li>
							            			<li class="tagAdd taglist">  
							              				 <input type="text" id="search-field">
										            </li>
												</ul>
											</div>
					 					</div> --}}
					 				</div>
					 			</form>
					 		</div>
					 		<div class="social-edit">
					 			<h3>Social Edit</h3>
					 			<form>
					 				<div class="row">
					 					<div class="col-lg-6">
					 						<span class="pf-title">Facebook</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="www.facebook.com/example" name="facebook" id="facebook"/>
					 							<i class="fa fa-facebook"></i>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Instagram</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="www.instagram.com/example" id="instagram" name="instagram"/>
					 							<i class="fa fa-twitter"></i>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Twitter</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="www.twitter.com/example" id="twitter" name="twitter"/>
					 							<i class="la la-google"></i>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Linkedin</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="www.Linkedin.com/TeraPlaner" name="linkedin" id="linkedin"/>
					 							<i class="la la-linkedin"></i>
					 						</div>
					 					</div>
					 				</div>
					 			</form>
					 		</div>
					 		<div class="contact-edit">
					 			<h3>Contact</h3>
					 			<form>
					 				<div class="row">
					 					<div class="col-lg-4">
					 						<span class="pf-title">Phone Number</span>
					 						<div class="pf-field">
											 <input type="text" placeholder="+90 538 963 58 96" id="phone_number" name="phone_number" value="{{ $jobseeker_profile->phone_number }}"/>
					 						</div>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">Email</span>
					 						<div class="pf-field">
											 <input type="text" placeholder="demo@jobhunt.com" id="email" name="email" value="{{  $jobseeker_profile->email }}"/>
					 						</div>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">City</span>
					 						<div class="pf-field">
											 <select data-placeholder="Please Select City" class="chosen" name="city" id="city" value="{{ $jobseeker_profile->city }}">
													<option value=""></option>
													@foreach ($city as $item)
												 			<option value="{{ $item }}">{{ $item }}</option>
													 @endforeach
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<button type="button" id="jobseekerProfileUpdate">Update</button>
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


@include('partials.footer_script')
</body>
<script>
	jQuery(document).ready(function($){
		let social_media = '<?php echo $jobseeker_profile->social_media ?>' ? JSON.parse('<?php echo $jobseeker_profile->social_media ?>') : '';
		$('#openFileInput').on('click',()=>{
			$('#JobseekerImage').click();
		})

		$('#JobseekerImage').on('change',CAREER24H.jobseeker.chooseProfilePicture);
		$('#jobseekerProfileUpdate').on('click',CAREER24H.jobseeker.updateJobseekerProfile);
		CAREER24H.jobseeker.loadData(social_media);
	});
</script>
</html>

