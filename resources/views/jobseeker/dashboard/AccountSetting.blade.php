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
								<h3>Account</h3>
								<div class="change-password">
									<form id="jobseekerUpdateUserAccount" action="/jobseeker/update-account" method="POST">
										@csrf
										<div class="row">
											<div class="col-lg-10">
												<span class="pf-title">Username</span>
												<div class="pf-field">
													<input type="text" name="username" value="{{ Auth::user()->username }}"/>
												</div>
												<span class="pf-title">Email</span>
												<div class="pf-field">
													<input type="text" name="email" value="{{ Auth::user()->email }}"/>
												</div>
												<span class="pf-title">Phone Number</span>
												<div class="pf-field">
													<input type="text" name="phone_number" value="{{ Auth::user()->phone_number }}"/>
												</div>
												<button type="submit">Update</button>
											</div>
										</div>
									</form>
								</div>
							</div>
					 		<div class="manage-jobs-sec">
					 			<h3>Change Password</h3>
						 		<div class="change-password">
									 <form id="jobseekerUpdatePassword" action="/jobseeker/update-password" method="POST">
										@csrf
						 				<div class="row">
						 					<div class="col-lg-6">
						 						<span class="pf-title">Old Password</span>
						 						<div class="pf-field">
						 							<input type="password" name="old_password" required/>
						 						</div>
						 						<span class="pf-title">New Password</span>
						 						<div class="pf-field">
						 							<input type="password" name="new_password" required/>
						 						</div>
						 						<span class="pf-title">Confirm Password</span>
						 						<div class="pf-field">
						 							<input type="password" name="confirm_password" required/>
						 						</div>
						 						<button type="submit">Update</button>
						 					</div>
						 					<div class="col-lg-6">
						 						<i class="la la-key big-icon"></i>
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

	@include('partials.footer')

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
		$('#jobseekerUpdatePassword').on('submit',CAREER24H.jobseeker.handleChangePassword);
		$('#jobseekerUpdateUserAccount').on('submit',CAREER24H.jobseeker.handleUpdateUserAccount);
	});
</script>
</html>

