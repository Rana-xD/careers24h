
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
											<h3>Set New Password</h3>
                                                <form action="{{ url('/reset-password/submit') }}" method="post">
													@if (session('message'))
														<p style="color: red">Your confirm password does not match!!</p>
													@endif
												@csrf
                                                <input type="email" placeholder="email" name="email" value="{{ $email }}" hidden/>
												<div class="cfield">
													<input type="password" placeholder="New Password" name="new_password" required/>
													<i class="la la-key"></i>
												</div>
												<div class="cfield">
													<input type="password" placeholder="Confirm Password" name="confirm_password" required/>
													<i class="la la-key"></i>
												</div>
												<button type="submit">Submit</button>
											</form>
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



