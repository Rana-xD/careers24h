<!DOCTYPE html>
<html>
<head>
	@include('partials.header')
</head>
<body>

<div class="theme-layout" id="scrollup">
	@include('partials.navbar')
	@include('partials.jobseeker_top_content')
	<section>
		<div class="block no-padding">
			<div class="container">
				 <div class="row no-gape">
					@include('partials.jobseeker_sidebar')
				 	<div class="col-lg-9 column">
				 		<div class="padding-left">
							<div class="manage-jobs-sec">
								<h3>@lang('account_setting.account')</h3>
								<div class="change-password">
									<form id="jobseekerUpdateUserAccount" action="/jobseeker/update-account" method="POST">
										@csrf
										<div class="row">
											<div class="col-lg-10">
												<span class="pf-title">@lang('account_setting.username')</span>
												<div class="pf-field">
													<input type="text" name="username" value="{{ Auth::user()->username }}"/>
												</div>
												<span class="pf-title">@lang('account_setting.email')</span>
												<div class="pf-field">
													<input type="text" name="email" value="{{ Auth::user()->email }}"/>
												</div>
												<span class="pf-title">@lang('account_setting.phone_number')</span>
												<div class="pf-field">
													<input type="text" name="phone_number" value="{{ Auth::user()->phone_number }}"/>
												</div>
												<button type="submit">@lang('account_setting.update')</button>
											</div>
										</div>
									</form>
								</div>
							</div>
					 		<div class="manage-jobs-sec">
					 			<h3>@lang('account_setting.change_password')</h3>
						 		<div class="change-password">
									 <form id="jobseekerUpdatePassword" action="/jobseeker/update-password" method="POST">
										@csrf
						 				<div class="row">
						 					<div class="col-lg-6">
						 						<span class="pf-title">@lang('account_setting.old_password')</span>
						 						<div class="pf-field">
						 							<input type="password" name="old_password" required/>
						 						</div>
						 						<span class="pf-title">@lang('account_setting.new_password')</span>
						 						<div class="pf-field">
						 							<input type="password" name="new_password" required/>
						 						</div>
						 						<span class="pf-title">@lang('account_setting.confirm_password')</span>
						 						<div class="pf-field">
						 							<input type="password" name="confirm_password" required/>
						 						</div>
						 						<button type="submit">@lang('account_setting.update')</button>
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
		$('#jobseekerUpdatePassword').on('submit',CAREER24H.jobseeker.handleChangePassword);
		$('#jobseekerUpdateUserAccount').on('submit',CAREER24H.jobseeker.handleUpdateUserAccount);
	});
</script>
</html>

