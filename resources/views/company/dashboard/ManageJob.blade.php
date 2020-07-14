<!DOCTYPE html>
<html>
<head>
	@include('partials.header')
</head>
<body>

<div class="theme-layout" id="scrollup">
	
	@include('partials.navbar')
	@include('partials.company_top_content')

	<section>
		<div class="block no-padding">
			<div class="container">
				 <div class="row no-gape">
					@include('partials.company_sidebar')
				 	<div class="col-lg-9 column">
				 		<div class="padding-left">
					 		<div class="manage-jobs-sec">
					 			<h3>@lang('manage_job.manage_job')</h3>
					 			<div class="extra-job-info">
								 <span><i class="la la-clock-o"></i><strong>{{ count($jobs) }}</strong> @lang('manage_job.job_post')</span>
						 			<span><i class="la la-file-text"></i><strong class="application"></strong> @lang('manage_job.application')</span>
								 <span><i class="la la-users"></i><strong>{{ count($jobs->where('is_active',1)) }}</strong> @lang('manage_job.active_job')</span>
						 		</div>
						 		<table>
						 			<thead>
						 				<tr>
						 					<td>@lang('manage_job.title')</td>
						 					<td>@lang('manage_job.application')</td>
						 					<td>@lang('manage_job.create_and_deadline')</td>
						 					<td>@lang('manage_job.status')</td>
						 					<td>@lang('manage_job.action')</td>
						 				</tr>
						 			</thead>
						 			<tbody>
										 @foreach ($jobs as $job)
										 <tr class="job-list">
											<td>
												<div class="table-list-title">
													<h3><a href="/company/preview-job/{{ $job->uuid }}">{{ $job->job_title }}</a></h3>
													<span><i class="la la-map-marker"></i>{{ __('city.'.$job->sourceOfCity->name) }}, @lang('city.Cambodia')</span>
												</div>
											</td>
											<td>
												<span class="applied-field" data-no="{{ count($job->applicants) }}">{{ count($job->applicants) }} @lang('manage_job.applied')</span>
											</td>
											<td>
												<span>{{  date("M d , Y", strtotime($job->created_at)) }}</span><br />
												<span>{{  date("M d , Y", strtotime($job->deadline))}}</span>
											</td>
											<td>
											<span class="status {{ $job->is_active ? 'active' : '' }}">{{ $job->is_active ? __('manage_job.active') : __('manage_job.inactive')  }}</span>
											</td>
											<td>
												<ul class="action_job">
													<li><span>View Job</span><a href="/company/preview-job/{{ $job->uuid }}" title=""><i class="la la-eye"></i></a></li>
													<li><span>Edit</span><a href="/company/edit-job/{{ $job->uuid }}" title=""><i class="la la-pencil"></i></a></li>
													<li ><span>Delete</span><a title="" class="jobDelete" data-id="{{ $job->uuid }}"><i class="la la-trash-o" data-id="{{ $job->uuid }}"></i></a></li>
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
		$('.jobDelete').on('click',CAREER24H.company.deleteJob);
		CAREER24H.company.loadTotalApplicants();
	
	});
	
</script>
</html>

