<!-- Education Modal -->
<div class="modal fade" id="addEducationModal" tabindex="-1" role="dialog" aria-labelledby="addEducationModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="addEducationModal">@lang('my_resume.add_education')</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<form action="" method="POST" id="addEducation">
		<div class="modal-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<span class="pf-title">@lang('my_resume.title') <span class="required">*</span></span>
						<div class="pf-field">
							<input placeholder="High School" type="text" name="eduction_title" id="eduction_title" required>
						</div>
					</div>
					<div class="col-lg-6">
						<span class="pf-title">@lang('my_resume.from_date') <span class="required">*</span></span>
						<div class="pf-field">
							<input placeholder="06.11.2007" type="text" class="datepicker" name="education_from_date" id="education_from_date" required> 
						</div>
					</div>
					<div class="col-lg-6">
						<span class="pf-title">@lang('my_resume.to_date') <span class="required">*</span></span>
						<div class="pf-field">
							<input placeholder="06.11.2012" type="text" class="datepicker" name="education_to_date" id="education_to_date" required>
						</div>
					</div>
					<div class="col-lg-12">
						<span class="pf-title">@lang('my_resume.school_name') <span class="required">*</span></span>
						<div class="pf-field">
							<input type="text" name="education_school_name" id="education_school_name" required>
						</div>
					</div>
					<div class="col-lg-12">
						<span class="pf-title">@lang('my_resume.description')</span>
						<div class="pf-field">
							<textarea name="education_description" id="education_description"></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('my_resume.close')</button>
		  <button type="submit" class="btn btn-primary">@lang('my_resume.add')</button>
		</div>
		</form>
	  </div>
	</div>
</div>

<!-- Work Experience Modal -->
<div class="modal fade" id="addWorkExperienceModal" tabindex="-1" role="dialog" aria-labelledby="addWorkExperienceModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="addWorkExperienceModal">@lang('my_resume.add_work_experience')</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<form action="" method="POST" id="addWorkExperience">
		<div class="modal-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<span class="pf-title">@lang('my_resume.title') <span class="required">*</span></span>
						<div class="pf-field">
							<input placeholder="Software Engineer" type="text" name="work_title" id="work_title" required>
						</div>
					</div>
					<div class="col-lg-5">
						<span class="pf-title">@lang('my_resume.from_date') <span class="required">*</span></span>
						<div class="pf-field">
							<input placeholder="06.11.2007" type="text" class="datepicker" name="work_from_date" id="work_from_date" required>
						</div>
					</div>
					<div class="col-lg-5">
						<span class="pf-title work-to-date-div">@lang('my_resume.to_date') <span class="required">*</span></span>
						<div class="pf-field work-to-date-div">
							<input placeholder="06.11.2012" type="text" class="datepicker" name="work_to_date" id="work_to_date" required>
						</div>
					</div>
					<div class="col-lg-2">
					   <span class="pf-title">@lang('my_resume.now')</span>
						<div>
						  <input type="checkbox" id="work_present" data-toggle="toggle" data-size="normal" data-on=" " data-off=" " data-onstyle="primary" data-offstyle="danger">
					   </div>
					</div>
					<div class="col-lg-12">
						<span class="pf-title">@lang('my_resume.company') <span class="required">*</span></span>
						<div class="pf-field">
							<input type="text" name="work_company" id="work_company" required> 
						</div>
					</div>
					<div class="col-lg-12">
						<span class="pf-title">@lang('my_resume.description')</span>
						<div class="pf-field">
							<textarea name="work_description" id="work_description"></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('my_resume.close')</button>
		  <button type="submit" class="btn btn-primary">@lang('my_resume.add')</button>
		</div>
		</form>
	  </div>
	</div>
</div>

<!-- Skillset Modal -->
<div class="modal fade" id="addSkillsetModal" tabindex="-1" role="dialog" aria-labelledby="addSkillsetModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="addSkillsetModal">@lang('my_resume.add_professional_skill')</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<form action="" method="POST" id="addSkillset">
		<div class="modal-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-8">
                        <span class="pf-title">@lang('my_resume.skill_heading') <span class="required">*</span></span>
                        <div class="pf-field">
                            <input placeholder="" type="text" id="skill_name" name="skill_name" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <span class="pf-title">@lang('my_resume.percentage') <span class="required">*</span></span>
                        <div class="pf-field">
                            <input placeholder="" type="number" id="skill_percentage" name="skill_percentage" required>
                        </div>
                    </div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('my_resume.close')</button>
		  <button type="submit" class="btn btn-primary">@lang('my_resume.add')</button>
		</div>
	   </form>
	  </div>
	</div>
</div>

<!-- Achievement Modal -->
<div class="modal fade" id="addAchievementModal" tabindex="-1" role="dialog" aria-labelledby="addAchievementModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="addAchievementModal">@lang('my_resume.add_achievement')</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<form action="" method="POST" id="addAchievement">
		<div class="modal-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
                        <span class="pf-title">@lang('my_resume.title') <span class="required">*</span></span>
                        <div class="pf-field">
                            <input type="text" name="achievement_title" id="achievement_title" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <span class="pf-title">@lang('my_resume.from_date') <span class="required">*</span></span>
                        <div class="pf-field">
                            <input placeholder="06.11.2007" type="text" class="datepicker" name="achievement_from_date" id="achievement_from_date" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <span class="pf-title">@lang('my_resume.to_date') <span class="required">*</span></span>
                        <div class="pf-field">
                            <input placeholder="06.11.2012" type="text" class="datepicker" name="achievement_to_date" id="achievement_to_date" required>
                        </div>
                    </div>
                     <div class="col-lg-12">
                         <span class="pf-title">@lang('my_resume.description')</span>
                         <div class="pf-field">
                             <textarea name="achievement_description" id="achievement_description"></textarea>
                         </div>
                     </div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('my_resume.close')</button>
		  <button type="submit" class="btn btn-primary">@lang('my_resume.add')</button>
		</div>
		</form>
	  </div>
	</div>
</div>