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
										 <input type="hidden" name="formDate" class="fromDate" value="{{ $item['from'] }}">
										 <input type="hidden" name="toDate" class="toDate" value="{{ $item['to'] }}">
										<i class="la la-graduation-cap"></i>
										<div class="edu-hisinfo">
											<h3 class="title">{{  $item['title'] }}</h3>
											<i>{{ date("Y", strtotime($item['from'])) }} - {{ date("Y", strtotime($item['to'])) }}</i>
											<span class="school_name">{{ $item['school'] }}</span>
											<p class="description">{{ $item['description'] }}</p>
										</div>
										<ul class="action_job">
											<li><span>Edit</span><a class="editEducation" data-index="{{ $index }}"><i class="la la-pencil"></i></a></li>
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

<!-- Education Modal -->
<div class="modal fade" id="editEducationModal" tabindex="-1" role="dialog" aria-labelledby="editEducationModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="editEducationModal">Edit Education</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
				<input type="hidden" name="educationIndex" id="educationIndex">
				<div class="row">
					<div class="col-lg-12">
						<span class="pf-title">Title</span>
						<div class="pf-field">
							<input placeholder="Tooms.." type="text" name="eduction_title_edit" id="eduction_title_edit">
						</div>
					</div>
					<div class="col-lg-6">
						<span class="pf-title">From Date</span>
						<div class="pf-field">
							<input placeholder="06.11.2007" type="text" class="datepicker" name="education_from_date_edit" id="education_from_date_edit"> 
						</div>
					</div>
					<div class="col-lg-6">
						<span class="pf-title">To Date</span>
						<div class="pf-field">
							<input placeholder="06.11.2012" type="text" class="datepicker" name="education_to_date_edit" id="education_to_date_edit">
						</div>
					</div>
					<div class="col-lg-12">
						<span class="pf-title">School Name</span>
						<div class="pf-field">
							<input type="text" name="education_school_name_edit" id="education_school_name_edit">
						</div>
					</div>
					<div class="col-lg-12">
						<span class="pf-title">Description</span>
						<div class="pf-field">
							<textarea name="education_description" id="education_description_edit"></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  <button type="button" id="updateEducation" class="btn btn-primary">Save changes</button>
		</div>
	  </div>
	</div>
  </div>
@include('partials.footer_script')

</body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css" integrity="sha256-jO7D3fIsAq+jB8Xt3NI5vBf3k4tvtHwzp8ISLQG4UWU=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha256-bqVeqGdJ7h/lYPq6xrPv/YGzMEb6dNxlfiTUHSgRCp8=" crossorigin="anonymous"></script>
<script>
	jQuery(document).ready(function($){
		$('.datepicker').datepicker({
			    format: 'mm-dd-yyyy'
		});
		$('.removeEducation').on('click',CAREER24H.jobseeker.deleteEducation);
		$('.removeWorkExperience').on('click',CAREER24H.jobseeker.deleteWorkExperience);
		$('.removeSkillset').on('click',CAREER24H.jobseeker.deleteSkillset);
		$('.removeAchievement').on('click',CAREER24H.jobseeker.removeAchievement);

		$('.editEducation').on('click',CAREER24H.jobseeker.showEditEducationModal);
		$('#updateEducation').on('click',CAREER24H.jobseeker.handleEditEducationSubmit);
	});

	
</script>
</html>

