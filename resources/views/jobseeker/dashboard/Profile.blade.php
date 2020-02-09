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
					 		<div class="profile-title">
					 			<h3>My Profile</h3>
					 			<div class="upload-img-bar">
					 				<span class="round"><img src="http://placehold.it/140x140" alt="" /><i>x</i></span>
					 				<div class="upload-info">
					 					<a href="#" title="">Browse</a>
					 					<span>Max file size is 1MB, Minimum dimension: 270x210 And Suitable files are .jpg & .png</span>
					 				</div>
					 			</div>
					 			<div class="upload-img-bar">
					 				<span class="round"><img src="http://placehold.it/140x140" alt="" /><i>x</i></span>
					 				<div class="upload-info">
					 					<a href="#" title="">Browse</a>
					 					<span>Max file size is 1MB, Minimum dimension: 270x210 And Suitable files are .jpg & .png</span>
					 				</div>
					 			</div>
					 		</div>
					 		<div class="profile-form-edit">
					 			<form>
					 				<div class="row">
					 					<div class="col-lg-6">
					 						<span class="pf-title">Full Name</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="Ali TUFAN" />
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Job Title</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="UX / UI Designer" />
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Allow In Search</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Allow In Search" class="chosen">
													<option>Yes</option>
													<option>No</option>
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Minimum Salary</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="$4250" />
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Experience</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Allow In Search" class="chosen">
													<option>2-6 Years</option>
													<option>6-12 Years</option>
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Age</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Allow In Search" class="chosen">
													<option>22-30 Years</option>
													<option>30-40 Years</option>
													<option>40-50 Years</option>
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">Current Salary($) min</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="20K" />
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">Max</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="30K" />
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">Expected Salary($) min</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="30k" />
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">Max</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="40K" />
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Education Levels</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Specialism" class="chosen">
													<option>Diploma</option>
													<option>Inter</option>
													<option>Bachelor</option>
													<option>Graduate</option>
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Languages</span>					 						
					 						<div class="pf-field">
						 						<div class="pf-field">
						 							<select data-placeholder="Please Select Specialism" class="chosen">
														<option>English</option>
														<option>German</option>
													</select>
						 						</div>
											</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Categories</span>					 						
					 						<div class="pf-field no-margin">
						 						<ul class="tags">
										           <li class="addedTag">Photoshop<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden" name="tags[]" value="Photoshop"></li>
										           <li class="addedTag">Digital & Creative<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden" name="tags[]" value="Digital"></li>
										           <li class="addedTag">Agency<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden" name="tags[]" value="Agency"></li>
							            			<li class="tagAdd taglist">  
							              				 <input type="text" id="search-field">
										            </li>
												</ul>
											</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Description</span>
					 						<div class="pf-field">
					 							<textarea>Spent several years working on sheep on Wall Street. Had moderate success investing in Yugos on Wall Street. Managed a small team buying and selling pogo sticks for farmers. Spent several years licensing licorice in West Palm Beach, FL. Developed severalnew methods for working with banjos in the aftermarket. Spent a weekend importing banjos in West Palm Beach, FL.In this position, the Software Engineer ollaborates with Evention's Development team to continuously enhance our current software solutions as well as create new solutions to eliminate the back-office operations and management challenges present</textarea>
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<button type="submit">Update</button>
					 					</div>
					 				</div>
					 			</form>
					 		</div>
					 		<div class="social-edit">
					 			<h3>Social Edit</h3>
					 			<form>
					 				<div class="row">
					 					<div class="col-lg-6">
					 						<span class="pf-title">Facebook</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="www.facebook.com/TeraPlaner" />
					 							<i class="fa fa-facebook"></i>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Twitter</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="www.twitter.com/TeraPlaner" />
					 							<i class="fa fa-twitter"></i>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Google</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="www.google-plus.com/TeraPlaner" />
					 							<i class="la la-google"></i>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Linkedin</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="www.Linkedin.com/TeraPlaner" />
					 							<i class="la la-linkedin"></i>
					 						</div>
					 					</div>
					 				</div>
					 			</form>
					 		</div>
					 		<div class="contact-edit">
					 			<h3>Contact</h3>
					 			<form>
					 				<div class="row">
					 					<div class="col-lg-4">
					 						<span class="pf-title">Phone Number</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="+90 538 963 58 96" />
					 						</div>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">Email</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="demo@jobhunt.com" />
					 						</div>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">Website</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="www.jobhun.com" />
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Country</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Specialism" class="chosen">
													<option>Web Development</option>
													<option>Web Designing</option>
													<option>Art & Culture</option>
													<option>Reading & Writing</option>
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">City</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Specialism" class="chosen">
													<option>Web Development</option>
													<option>Web Designing</option>
													<option>Art & Culture</option>
													<option>Reading & Writing</option>
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Find On Map</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="Collins Street West, Victoria 8007, Australia." />
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">Latitude</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="41.1589654" />
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">Longitude</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="21.1589654" />
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<a href="#" title="" class="srch-lctn">Search Location</a>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Maps</span>
					 						<div class="pf-map">
					 							<div id="map_div"></div>
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<button type="submit">Update</button>
					 					</div>
					 				</div>
					 			</form>
					 		</div>
					 	</div>
					</div>
				 </div>
			</div>
		</div>
	</section>

	<footer>
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 column">
						<div class="widget">
							<div class="about_widget">
								<div class="logo">
									<a href="#" title=""><img src="http://placehold.it/178x40" alt="" /></a>
								</div>
								<span>Collin Street West, Victor 8007, Australia.</span>
								<span>+1 246-345-0695</span>
								<span>info@jobhunt.com</span>
								<div class="social">
									<a href="#" title=""><i class="fa fa-facebook"></i></a>
									<a href="#" title=""><i class="fa fa-twitter"></i></a>
									<a href="#" title=""><i class="fa fa-linkedin"></i></a>
									<a href="#" title=""><i class="fa fa-pinterest"></i></a>
									<a href="#" title=""><i class="fa fa-behance"></i></a>
								</div>
							</div><!-- About Widget -->
						</div>
					</div>
					<div class="col-lg-4 column">
						<div class="widget">
							<h3 class="footer-title">Frequently Asked Questions</h3>
							<div class="link_widgets">
								<div class="row">
									<div class="col-lg-6">
										<a href="#" title="">Privacy & Seurty </a>
										<a href="#" title="">Terms of Serice</a>
										<a href="#" title="">Communications </a>
										<a href="#" title="">Referral Terms </a>
										<a href="#" title="">Lending Licnses </a>
										<a href="#" title="">Disclaimers </a>	
									</div>
									<div class="col-lg-6">
										<a href="#" title="">Support </a>
										<a href="#" title="">How It Works </a>
										<a href="#" title="">For Employers </a>
										<a href="#" title="">Underwriting </a>
										<a href="#" title="">Contact Us</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-2 column">
						<div class="widget">
							<h3 class="footer-title">Find Jobs</h3>
							<div class="link_widgets">
								<div class="row">
									<div class="col-lg-12">
										<a href="#" title="">US Jobs</a>	
										<a href="#" title="">Canada Jobs</a>	
										<a href="#" title="">UK Jobs</a>	
										<a href="#" title="">Emplois en Fnce</a>	
										<a href="#" title="">Jobs in Deuts</a>	
										<a href="#" title="">Vacatures China</a>	
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 column">
						<div class="widget">
							<div class="download_widget">
								<a href="#" title=""><img src="http://placehold.it/230x65" alt="" /></a>
								<a href="#" title=""><img src="http://placehold.it/230x65" alt="" /></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bottom-line">
			<span>© 2018 Jobhunt All rights reserved. Design by Creative Layers</span>
			<a href="#scrollup" class="scrollup" title=""><i class="la la-arrow-up"></i></a>
		</div>
	</footer>

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


<script src="{{ asset('/style/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/style/js/modernizr.js') }}" type="text/javascript"></script>
<script src="{{ asset('/style/js/script.js') }}" type="text/javascript"></script>
<script src="{{ asset('/style/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/style/js/wow.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/style/js/slick.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/style/js/parallax.js') }}" type="text/javascript"></script>
<script src="{{ asset('/style/js/select-chosen.js') }}" type="text/javascript"></script>
<script src="{{ asset('/style/js/jquery.scrollbar.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/style/js/circle-progress.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/style/js/tag.js') }}" type="text/javascript"></script>
<script src="{{ asset('/style/js/maps3.js') }}" type="text/javascript"></script>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCYc537bQom7ajFpWE5sQaVyz1SQa9_tuY&sensor=true&libraries=places"></script>


</body>
</html>

