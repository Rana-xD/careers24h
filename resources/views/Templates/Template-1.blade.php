<!DOCTYPE html>
<html>
<head>
	@include('partials.header')
</head>
<link rel="stylesheet" type="text/css" href="{{ asset('/css/Template-1.css') }}" />
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<body>

<div class="theme-layout" id="scrollup">
	@include('partials.jobseeker_top_content')

</div>

 <section style="padding-top: 5%;">
	<page size="A4">
		<div class="left">
		<img src="{{$profileImageUrl}}" alt="Avatar" style="padding-bottom: 5%;">
			<h3 class="name" style="padding-bottom: 5%;">{{ $fullName }}</h3>
			<h6 class="subTitle" style="padding-bottom: 5%;">Email: {{ $email }}</h6>
			<h6 class="subTitle" style="padding-bottom: 5%;">Age: {{ $age }}</h6>
			<h6 class="subTitle" style="padding-bottom: 5%;">Gender: {{ $gender }}</h6>
			<h6 class="subTitle" style="padding-bottom: 5%;">Education: {{ $educationLevel }}</h6>
			<h6 class="subTitle" style="padding-bottom: 5%;">Tel: {{ $phoneNumber }}</h6>
			<h3 class="name">Skills</h3>
			@foreach ($skillset as $item)
			<li class="subTitle" style="padding-bottom: 5%;">{{ $item['skill'] }} ({{$item["percentage"]}}%)</li>
			@endforeach                     <div class="center">
		<h2 class="separator">Summary</h2>
		<p>{{ $summary }}</p>
			<h2 class="leftSide">EXPERIENCES</h2>
			@foreach ($workExperience as $item)
				<table>
					<tr>
						<td style="width: 20%;">{{ $item['from'] }}-{{ $item['to'] }}</td>
						<td class="sideRight">{{ $item["company"] }}
						<li>{{ $item["description"] }}</li>
						</td>
					</tr>
				</table>
			@endforeach
			<h2 class="leftSide">EDUCATION & CERTIFICATIONS</h2>
			@foreach ($education as $item)
				<table>
					<tr>
						<td style="width: 20%;">{{ $item['from'] }}-{{ $item['to'] }}</td>
						<td class="sideRight">{{ $item["title"] }} ({{ $item["school"] }})
							<li>{{ $item["description"] }}</li>
						</td>
					</tr>
				</table>
			@endforeach
			<h2 class="leftSide">ACADEMIC & AWARDS</h2>
			@foreach ($achievement as $item)
				<table>
					<tr>
						<td style="width: 20%;">{{ $item['from'] }}-{{ $item['to'] }}</td>
						<td class="sideRight">{{ $item["title"] }}
							<li>{{ $item["description"] }}</li>
						</td>
					</tr>
				</table>
			@endforeach
		</div>
		</div>
	</page>
</section>

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

