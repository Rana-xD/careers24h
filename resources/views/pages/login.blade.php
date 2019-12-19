
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login</title>
	@include('header.header')
</head>
<body>
		<div class="theme-layout" id="scrollup">
				<section>
					<div class="block no-padding  gray">
						<div class="container">
							<div class="row">
								<div class="col-lg-12">
									<div class="inner2">
										<div class="inner-title2">
											<h3>Login</h3>
											<span>Keep up to date with the latest news</span>
										</div>
										<div class="page-breacrumbs">
											<ul class="breadcrumbs">
												<li><a href="#" title="">Home</a></li>
												<li><a href="#" title="">Pages</a></li>
												<li><a href="#" title="">Login</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			
				<section>
					<div class="block remove-bottom">
						<div class="container">
							<div class="row">
								<div class="col-lg-12">
									<div class="account-popup-area signin-popup-box static">
										<div class="account-popup">
											<span>Lorem ipsum dolor sit amet consectetur adipiscing elit odio duis risus at lobortis ullamcorper</span>
												<form action="{{ url('/login') }}" method="post">
												{{ csrf_field() }}
												<div class="cfield">
													<input type="text" placeholder="Username" name="username"/>
													<i class="la la-user"></i>
												</div>
												<div class="cfield">
													<input type="password" placeholder="********" name="password"/>
													<i class="la la-key"></i>
												</div>
												<p class="remember-label">
													<input type="checkbox" name="cb" id="cb1"><label for="cb1">Remember me</label>
												</p>
												<a href="#" title="">Forgot Password?</a>
												<button type="submit">Login</button>
											</form>
											<div class="extra-login">
												<span>Or</span>
												<div class="login-social">
													<a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
													<a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
												</div>
											</div>
										</div>
									</div><!-- LOGIN POPUP -->
								</div>
							</div>
						</div>
					</div>
				</section>
			
			</div>
			
			<div class="account-popup-area signin-popup-box">
				<div class="account-popup">
					<span class="close-popup"><i class="la la-close"></i></span>
					<h3>User Login</h3>
					<span>Click To Login With Demo User</span>
					<div class="select-user">
						<span>Candidate</span>
						<span>Employer</span>
					</div>
					<form action="{{ url('/login') }}" method="post">
						{{ csrf_field() }}
						<div class="cfield">
							<input type="text" placeholder="Username", name="username" />
							<i class="la la-user"></i>
						</div>
						<div class="cfield">
							<input type="password" placeholder="********" name="password"/>
							<i class="la la-key"></i>
						</div>
						<p class="remember-label">
							<input type="checkbox" name="cb" id="cbwq"><label for="cbwq">Remember me</label>
						</p>
						<a href="#" title="">Forgot Password?</a>
						<button type="submit">Login</button>
					</form>
					<div class="extra-login">
						<span>Or</span>
						<div class="login-social">
							<a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
							<a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
						</div>
					</div>
				</div>
			</div><!-- LOGIN POPUP -->
			
			<div class="account-popup-area signup-popup-box">
				<div class="account-popup">
					<span class="close-popup"><i class="la la-close"></i></span>
					<h3>Sign Up</h3>
						<div class="select-user">
							<span>Candidate</span>
							<span>Employer</span>
						</div>
					<form action="{{ url('/signup')}}" method="POST">
						{{ csrf_field() }}
						<div class="cfield">
							<input type="text" placeholder="Username", name="username" />
							<i class="la la-user"></i>
						</div>
						<div class="cfield">
							<input type="password" placeholder="********" name="password" />
							<i class="la la-key"></i>
						</div>
						<div class="cfield">
							<input type="text" placeholder="Email" name="emailAddress"/>
							<i class="la la-envelope-o"></i>
						</div>
						<div class="dropdown-field">
							<select data-placeholder="Please Select Specialism" class="chosen">
								<option>Web Development</option>
								<option>Web Designing</option>
								<option>Art & Culture</option>
								<option>Reading & Writing</option>
							</select>
						</div>
						<div class="cfield">
							<input type="text" placeholder="Phone Number" name="phoneNumber"/>
							<i class="la la-phone"></i>
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
			<!--JavaScript -->
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
			<script src="{{ asset('/style/js/maps2.js') }}" type="text/javascript"></script>
</body>
</html>



