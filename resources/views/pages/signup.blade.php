<!DOCTYPE html>
<html>
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
						<div class="account-popup-area signup-popup-box static">
							<div class="account-popup">
								<h3>@lang('signup.sign_up')</h3>
								{{-- <div class="select-user">
									<span>Company</span>
									<span>Job Seeker</span>
								</div> --}}
								<form action="/signup" method="POST" id="signup_form">
									@csrf
									<div class="cfield">
										<input type="text" placeholder="@lang('signup.username')" name="username" value="{{ old('username') }}" required/>
										<i class="la la-user"></i>
									</div>		
									<div class="cfield">
										<input type="password" placeholder="@lang('signup.password')" name="password" value="{{ old('password') }}" required/>
										<i class="la la-key"></i>
									</div>
									<div class="cfield">
										<input type="email" placeholder="@lang('signup.email')" name="email" value="{{ old('email') }}" required/>
										<i class="la la-envelope-o"></i>
									</div>
									<div class="cfield">
										<input type="text" placeholder="@lang('signup.phone_number')" name="phone_number" value="{{ old('phonenumber') }}" required/>
										<i class="la la-phone"></i>
									</div>
									<div class="dropdown-field">
										<select data-placeholder="Please Select Account Type" class="chosen" name="role" required>
											<option value="COMPANY">@lang('signup.company')</option>
											<option value="JOBSEEKER">@lang('signup.jobseeker')</option>
										</select>
									</div>
									<button type="submit">@lang('signup.sign_up')</button>
								</form>
								{{-- <div class="extra-login">
									<span>Or</span>
									<div class="login-social">
										<a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
										<a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
									</div>
								</div> --}}
							</div>
						</div><!-- SIGNUP POPUP -->
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@include('partials.footer_script')

</body>

</html>

