<!DOCTYPE html>
<html>
<head>
	@include('partials.header')
	
</head>
<body>


<div class="theme-layout" id="scrollup">
	
	@include('partials.navbar')

	<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url(https://careers24h.s3-ap-southeast-1.amazonaws.com/imageSlider/Webp.net-compress-image-2.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header wform">
							<div class="job-search-sec">
								<div class="job-search">
									<h4>@lang('company.explore_company')</h4>
									<form>
										<div class="row">
											<div class="col-lg-10">
												<div class="job-field">
													<input type="text" placeholder="@lang('company.company_name')" name="company_name" id="company_name"/>
													<i class="la la-keyboard-o"></i>
												</div>
											</div>
											<div class="col-lg-2">
												<button type="button" id="filterCompany"><i class="la la-search"></i></button>
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

	<section>
		<div class="block less-top">
			<div class="container">
				 <div class="row">
				 	<aside class="col-lg-3 column margin_widget">
						 <div class="widget border">
							<h3 class="sb-title open">@lang('company.city')</h3>
							<div class="specialism_widget">
								<div class="simple-checkbox scrollbar">
									@foreach(config('global.city') as $item)
										<p><input type="checkbox" name="city[]" id="{{$item}}" value="{{$item}}"><label class="labels" for="{{$item}}">{{__('city.'.$item)}}</label></p>
									@endforeach
								</div>
							</div>
						</div>
				 		<div class="widget border">
				 			<h3 class="sb-title open">@lang('company.industry')</h3>
				 			<div class="specialism_widget">
				 				<div class="simple-checkbox">
									 @foreach(config('global.industry') as $item)
										 <p><input type="checkbox" name="industry[]" id="{{$item}}" value="{{$item}}"><label class="labels" for="{{$item}}">{{$item}}</label></p>
									 @endforeach
				 				</div>
				 			</div>
				 		</div>
				 		<div class="widget border">
				 			<h3 class="sb-title open">@lang('company.team_size')</h3>
				 			<div class="specialism_widget">
				 				<div class="simple-checkbox">
									 @foreach (config('global.team_size') as $item)
								 		<p><input type="checkbox" name="team_size[]" id="{{$item}}" value="{{$item}}"><label class="labels" for="{{$item}}">{{$item}}</label></p>
									 @endforeach
				 				</div>
				 			</div>
				 		</div>
				 	</aside>
				 	<div class="col-lg-9 column">
				 		<div class="filterbar">
				 			<p>{{count($companies)}} @lang('company.company')</p>
				 		</div>
				 		<div class="emply-list-sec">
				 			<div class="row" id="masonry">
								 @foreach ($companies as $company)
								 	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
										<div class="emply-list box">
											<div class="emply-list-thumb">
												<a href="/company/{{$company->uuid}}" title=""><img src="{{$company->company_logo}}" width="120" height="110" alt="" /></a>
											</div>
											<div class="emply-list-info">
												<div class="emply-pstn">{{count($company->activeJobs)}} @lang('company.job')</div>
													<h3><a href="/company/{{$company->uuid}}" title="">{{$company->name}}</a></h3>
													<span>{{ $company->industry  }}</span>
													<h6><i class="la la-map-marker"></i> {{__('city.'.$company->city)}}, @lang('city.Cambodia')</h6>
											</div>
										</div><!-- Employe List -->
									</div>
								 @endforeach
						 		<div class="col-lg-12">
						 			<div class="pagination">
										<ul>
											{{ $companies->links() }}
										</ul>
									</div><!-- Pagination -->
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
		$('#filterCompany').on('click',CAREER24H.main.handleFilterCompany);
	});
</script>
</html>

