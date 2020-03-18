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
					 		<div class="profile-title" id="mp">
					 			<h3>Profile</h3>
					 			<div class="upload-img-bar">
								 <span><img src="{{ $profile }}" alt="" width="160" height="138" id="logoImage"/></span>
					 				<div class="upload-info">
										 <a id="openFileInput">Browse</a>
										 <input type="file" name="logo" id="CompanyLogo" style="display:none">
					 					<span>Max file size is 1MB, Minimum dimension: 270x210 And Suitable files are .jpg & .png</span>
					 				</div>
					 			</div>
					 		</div>
					 		<div class="profile-form-edit">
					 			<form>
									 @csrf
					 				<div class="row">
										<div class="col-lg-5">
											<span class="pf-title">Company Name</span>
					 						<div class="pf-field">
											 <input type="text" placeholder="Company Name" name="name" id="name"/>
					 						</div>
										</div>
					 					<div class="col-lg-2">
					 						<span class="pf-title">Since</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="1991" name="start_year" id="start_year"/>
					 						</div>
					 					</div>
					 					<div class="col-lg-5">
											<span class="pf-title">Team Size</span>
											<div class="pf-field">
											<select data-placeholder="Please Select Options" class="chosen" name="team_size" id="team_size">
												   <option value=""></option>
												   @foreach (config('global.team_size') as $item)
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
					 						<span class="pf-title">Description</span>
					 						<div class="pf-field">
					 							<textarea name="info" id="info"></textarea>
					 						</div>
					 					</div>
					 				</div>
					 			</form>
					 		</div>
					 		<div class="social-edit"  id="sn">
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
					 				</div>
					 			</form>
					 		</div>
					 		<div class="contact-edit" id="ci">
					 			<h3>Contact</h3>
					 			<form>
					 				<div class="row">
					 					<div class="col-lg-4">
					 						<span class="pf-title">Phone Number</span>
					 						<div class="pf-field">
											 <input type="text" placeholder="093456101" name="phone_number" id="phone_number"/>
					 						</div>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">Email</span>
					 						<div class="pf-field">
											 <input type="text" placeholder="demo@jobhunt.com" name="email" id="email"/>
					 						</div>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">Website</span>
					 						<div class="pf-field">
											 <input type="text" placeholder="www.jobhun.com" name="website" id="website"/>
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
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
										 <div class="col-lg-4">
											<span class="pf-title">Industry</span>
											<div class="pf-field">
											<select data-placeholder="Please Select Your Industry" class="chosen" name="industry" id="industry">
												   <option value=""></option> 
												   @foreach (config('global.industry') as $item)
													   <option value="{{ $item }}">{{ $item }}</option>
												  @endforeach
											   </select>
											</div>
										</div>
					 					<div class="col-lg-5">
					 						<span class="pf-title">Address</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="Sangkat Vil Vong, Khan 7 Makara" name="address" id="address"/>
					 						</div>
                                     </div>
                                     <div class="col-lg-12">
                                        {{-- <button type="button" id="skipProfile">Skip</button> --}}
                                        <button type="button" style="margin-right: 30px;" id="createCompanyProfile">Create</button>
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
		$('#info').summernote({
        	toolbar: [
          		['style', ['style']],
				  ['font', ['bold', 'underline', 'clear']],
				  ['para', ['ul', 'ol', 'paragraph']],
        	]
        });
		$('#openFileInput').on('click',()=>{
			$('#CompanyLogo').click();
		})
		$('#CompanyLogo').on('change',CAREER24H.main.chooseCompanyLogo);
		$('#skipProfile').on('click',CAREER24H.main.skipProfileSetting);
		$('#createCompanyProfile').on('click',CAREER24H.main.createCompanyProfile);

		
		
	});
</script>
</html>

