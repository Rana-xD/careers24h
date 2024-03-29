<!-- Education Modal -->
<div class="modal fade" id="editEducationModal" tabindex="-1" role="dialog" aria-labelledby="editEducationModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="editEducationModal">@lang('my_resume.edit_education')</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<form action="" method="POST" id="updateEducation">
		<div class="modal-body">
			<div class="container-fluid">
				<input type="hidden" name="educationIndex" id="educationIndex">
				<div class="row">
					<div class="col-lg-12">
						<span class="pf-title">@lang('my_resume.title') <span class="required">*</span></span>
						<div class="pf-field">
							<input placeholder="High School" type="text" name="eduction_title_edit" id="eduction_title_edit" required>
						</div>
					</div>
					<div class="col-lg-6">
						<span class="pf-title">@lang('my_resume.from_date') <span class="required">*</span></span>
						<div class="pf-field">
							<input placeholder="06.11.2007" type="text" class="datepicker" name="education_from_date_edit" id="education_from_date_edit" required> 
						</div>
					</div>
					<div class="col-lg-6">
						<span class="pf-title">@lang('my_resume.to_date') <span class="required">*</span></span>
						<div class="pf-field">
							<input placeholder="06.11.2012" type="text" class="datepicker" name="education_to_date_edit" id="education_to_date_edit" required>
						</div>
					</div>
					<div class="col-lg-12">
						<span class="pf-title">@lang('my_resume.school_name') <span class="required">*</span></span>
						<div class="pf-field">
							<input type="text" name="education_school_name_edit" id="education_school_name_edit" required>
						</div>
					</div>
					<div class="col-lg-12">
						<span class="pf-title">@lang('my_resume.description')</span>
						<div class="pf-field">
							<textarea name="education_description" id="education_description_edit"></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('my_resume.close')</button>
		  <button type="submit" class="btn btn-primary">@lang('my_resume.save_change')</button>
		</div>
		</form>
	  </div>
	</div>
</div>

<!-- Work Experience Modal -->
<div class="modal fade" id="editWorkExperienceModal" tabindex="-1" role="dialog" aria-labelledby="editWorkExperienceModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="editWorkExperienceModal">@lang('my_resume.edit_work_experience')</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<form action="" method="POST" id="updateWorkExperience">
		<div class="modal-body">
			<div class="container-fluid">
				<input type="hidden" name="workExperienceIndex" id="workExperienceIndex">
				<div class="row">
					<div class="col-lg-12">
						<span class="pf-title">@lang('my_resume.title') <span class="required">*</span></span>
						<div class="pf-field">
							<input placeholder="Tooms.." type="text" name="work_title_edit" id="work_title_edit" required>
						</div>
					</div>
					<div class="col-lg-5">
						<span class="pf-title">@lang('my_resume.from_date') <span class="required">*</span></span>
						<div class="pf-field">
							<input placeholder="06.11.2007" type="text" class="datepicker" name="work_from_date_edit" id="work_from_date_edit" required>
						</div>
					</div>
					<div class="col-lg-5">
						<span class="pf-title edit-work-to-date-div">@lang('my_resume.to_date') <span class="required">*</span></span>
						<div class="pf-field edit-work-to-date-div">
							<input placeholder="06.11.2012" type="text" class="datepicker" name="work_to_date_edit" id="work_to_date_edit" required>
						</div>
					</div>
					<div class="col-lg-2">
					   <span class="pf-title">@lang('my_resume.now')</span>
						<div>
						  <input type="checkbox" id="work_present_edit" data-toggle="toggle" data-size="normal" data-on=" " data-off=" " data-onstyle="primary" data-offstyle="danger">
					   </div>
					</div>
					<div class="col-lg-12">
						<span class="pf-title">@lang('my_resume.company') <span class="required">*</span></span>
						<div class="pf-field">
							<input type="text" name="work_company_edit" id="work_company_edit" required> 
						</div>
					</div>
					<div class="col-lg-12">
						<span class="pf-title">@lang('my_resume.description')</span>
						<div class="pf-field">
							<textarea name="work_description" id="work_description_edit"></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('my_resume.close')</button>
		  <button type="submit" class="btn btn-primary">@lang('my_resume.save_change')</button>
		</div>
		</form>
	  </div>
	</div>
</div>

<!-- Skillset Modal -->
<div class="modal fade" id="editSkillsetModal" tabindex="-1" role="dialog" aria-labelledby="editSkillsetModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="editSkillsetModal">@lang('my_resume.edit_professional_skill')</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<form action="" method="POST" id="updateSkillset">
		<div class="modal-body">
			<div class="container-fluid">
				<input type="hidden" name="skillsetIndex" id="skillsetIndex">
				<div class="row">
					<div class="col-lg-8">
                        <span class="pf-title">@lang('my_resume.skill_heading') <span class="required">*</span></span>
                        <div class="pf-field">
                            <input placeholder="" type="text" id="skill_name_edit" name="skill_name_edit" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <span class="pf-title">@lang('my_resume.percentage') <span class="required">*</span></span>
                        <div class="pf-field">
                            <input placeholder="" type="number" id="skill_percentage_edit" name="skill_percentage_edit" required>
                        </div>
                    </div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('my_resume.close')</button>
		  <button type="submit" class="btn btn-primary">@lang('my_resume.save_change')</button>
		</div>
		</form>
	  </div>
	</div>
</div>

<!-- Achievement Modal -->
<div class="modal fade" id="editAchievementModal" tabindex="-1" role="dialog" aria-labelledby="editAchievementModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="editAchievementModal">@lang('my_resume.edit_achievement')</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<form action="" method="POST" id="updateAchievement">
		<div class="modal-body">
			<div class="container-fluid">
				<input type="hidden" name="achievementIndex" id="achievementIndex">
				<div class="row">
					<div class="col-lg-12">
                        <span class="pf-title">@lang('my_resume.title') <span class="required">*</span></span>
                        <div class="pf-field">
                            <input type="text" name="achievement_title_edit" id="achievement_title_edit" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <span class="pf-title">@lang('my_resume.from_date') <span class="required">*</span></span>
                        <div class="pf-field">
                            <input placeholder="06.11.2007" type="text" class="datepicker" name="achievement_from_date_edit" id="achievement_from_date_edit" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <span class="pf-title">@lang('my_resume.to_date') <span class="required">*</span></span>
                        <div class="pf-field">
                            <input placeholder="06.11.2012" type="text" class="datepicker" name="achievement_to_date_edit" id="achievement_to_date_edit" required>
                        </div>
                    </div>
                     <div class="col-lg-12">
                         <span class="pf-title">@lang('my_resume.description')</span>
                         <div class="pf-field">
                             <textarea name="achievement_description_edit" id="achievement_description_edit"></textarea>
                         </div>
                     </div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('my_resume.close')</button>
		  <button type="submit" class="btn btn-primary">@lang('my_resume.save_change')</button>
		</div>
		</form>
	  </div>
	</div>
</div>