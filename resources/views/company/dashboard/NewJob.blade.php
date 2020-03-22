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
					 		<div class="profile-title">
					 			<h3>Post a New Job</h3>
					 		</div>
					 		<div class="profile-form-edit">
					 			<form>
									 @csrf
					 				<div class="row">
					 					<div class="col-lg-12">
					 						<span class="pf-title">Job Title</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="Designer" name="job_title" id="job_title" required/>
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Job Description</span>
					 						<div class="pf-field">
												 <textarea id="description"></textarea>
												 {{-- <div id="description"></div> --}}
					 						</div>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">Job Type</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Job Type" class="chosen" name="job_type" id="job_type">
													<option value=""></option>
													@foreach ($job_types as $item)
												 		<option value="{{ $item }}">{{ $item }}</option>
													@endforeach
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">Categories</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Categories" class="chosen" name="category" id="category">
													<option value=""></option>
													@foreach ($categories as $item)
												 		<option value="{{ $item }}">{{ $item }}</option>
													@endforeach
												</select>
					 						</div>
										 </div>
										 <div class="col-lg-4">
											<span class="pf-title">Qualification</span>
											<div class="pf-field">
												<select data-placeholder="Please Select Options" class="chosen" name="qualification" id="qualification">
												   <option value=""></option>
												   @foreach ($qualification as $item)
															<option value="{{ $item }}">{{ $item }}</option>
												   @endforeach
											   </select>
											</div>
										</div>
										<div class="col-lg-4">
											<span class="pf-title">Career Level</span>
											<div class="pf-field">
												<select data-placeholder="Please Select Career Level" class="chosen" name="career_level" id="career_level">
												   <option value=""></option>
												   @foreach ($career_level as $item)
														<option value="{{ $item }}">{{ $item }}</option>
												   @endforeach
											   </select>
											</div>
										</div>
					 					<div class="col-lg-4">
											<span class="pf-title">Years of Experience</span>
											<div class="pf-field">
												<input type="number" name="years_of_experience" id="years_of_experience"/>
											</div>
					 					</div>
					 					<div class="col-lg-4">
											<span class="pf-title">Numbers of position</span>
											<div class="pf-field">
												<input type="number" name="pax" id="pax"/>
											</div>
					 					</div>
					 					<div class="col-lg-4">
											<span class="pf-title">Offer Salary</span>
											<div class="pf-field">
												<input type="text" name="offer_salary" id="offer_salary"/>
											</div>
					 					</div>
					 					<div class="col-lg-2">
					 						<span class="pf-title">Negotiable</span>
					 						<div>
												<input type="checkbox" id="negotiable" checked data-toggle="toggle" data-size="normal" data-on="Yeah" data-off="No" data-onstyle="primary" data-offstyle="danger">
					 						</div>
										 </div>
										 <div class="col-lg-2">
											<span class="pf-title">Specific gender</span>
											<div>
											   <input type="checkbox" id="specificGender" data-toggle="toggle" data-size="normal" data-on="Yeah" data-off="No" data-onstyle="primary" data-offstyle="danger">
											</div>
										</div>
										<div class="col-lg-4 gender" style="display:none">
											<span class="pf-title">Gender</span>
											<div class="pf-field">
												<select data-placeholder="Please Select Gender" class="chosen" id="gender">
												   <option value="MALE">MALE</option>
												   <option value="FEMALE">FEMALE</option>
											   </select>
											</div>
										</div> 
					 					<div class="col-lg-6">
					 						<span class="pf-title">Application Deadline Date</span>
					 						<div class="pf-field">
					 							<input type="text" class="datepicker" name="deadline" id="deadline"/>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">City</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Options" class="chosen" name="city" id="city">
													<option value=""></option>
													@foreach ($city as $item)
														<option value="{{$item}}">{{$item}}</option>
													@endforeach
												</select>
					 						</div>
										 </div> 
										<div class="col-lg-3">
											<span class="pf-title">Workday</span>
												<div class="pf-field">
												<select data-placeholder="From" class="chosen" name="work_day_from" id="work_day_from">
													<option value=""></option>
													<option value="Mon">Monday</option>
													<option value="Tue">Tuesday</option>
													<option value="Wed">Wednesday</option>
													<option value="Thu">Thursday</option>
													<option value="Fri">Friday</option>
													<option value="Sat">Saturday</option>
													<option value="Sun">Sunday</option>
												</select>
												
												</div>	
												
										</div>
										<div class="col-lg-3">
											<span class="pf-title" style="text-indent: 100%;white-space: nowrap;overflow: hidden;">Workday </span>
												<div class="pf-field">
												<select data-placeholder="To" class="chosen" name="work_day_to" id="work_day_to">
													<option value=""></option>
													<option value="Mon">Monday</option>
													<option value="Tue">Tuesday</option>
													<option value="Wed">Wednesday</option>
													<option value="Thu">Thursday</option>
													<option value="Fri">Friday</option>
													<option value="Sat">Saturday</option>
													<option value="Sun">Sunday</option>
												</select>
												</div>	
											
										</div>
										<div class="col-lg-3">
											<span class="pf-title">Work Time</span>
											<div class="pf-field">
												<div class="pf-field">
													<input type="text" placeholder="From" name="work_time_from" id="work_time_from"/>
												</div>
											</div>
										</div>
										<div class="col-lg-3">
											<span class="pf-title" style="text-indent: 100%;white-space: nowrap;overflow: hidden;">Work Time</span>
											<div class="pf-field">
												<div class="pf-field">
													<input type="text" placeholder="To" name="work_time_to" id="work_time_to"/>
												</div>
											</div>
										</div>
					 				</div>
					 			</form>
					 		</div>
					 		<div class="contact-edit">
					 			<form>
					 				<div class="row">
										<div class="col-lg-12">
											<span class="pf-title">Responsibility</span>
											<div class="pf-field">
												<textarea id="responsibility" name="responsibility"></textarea>
											</div>
										</div>
										<div class="col-lg-12">
											<span class="pf-title">Required Skill</span>
											<div class="pf-field">
												<textarea id="required_skill" name="required_skill"></textarea>
											</div>
										</div>
										<div class="col-lg-12">
											<span class="pf-title">Benefits</span>
											<div class="pf-field">
												<textarea id="benefit" name="benefit"></textarea>
											</div>
										</div>
					 					<div class="col-lg-12">
					 						<button id="createJob" type="button">Create</button>
					 					</div>
					 				</div>
					 			</form>
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

