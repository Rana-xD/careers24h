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
								<h3>Sign Up</h3>
								<span>Lorem ipsum dolor sit amet consectetur adipiscing elit odio duis risus at lobortis ullamcorper</span>
								{{-- <div class="select-user">
									<span>Company</span>
									<span>Job Seeker</span>
								</div> --}}
								<form action="/signup" method="POST">
									@csrf
									<div class="cfield">
										<input type="text" placeholder="Username" name="username" value="{{ old('username') }}"/>
										<i class="la la-user"></i>
									</div>
									@if($errors->has('email'))
											<span>
												{{ $errors->first('username') }}
											</span>
									@endif			
									<div class="cfield">
										<input type="password" placeholder="password" name="password" value="{{ old('password') }}"/>
										<i class="la la-key"></i>
									</div>
									@if($errors->has('password'))
										<span>
											{{ $errors->first('password') }}
										</span>
									@endif
									<div class="cfield">
										<input type="text" placeholder="Email" name="email" value="{{ old('email') }}"/>
										<i class="la la-envelope-o"></i>
									</div>
									@if($errors->has('email'))
										<span>
											{{ $errors->first('email') }}
										</span>
									@endif
									<div class="cfield">
										<input type="text" placeholder="Phone Number" name="phone_number" value="{{ old('phonenumber') }}"/>
										<i class="la la-phone"></i>
									</div>
									@if($errors->has('phone_number'))
										<span>
											{{ $errors->first('phone_number') }}
										</span>
									@endif
									<div class="dropdown-field">
										<select data-placeholder="Please Select Account Type" class="chosen" name="role">
											<option value="COMPANY">Company</option>
											<option value="JOBSEEKER">Job Seeker</option>
										</select>
									</div>
									@if($errors->has('role'))
										<span>
											{{ $errors->first('role') }}
										</span>
									@endif
									<button type="submit">Signup</button>
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

