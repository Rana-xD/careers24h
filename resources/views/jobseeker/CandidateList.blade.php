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
									<h4>@lang('candidate.explore_candidate')</h4>
									<form>
										<div class="row">
											<div class="col-lg-10">
												<div class="job-field">
													<input type="text" placeholder="@lang('candidate.candidate_name')" name="candidate_name" id="candidate_name"/>
													<i class="la la-keyboard-o"></i>
												</div>
											</div>
											<div class="col-lg-2">
												<button type="button" id="filterCandidate"><i class="la la-search"></i></button>
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
		<div class="block no-padding">
			<div class="container">
				 <div class="row no-gape">
				 	<aside class="col-lg-3 column border-right">
						<div class="widget">
							<h3 class="sb-title open">@lang('candidate.industry')</h3>
							<div class="specialism_widget">
								<div class="simple-checkbox scrollbar">
									@foreach (config('global.industry') as $item)
										<p><input type="checkbox" name="industry[]" id="{{$item}}" value="{{$item}}"><label for="{{$item}}" class="labels">{{$item}}</label></p>
									@endforeach
								</div>
							</div>
						</div>
						<div class="widget">
							<h3 class="sb-title closed">@lang('candidate.experience')</h3>
							<div class="specialism_widget">
								<div class="simple-checkbox">
									@foreach (config('global.years_of_experience') as $item)
										<p><input type="checkbox" name="experience[]" id="{{$item}}" value="{{$item}}"><label class="labels" for="{{$item}}">{{$item}}</label></p>
									@endforeach
								</div>
							</div>
						</div>
				 		{{-- <div class="widget">
				 			<h3 class="sb-title closed">@lang('candidate.career_level')</h3>
				 			<div class="specialism_widget">
				 				<div class="simple-checkbox">
									 @foreach (config('global.career_level') as $item)
									 	<p><input type="checkbox" name="career_level[]" id="{{$item}}" value="{{$item}}"><label class="labels" for="{{$item}}">{{$item}}</label></p>
									 @endforeach
				 				</div>
				 			</div>
				 		</div> --}}
				 		<div class="widget">
				 			<h3 class="sb-title closed">@lang('candidate.qualification')</h3>
				 			<div class="specialism_widget">
				 				<div class="simple-checkbox">
									 @foreach (config('global.education_level') as $item)
								 		<p><input type="checkbox" name="education_level[]" id="{{$item}}" value="{{$item}}"><label class="labels" for="{{$item}}">{{$item}}</label></p>
									 @endforeach
				 				</div>
				 			</div>
				 		</div>
				 		<div class="widget">
				 			<h3 class="sb-title closed">@lang('candidate.gender')</h3>
				 			<div class="specialism_widget">
				 				<div class="simple-checkbox">
									<input type="radio" name="gender" class="gender" id="Male" value="Male"><label class="labels" for="Male">@lang('candidate.male')</label><br />
									<input type="radio" name="gender" class="gender" id="Female" value="Female"><label class="labels" for="Female">@lang('candidate.female')</label><br />
									<input type="radio" name="gender" class="gender" id="Both" value="Both"><label class="labels" for="Both">@lang('candidate.both')</label><br />
				 				</div>
				 			</div>
						 </div>
						 <div class="widget">
							<h3 class="sb-title closed">@lang('candidate.city')</h3>
							<div class="specialism_widget">
								<div class="simple-checkbox">
									@foreach ($city as $item)
										<p><input type="checkbox" name="city[]" id="{{$item->name}}" value="{{$item->id}}"><label class="labels" for="{{$item->name}}">{{__('city.'.$item->name)}}</label></p>
									@endforeach
								</div>
							</div>
						</div>
					 </aside>
				 	<div class="col-lg-9 column">
				 		<div class="padding-left">
					 		<div class="emply-resume-sec">
								 @foreach ($jobseekers as $jobseeker)
								 	<div class="emply-resume-list">
										<div class="emply-resume-thumb">
											<img src="{{$jobseeker->user_profile}}" alt="" width="100" width="86"/>
										</div>
										<div class="emply-resume-info">
											<h3><a href="/candidate/profile/{{$jobseeker->uuid}}" title="">{{$jobseeker->full_name}}</a></h3>
											<p><i class="la la-map-marker"></i>{{__('city.'.$jobseeker->sourceOfCity->name)}} / @lang('city.Cambodia')</p>
										</div>
										<div class="shortlists">
											{{-- <a href="#" title="">Shortlist <i class="la la-plus"></i></a> --}}
										</div>
								</div><!-- Emply List -->
								 @endforeach
							 </div>
							 <div class="pagination">
								<ul>
									{{ $jobseekers->links() }}
								</ul>
							</div><!-- Pagination -->
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
		$('#filterCandidate').on('click',CAREER24H.main.handleFilterCandidate);
	});
</script>
</html>

