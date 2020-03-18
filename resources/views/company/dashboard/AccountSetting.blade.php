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
								<h3>Account</h3>
								<div class="change-password">
									<form id="companyUpdateUserAccount" action="/company/update-account" method="POST">
										@csrf
										<div class="row">
											<div class="col-lg-10">
												<span class="pf-title">Username</span>
												<div class="pf-field">
													<input type="text" name="username" value="{{ Auth::user()->username }}"/>
												</div>
												<span class="pf-title">Email</span>
												<div class="pf-field">
													<input type="text" name="email" value="{{ Auth::user()->email }}"/>
												</div>
												<span class="pf-title">Phone Number</span>
												<div class="pf-field">
													<input type="text" name="phone_number" value="{{ Auth::user()->phone_number }}"/>
												</div>
												<button type="submit">Update</button>
											</div>
										</div>
									</form>
								</div>
							</div>
					 		<div class="manage-jobs-sec">
					 			<h3>Change Password</h3>
						 		<div class="change-password">
						 			<form id="companyUpdatePassword" action="/company/update-password" method="POST">
										 @csrf
						 				<div class="row">
						 					<div class="col-lg-6">
						 						<span class="pf-title">Old Password</span>
						 						<div class="pf-field">
						 							<input type="password" name="old_password" required/>
						 						</div>
						 						<span class="pf-title">New Password</span>
						 						<div class="pf-field">
						 							<input type="password" name="new_password" required/>
						 						</div>
						 						<span class="pf-title">Confirm Password</span>
						 						<div class="pf-field">
						 							<input type="password" name="confirm_password" required/>
						 						</div>
						 						<button type="submit">Update</button>
						 					</div>
						 					<div class="col-lg-6">
						 						<i class="la la-key big-icon"></i>
						 					</div>
						 				</div>
						 			</form>
						 		</div>
					 		</div>
					 	</div>
					</div>
				 </div>
			</div>
		</div>
	</section>

	@include('partials.footer')

</div>

@include('partials.footer_script')
</body>
<script>
	jQuery(document).ready(function($){
		$('#companyUpdatePassword').on('submit',CAREER24H.company.handleChangePassword);
		$('#companyUpdateUserAccount').on('submit',CAREER24H.company.handleUpdateUserAccount);
	});
</script>
</html>
