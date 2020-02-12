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
					 			<h3>Job Alerts</h3>
						 		<table class="alrt-table">
						 			<thead>
						 				<tr>
						 					<td>Alert Details</td>
						 					<td class="text-right">Email Frequency</td>
						 				</tr>
						 			</thead>
						 			<tbody>
						 				<tr>
						 					<td>
						 						<div class="table-list-title">
						 							<h3><a href="#" title="">Test Title</a></h3>
						 							<span>Search Keywords: 2, 60, Crawley RH10 8XH, United Kingdom</span>
						 						</div>
						 					</td>
						 					<td>
						 						<ul class="action_job">
						 							<li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
						 						</ul>
						 						<span>Never</span>
						 					</td>
						 				</tr>
						 				<tr>
						 					<td>
						 						<div class="table-list-title">
						 							<h3><a href="#" title="">Test Title</a></h3>
						 							<span>Search Keywords: 2, 60, Crawley RH10 8XH, United Kingdom</span>
						 						</div>
						 					</td>
						 					<td>
						 						<ul class="action_job">
						 							<li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
						 						</ul>
						 						<span>Never</span>
						 					</td>
						 				</tr>
						 				<tr>
						 					<td>
						 						<div class="table-list-title">
						 							<h3><a href="#" title="">Test Title</a></h3>
						 							<span>Search Keywords: 2, 60, Crawley RH10 8XH, United Kingdom</span>
						 						</div>
						 					</td>
						 					<td>
						 						<ul class="action_job">
						 							<li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
						 						</ul>
						 						<span>Never</span>
						 					</td>
						 				</tr>
						 				<tr>
						 					<td>
						 						<div class="table-list-title">
						 							<h3><a href="#" title="">Test Title</a></h3>
						 							<span>Search Keywords: 2, 60, Crawley RH10 8XH, United Kingdom</span>
						 						</div>
						 					</td>
						 					<td>
						 						<ul class="action_job">
						 							<li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
						 						</ul>
						 						<span>Never</span>
						 					</td>
						 				</tr>
						 			</tbody>
						 		</table>
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
</html>

