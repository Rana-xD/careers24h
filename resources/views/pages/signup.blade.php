<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Jobhunt</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="CreativeLayers">

	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="{{ asset('style/css/bootstrap-grid.css') }}" />
	<link rel="stylesheet" href="{{ asset('style/css/icons.css') }}">
	<link rel="stylesheet" href="{{ asset('style/css/animate.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('style/css/style.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('style/css/responsive.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('style/css/chosen.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('style/css/colors/colors.css') }}" />
	<link rel="stylesheet" type="text/css" 	href="{{ asset('style/css/bootstrap.css') }}" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
	
</head>
<body>


<div class="theme-layout" id="scrollup">
	<section>
		<div class="block remove-bottom">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="account-popup-area signup-popup-box static">
							<div class="account-popup">
								<h3>Sign Up</h3>
								<span>Lorem ipsum dolor sit amet consectetur adipiscing elit odio duis risus at lobortis ullamcorper</span>
								{{-- <div class="select-user">
									<span>Company</span>
									<span>Job Seeker</span>
								</div> --}}
								<form action="/signup" method="POST">
									@csrf
									<div class="cfield">
										<input type="text" placeholder="Username" name="username" />
										<i class="la la-user"></i>
									</div>
									<div class="cfield">
										<input type="password" placeholder="password" name="password"/>
										<i class="la la-key"></i>
									</div>
									<div class="cfield">
										<input type="text" placeholder="Email" name="email"/>
										<i class="la la-envelope-o"></i>
									</div>
									<div class="cfield">
										<input type="text" placeholder="Phone Number" name="phonenumber"/>
										<i class="la la-phone"></i>
									</div>
									<div class="dropdown-field">
										<select data-placeholder="Please Select Account Type" class="chosen" name="role">
											<option>Company</option>
											<option>Job Seeker</option>
										</select>
									</div>
									<button type="submit">Signup</button>
								</form>
								<div class="extra-login">
									<span>Or</span>
									<div class="login-social">
										<a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
										<a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
									</div>
								</div>
							</div>
						</div><!-- SIGNUP POPUP -->
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script src="{{ asset('/style/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/style/js/modernizr.js') }}" type="text/javascript"></script>
<script src="{{ asset('/style/js/script.js') }}" type="text/javascript"></script>
<script src="{{ asset('/style/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/style/js/wow.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/style/js/slick.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/style/js/parallax.js') }}" type="text/javascript"></script>
<script src="{{ asset('/style/js/select-chosen.js') }}" type="text/javascript"></script>
<script src="{{ asset('/style/js/jquery.scrollbar.min.js') }}" type="text/javascript"></script>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCYc537bQom7ajFpWE5sQaVyz1SQa9_tuY&sensor=true&libraries=places"></script>
<script src="{{ asset("/style/js/maps2.js") }}" type="text/javascript"></script>

</body>
</html>

