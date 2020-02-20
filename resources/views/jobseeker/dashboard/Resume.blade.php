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
					 			<div class="border-title"><h3>Education</h3><a id="createEducation"><i class="la la-plus"></i> Add Educations</a></div>
						 		<div class="edu-history-sec">
									@if (!empty($educations))
									 @foreach ($educations as $index => $item)
									 <div class="edu-history">
										 <input type="hidden" name="formDate" class="fromDate" value="{{ $item['from'] }}">
										 <input type="hidden" name="toDate" class="toDate" value="{{ $item['to'] }}">
										<i class="la la-graduation-cap"></i>
										<div class="edu-hisinfo">
											<h3 class="title">{{  $item['title'] }}</h3>
											<i>{{ DateTime::createFromFormat('m-d-Y', $item['from'])->format('M-Y') }} - {{ DateTime::createFromFormat('m-d-Y', $item['to'])->format('M-Y') }}</i>
											<span class="school_name">{{ $item['school'] }}</span>
											<p class="description">{{ $item['description'] }}</p>
										</div>
										<ul class="action_job">
											<li><span>Edit</span><a class="editEducation" data-index="{{ $index }}"><i class="la la-pencil"></i></a></li>
											<li><span>Delete</span><a class="removeEducation" data-index="{{ $index }}"><i class="la la-trash-o" ></i></a></li>
										</ul>
									</div>
									 @endforeach
									 @endif
		 						</div>
		 						<div class="border-title"><h3>Work Experience</h3><a id="createWorkExperience"><i class="la la-plus"></i> Add Work Experience</a></div>
						 		<div class="edu-history-sec">
									@if (!empty($work_experience))
									 @foreach ($work_experience as $index => $item)
									 <div class="edu-history style2">
										<input type="hidden" name="formDate" class="fromDate" value="{{ $item['from'] }}">
										<input type="hidden" name="toDate" class="toDate" value="{{ $item['to'] }}">
										<i></i>
										<div class="edu-hisinfo">
											<h3 class="title">{{ $item['title'] }} <span class="company">{{ $item['company'] }}</span></h3>
											<i>{{ DateTime::createFromFormat('m-d-Y', $item['from'])->format('M-Y') }} - {{  $item['to'] === 'Now' ? 'Now' : DateTime::createFromFormat('m-d-Y', $item['to'])->format('M-Y') }}</i>
										   	<p class="description">{{ $item['description'] }}</p>
										</div>
										<ul class="action_job">
											<li><span>Edit</span><a class="editWorkExperience" data-index="{{ $index }}"><i class="la la-pencil"></i></a></li>
											<li><span>Delete</span><a class="removeWorkExperience" data-index="{{ $index }}"><i class="la la-trash-o"></i></a></li>
										</ul>
									</div>
									 @endforeach
									 @endif
		 						</div>
		 						<div class="border-title"><h3>Professional Skills</h3><a id="createSkillset"><i class="la la-plus"></i> Add Skills</a></div>
		 						<div class="progress-sec">
									@if (!empty($skillset))
									 @foreach ($skillset as $index => $item)
									 <div class="progress-sec with-edit">
									 	<input type="hidden" name="percentage" class="percentage" value="{{ $item['percentage']  }}">
									 	<span class="skill">{{ $item['skill'] }}</span>
										<div class="progressbar"> <div class="progress" style="width: {{ $item['percentage'] }}%;"><span>{{ $item['percentage'] }}%</span></div> </div>
										<ul class="action_job">
											<li><span>Edit</span><a class="editSkillset" data-index="{{ $index }}"><i class="la la-pencil"></i></a></li>
											<li><span>Delete</span><a class="removeSkillset" data-index="{{ $index }}"><i class="la la-trash-o"></i></a></li>
										</ul>
										</div>
									 @endforeach
									 @endif
		 						</div>
		 						<div class="border-title"><h3>Achievement</h3><a id="createAchievement"><i class="la la-plus"></i> Add Achievement</a></div>
		 						<div class="edu-history-sec">
									 @if (!empty($achievement))
									 @foreach ($achievement as $index => $item)
									 <div class="edu-history style2">
										<input type="hidden" name="formDate" class="fromDate" value="{{ $item['from'] }}">
										<input type="hidden" name="toDate" class="toDate" value="{{ $item['to'] }}">
										<i></i>
										<div class="edu-hisinfo">
											<h3 class="title">{{ $item['title'] }}</h3>
											<i>{{ DateTime::createFromFormat('m-d-Y', $item['from'])->format('M-Y') }} - {{ DateTime::createFromFormat('m-d-Y', $item['to'])->format('M-Y') }}</i>
											<p class="description">{{ $item['description'] }}</p>
										</div>
										<ul class="action_job">
											<li><span>Edit</span><a class="editAchievement" data-index="{{ $index }}"><i class="la la-pencil"></i></a></li>
											<li><span>Delete</span><a class="removeAchievement" data-index="{{ $index }}"><i class="la la-trash-o"></i></a></li>
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

