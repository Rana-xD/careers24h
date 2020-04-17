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
	@include('partials.jobseeker_top_content')
	<section>
		<div class="block no-padding">
			<div class="container">
				 <div class="row no-gape">
				 	@include('partials.jobseeker_sidebar')
				 	<div class="col-lg-9 column">
				 		<div class="padding-left">
					 		<div class="profile-title">
					 			<h3>@lang('my_profile.my_profile')</h3>
					 			<div class="upload-img-bar">
								 <span class="round"><img src="{{  $jobseeker_profile->user_profile }}" alt="" id="ProfileImage"/></span>
					 				<div class="upload-info">
										 <a id="openFileInput">@lang('my_profile.browse')</a>
										 <input type="file" name="logo" id="JobseekerImage" style="display:none">
					 					<span>@lang('my_profile.profile_image')</span>
					 				</div>
					 			</div>
					 		</div>
					 		<div class="profile-form-edit">
					 			<form action="" method="POST" id="jobseekerProfileUpdate">
									 @csrf
					 				<div class="row">
					 					<div class="col-lg-3">
					 						<span class="pf-title">@lang('my_profile.fullname') <span class="required">*</span></span>
					 						<div class="pf-field">
											 <input type="text" placeholder="Ali TUFAN" name="full_name" id="full_name" value="{{ $jobseeker_profile->full_name }}" required/>
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">@lang('my_profile.age') <span class="required">*</span></span>
					 						<div class="pf-field">
											 <input type="text" placeholder="21" name="age" id="age" value="{{  $jobseeker_profile->age }}" required/>
					 						</div>
										 </div>
										 <div class="col-lg-3">
											<span class="pf-title">@lang('my_profile.gender')</span>
											<div class="pf-field">
											<select data-placeholder="Allow In Search" class="chosen age" name="gender" id="gender" value="{{ $jobseeker_profile->gender }}">
													<option value="MALE">@lang('my_profile.male')</option>
													<option value="FEMALE">@lang('my_profile.female')</option>
												</select>
											</div>
										</div>
										<div class="col-lg-3">
											<span class="pf-title">@lang('my_profile.visibility')</span>
											<div>
											   <input type="checkbox" checked id="isPrivate" data-toggle="toggle" data-size="normal" data-on="@lang('my_profile.public')" data-off="@lang('my_profile.private')" data-onstyle="primary" data-offstyle="danger">
											</div>
										</div>
					 					<div class="col-lg-3">
											<span class="pf-title">@lang('my_profile.experience') <span class="required">*</span></span>
											<div class="pf-field">
												<select data-placeholder="@lang('my_profile.please_select_option')" class="chosen" name="experience" id="experience" required>
													   <option value=""></option>
													   @foreach (config('global.years_of_experience') as $item)
																<option value="{{ $item }}">{{ $item }}</option>
														@endforeach
												   </select>
											</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">@lang('my_profile.industry') <span class="required">*</span></span>
					 						<div class="pf-field">
											 <select data-placeholder="@lang('my_profile.please_select_option')" class="chosen" name="industry" id="industry" required>
													<option value=""></option>
													@foreach (config('global.industry') as $item)
												 			<option value="{{ $item }}">{{ $item }}</option>
													 @endforeach
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">@lang('my_profile.education_level') <span class="required">*</span></span>
					 						<div class="pf-field">
												 <select data-placeholder="@lang('my_profile.please_select_option')" class="chosen" name="education_level" id="education_level" required>
													<option value=""></option>
													 @foreach ($education_level as $item)
												 			<option value="{{ $item }}">{{ $item }}</option>
													 @endforeach
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">@lang('my_profile.career_levels') <span class="required">*</span></span>					 						
					 						<div class="pf-field">
						 						<div class="pf-field">
													 <select data-placeholder="@lang('my_profile.please_select_option')" class="chosen" name="career_level" id="career_level" required>
														<option value=""></option>
														@foreach ($career_level as $item)
												 			<option value="{{ $item }}">{{ $item }}</option>
													 @endforeach
													</select>
						 						</div>
											</div>
					 					</div>
					 					{{-- <div class="col-lg-12">
					 						<span class="pf-title">Categories</span>					 						
					 						<div class="pf-field no-margin">
						 						<ul class="tags">
										           <li class="addedTag">Photoshop<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden" name="tags[]" value="Photoshop"></li>
										           <li class="addedTag">Digital & Creative<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden" name="tags[]" value="Digital"></li>
										           <li class="addedTag">Agency<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden" name="tags[]" value="Agency"></li>
							            			<li class="tagAdd taglist">  
							              				 <input type="text" id="search-field">
										            </li>
												</ul>
											</div>
					 					</div> --}}
					 					<div class="col-lg-3">
					 						<span class="pf-title">@lang('my_profile.phone_number') <span class="required">*</span></span>
					 						<div class="pf-field">
											 <input type="text" placeholder="+90 538 963 58 96" id="phone_number" name="phone_number" value="{{ $jobseeker_profile->phone_number }}" required/>
					 						</div>
										 </div>
										 <div class="col-lg-3">
											<span class="pf-title">Secondary Phone Number</span>
											<div class="pf-field">
											<input type="text" placeholder="093450450" id="secondary_phone_number" name="secondary_phone_number"/>
											</div>
										</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">@lang('my_profile.email') <span class="required">*</span></span>
					 						<div class="pf-field">
											 <input type="text" placeholder="demo@jobhunt.com" id="email" name="email" value="{{  $jobseeker_profile->email }}" required/>
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">@lang('my_profile.city') <span class="required">*</span></span>
					 						<div class="pf-field">
											 <select data-placeholder="@lang('my_profile.please_select_option')" class="chosen" name="city" id="city" value="{{ $jobseeker_profile->city }}" required>
													<option value=""></option>
													@foreach ($city as $item)
												 			<option value="{{ $item }}">{{__('city.'.$item)}}</option>
													 @endforeach
												</select>
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
												<input type="text" placeholder="www.instagram.com/example" id="instagram" name="instagram"/>
												<i class="fa fa-instagram"></i>
											</div>
										</div>
										<div class="col-lg-6">
											<span class="pf-title">Twitter</span>
											<div class="pf-field">
												<input type="text" placeholder="www.twitter.com/example" id="twitter" name="twitter"/>
												<i class="la la-twitter"></i>
											</div>
										</div>
										<div class="col-lg-6">
											<span class="pf-title">Linkedin</span>
											<div class="pf-field">
												<input type="text" placeholder="www.Linkedin.com/TeraPlaner" name="linkedin" id="linkedin"/>
												<i class="la la-linkedin"></i>
											</div>
										</div>
										<div class="col-lg-12" style="margin-top: 10px;">
											<button type="submit">@lang('my_profile.update')</button>
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
		$(".chosen").chosen({
        	inherit_select_classes: true
		});
		  
		let social_media = '<?php echo $jobseeker_profile->social_media ?>' ? JSON.parse('<?php echo $jobseeker_profile->social_media ?>') : '';
		let industry = '<?php echo $jobseeker_profile->industry ?>';
		let educationLevel = '<?php echo $jobseeker_profile->education_level ?>';
		let careerLevel = '<?php echo $jobseeker_profile->career_level ?>';
		let gender = '<?php echo $jobseeker_profile->gender ?>';
		let city = '<?php echo $jobseeker_profile->city ?>';
		let isPrivate = '<?php echo $jobseeker_profile->is_private ?>';
		let experience = '<?php echo $jobseeker_profile->experience ?>';
		$('#openFileInput').on('click',()=>{
			$('#JobseekerImage').click();
		})
		$('#JobseekerImage').on('change',CAREER24H.jobseeker.chooseProfilePicture);
		$('#jobseekerProfileUpdate').on('submit',CAREER24H.jobseeker.updateJobseekerProfile);
		CAREER24H.jobseeker.loadDataForJobseekerProfile(social_media,industry,educationLevel,careerLevel,gender,city,isPrivate,experience);

		var form = $('#jobseekerProfileUpdate');
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

