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
		<div class="block no-padding">
			<div class="container">
				 <div class="row no-gape">
					@include('partials.jobseeker_sidebar')
				 	<div class="col-lg-9 column">
				 		<div class="padding-left">
					 		<div class="manage-jobs-sec">
					 			<h3>@lang('applied_job.applied_job')</h3>
						 		<table>
						 			<thead>
						 				<tr>
						 					<td>@lang('applied_job.applied_job')</td>
						 					<td>@lang('applied_job.position')</td>
											 <td>@lang('applied_job.status')</td>
											 <td>@lang('applied_job.interview_date')</td>
											 <td>@lang('applied_job.type')</td>
						 					<td></td>
						 				</tr>
						 			</thead>
						 			<tbody>
										@foreach ($applyJobs as $job)
											<tr>
												<td>
													<div class="table-list-title">
														<i>{{$job->companyName()}}</i><br />
														<span><i class="la la-map-marker"></i>{{ __('city.'.$job->city) }}, @lang('city.Cambodia')</span>
													</div>
												</td>
												<td>
													<div class="table-list-title">
														<h3><a href="/job/{{$job->uuid}}" title="">{{ $job->job_title }}</a></h3>
													</div>
												</td>
												<td>
													<div class="table-list-title">
														<h3 style="color: {{ App\Models\JobUser::find($job->pivot->id)->getCSS() }}">{{ __('applied_job.'.$job->pivot->status) }}</h3>
													</div>
												</td>
												<td>
													<div class="table-list-title">
														@if (!empty($job->pivot->interview_date))
															<h3>{{ $job->pivot->interview_date }}</h3>
														@endif
													</div>
												</td>   
												<td>
													<div class="table-list-title">
														@if (!empty($job->pivot->interview_date))
															<h3 style="font-weight: bold; color: #778beb">{{ $job->pivot->is_online ? __('applied_job.online') : __('applied_job.offline') }}</h3>
														@endif
													</div>
										   		</td>    
												<td>
													<ul class="action_job">
														<li><span>Delete</span><a data-id="{{ $job->pivot->id }}" class="deleteApplyJob"><i class="la la-trash-o"></i></a></li>
													</ul>
												</td>
											</tr>
										@endforeach
						 			</tbody>
						 		</table>
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
		$('.deleteApplyJob').on('click',CAREER24H.jobseeker.handleDeleteApplyJob)
	});
</script>
</html>

