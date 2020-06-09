<!DOCTYPE html>
<html>
<head>
	@include('partials.header')
	<style>
		.profile-form-edit > form{
			margin-bottom: 40px;
		} 
	</style>
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
					 			<h3>@lang('new_job.edit_job')</h3>
					 		</div>
					 		<div class="profile-form-edit">
					 			<form action="" method="POST" id="updatejob">
                                     @csrf
                                        <input type="hidden" name="jobID" id="jobID" value="{{ $job->id }}">
					 				<div class="row">
					 					<div class="col-lg-10">
					 						<span class="pf-title">@lang('new_job.job_title') <span class="required">*</span></span>
					 						<div class="pf-field">
                                             <input type="text" placeholder="Designer" name="job_title" id="job_title" value="{{ $job->job_title }}" required/>
					 						</div>
                                         </div>
                                         <div class="col-lg-2">
											<span class="pf-title">Active</span>
											<div>
											   <input type="checkbox" checked id="isActive" data-toggle="toggle" data-size="normal" data-on="Yeah" data-off="No" data-onstyle="primary" data-offstyle="danger">
											</div>
										</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">@lang('new_job.job_description')</span>
					 						<div class="pf-field">
					 							<textarea id="description"></textarea>
					 						</div>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">@lang('new_job.job_type') <span class="required">*</span></span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Job Type" class="chosen" name="job_type" id="job_type" required>
													<option value=""></option>
													@foreach ($job_types as $item)
												 		<option value="{{ $item }}">{{ __('job_type.'.$item) }}</option>
													@endforeach
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">@lang('new_job.categories') <span class="required">*</span></span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Categories" class="chosen" name="category" id="category" required>
													<option value=""></option>
													@foreach ($categories as $item)
												 		<option value="{{ $item->id }}">{{ $item->name }}</option>
													@endforeach
												</select>
					 						</div>
										 </div>
										 <div class="col-lg-4">
											<span class="pf-title">@lang('new_job.qualification') <span class="required">*</span></span>
											<div class="pf-field">
												<select data-placeholder="Please Select Options" class="chosen" name="qualification" id="qualification" required>
												   <option value=""></option>
												   @foreach ($qualification as $item)
															<option value="{{ $item }}">{{ $item }}</option>
												   @endforeach
											   </select>
											</div>
										</div>
										<div class="col-lg-4">
											<span class="pf-title">@lang('new_job.career_level') <span class="required">*</span></span>
											<div class="pf-field">
												<select data-placeholder="Please Select Career Level" class="chosen" name="career_level" id="career_level" required>
												   <option value=""></option>
												   @foreach ($career_level as $item)
														<option value="{{ $item }}">{{ $item }}</option>
												   @endforeach
											   </select>
											</div>
										</div>
					 					<div class="col-lg-4">
											<span class="pf-title">@lang('new_job.years_of_experience') <span class="required">*</span></span>
											<div class="pf-field">
												<select data-placeholder="@lang('my_profile.please_select_option')" class="chosen" name="years_of_experience" id="years_of_experience" required>
													<option value=""></option>
													@foreach (config('global.years_of_experience') as $item)
															 <option value="{{ $item }}">{{ $item }}</option>
													 @endforeach
											 	</select>
											</div>
					 					</div>
					 					<div class="col-lg-4">
											<span class="pf-title">@lang('new_job.pax') <span class="required">*</span></span>
											<div class="pf-field">
												<input type="number" name="pax" id="pax" value="{{ $job->pax }}"/>
											</div>
					 					</div>
					 					<div class="col-lg-4">
											<span class="pf-title">@lang('new_job.offer_salary') <span class="required">*</span></span>
											<div class="pf-field">
												<input type="text" name="offer_salary" id="offer_salary" value="{{ $job->offer_salary }}"/>
											</div>
					 					</div>
					 					<div class="col-lg-2">
					 						<span class="pf-title">@lang('new_job.negotiable')</span>
					 						<div>
												<input type="checkbox" id="negotiable" checked data-toggle="toggle" data-size="normal" data-on="Yeah" data-off="No" data-onstyle="primary" data-offstyle="danger">
					 						</div>
										 </div>
										 <div class="col-lg-2">
											<span class="pf-title">@lang('new_job.specific_gender')</span>
											<div>
											   <input type="checkbox" id="specificGender" data-toggle="toggle" data-size="normal" data-on="Yeah" data-off="No" data-onstyle="primary" data-offstyle="danger">
											</div>
										</div>
										<div class="col-lg-4 gender" style="display:none">
											<span class="pf-title">@lang('new_job.gender')</span>
											<div class="pf-field">
												<select data-placeholder="Please Select Gender" class="chosen" id="gender">
												   <option value="MALE">@lang('new_job.male')</option>
												   <option value="FEMALE">@lang('new_job.female')</option>
											   </select>
											</div>
										</div> 
					 					<div class="col-lg-6">
					 						<span class="pf-title">@lang('new_job.deadline') <span class="required">*</span></span>
					 						<div class="pf-field">
                                             <input type="text" placeholder="01-11-2020" class="form-control datepicker" name="deadline" id="deadline" value="{{ $job->deadline }}" required/>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">@lang('new_job.city') <span class="required">*</span></span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Options" class="chosen" name="city" id="city" required>
													<option value=""></option>
													@foreach ($city as $item)
												 		<option value="{{ $item }}">{{__('city.'.$item)}}</option>
													@endforeach
												</select>
					 						</div>
										 </div> 
										 <div class="col-lg-3">
											<span class="pf-title">@lang('new_job.work_day') <span class="required">*</span></span>
												<div class="pf-field">
												<select data-placeholder="From" class="chosen" name="work_day_from" id="work_day_from" required>
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
												<select data-placeholder="To" class="chosen" name="work_day_to" id="work_day_to" required>
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
											<span class="pf-title">@lang('new_job.work_time') <span class="required">*</span></span>
											<div class="pf-field">
												<div class="pf-field">
													<input type="text" placeholder="From" name="work_time_from" id="work_time_from" required/>
												</div>
											</div>
										</div>
										<div class="col-lg-3">
											<span class="pf-title" style="text-indent: 100%;white-space: nowrap;overflow: hidden;">Work Time</span>
											<div class="pf-field">
												<div class="pf-field">
													<input type="text" placeholder="To" name="work_time_to" id="work_time_to" required/>
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<span class="pf-title">@lang('new_job.responsibility')</span>
											<div class="pf-field">
												<textarea id="responsibility" name="responsibility"></textarea>
											</div>
										</div>
										<div class="col-lg-12">
											<span class="pf-title">@lang('new_job.required_skill')</span>
											<div class="pf-field">
												<textarea id="required_skill" name="required_skill"></textarea>
											</div>
										</div>
										<div class="col-lg-12">
											<span class="pf-title">@lang('new_job.benefit')</span>
											<div class="pf-field">
												<textarea id="benefit" name="benefit"></textarea>
											</div>
										</div>
					 					<div class="col-lg-12">
					 						<button type="submit">@lang('new_job.update')</button>
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
        let jobType = `<?php echo $job->working_term ?>`;
        let category = `<?php echo $job->category ?>`;
        let qualification = `<?php echo $job->qualification ?>`;
        let careerLevel = `<?php echo $job->career_level ?>`;
        let city = `<?php echo $job->city ?>`;
        let description = `<?php echo $job->description ?>`;
        let responsibility = `<?php echo $job->responsibility ?>`;
        let requiredSkill = `<?php echo $job->required_skill ?>`;
        let benefit = `<?php echo $job->benefit ?>`;
        let negotiable = '<?php echo $job->is_negotiable ?>';
        let specificGener = '<?php echo $job->is_specific_gender ?>';
        let gender = `<?php echo $job->gender ?>`;
		let active = '<?php echo $job->is_active ?>';
		let workDay = JSON.parse('<?php echo $job->work_day ?>');
		let workTime = JSON.parse('<?php echo $job->work_time ?>');
		let yearOfExperience = '<?php echo $job->years_of_experience ?>';

		
        CAREER24H.company.loadDataForEditForm(jobType,category,qualification,careerLevel,city,description,responsibility,requiredSkill,benefit,negotiable,specificGener,gender,active,workDay,workTime,yearOfExperience);
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
        
		$('#updatejob').on('submit',CAREER24H.company.updateJob);
		var form = $('#updatejob');
		var navbar = $('header');
		form.find(':input').on('invalid', function (event) {
   			 var input = $(this)

    		// the first invalid element in the form
    		var first = form.find(':invalid').first()

    		// only handle if this is the first invalid input
    		if (input[0] === first[0]) {
        		// height of the nav bar plus some padding
        		var navbarHeight = navbar.height() + 50

        		// the position to scroll to (accounting for the navbar)
        		var elementOffset = input.offset().top - navbarHeight

        		// the current scroll position (accounting for the navbar)
        		var pageOffset = window.pageYOffset - navbarHeight

        		// don't scroll if the element is already in view
        		if (elementOffset > pageOffset && elementOffset < pageOffset + window.innerHeight) {
            		return true
        		}

        		// note: avoid using animate, as it prevents the validation message displaying correctly
        		$('html,body').scrollTop(elementOffset)
		}
	});
        
	});
</script>


</body>
</html>