<!-- Include Date Range Picker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css" integrity="sha256-jO7D3fIsAq+jB8Xt3NI5vBf3k4tvtHwzp8ISLQG4UWU=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha256-bqVeqGdJ7h/lYPq6xrPv/YGzMEb6dNxlfiTUHSgRCp8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js" integrity="sha256-AdQN98MVZs44Eq2yTwtoKufhnU+uZ7v2kXnD5vqzZVo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" integrity="sha256-yMjaV542P+q1RnH6XByCPDfUFhmOafWbeLPmqKh11zo=" crossorigin="anonymous" />
<script>
	jQuery(document).ready(function($){

			CAREER24H.company.loadDefaultDataForWorkDayAndWorkTime();

			$('.datepicker').datepicker({
				format: 'dd-mm-yyyy',
				startDate: 'today'
			});
			$('#work_time_from').datetimepicker({
				icons: {
        			up: 'fa fa-angle-up',
        			down: 'fa fa-angle-down',
      			},	
				format: 'LT',
				locale: 'kh'
			});
			$('#work_time_to').datetimepicker({
				icons: {
        			up: 'fa fa-angle-up',
        			down: 'fa fa-angle-down',
      			},	
				format: 'LT',
				locale: 'kh'
            });
		
		$('#specificGender').on('change',CAREER24H.company.toggleSpecificGender);
		$('#createJob').on('click',CAREER24H.company.createJob);
	});
</script>


</body>
</html>

