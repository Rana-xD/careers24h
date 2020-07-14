<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" integrity="sha256-jKV9n9bkk/CTP8zbtEtnKaKf+ehRovOYeKoyfthwbC8=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js" integrity="sha256-CgvH7sz3tHhkiVKh05kSUgG97YtzYNnWt6OXcmYzqHY=" crossorigin="anonymous"></script>
	@include('partials.header')
	<style>
		.pf-field > input, .pf-field > textarea {
			margin-bottom: 0;
		}
		.profile-form-edit > form {
			margin-bottom: 40px;
		}
		img {
  			display: block;
  			max-width: 100%;
		}
		.modal-lg{
 			 max-width: 1000px !important;
		}
	</style>
</head>
<body>
<div class="spinner-wrapper">
		<div class="spinner">
			  <div class="bounce1"></div>
			  <div class="bounce2"></div>
			  <div class="bounce3"></div>
		</div>
</div>
<div class="theme-layout" id="scrollup">
	
	<section>
		<div class="block no-padding">
			<div class="container">
				 <div class="row no-gape">
				 	<div class="col-lg-12 column">
				 		<div class="padding-left">
					 		<div class="profile-title" id="mp">
					 			{{-- <h3>@lang('company_profile.company_profile')</h3> --}}
					 			<div class="upload-img-bar">
								 <span><img src="{{ $profile }}" alt="" width="160" height="138" id="logoImage"/></span>
					 				<div class="upload-info">
										 <a id="openFileInput">@lang('company_profile.browse')</a>
										 <input type="file" name="logo" id="CompanyLogo" style="display:none">
										 <input type="hidden" name="crop_image" id="crop_image">
					 					<span>Max file size is 1MB, Minimum dimension: 270x210 And Suitable files are .jpg & .png</span>
					 				</div>
					 			</div>
					 		</div>
					 		<div class="profile-form-edit">
					 			<form method="POST" action="" id="createCompanyProfile"> 
									 @csrf
					 				<div class="row">
										<div class="col-lg-4">
											<span class="pf-title">@lang('company_profile.company_name') <span class="required">*</span></span>
					 						<div class="pf-field">
											 <input type="text" placeholder="@lang('company_profile.company_name')" name="name" id="name" required/>
					 						</div>
										</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">@lang('company_profile.since') <span class="required">*</span></span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="1991" name="start_year" id="start_year" required/>
					 						</div>
					 					</div>
					 					<div class="col-lg-4">
											<span class="pf-title">@lang('company_profile.team_size') <span class="required">*</span></span>
											<div class="pf-field">
											<select data-placeholder="@lang('company_profile.please_select_option')" class="chosen" name="team_size" id="team_size" required>
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
					 					{{-- <div class="col-lg-3">
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
					 					</div> --}}
					 					<div class="col-lg-4">
					 						<span class="pf-title">@lang('company_profile.phone_number') <span class="required">*</span></span>
					 						<div class="pf-field">
											 <input type="text" placeholder="@lang('company_profile.phone_number')" name="phone_number" id="phone_number" value="{{$phone_number}}" required/>
					 						</div>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">@lang('company_profile.email') <span class="required">*</span></span>
					 						<div class="pf-field">
											 <input type="text" placeholder="@lang('company_profile.email')" name="email" id="email" value="{{$email}}" required/>
					 						</div>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">@lang('company_profile.website')</span>
					 						<div class="pf-field">
											 <input type="text" placeholder="www.jobhun.com" name="website" id="website"/>
					 						</div>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">@lang('company_profile.city') <span class="required">*</span></span>
					 						<div class="pf-field">
											 <select data-placeholder="@lang('company_profile.please_select_option')" class="chosen" name="city" id="city" required>
													<option value=""></option> 
													@foreach ($city as $item)
														<option value="{{ $item->id }}">{{__('city.'.$item->name)}}</option>
												   @endforeach
												</select>
					 						</div>
										 </div>
										 <div class="col-lg-4">
											<span class="pf-title">@lang('company_profile.industry') <span class="required">*</span></span>
											<div class="pf-field">
											<select data-placeholder="@lang('company_profile.please_select_option')" class="chosen" name="industry" id="industry" required>
												   <option value=""></option> 
												   @foreach (config('global.industry') as $item)
													   <option value="{{ $item }}">{{ $item }}</option>
												  @endforeach
											   </select>
											</div>
										</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">@lang('company_profile.address')</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="Sangkat Vil Vong, Khan 7 Makara" name="address" id="address"/>
					 						</div>
                                     </div>
                                     <div class="col-lg-12">
                                        {{-- <button type="button" id="skipProfile">Skip</button> --}}
                                        <button type="submit" style="margin-right: 30px;">@lang('company_profile.create')</button>
                                    </div>
					 			</form>
					 		</div>
					 	</div>
					</div>
				 </div>
			</div>
		</div>
	</section>
	@include('layouts.crop_image_modal');
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
		// $('#CompanyLogo').on('change',CAREER24H.main.chooseCompanyLogo);
		// $('#skipProfile').on('click',CAREER24H.main.skipProfileSetting);
		$('#createCompanyProfile').on('submit',CAREER24H.main.createCompanyProfile);

		var $modal = $('#modal');
		var image = document.getElementById('image');
		var cropper;
		$("body").on("change", "#CompanyLogo", function(e){
    		var files = e.target.files;
    		var done = function (url) {
     		 image.src = url;
      		$modal.modal('show');
    		};
    		var reader;
    		var file;
    		var url;

    		if (files && files.length > 0) {
      			file = files[0];

      		if (URL) {
        		done(URL.createObjectURL(file));
      		} else if (FileReader) {
        		reader = new FileReader();
        		reader.onload = function (e) {
          		done(reader.result);
        	};
        	reader.readAsDataURL(file);
      	}
    	}
		});
		$modal.on('shown.bs.modal', function () {
    		cropper = new Cropper(image, {
			initialAspectRatio: 1,
			aspectRatio: 1,
			viewMode: 3,
	  		preview: '.preview'
    	});
		}).on('hidden.bs.modal', function () {
   			cropper.destroy();
        	cropper = null;
   		});
		$("#crop").click(function(){
    		canvas = cropper.getCroppedCanvas({
					minWidth: 160,
					minHeight: 150,
					maxWidth: 3072,
        			maxHeight: 3072,
					imageSmoothingEnabled: true,
					imageSmoothingQuality: 'high'
      		});
			  
    		canvas.toBlob(function(blob) {
				CAREER24H.constant.isCompanyLogoChange = true;
       			 url = URL.createObjectURL(blob);
       			 var reader = new FileReader();
         		reader.readAsDataURL(blob); 
         		reader.onloadend = function() {
					    $('#crop_image').val(reader.result);
						$('#logoImage').attr('src', reader.result);
				 }
				 $modal.modal('hide');
    		}, 'image/png', 1);
		});
		
	});
</script>
</html>

