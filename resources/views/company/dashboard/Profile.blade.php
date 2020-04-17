<!DOCTYPE html>
<html>
<head>
	@include('partials.header')
	<style>
		.pf-field > input, .pf-field > textarea {
			margin-bottom: 0;
		}
		.profile-form-edit > form {
			margin-bottom: 40px;
		}
	</style>
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
					 		<div class="profile-title" id="mp">
					 			<h3>@lang('company_profile.company_profile')</h3>
					 			<div class="upload-img-bar">
								 <span><img src="{{ $company_profile->company_logo }}" alt="" width="160" height="138" id="logoImage"/></span>
					 				<div class="upload-info">
										 <a id="openFileInput">@lang('company_profile.browse')</a>
										 <input type="file" name="logo" id="CompanyLogo" style="display:none">
					 					<span>@lang('company_profile.profile_image')</span>
					 				</div>
					 			</div>
					 		</div>
					 		<div class="profile-form-edit">
					 			<form action="" method="POST" id="updateProfile">
									 @csrf
					 				<div class="row">
										<div class="col-lg-4">
											<span class="pf-title">@lang('company_profile.company_name') <span class="required">*</span></span>
					 						<div class="pf-field">
											 <input type="text" placeholder="Company Name" name="name" id="name" value="{{ $company_profile->name }}" required/>
					 						</div>
										</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">@lang('company_profile.since') <span class="required">*</span></span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="1991" name="start_year" id="start_year" value="{{ $company_profile->start_year }}" required/>
					 						</div>
					 					</div>
					 					<div class="col-lg-4">
											<span class="pf-title">@lang('company_profile.team_size') <span class="required">*</span></span>
											<div class="pf-field">
											<select data-placeholder="@lang('company_profile.please_select_option')" class="chosen" name="team_size" id="team_size" value="{{ $company_profile->team_size }}" required>
												   <option value=""></option>
												   @foreach ($team_size as $item)
														<option value="{{ $item }}">{{ $item }}</option>
												   @endforeach
											   </select>
											</div>
					 					</div>
					 					{{-- <div class="col-lg-12">
					 						<span class="pf-title">Categories</span>
					 						<div class="pf-field no-margin">
						 						<ul class="tags">
										           <li class="addedTag">Web Deisgn<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden" name="tags[]" value="Web Deisgn"></li>
										            <li class="addedTag">Web Develop<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden" name="tags[]" value="Web Develop"></li>
										            <li class="addedTag">SEO<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden" name="tags[]" value="SEO"></li>
							            			<li class="tagAdd taglist">  
							              				 <input type="text" id="search-field">
										            </li>
												</ul>
											</div>
					 					</div> --}}
					 					<div class="col-lg-12">
					 						<span class="pf-title">@lang('company_profile.description')</span>
					 						<div class="pf-field">
					 							<textarea name="info" id="info"></textarea>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Facebook</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="www.facebook.com/example" name="facebook" id="facebook"/>
					 							<i class="fa fa-facebook"></i>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Instagram</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="www.instagram.com/example" name="instragram" id="instagram"/>
					 							<i class="fa fa-instagram"></i>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Twitter</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="www.twitter.com/example" name="twitter" id="twitter"/>
					 							<i class="la la-twitter"></i>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Linkedin</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="www.Linkedin.com/example" name="linkedin" id="linkedin"/>
					 							<i class="la la-linkedin"></i>
					 						</div>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">@lang('company_profile.phone_number') <span class="required">*</span></span>
					 						<div class="pf-field">
											 <input type="text" placeholder="093456101" name="phone_number" id="phone_number" value="{{ $company_profile->phone_number }}" required/>
					 						</div>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">@lang('company_profile.email') <span class="required">*</span></span>
					 						<div class="pf-field">
											 <input type="text" placeholder="demo@jobhunt.com" name="email" id="email" value="{{  $company_profile->email }}" required/>
					 						</div>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">@lang('company_profile.website')</span>
					 						<div class="pf-field">
											 <input type="text" placeholder="www.jobhun.com" name="website" id="website" value="{{ $company_profile->website }}"/>
					 						</div>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">@lang('company_profile.city') <span class="required">*</span></span>
					 						<div class="pf-field">
											 <select data-placeholder="@lang('company_profile.please_select_option')" class="chosen" name="city" id="city" required>
													<option value=""></option> 
													@foreach ($city as $item)
														<option value="{{ $item }}">{{__('city.'.$item)}}</option>
												   @endforeach
												</select>
					 						</div>
										 </div>
										 <div class="col-lg-4">
											<span class="pf-title">@lang('company_profile.industry') <span class="required">*</span></span>
											<div class="pf-field">
											<select data-placeholder="@lang('company_profile.please_select_option')" class="chosen" name="industry" id="industry" required>
												   <option value=""></option> 
												   @foreach ($industry as $item)
													   <option value="{{ $item }}">{{ $item }}</option>
												  @endforeach
											   </select>
											</div>
										</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">@lang('company_profile.address')</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="Sangkat Vil Vong, Khan 7 Makara" name="address" id="address" value="{{ $company_profile->address }}"/>
											 </div>
										</div>
					 					<div class="col-lg-12" style="margin-top: 10px;">
					 						<button type="submit">@lang('company_profile.update')</button>
					 					</div>
					 				</div>
					 			</form>
					 		</div>
					 	</div>
					</div>
				 </div>
			</div>
		</div>
	</section>

</div>
@include('partials.footer_script')
</body>
<script>
	jQuery(document).ready(function($){
		let social_media = '<?php echo $company_profile->social_media ?>' ? JSON.parse('<?php echo $company_profile->social_media ?>') : '';
		let info = `<?php echo $company_profile->info ?>`;
		let city = '<?php echo $company_profile->city ?>';
		let industry = '<?php echo $company_profile->industry ?>';
		let team_size = '<?php echo $company_profile->team_size ?>';
		CAREER24H.company.loadDataForCompanyProfile(social_media,info,city,industry,team_size);
		$('#openFileInput').on('click',()=>{
			$('#CompanyLogo').click();
		})

		$('#updateProfile').on('submit',CAREER24H.company.updateCompanyProfile);
		$('#CompanyLogo').on("change",CAREER24H.company.chooseCompanyLogo);

		var form = $('#updateProfile');
		var navbar = $('header');
		form.find(':input').on('invalid', function (event) {
   			 var input = $(this)

    		// the first invalid element in the form
    		var first = form.find(':invalid').first()

    		// only handle if this is the first invalid input
    		if (input[0] === first[0]) {
        		// height of the nav bar plus some padding
        		var navbarHeight = navbar.height() + 50

        		// the position to scroll to (accounting for the navbar)
        		var elementOffset = input.offset().top - navbarHeight

        		// the current scroll position (accounting for the navbar)
        		var pageOffset = window.pageYOffset - navbarHeight

        		// don't scroll if the element is already in view
        		if (elementOffset > pageOffset && elementOffset < pageOffset + window.innerHeight) {
            		return true
        		}

        		// note: avoid using animate, as it prevents the validation message displaying correctly
        		$('html,body').scrollTop(elementOffset)
    		}
		});
		
	});
</script>
</html>

