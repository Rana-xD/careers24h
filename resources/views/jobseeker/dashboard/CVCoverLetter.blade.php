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
					 			<h3>CV & Cover Letter</h3>
						 		<div class="contact-edit">
						 			<form>
										 @csrf
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
						 						<span class="pf-title">Cover Letter</span>
						 						<div class="pf-field">
						 							<textarea id="coverLetter">Spent several years working on sheep on Wall Street. Had moderate success investing in Yugos on Wall Street. Managed a small team buying and selling pogo sticks for farmers. Spent several years licensing licorice in West Palm Beach, FL. Developed severalnew methods for working with banjos in the aftermarket. Spent a weekend importing banjos in West Palm Beach, FL.In this position, the Software Engineer ollaborates with Evention's Development team to continuously enhance our current software solutions as well as create new solutions to eliminate the back-office operations and management challenges present</textarea>
						 						</div>
						 					</div>
						 					<div class="col-lg-12">
						 						<button type="button" id ="updateCoverLetter">Update</button>
						 					</div>
						 				</div>
						 			</form>
						 		</div>
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
			let coverLetter = `<?php echo $coverLetter ?>`
			if(coverLetter) $('#coverLetter').val(coverLetter)
			$('#updateCoverLetter').on('click',CAREER24H.jobseeker.updateCoverLetter);

	});
</script>
</html>

