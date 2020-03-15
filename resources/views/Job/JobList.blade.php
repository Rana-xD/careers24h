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
									<h4>Explore Thousand Of Jobs With Just Simple Search...</h4>
									<form>
										<div class="row">
											<div class="col-lg-7">
												<div class="job-field">
													<input type="text" placeholder="Job title" name="job_title" id="job_title"/>
													<i class="la la-keyboard-o"></i>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="job-field">
													<select data-placeholder="City, province" class="chosen-city">
														<option value=""></option>
														@foreach (config('global.city') as $item)
															<option value="{{$item}}">{{$item}}</option>
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
				 			<h3 class="sb-title open">Job Type</h3>
				 			<div class="type_widget">
								@foreach (config('global.job_type') as $item)
									<p class="flchek"><input type="checkbox" name="job_type[]" id="{{$item}}" value="{{$item}}"><label class="labels" for="{{$item}}">{{$item}}</label></p>
								@endforeach
				 			</div>
				 		</div>
				 		<div class="widget border">
				 			<h3 class="sb-title open">Specialism</h3>
				 			<div class="specialism_widget">
				 				<div class="simple-checkbox scrollbar">
									@foreach (config('global.categories') as $item)
										<p class="categories-label"><input type="checkbox" name="categories[]" class="categories" id="{{$item}}" value="{{$item}}"><label  class="labels" for="{{$item}}">{{$item}}</label></p>
									@endforeach
				 				</div>
				 			</div>
				 		</div>
				 		<div class="widget border">
				 			<h3 class="sb-title closed">Career Level</h3>
				 			<div class="specialism_widget">
				 				<div class="simple-checkbox">
									@foreach (config('global.career_level') as $item)
										<p><input type="checkbox" name="career_level[]" id="{{$item}}" value="{{$item}}"><label class="labels" for="{{$item}}">{{$item}}</label></p>
									@endforeach
				 				</div>
				 			</div>
				 		</div>
				 		<div class="widget border">
				 			<h3 class="sb-title closed">Gender</h3>
				 			<div class="specialism_widget">
				 				<div class="simple-checkbox">
									<input type="radio" name="gender" class="gender" id="Male" value="Male"><label class="labels" for="Male">Male</label><br />
									<input type="radio" name="gender" class="gender" id="Female" value="Female"><label class="labels" for="Female">Female</label><br />
									<input type="radio" name="gender" class="gender" id="Both" value="Both"><label class="labels" for="Both">Both</label><br />
				 				</div>
				 			</div>
				 		</div>
				 		<div class="widget border">
				 			<h3 class="sb-title closed">Qualification</h3>
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
					 			<h5>{{count($jobs)}} Jobs & Vacancies</h5>
					 		</div>
						 </div><!-- MOdern Job LIst -->
						 <div class="job-list-modern">
						 	<div class="job-listings-sec no-border">
								@foreach ($jobs as $job)
								<div class="job-listing wtabs">
									<div class="job-title-sec">
										<div class="c-logo"> <img src="{{ $job->companyLogo() }}" alt=""  width="98" height="55"/> </div>
										<h3><a href="/job/{{ $job->uuid }}" title="">{{ $job->job_title}}</a></h3>
										<span>{{$job->companyName()}}</span>
										<div class="job-lctn"><i class="la la-map-marker"></i>{{$job->city}}, Phnom Penh</div>
									</div>
									<div class="job-style-bx">
										<span>{{$job->offer_salary}}</span>
										<span class="job-is {{ $job->getJobTypeCSSClass() }}">{{ $job->working_term }}</span>
										<i>{{ $job->created_at->diffForHumans() }}</i>
							
									</div>
								</div>
								@endforeach
							</div>
							<div class="pagination">
								{{ $jobs->links() }}
							</div><!-- Pagination -->
						 </div>
					 </div>
				 </div>
			</div>
		</div>
	</section>

	@include('partials.footer')

</div>


filterJob

@include('partials.footer_script')

</body>
	<script>
		jQuery(document).ready(function($){
			$('#filterJob').on('click',CAREER24H.main.handleFillerJob);
		});
	</script>
</html>

