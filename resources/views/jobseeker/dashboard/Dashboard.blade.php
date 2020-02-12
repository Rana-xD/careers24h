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
					 			<h3>Candidates Dashboard</h3>
						 		<div class="cat-sec">
									<div class="row no-gape">
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="p-category">
												<a href="#" title="">
													<i class="la la-briefcase"></i>
													<span>Applied Job</span>
													<p>14 Applications</p>
												</a>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="p-category view-resume-list">
												<a href="#" title="">
													<i class="la la-eye"></i>
													<span>View Resume</span>
													<p>22 View Statistic</p>
												</a>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="p-category">
												<a href="#" title="">
													<i class="la la-file-text "></i>
													<span>My Resume</span>
													<p>Create New Resume</p>
												</a>
											</div>
										</div>
									</div>
								</div>
								<div class="cat-sec">
									<div class="row no-gape">
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="p-category">
												<a href="#" title="">
													<i class="la la-check"></i>
													<span>Appropriate For Me</span>
													<p>(05 Jobs)</p>
												</a>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="p-category follow-companies-popup">
												<a href="#" title="">
													<i class="la la-user"></i>
													<span>Follow Companies</span>
													<p>56 Companies</p>
												</a>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="p-category">
												<a href="#" title="">
													<i class="la la-file"></i>
													<span>My Profile</span>
													<p>View Profile</p>
												</a>
											</div>
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

<div class="view-resumesec">
	<div class="view-resumes">
		<span class="close-resume-popup"><i class="la la-close"></i></span>
		<h3>13 Times Viewed By 8 Companies.</h3>
		<div class="job-listing wtabs">
			<div class="job-title-sec">
				<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
				<h3><a href="#" title="">Web Designer / Developer</a></h3>
				<span>Massimo Artemisis</span>
				<div class="job-lctn">Sacramento, California</div>
			</div>
			<span class="date-resume">11.02.2017</span>
		</div><!-- Job -->
		<div class="job-listing wtabs">
			<div class="job-title-sec">
				<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
				<h3><a href="#" title="">C Developer (Senior) C .Net</a></h3>
				<span>Massimo Artemisis</span>
				<div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
			</div>
			<span class="date-resume">11.02.2017</span>
		</div><!-- Job -->
		<div class="job-listing wtabs">
			<div class="job-title-sec">
				<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
				<h3><a href="#" title="">Web Designer / Developer</a></h3>
				<span>Massimo Artemisis</span>
				<div class="job-lctn">Sacramento, California</div>
			</div>
			<span class="date-resume">11.02.2017</span>
		</div><!-- Job -->
		<div class="job-listing wtabs">
			<div class="job-title-sec">
				<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
				<h3><a href="#" title="">Web Designer / Developer</a></h3>
				<span>Massimo Artemisis</span>
				<div class="job-lctn">Sacramento, California</div>
			</div>
			<span class="date-resume">11.02.2017</span>
		</div><!-- Job -->
	</div>
</div>

<div class="follow-companiesec">
	<div class="follow-companies">
		<span class="close-follow-company"><i class="la la-close"></i></span>
		<h3>Follow Companies.</h3>
		<ul id="scrollbar">
			<li>
				<div class="job-listing wtabs">
					<div class="job-title-sec">
						<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
						<h3><a href="#" title="">Web Designer / Developer</a></h3>
						<div class="job-lctn">Sacramento, California</div>
					</div>
					<a href="#" title="" class="go-unfollow">Unfollow</a>
				</div><!-- Job -->	
			</li>
			<li>
				<div class="job-listing wtabs">
					<div class="job-title-sec">
						<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
						<h3><a href="#" title="">Tix Dog</a></h3>
						<div class="job-lctn">Sacramento, California</div>
					</div>
					<a href="#" title="" class="go-unfollow">Unfollow</a>
				</div><!-- Job -->	
			</li>
			<li>
				<div class="job-listing wtabs">
					<div class="job-title-sec">
						<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
						<h3><a href="#" title="">StarHealth</a></h3>
						<div class="job-lctn">Sacramento, California</div>
					</div>
					<a href="#" title="" class="go-unfollow">Unfollow</a>
				</div><!-- Job -->	
			</li>
			<li>
				<div class="job-listing wtabs">
					<div class="job-title-sec">
						<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
						<h3><a href="#" title="">Altes Bank</a></h3>
						<div class="job-lctn">Sacramento, California</div>
					</div>
					<a href="#" title="" class="go-unfollow">Unfollow</a>
				</div><!-- Job -->	
			</li>
			<li>
				<div class="job-listing wtabs">
					<div class="job-title-sec">
						<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
						<h3><a href="#" title="">StarHealth</a></h3>
						<div class="job-lctn">Sacramento, California</div>
					</div>
					<a href="#" title="" class="go-unfollow">Unfollow</a>
				</div><!-- Job -->	
			</li>
			<li>
				<div class="job-listing wtabs">
					<div class="job-title-sec">
						<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
						<h3><a href="#" title="">Altes Bank</a></h3>
						<div class="job-lctn">Sacramento, California</div>
					</div>
					<a href="#" title="" class="go-unfollow">Unfollow</a>
				</div><!-- Job -->	
			</li>
		</ul>		
	</div>
</div>


@include('partials.footer_script')

</body>
</html>

