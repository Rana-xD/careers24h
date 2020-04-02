<!DOCTYPE html>
<html>
<head>
	@include('partials.header')
</head>
<link rel="stylesheet" type="text/css" href="{{ asset('/css/Template-3.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.css') }}" />
<body>

<div class="theme-layout" id="scrollup">
	@include('partials.jobseeker_top_content')

</div>
<br><br>

<div class="container a4" size="A4">
	<div class="paragraphs outDoor" >
		<div class="row">
		  <div class="row">
			<div class="span5">
			  <img 
				  src="{{$profileImageUrl}}"
				  alt="profile-image"
			  >
			  <div style="float: left; padding-left: 20px;">
				  <h4>{{ $fullName }}</h4>
			  	  <p>{{ $phoneNumber }}</p>
			  	  <p>{{ $email }}</p>
				  <p>{{ $educationLevel }}</p>
				  <p>{{ $gender }}</p>
			  </div>
			</div>
		  </div>
		  <div>
			  <h4><b>Profile</b></h4> 
			  <hr class="bar">
			<ul>
				<li>{{ $summary }}</li>
			</ul>
		  </div>
		  <div>
			@if(!(empty($education)))
			  <h4><b>Education</b></h4>
			  <hr class="bar">
				<ul>
					@foreach ($education as $item)
							<li>
								<div class="date">{{ $item['from'] }}-{{ $item['to'] }}</div> 
								<div>
								<p >{{ $item["title"] }} ({{ $item["school"] }})</p> 
									<p>{{ $item["description"] }}</p>
								</div>
							</li>
					@endforeach
				</ul>
			@endif
		  </div>
		  <div>
			@if(!(empty($achievement)))
				<h4><b>ACADEMIC & AWARDS</b></h4>
				<hr class="bar">
				<ul>
				@foreach ($achievement as $item)
					<li>
						<div class="date">{{ $item['from'] }}-{{ $item['to'] }}</div> 
						<div class="info">
							<p class="semi-bold">{{ $item["title"] }}</p> 
						<p>{{ $item["description"] }}</p>
						</div>
					</li>
				@endforeach
				</ul>
			@endif
			@if(!(empty($workExperience)))
				<h4><b>INTERNSHIP WORKING EXPERIENCE</b></h4> 
				<hr class="bar">
				<ul>
					@foreach ($workExperience as $item)
						<li>
							<div class="date">{{ $item['from'] }}-{{ $item['to'] }}</div> 
							<div class="info">
								<p class="semi-bold">{{ $item["company"] }}</p> 
							<p>{{ $item["description"] }}</p>
							</div>
						</li>
					@endforeach
				</ul>
			@endif
			@if(!(empty($skillset)))
			 <h4><b>TECHNICAL SKILL</b></h4>
			 <hr class="bar">
			  <ul>
				 @foreach ($skillset as $item)
				   <li>
					 <div class="info">
					 <p>{{ $item['skill'] }} ({{$item["percentage"]}}%)</p>
					 </div>
				   </li>
				 @endforeach 
			  </ul>
			@endif
		  </div>
		</div>
	</div>
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
 
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

</body>
</html>

