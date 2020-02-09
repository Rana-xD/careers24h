<!DOCTYPE html>
<html>
<head>
	@include('partials.header')
</head>
<body>

<div class="theme-layout" id="scrollup">
	
	@include('partials.navbar')
	@include('partials.company_top_content')

	<section>
		<div class="block no-padding">
			<div class="container">
				 <div class="row no-gape">
					@include('partials.company_sidebar')
				 	<div class="col-lg-9 column">
				 		<div class="padding-left">
					 		<div class="manage-jobs-sec">
					 			<h3>Job Alerts</h3>
						 		<table class="alrt-table">
						 			<thead>
						 				<tr>
						 					<td>Alert Details</td>
						 					<td class="text-right">Email Frequency</td>
						 				</tr>
						 			</thead>
						 			<tbody>
						 				<tr>
						 					<td>
						 						<div class="table-list-title">
						 							<h3><a href="#" title="">Test Title</a></h3>
						 							<span>Search Keywords: 2, 60, Crawley RH10 8XH, United Kingdom</span>
						 						</div>
						 					</td>
						 					<td>
						 						<ul class="action_job">
						 							<li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
						 						</ul>
						 						<span>Never</span>
						 					</td>
						 				</tr>
						 				<tr>
						 					<td>
						 						<div class="table-list-title">
						 							<h3><a href="#" title="">Test Title</a></h3>
						 							<span>Search Keywords: 2, 60, Crawley RH10 8XH, United Kingdom</span>
						 						</div>
						 					</td>
						 					<td>
						 						<ul class="action_job">
						 							<li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
						 						</ul>
						 						<span>Never</span>
						 					</td>
						 				</tr>
						 				<tr>
						 					<td>
						 						<div class="table-list-title">
						 							<h3><a href="#" title="">Test Title</a></h3>
						 							<span>Search Keywords: 2, 60, Crawley RH10 8XH, United Kingdom</span>
						 						</div>
						 					</td>
						 					<td>
						 						<ul class="action_job">
						 							<li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
						 						</ul>
						 						<span>Never</span>
						 					</td>
						 				</tr>
						 				<tr>
						 					<td>
						 						<div class="table-list-title">
						 							<h3><a href="#" title="">Test Title</a></h3>
						 							<span>Search Keywords: 2, 60, Crawley RH10 8XH, United Kingdom</span>
						 						</div>
						 					</td>
						 					<td>
						 						<ul class="action_job">
						 							<li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
						 						</ul>
						 						<span>Never</span>
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


<script src="{{ asset("/style/js/jquery.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("/style/js/modernizr.js") }}" type="text/javascript"></script>
<script src="{{ asset("/style/js/script.js")}}" type="text/javascript"></script>
<script src="{{ asset("/style/js/bootstrap.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("/style/js/wow.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("/style/js/slick.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("/style/js/parallax.js") }}" type="text/javascript"></script>
<script src="{{ asset("/style/js/select-chosen.js") }}" type="text/javascript"></script>
<script src="{{ asset("/style/js/jquery.scrollbar.min.js") }}" type="text/javascript"></script>

</body>
</html>

