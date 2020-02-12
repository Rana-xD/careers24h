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
					 			<h3>Manage Jobs</h3>
						 		<table>
						 			<thead>
						 				<tr>
						 					<td>Applied Job</td>
						 					<td>Position</td>
						 					<td>Date</td>
						 					<td></td>
						 				</tr>
						 			</thead>
						 			<tbody>
						 				<tr>
						 					<td>
						 						<div class="table-list-title">
						 							<i>Massimo Artemisis</i><br />
						 							<span><i class="la la-map-marker"></i>Sacramento, California</span>
						 						</div>
						 					</td>
						 					<td>
						 						<div class="table-list-title">
						 							<h3><a href="#" title="">Web Designer / Developer</a></h3>
						 						</div>
						 					</td>
						 					<td>
						 						<span>October 27, 2017</span><br />
						 					</td>
						 					<td>
						 						<ul class="action_job">
						 							<li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
						 						</ul>
						 					</td>
						 				</tr>
						 				<tr>
						 					<td>
						 						<div class="table-list-title">
						 							<i>StarHealth</i><br />
						 							<span><i class="la la-map-marker"></i>Rennes, France</span>
						 						</div>
						 					</td>
						 					<td>
						 						<div class="table-list-title">
						 							<h3><a href="#" title="">Regional Sales Manager South east Asia</a></h3>
						 						</div>
						 					</td>
						 					<td>
						 						<span>October 27, 2017</span><br />
						 					</td>
						 					<td>
						 						<ul class="action_job">
						 							<li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
						 						</ul>
						 					</td>
						 				</tr>
						 				<tr>
						 					<td>
						 						<div class="table-list-title">
						 							<i>Altes Bank</i><br />
						 							<span><i class="la la-map-marker"></i>Istanbul, Turkey</span>
						 						</div>
						 					</td>
						 					<td>
						 						<div class="table-list-title">
						 							<h3><a href="#" title="">C Developer (Senior) C .Net</a></h3>
						 						</div>
						 					</td>
						 					<td>
						 						<span>October 27, 2017</span><br />
						 					</td>
						 					<td>
						 						<ul class="action_job">
						 							<li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
						 						</ul>
						 					</td>
						 				</tr>
						 				<tr>
						 					<td>
						 						<div class="table-list-title">
						 							<i>MediaLab</i><br />
						 							<span><i class="la la-map-marker"></i>Ajax, Ontario</span>
						 						</div>
						 					</td>
						 					<td>
						 						<div class="table-list-title">
						 							<h3><a href="#" title="">Marketing Director</a></h3>
						 						</div>
						 					</td>
						 					<td>
						 						<span>October 27, 2017</span><br />
						 					</td>
						 					<td>
						 						<ul class="action_job">
						 							<li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
						 						</ul>
						 					</td>
						 				</tr>
						 			</tbody>
						 		</table>
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


@include('partials.footer_script')


</body>
</html>

