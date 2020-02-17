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
						 		<div class="edu-history-sec">
									@if (!empty($educations))
									 @foreach ($educations as $index => $item)
									 <div class="edu-history">
										<i class="la la-graduation-cap"></i>
										<div class="edu-hisinfo">
											<h3>{{  $item['title'] }}</h3>
											<i>{{ date("Y", strtotime($item['from'])) }} - {{ date("Y", strtotime($item['to'])) }}</i>
											<span>{{ $item['school'] }}</span>
											<p>{{ $item['description'] }}</p>
										</div>
										<ul class="action_job">
											<li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
											<li><span>Delete</span><a class="removeEducation" data-index="{{ $index + 1 }}"><i class="la la-trash-o" ></i></a></li>
										</ul>
									</div>
									 @endforeach
									 @endif
		 						</div>
		 						<div class="border-title"><h3>Work Experience</h3></div>
						 		<div class="edu-history-sec">
									@if (!empty($work_experience))
									 @foreach ($work_experience as $index => $item)
									 <div class="edu-history style2">
										<i></i>
										<div class="edu-hisinfo">
											<h3>{{ $item['title'] }} <span>{{ $item['company'] }}</span></h3>
											<i>{{ date("Y", strtotime($item['from'])) }} - {{  $item['to'] === 'Now' ? 'Now' : date("Y", strtotime($item['to'])) }}</i>
										   <p>{{ $item['description'] }}</p>
										</div>
										<ul class="action_job">
											<li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
											<li><span>Delete</span><a class="removeWorkExperience" data-index="{{ $index + 1 }}"><i class="la la-trash-o"></i></a></li>
										</ul>
									</div>
									 @endforeach
									 @endif
		 						</div>
		 						<div class="border-title"><h3>Professional Skills</h3></div>
		 						<div class="progress-sec">
									@if (!empty($skillset))
									 @foreach ($skillset as $index => $item)
									 <div class="progress-sec with-edit">
									 	<span>{{ $item['skill'] }}</span>
										<div class="progressbar"> <div class="progress" style="width: {{ $item['percentage'] }}%;"><span>{{ $item['percentage'] }}%</span></div> </div>
										<ul class="action_job">
											<li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
											<li><span>Delete</span><a class="removeSkillset" data-index="{{ $index + 1 }}"><i class="la la-trash-o"></i></a></li>
										</ul>
										</div>
									 @endforeach
									 @endif
		 						</div>
		 						<div class="border-title"><h3>Achievement</h3></div>
		 						<div class="edu-history-sec">
									 @if (!empty($achievement))
									 @foreach ($achievement as $index => $item)
									 <div class="edu-history style2">
										<i></i>
										<div class="edu-hisinfo">
											<h3>{{ $item['title'] }}</h3>
											<i>{{ date("Y", strtotime($item['from'])) }} - {{ date("Y", strtotime($item['to'])) }}</i>
											<p>{{ $item['description'] }}</p>
										</div>
										<ul class="action_job">
											<li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
											<li><span>Delete</span><a class="removeAchievement" data-index="{{ $index + 1 }}"><i class="la la-trash-o"></i></a></li>
										</ul>
									</div>
									 @endforeach
									 @endif
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
<script>
	jQuery(document).ready(function($){

		$('.removeEducation').on('click',CAREER24H.jobseeker.deleteEducation);
		$('.removeWorkExperience').on('click',CAREER24H.jobseeker.deleteWorkExperience);
		$('.removeSkillset').on('click',CAREER24H.jobseeker.deleteSkillset);
		$('.removeAchievement').on('click',CAREER24H.jobseeker.removeAchievement);
	});

	
</script>
</html>

