
<!DOCTYPE html>
<html lang="en">
<head>
	@include('partials.header')
</head>
<body>
		<div class="theme-layout" id="scrollup">
				<section>
					<div class="block remove-bottom">
						<div class="container">
							<div class="row">
								<div class="col-lg-12">
									<div class="account-popup-area signin-popup-box static">
										<div class="account-popup">
											<h3>Login</h3>
											<h4>Welcom Back!</h4>
												<form action="{{ url('/login') }}" method="post">
													@if (session('message'))
														<p style="color: red">Incorrect Email or Password</p>
													@endif
												@csrf
												<div class="cfield">
													<input type="text" placeholder="Email or Username" name="login" required/>
													<i class="la la-user"></i>
												</div>
												<div class="cfield">
													<input type="password" placeholder="password" name="password" required/>
													<i class="la la-key"></i>
												</div>
												<p class="remember-label">
													<input type="checkbox" name="remember" id="cb1"><label class="labels" for="cb1">Remember me</label>
												</p>
												<a href="#" title="">Forgot Password?</a>
												<button type="submit">Login</button>
											</form>
											{{-- <div class="extra-login">
												<span>Or</span>
												<div class="login-social">
													<a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
													<a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
												</div>
											</div> --}}
										</div>
									</div><!-- LOGIN POPUP -->
								</div>
							</div>
						</div>
					</div>
				</section>
			
			</div>
			@include('partials.footer_script');
</body>
</html>



