<!DOCTYPE html>
<html>
<head>
	@include('partials.header')
</head>
<link rel="stylesheet" type="text/css" href="{{ asset('/dep/normalize.css/normalize.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/dep/Font-Awesome/css/font-awesome.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/css/Template-3.css') }}" />
<body>

<div class="theme-layout" id="scrollup">
	@include('partials.jobseeker_top_content')

</div>

<div class="body" style="margin-left: 15%;">
	<section id="main" style="font-size: 12px; padding-right: 8%;">
	<header id="title">
	<h1>{{ $fullName }}</h1>
	<span> {{ $summary }} <br/></span>
	  <span class="subtitle">{{ $educationLevel}}</span>
	</header>
	<section class="main-block">
	  <h2>
		<i class="fa fa-suitcase"></i> Experiences
	  </h2>
	  <section class="blocks">
		@foreach ($workExperience as $item)
			<div class="date">
				<span>{{ $item['from'] }}</span><span>{{ $item['to'] }}</span>
			</div>
			<div class="decorator">
			</div>
			<div class="details" style="font-size: 15px;">
				<header>
				<h3 style="font-size: 15px;">{{ $item["title"] }}</h3>
				<span class="place">{{ $item["company"] }}</span>
				</header>
				<div>
					{{ $item["description"] }}
				</div>
			</div>
		@endforeach
	  </section>
	</section>
	<section class="main-block">
	  <h2>
		<i class="fa fa-folder-open"></i> ACADEMIC & AWARDS
	  </h2>
	  @foreach ($achievement as $item)
		  <table>
			  <tr>
				  <td style="width: 20%;"></td>
				  <td class="sideRight">
					  <li></li>
				  </td>
			  </tr>
		  </table>
		  <section class="blocks" style="font-size: 15px;">
			<div class="date">
			  <span>{{ $item['from'] }}</span><span>{{ $item['to'] }}</span>
			</div>
			<div class="decorator">
			</div>
			<div class="details">
			  <header>
				<h3 style="font-size: 15px;">{{ $item["title"] }}</h3>
			  </header>
			  <div>
				<ul>
				  <li>{{ $item["description"] }}</li>
				</ul>
			  </div>
			</div>
		  </section>
	  @endforeach
	</section>
	<section class="main-block concise">
	  <h2>
		<i class="fa fa-graduation-cap"></i> Education
	  </h2>
	  @foreach ($education as $item)
		  <section class="blocks">
			<div class="date">
			  <span>{{ $item['from'] }}</span><span>{{ $item['to'] }}</span>
			</div>
			<div class="decorator">
			</div>
			<div class="details">
			  <header style="font-size: 15px;">
				<h3 >{{ $item["title"] }}</h3>
				<span class="location" style="font-size: 12px;">{{ $item["school"] }}</span>
				<span class="place" style="font-size: 15px;">{{ $item["description"] }}</span>
			  </header>
			</div>
		  </section>
	  @endforeach
	</section>
  </section>
  <aside id="sidebar" style="font-size: 13px;">
	<div class="side-block" id="contact">
	  <h1>
		Contact Info
	  </h1>
	  <ul>
		<li><i class="fa fa-envelope" style="margin-right: 4px;"></i>{{ $email }}</li>
	  <li><i class="fa fa-phone" style="margin-right: 4px;"></i>{{ $phoneNumber }}</li>
	  <li><i class="fas fa-table" style="margin-right: 4px;"></i>{{ $age }}</li>
	  <li><i class="fas fa-venus-mars" style="margin-right: 4px;"></i>{{ $gender }}</li>
	  <li><i class="fas fa-chalkboard" style="margin-right: 5px;"></i>{{ $educationLevel }}</li>
	  </ul>
	</div>
	<div class="side-block" id="skills">
	  <h1>
		Skills
	  </h1>
	  @foreach ($skillset as $item)
		<ul>
			<li>{{ $item['skill'] }} {{$item["percentage"]}}%</li>
		</ul>
	  @endforeach 
  </aside>

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

