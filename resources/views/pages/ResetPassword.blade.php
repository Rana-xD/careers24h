
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
											<h3>Reset Password</h3>
												<form action="{{ url('/validate') }}" method="post">
													@if (session('message'))
														<p style="color: red">{{ session('message') }}</p>
													@endif
												@csrf
												<div class="cfield">
													<input type="email" placeholder="Email" name="emailAddress" required/>
													<i class="la la-user"></i>
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



