<!DOCTYPE html>
<html>
<head>
	@include('partials.header')
	<style>
		.pf-field > input, .pf-field > textarea {
			margin-bottom: 0;
		}
	</style>
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
					 			<h3>@lang('company_profile.company_profile')</h3>
					 			<div class="upload-img-bar">
								 <span><img src="{{ $profile }}" alt="" width="160" height="138" id="logoImage"/></span>
					 				<div class="upload-info">
										 <a id="openFileInput">@lang('company_profile.browse')</a>
										 <input type="file" name="logo" id="CompanyLogo" style="display:none">
					 					<span>Max file size is 1MB, Minimum dimension: 270x210 And Suitable files are .jpg & .png</span>
					 				</div>
					 			</div>
					 		</div>
					 		<div class="profile-form-edit">
					 			<form>
									 @csrf
					 				<div class="row">
										<div class="col-lg-3">
											<span class="pf-title">@lang('company_profile.company_name')</span>
					 						<div class="pf-field">
											 <input type="text" placeholder="@lang('company_profile.company_name')" name="name" id="name"/>
					 						</div>
										</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">@lang('company_profile.since')</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="1991" name="start_year" id="start_year"/>
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
											<span class="pf-title">@lang('company_profile.team_size')</span>
											<div class="pf-field">
											<select data-placeholder="@lang('company_profile.please_select_option')" class="chosen" name="team_size" id="team_size">
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
					 						<span class="pf-title">@lang('company_profile.description')</span>
					 						<div class="pf-field">
					 							<textarea name="info" id="info"></textarea>
					 						</div>
					 					</div>
					 				</div>
					 			</form>
					 		</div>
					 		<div class="social-edit"  id="sn">
					 			{{-- <h3>@lang('company_profile.social_media')</h3> --}}
					 			<form>
					 				<div class="row">
					 					<div class="col-lg-3">
					 						<span class="pf-title">Facebook</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="www.facebook.com/example" name="facebook" id="facebook"/>
					 							<i class="fa fa-facebook"></i>
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">Instagram</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="www.instagram.com/example" name="instragram" id="instagram"/>
					 							<i class="fa fa-instagram"></i>
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">Twitter</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="www.twitter.com/example" name="twitter" id="twitter"/>
					 							<i class="la la-twitter"></i>
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
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
					 			{{-- <h3>@lang('company_profile.contact')</h3> --}}
					 			<form>
					 				<div class="row">
					 					<div class="col-lg-3">
					 						<span class="pf-title">@lang('company_profile.phone_number')</span>
					 						<div class="pf-field">
											 <input type="text" placeholder="@lang('company_profile.phone_number')" name="phone_number" id="phone_number" value="{{$phone_number}}"/>
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">@lang('company_profile.email')</span>
					 						<div class="pf-field">
											 <input type="text" placeholder="@lang('company_profile.email')" name="email" id="email" value="{{$email}}"/>
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">@lang('company_profile.website')</span>
					 						<div class="pf-field">
											 <input type="text" placeholder="www.jobhun.com" name="website" id="website"/>
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">@lang('company_profile.city')</span>
					 						<div class="pf-field">
											 <select data-placeholder="@lang('company_profile.please_select_option')" class="chosen" name="city" id="city">
													<option value=""></option> 
													@foreach (config('global.city') as $item)
														<option value="{{ $item }}">{{__('city.'.$item)}}</option>
												   @endforeach
												</select>
					 						</div>
										 </div>
										 <div class="col-lg-3">
											<span class="pf-title">@lang('company_profile.industry')</span>
											<div class="pf-field">
											<select data-placeholder="@lang('company_profile.please_select_option')" class="chosen" name="industry" id="industry">
												   <option value=""></option> 
												   @foreach (config('global.industry') as $item)
													   <option value="{{ $item }}">{{ $item }}</option>
												  @endforeach
											   </select>
											</div>
										</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">@lang('company_profile.address')</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="Sangkat Vil Vong, Khan 7 Makara" name="address" id="address"/>
					 						</div>
                                     </div>
                                     <div class="col-lg-12">
                                        {{-- <button type="button" id="skipProfile">Skip</button> --}}
                                        <button type="button" style="margin-right: 30px;" id="createCompanyProfile">@lang('company_profile.create')</button>
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

