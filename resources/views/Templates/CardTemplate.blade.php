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
		<div class="block remove-top">
			<div class="container">
				 <div class="row no-gape">
					@include('partials.jobseeker_sidebar')
				 	<div class="col-lg-9 column">
							<div class="padding-left">
								<div class="manage-jobs-sec">
									<div class="cat-sec" style="margin-top: 5%; margin-left:5%">                            
										@if (session('message'))
											<p style="color: red">Pleased Add More informations </p>
										@endif
										<div class="row no-gape padding-left">                 
											@foreach ($templates as $item)
												<div class="col-lg-3 col-md-3 col-sm-6">
													<div class="p-category">
													<a href="/jobseeker/template/{{ $item["id"] }}" title="">
															<i class="la la-photo"></i>
															<span>{{ $item["templateName"] }}</span>
														</a>
													</div>
												</div>
											@endforeach
										</div>
									</div>
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
</html>

