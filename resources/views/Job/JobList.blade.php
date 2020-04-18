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
			<div data-velocity="-.1" style="background: url(http://placehold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header wform">
							<div class="job-search-sec">
								<div class="job-search">
									<h4>@lang('job.explore')</h4>
									<form>
										<div class="row">
											<div class="col-lg-7">
												<div class="job-field">
													<input type="text" placeholder="@lang('job.job_title')" name="job_title" id="job_title"/>
													<i class="la la-keyboard-o"></i>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="job-field">
													<select data-placeholder="@lang('job.city')" class="chosen-city">
														<option value=""></option>
														@foreach (config('global.city') as $item)
															<option value="{{$item}}">{{__('city.'.$item)}}</option>
														@endforeach
													</select>
													<i class="la la-map-marker"></i>
												</div>
											</div>
											<div class="col-lg-1">
												<button type="button" id="filterJob"><i class="la la-search"></i></button>
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
		<div class="block remove-top">
			<div class="container">
				 <div class="row no-gape">
				 	<aside class="col-lg-3 column">
				 		<div class="widget border">
				 			<h3 class="sb-title open">@lang('job.job_type')</h3>
				 			<div class="type_widget">
								<p class="ftchek"><input type="checkbox" name="job_type[]" id="Full Time" value="Full Time"><label class="labels" for="Full Time">@lang('job_type.Full Time')</label></p>
								<p class="ptchek"><input type="checkbox" name="job_type[]" id="Part Time" value="Part Time"><label class="labels" for="Part Time">@lang('job_type.Part Time')</label></p>
								<p class="itchek"><input type="checkbox" name="job_type[]" id="Internship" value="Internship"><label class="labels" for="Internship">@lang('job_type.Internship')</label></p>
								<p class="flchek"><input type="checkbox" name="job_type[]" id="Freelance" value="Freelance"><label class="labels" for="Freelance">@lang('job_type.Freelance')</label></p>
								<p class="tpchek"><input type="checkbox" name="job_type[]" id="Temporary" value="Temporary"><label class="labels" for="Temporary">@lang('job_type.Temporary')</label></p>
								<p class="vlchek"><input type="checkbox" name="job_type[]" id="Volunteer" value="Volunteer"><label class="labels" for="Volunteer">@lang('job_type.Volunteer')</label></p>	
				 			</div>
				 		</div>
				 		<div class="widget border">
				 			<h3 class="sb-title open">@lang('job.category')</h3>
				 			<div class="specialism_widget">
				 				<div class="simple-checkbox scrollbar">
									@foreach (config('global.categories') as $item)
										<p class="categories-label"><input type="checkbox" name="categories[]" class="categories" id="{{$item}}" value="{{$item}}"><label  class="labels" for="{{$item}}">{{$item}}</label></p>
									@endforeach
				 				</div>
				 			</div>
				 		</div>
				 		<div class="widget border">
				 			<h3 class="sb-title closed">@lang('job.career_level')</h3>
				 			<div class="specialism_widget">
				 				<div class="simple-checkbox">
									@foreach (config('global.career_level') as $item)
										<p><input type="checkbox" name="career_level[]" id="{{$item}}" value="{{$item}}"><label class="labels" for="{{$item}}">{{$item}}</label></p>
									@endforeach
				 				</div>
				 			</div>
				 		</div>
				 		<div class="widget border">
				 			<h3 class="sb-title closed">@lang('job.gender')</h3>
				 			<div class="specialism_widget">
				 				<div class="simple-checkbox">
									<input type="radio" name="gender" class="gender" id="Male" value="Male"><label class="labels" for="Male">Male</label><br />
									<input type="radio" name="gender" class="gender" id="Female" value="Female"><label class="labels" for="Female">Female</label><br />
									<input type="radio" name="gender" class="gender" id="Both" value="Both"><label class="labels" for="Both">Both</label><br />
				 				</div>
				 			</div>
				 		</div>
				 		<div class="widget border">
				 			<h3 class="sb-title closed">@lang('job.qualification')</h3>
				 			<div class="specialism_widget">
				 				<div class="simple-checkbox">
									 @foreach (config('global.education_level') as $item)
								 		<p><input type="checkbox" name="qualification[]" id="{{$item}}" value="{{$item}}"><label class="labels" for="{{$item}}">{{$item}}</label></p>
									 @endforeach
				 				</div>
				 			</div>
				 		</div>
				 	</aside>
				 	<div class="col-lg-9 column">
				 		<div class="modrn-joblist np">
					 		<div class="filterbar">
					 			<div class="sortby-sec">
					 				{{-- <span>Sort by</span>
					 				<select data-placeholder="Most Recent" class="chosen">
										<option>Most Recent</option>
										<option>Most Recent</option>
										<option>Most Recent</option>
										<option>Most Recent</option>
									</select> --}}
					 			</div>
					 			<h5>{{count($jobs)}} @lang('job.job_vacancy')</h5>
					 		</div>
						 </div><!-- MOdern Job LIst -->
						 <div class="job-list-modern">
						 	<div class="job-listings-sec no-border">
								@foreach ($jobs as $job)
								<div class="job-listing wtabs">
									<div class="job-title-sec">
										<div class="c-logo"> <img src="{{ $job->companyLogo() }}" alt=""  width="100" height="90"/> </div>
										<h3><a href="/job/{{ $job->uuid }}" title="">{{ $job->job_title}}</a></h3>
										<span>{{$job->companyName()}}</span>
										<div class="job-lctn"><i class="la la-map-marker"></i>{{__('city.'.$job->city)}}, @lang('city.Cambodia')</div>
									</div>
									<div class="job-style-bx">
										<span>{{$job->offer_salary}}</span>
										<span class="job-is {{ $job->getJobTypeCSSClass() }}">{{ __('job_type.'.$job->working_term) }}</span>
										<i>{{ $job->created_at->diffForHumans() }}</i>
							
									</div>
								</div>
								@endforeach
							</div>
							<div class="pagination">
								<ul>
									{{ $jobs->links() }}
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
			$('#filterJob').on('click',CAREER24H.main.handleFilterJob);
		});
	</script>
</html>

