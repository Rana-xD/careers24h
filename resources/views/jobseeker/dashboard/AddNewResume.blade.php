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
					 			<div class="border-title"><h3>Education</h3></div>
						 		<div class="resumeadd-form">
						 			<div class="row">
						 				<div class="col-lg-12">
					 						<span class="pf-title">Title</span>
					 						<div class="pf-field">
					 							<input placeholder="Tooms.." type="text" name="eduction_title" id="eduction_title">
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">From Date</span>
					 						<div class="pf-field">
					 							<input placeholder="06.11.2007" type="text" class="datepicker" name="education_from_date" id="education_from_date"> 
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">To Date</span>
					 						<div class="pf-field">
					 							<input placeholder="06.11.2012" type="text" class="datepicker" name="education_to_date" id="education_to_date">
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">School Name</span>
					 						<div class="pf-field">
					 							<input type="text" name="education_school_name" id="education_school_name">
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Description</span>
					 						<div class="pf-field">
					 							<textarea name="education_description" id="education_description"></textarea>
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						 <button type="button" id="educationSubmit">Save</button>
					 					</div>
						 			</div>
						 		</div>
						 		<div class="border-title"><h3>Work Experience</h3></div>
						 		<div class="resumeadd-form">
						 			<div class="row">
						 				<div class="col-lg-12">
					 						<span class="pf-title">Title</span>
					 						<div class="pf-field">
					 							<input placeholder="Tooms.." type="text" name="work_title" id="work_title">
					 						</div>
					 					</div>
					 					<div class="col-lg-5">
					 						<span class="pf-title">From Date</span>
					 						<div class="pf-field">
					 							<input placeholder="06.11.2007" type="text" class="datepicker" name="work_from_date" id="work_from_date">
					 						</div>
					 					</div>
					 					<div class="col-lg-5">
					 						<span class="pf-title work-to-date-div">To Date</span>
					 						<div class="pf-field work-to-date-div">
					 							<input placeholder="06.11.2012" type="text" class="datepicker" name="work_to_date" id="work_to_date">
					 						</div>
					 					</div>
					 					<div class="col-lg-2">
											<span class="pf-title">Now</span>
					 						<div>
											   <input type="checkbox" id="work_present" data-toggle="toggle" data-size="normal" data-onstyle="primary" data-offstyle="danger">
											</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Company</span>
					 						<div class="pf-field">
					 							<input type="text" name="work_company" id="work_company">
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Description</span>
					 						<div class="pf-field">
					 							<textarea name="work_description" id="work_description"></textarea>
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						 <button type="button" id="workSubmit">Save</button>
					 					</div>
						 			</div>
						 		</div>
						 		<div class="border-title"><h3>Professional Skills</h3></div>
						 		<div class="resumeadd-form">
						 			<div class="row align-items-end">
						 				<div class="col-lg-7">
					 						<span class="pf-title">Skill Heading</span>
					 						<div class="pf-field">
					 							<input placeholder="" type="text" id="skill_name" name="skill_name">
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">Percentage</span>
					 						<div class="pf-field">
					 							<input placeholder="" type="number" id="skill_percentage" name="skill_percentage">
					 						</div>
					 					</div>
					 					<div class="col-lg-2">
					 						 <button type="button" id="skillSubmit">Save</button>
					 					</div>
						 			</div>
						 		</div>
						 		<div class="border-title"><h3>Achievement</h3></div>
						 		<div class="resumeadd-form">
						 			<div class="row">
										<div class="col-lg-12">
											<span class="pf-title">Title</span>
											<div class="pf-field">
												<input type="text" name="achievement_title" id="achievement_title">
											</div>
										</div>
										<div class="col-lg-6">
											<span class="pf-title">From Date</span>
											<div class="pf-field">
												<input placeholder="06.11.2007" type="text" class="datepicker" name="achievement_from_date" id="achievement_from_date">
											</div>
										</div>
										<div class="col-lg-6">
											<span class="pf-title">To Date</span>
											<div class="pf-field">
												<input placeholder="06.11.2012" type="text" class="datepicker" name="achievement_to_date" id="achievement_to_date">
											</div>
										</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Description</span>
					 						<div class="pf-field">
					 							<textarea name="achievement_description" id="achievement_description"></textarea>
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						 <button type="button" id="achievementSubmit">Save</button>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css" integrity="sha256-jO7D3fIsAq+jB8Xt3NI5vBf3k4tvtHwzp8ISLQG4UWU=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha256-bqVeqGdJ7h/lYPq6xrPv/YGzMEb6dNxlfiTUHSgRCp8=" crossorigin="anonymous"></script>
<script>
	jQuery(document).ready(function($){
		$(function(){
			$('.datepicker').datepicker({
			    format: 'mm-dd-yyyy'
			});
		});
		$('#work_present').on('change',(e)=>{
			let self = e.target;
			if(self.checked){
				$('.work-to-date-div').css('display','none');
				CAREER24H.constant.isWorkToDateIsPresent = true;
				return;
			}
			CAREER24H.constant.isWorkToDateIsPresent = false;
			$('.work-to-date-div').css('display','block');
		})

		$('#educationSubmit').on('click',CAREER24H.jobseeker.handleNewEducationSubmit)
		$('#workSubmit').on('click',CAREER24H.jobseeker.handleNewWorkSubmit)
		$('#skillSubmit').on('click',CAREER24H.jobseeker.handleNewSkillSubmit)
		$('#achievementSubmit').on('click',CAREER24H.jobseeker.handleNewAchievementSubmit)
	});
</script>

</body>
</html>

