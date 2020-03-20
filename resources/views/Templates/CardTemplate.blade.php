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
		<div class="block remove-top">
			<div class="container">
				 <div class="row no-gape">
					@include('partials.jobseeker_sidebar')
				 	<div class="col-lg-9 column">
							<div class="padding-left">
								<div class="manage-jobs-sec">
									<div class="cat-sec" style="margin-top: 5%; margin-left:5%">                            
										@if (session('message'))
											<p style="color: red">Pleased Add More informations </p>
										@endif
										<div class="row no-gape padding-left">                 
											@foreach ($templates as $item)
												<div class="col-lg-3 col-md-3 col-sm-6">
													<div class="p-category">
													<a href="/jobseeker/template/{{ $item["id"] }}" title="">
															<i class="la la-photo"></i>
															<span>{{ $item["templateName"] }}</span>
														</a>
													</div>
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

@include('layouts.resume_add_modal')
@include('layouts.resume_edit_modal')
@include('partials.footer_script')

</body>
</html>