@include('layouts.resume_add_modal')
@include('layouts.resume_edit_modal')
@include('partials.footer_script')

</body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css" integrity="sha256-jO7D3fIsAq+jB8Xt3NI5vBf3k4tvtHwzp8ISLQG4UWU=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha256-bqVeqGdJ7h/lYPq6xrPv/YGzMEb6dNxlfiTUHSgRCp8=" crossorigin="anonymous"></script>
<script>
	jQuery(document).ready(function($){
		$('.datepicker').datepicker({
			    format: 'mm-dd-yyyy'
		});
		$('#work_present_edit').on('change',(e)=>{
			let self = e.target;
			if(self.checked){
				$('.edit-work-to-date-div').css('display','none');
				return;
			}
			$('.edit-work-to-date-div').css('display','block');
		})

		$('#work_present').on('change',(e)=>{
			let self = e.target;
			if(self.checked){
				$('.work-to-date-div').css('display','none');
				return;
			}
			$('.work-to-date-div').css('display','block');
		})

		$('#createEducation').on('click',CAREER24H.jobseeker.showAddEducationModal);
		$('#createWorkExperience').on('click',CAREER24H.jobseeker.showAddWorkExperienceModal);
		$('#createSkillset').on('click',CAREER24H.jobseeker.showAddSkillsetModal);
		$('#createAchievement').on('click',CAREER24H.jobseeker.showAddAchievementModal);

		$('#addEducation').on('click',CAREER24H.jobseeker.handleNewEducationSubmit)
		$('#addWorkExperience').on('click',CAREER24H.jobseeker.handleNewWorkSubmit)
		$('#addSkillset').on('click',CAREER24H.jobseeker.handleNewSkillSubmit)
		$('#addAchievement').on('click',CAREER24H.jobseeker.handleNewAchievementSubmit)

		$('.removeEducation').on('click',CAREER24H.jobseeker.deleteEducation);
		$('.removeWorkExperience').on('click',CAREER24H.jobseeker.deleteWorkExperience);
		$('.removeSkillset').on('click',CAREER24H.jobseeker.deleteSkillset);
		$('.removeAchievement').on('click',CAREER24H.jobseeker.removeAchievement);

		$('.editEducation').on('click',CAREER24H.jobseeker.showEditEducationModal);
		$('#updateEducation').on('click',CAREER24H.jobseeker.handleEditEducationSubmit);
		$('.editWorkExperience').on('click',CAREER24H.jobseeker.showEditWorkExperienceModal);
		$('#updateWorkExperience').on('click',CAREER24H.jobseeker.handleEditWorkExperienceSubmit);
		$('.editSkillset').on('click',CAREER24H.jobseeker.showEditSkillsetModal);
		$('#updateSkillset').on('click',CAREER24H.jobseeker.handleEditSkillsetSubmit);
		$('.editAchievement').on('click',CAREER24H.jobseeker.showEditAchievementModal);
		$('#updateAchievement').on('click',CAREER24H.jobseeker.handleEditAchievementSubmit);
		
	});

	
</script>
</html>

