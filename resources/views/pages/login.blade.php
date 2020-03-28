
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
											<h3>@lang('login.login_head')</h3>
											<h4>@lang('login.welcome')</h4>
												<form action="{{ url('/login') }}" method="post">
													@if (session('message'))
														<p style="color: red">{{ session('message') }}</p>
													@endif
												@csrf
												<div class="cfield">
													<input type="text" placeholder="@lang('login.email')" name="login" required/>
													<i class="la la-user"></i>
												</div>
												<div class="cfield">
													<input type="password" placeholder="@lang('login.password')" name="password" required/>
													<i class="la la-key"></i>
												</div>
												<p class="remember-label">
													<input type="checkbox" name="remember" id="cb1"><label class="labels" for="cb1">@lang('login.remember_me')</label>
												</p>
												<a href="/reset-password" title="">@lang('login.forget_password')</a>
												<button type="submit">@lang('login.login')</button>
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



