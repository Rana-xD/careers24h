<!DOCTYPE html>
<html>
<head>
	@include('partials.header')
</head>
<body>

<div class="theme-layout" id="scrollup">
	<section>
		<div class="block no-padding">
			<div class="container">
				 <div class="row no-gape">
				 	<div class="col-lg-12 column">
				 		<div class="padding-left">
					 		<div class="profile-title">
					 			<h3>Profile</h3>
					 			<div class="upload-img-bar">
								 <span class="round"><img src="{{  $profile }}" alt="" id="ProfileImage"/></span>
					 				<div class="upload-info">
										 <a id="openFileInput">Browse</a>
										 <input type="file" name="logo" id="JobseekerImage" style="display:none">
					 					<span>Max file size is 1MB, Minimum dimension: 270x210 And Suitable files are .jpg & .png</span>
					 				</div>
					 			</div>
					 		</div>
					 		<div class="profile-form-edit">
					 			<form>
									 @csrf
					 				<div class="row">
					 					<div class="col-lg-5">
					 						<span class="pf-title">Full Name</span>
					 						<div class="pf-field">
											 <input type="text" placeholder="Ali TUFAN" name="full_name" id="full_name"/>
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">Age</span>
					 						<div class="pf-field">
											 <input type="text" placeholder="21" name="age" id="age"/>
					 						</div>
										 </div>
										 <div class="col-lg-4">
											<span class="pf-title">Gender</span>
											<div class="pf-field">
											<select data-placeholder="Allow In Search" class="chosen" name="gender" id="gender">
													<option value="MALE">MALE</option>
													<option value="FEMALE">FEMALE</option>
													<option value="OTHER">OTHER</option>
												</select>
											</div>
										</div>
					 					<div class="col-lg-6">
											<span class="pf-title">Experience</span>
											<div class="pf-field">
											<input type="text" placeholder="2" name="experience" id="experience"/>
											</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Industry</span>
					 						<div class="pf-field">
											 <select data-placeholder="Please Select Industry" class="chosen" name="industry" id="industry">
													<option value=""></option>
													@foreach (config('global.industry') as $item)
												 			<option value="{{ $item }}">{{ $item }}</option>
													 @endforeach
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Education Levels</span>
					 						<div class="pf-field">
												 <select data-placeholder="Please Select Education Level" class="chosen" name="education_level" id="education_level">
													<option value=""></option>
													 @foreach (config('global.education_level') as $item)
												 			<option value="{{ $item }}">{{ $item }}</option>
													 @endforeach
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Career Levels</span>					 						
					 						<div class="pf-field">
						 						<div class="pf-field">
													 <select data-placeholder="Please Select Career Level" class="chosen" name="career_level" id="career_level">
														<option value=""></option>
														@foreach (config('global.career_level') as $item)
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
					 				</div>
					 			</form>
					 		</div>
					 		<div class="social-edit">
					 			<h3>Social Edit</h3>
					 			<form>
					 				<div class="row">
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
					 							<i class="fa fa-twitter"></i>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Twitter</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="www.twitter.com/example" id="twitter" name="twitter"/>
					 							<i class="la la-google"></i>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Linkedin</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="www.Linkedin.com/TeraPlaner" name="linkedin" id="linkedin"/>
					 							<i class="la la-linkedin"></i>
					 						</div>
					 					</div>
					 				</div>
					 			</form>
					 		</div>
					 		<div class="contact-edit">
					 			<h3>Contact</h3>
					 			<form>
					 				<div class="row">
					 					<div class="col-lg-4">
					 						<span class="pf-title">Phone Number</span>
					 						<div class="pf-field">
											 <input type="text" placeholder="+90 538 963 58 96" id="phone_number" name="phone_number" value="{{$phone_number}}"/>
					 						</div>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">Email</span>
					 						<div class="pf-field">
											 <input type="text" placeholder="demo@jobhunt.com" id="email" name="email" value="{{$email}}"/>
					 						</div>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">City</span>
					 						<div class="pf-field">
											 <select data-placeholder="Please Select City" class="chosen" name="city" id="city">
													<option value=""></option>
													@foreach (config('global.city') as $item)
												 			<option value="{{ $item }}">{{ $item }}</option>
													 @endforeach
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
                                            {{-- <button type="button" id="skipProfile">Skip</button> --}}
                                            <button type="button" style="margin-right: 30px;" id="createJobseekerProfile">Create</button>
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
        $('#openFileInput').on('click',()=>{
			$('#JobseekerImage').click();
		})
		$('#JobseekerImage').on('change',CAREER24H.main.chooseProfilePicture);
        $('#skipProfile').on('click',CAREER24H.main.skipProfileSetting);
        $('#createJobseekerProfile').on('click',CAREER24H.main.createJobseekerProfile);
	});
</script>
</html>

