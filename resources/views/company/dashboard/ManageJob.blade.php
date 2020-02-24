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
					 			<h3>Manage Jobs</h3>
					 			<div class="extra-job-info">
								 <span><i class="la la-clock-o"></i><strong>{{ count($jobs) }}</strong> Job Posted</span>
						 			<span><i class="la la-file-text"></i><strong>20</strong> Application</span>
								 <span><i class="la la-users"></i><strong>{{ count($jobs->where('is_active',1)) }}</strong> Active Jobs</span>
						 		</div>
						 		<table>
						 			<thead>
						 				<tr>
						 					<td>Title</td>
						 					<td>Applications</td>
						 					<td>Created & Deadline</td>
						 					<td>Status</td>
						 					<td>Action</td>
						 				</tr>
						 			</thead>
						 			<tbody>
										 @foreach ($jobs as $job)
										 <tr class="job-list">
											<td>
												<div class="table-list-title">
													<h3><a href="/company/preview-job/{{ $job->uuid }}">{{ $job->job_title }}</a></h3>
													<span><i class="la la-map-marker"></i>{{ $job->city }}, Cambodia</span>
												</div>
											</td>
											<td>
												<span class="applied-field">3+ Applied</span>
											</td>
											<td>
												<span>{{  date("M d , Y", strtotime($job->created_at)) }}</span><br />
												<span>{{  date("M d , Y", strtotime($job->deadline))}}</span>
											</td>
											<td>
											<span class="status {{ $job->is_active ? 'active' : '' }}">{{ $job->is_active ? 'Active' : 'Inactive'  }}</span>
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
	});
</script>
</html>

