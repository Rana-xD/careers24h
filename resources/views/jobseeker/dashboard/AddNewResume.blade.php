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
					 			<div class="border-title"><h3>Education</h3><a class="cancel" href="#" title=""><i class="la la-close"></i> Cancel</a></div>
						 		<div class="resumeadd-form">
						 			<div class="row">
						 				<div class="col-lg-12">
					 						<span class="pf-title">Title</span>
					 						<div class="pf-field">
					 							<input placeholder="Tooms.." type="text">
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">From Date</span>
					 						<div class="pf-field">
					 							<input placeholder="06.11.2007" type="text" class="datepicker">
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">To Date</span>
					 						<div class="pf-field">
					 							<input placeholder="06.11.2012" type="text" class="datepicker">
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Institute</span>
					 						<div class="pf-field">
					 							<input type="text">
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Description</span>
					 						<div class="pf-field">
					 							<textarea></textarea>
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						 <button type="submit">Save</button>
					 					</div>
						 			</div>
						 		</div>
						 		<div class="border-title"><h3>Work Experience</h3><a class="cancel" href="#" title=""><i class="la la-close"></i> Cancel</a></div>
						 		<div class="resumeadd-form">
						 			<div class="row">
						 				<div class="col-lg-12">
					 						<span class="pf-title">Title</span>
					 						<div class="pf-field">
					 							<input placeholder="Tooms.." type="text">
					 						</div>
					 					</div>
					 					<div class="col-lg-5">
					 						<span class="pf-title">From Date</span>
					 						<div class="pf-field">
					 							<input placeholder="06.11.2007" type="text" class="datepicker">
					 						</div>
					 					</div>
					 					<div class="col-lg-5">
					 						<span class="pf-title">To Date</span>
					 						<div class="pf-field">
					 							<input placeholder="06.11.2012" type="text" class="datepicker">
					 						</div>
					 					</div>
					 					<div class="col-lg-2">
					 						<p class="remember-label">
												<input type="checkbox" name="cb" id="fgfg"><label for="fgfg">Present</label>
											</p>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Company</span>
					 						<div class="pf-field">
					 							<input type="text">
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Description</span>
					 						<div class="pf-field">
					 							<textarea></textarea>
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						 <button type="submit">Save</button>
					 					</div>
						 			</div>
						 		</div>
						 		<div class="border-title"><h3>Portfolio</h3><a class="cancel" href="#" title=""><i class="la la-close"></i> Cancel</a></div>
						 		<div class="resumeadd-form">
						 			<div class="row">
						 				<div class="col-lg-12">
					 						<p>Max file size is 1MB, Minimum dimension: 270x210 And Suitable files are .jpg & .png</p>
					 					</div>
					 					<div class="col-lg-12">
					 						<div class="upload-portfolio">
					 							<div class="uploadbox">
					 								<label for="file-upload" class="custom-file-upload">
													    <i class="la la-cloud-upload"></i> <span>Upload Image</span>
													</label>
													<input id="file-upload" type="file" style="display: none;" />
					 							</div>
					 							<div class="uploadfield">
							 						<span class="pf-title">Title</span>
							 						<div class="pf-field">
							 							<input placeholder="Tooms.." type="text">
							 						</div>
							 					</div>
							 					<div class="uploadbutton">
							 						<button type="submit">Save</button>
							 					</div>
					 						</div>
					 					</div>
						 			</div>
						 		</div>
						 		<div class="border-title"><h3>Professional Skills</h3><a class="cancel" href="#" title=""><i class="la la-close"></i> Cancel</a></div>
						 		<div class="resumeadd-form">
						 			<div class="row align-items-end">
						 				<div class="col-lg-7">
					 						<span class="pf-title">Skill Heading</span>
					 						<div class="pf-field">
					 							<input placeholder="" type="text">
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">Percentage</span>
					 						<div class="pf-field">
					 							<input placeholder="" type="text">
					 						</div>
					 					</div>
					 					<div class="col-lg-2">
					 						 <button type="submit">Save</button>
					 					</div>
						 			</div>
						 		</div>
						 		<div class="border-title"><h3>Awards</h3><a class="cancel" href="#" title=""><i class="la la-close"></i> Cancel</a></div>
						 		<div class="resumeadd-form">
						 			<div class="row">
						 				<div class="col-lg-6">
					 						<span class="pf-title">06.11.2007</span>
					 						<div class="pf-field">
					 							<input placeholder="" type="text">
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">06.11.2012</span>
					 						<div class="pf-field">
					 							<input placeholder="" type="text">
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Description</span>
					 						<div class="pf-field">
					 							<textarea></textarea>
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						 <button type="submit">Save</button>
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

<!-- Include Date Range Picker -->
<link rel="stylesheet" type="text/css" href="{{ asset("/style/css/bootstrap-datepicker.css") }}" />
<script src="{{ asset("/style/js/bootstrap-datepicker.js") }}" type="text/javascript"></script>
<script>
		$(function(){
			$('.datepicker').datepicker({
			    format: 'mm-dd-yyyy'
			});
		});
</script>

</body>
</html>

