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
						<div class="inner-header">
							<div class="container">
								<div class="row">
									<div class="col-lg-6">
									</div>
									<div class="col-lg-6">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="overlape">
		<div class="block remove-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="cand-single-user">
							<div class="share-bar circle">
								@if ($social_media->linkedin)
									<a class="share-linkedin social-media" data-id="{{$social_media->linkedin}}"><i class="la la-linkedin" data-id="{{$social_media->linkedin}}"></i></a>
						   		@endif
						   		@if ($social_media->facebook)
							   		<a class="share-fb social-media" data-id="{{$social_media->facebook}}"><i class="fa fa-facebook" data-id="{{$social_media->facebook}}"></i></a>
						   		@endif
						   		@if ($social_media->twitter)
							  		<a class="share-twitter social-media" data-id="{{ $social_media->twitter }}"><i class="fa fa-twitter" data-id="{{ $social_media->twitter }}"></i></a>
						   		@endif
						   		@if ($social_media->instagram)
							  		<a class="share-instagram social-media" data-id="{{ $social_media->instagram }}"><i class="fa fa-instagram" data-id="{{ $social_media->instagram }}"></i></a>
						   		@endif	 
				 			</div>
				 			<div class="can-detail-s">
								 <div class="cst"><img src="{{ $candidate->user_profile }}" alt=""/></div>
								 <h3>{{ $candidate->full_name  }}</h3>
								 <p>{{ $candidate->age }} years old, {{ $candidate->gender }}</p>
								 <p><i class="la la-phone"></i>{{ $candidate->phone_number  }}</p>
                     			<p><i class="la la-envelope"></i>{{ $candidate->email  }}</p>
                     			<p><i class="la la-map-marker"></i>{{ __('city.'.$candidate->city) }} / @lang('city.Cambodia')</p>
				 			</div>
				 			<div class="download-cv">
				 				<a href="#" title="">Download CV <i class="la la-download"></i></a>
				 			</div>
				 		</div>
				 		<ul class="cand-extralink">
				 			<li><a href="#education" title="">@lang('candidate.education')</a></li>
				 			<li><a href="#experience" title="">@lang('candidate.work_experience')</a></li>
				 			<li><a href="#skills" title="">@lang('candidate.professional_skills')</a></li>
				 			<li><a href="#awards" title="">@lang('candidate.award')</a></li>
				 		</ul>
				 		<div class="cand-details-sec">
				 			<div class="row">
				 				<div class="col-lg-9 column">
				 					<div class="cand-details">
				 						{{-- <h2 id="about">@lang('candidate.cover_letter')</h2>
				 						{!! $candidate->cover_letter  !!} --}}
				 						<div class="edu-history-sec" id="education">
				 							<h2>@lang('candidate.education')</h2>
				 							@if (!empty($candidate->education))
                    							@foreach ($candidate->education as $index => $item)
                    								<div class="edu-history">
                       									<i class="la la-graduation-cap"></i>
                       										<div class="edu-hisinfo">
                           										<h3 class="title">{{  $item['title'] }}</h3>
                           										<i>{{ DateTime::createFromFormat('m-d-Y', $item['from'])->format('M-Y') }} - {{ DateTime::createFromFormat('m-d-Y', $item['to'])->format('M-Y') }}</i>
                           										<span class="school_name">{{ $item['school'] }}</span>
                           										<p class="description">{{ $item['description'] }}</p>
                       										</div>
                   									</div>
                    							@endforeach
                    						@endif
				 						</div>
				 						<div class="edu-history-sec" id="experience">
				 							<h2>@lang('candidate.work_experience')</h2>
											@if (!empty($candidate->work_experience))
											 	@foreach ($candidate->work_experience as $index => $item)
											 		<div class="edu-history style2">
													<i></i>
														<div class="edu-hisinfo">
															<h3 class="title">{{ $item['title'] }} <span class="company">{{ $item['company'] }}</span></h3>
															<i>{{ DateTime::createFromFormat('m-d-Y', $item['from'])->format('M-Y') }} - {{  $item['to'] === 'Now' ? 'Now' : DateTime::createFromFormat('m-d-Y', $item['to'])->format('M-Y') }}</i>
													   		<p class="description">{{ $item['description'] }}</p>
														</div>
													</div>
											 @endforeach
											@endif
				 						</div>
				 						<div class="progress-sec" id="skills">
											 <h2>@lang('candidate.professional_skills')</h2>
											 @if (!empty($candidate->skillset))
											 @foreach ($candidate->skillset as $index => $item)
											 <div class="progress-sec with-edit">
												 <span class="skill">{{ $item['skill'] }}</span>
												<div class="progressbar"> <div class="progress" style="width: {{ $item['percentage'] }}%;"><span>{{ $item['percentage'] }}%</span></div> </div>
												</div>
											 @endforeach
											 @endif
				 						</div>
				 						<div class="edu-history-sec" id="awards">
				 							<h2>@lang('candidate.award')</h2>
											 @if (!empty($candidate->achievement))
											 @foreach ($candidate->achievement as $index => $item)
											 <div class="edu-history style2">
												<i></i>
												<div class="edu-hisinfo">
													<h3 class="title">{{ $item['title'] }}</h3>
													<i>{{ DateTime::createFromFormat('m-d-Y', $item['from'])->format('M-Y') }} - {{ DateTime::createFromFormat('m-d-Y', $item['to'])->format('M-Y') }}</i>
													<p class="description">{{ $item['description'] }}</p>
												</div>
											</div>
											 @endforeach
											 @endif
				 						</div>
				 					</div>
				 				</div>
				 				<div class="col-lg-3 column">
						 			<div class="job-overview">
							 			<h3>@lang('candidate.candidate_overview')</h3>
							 			<ul>
							 				<li><i class="la la-thumb-tack"></i><h3>@lang('candidate.career_level')</h3><span>{{ $candidate->career_level }}</span></li>
										 	<li><i class="la la-puzzle-piece"></i><h3>@lang('candidate.industry')</h3><span>{{ $candidate->industry }}</span></li>
							 				<li><i class="la la-shield"></i><h3>@lang('candidate.experience')</h3><span>{{ $candidate->experience }} Years</span></li>
											 <li><i class="la la-line-chart "></i><h3>@lang('candidate.education_level')</h3><span>{{ $candidate->education_level }}</span></li>
											 <li><i class="la la-eye"></i><h3>@lang('candidate.view')</h3><span>{{$candidate->view_count}}</span></li>
							 			</ul>
							 		</div><!-- Job Overview -->
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
		$('.social-media').on('click',CAREER24H.main.handleOpenSocailMediaLinkInNewTab);
	});
</script>
</html>

