<!-- Education Modal -->
<div class="modal fade" id="editEducationModal" tabindex="-1" role="dialog" aria-labelledby="editEducationModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="editEducationModal">Edit Education</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
				<input type="hidden" name="educationIndex" id="educationIndex">
				<div class="row">
					<div class="col-lg-12">
						<span class="pf-title">Title</span>
						<div class="pf-field">
							<input placeholder="Tooms.." type="text" name="eduction_title_edit" id="eduction_title_edit">
						</div>
					</div>
					<div class="col-lg-6">
						<span class="pf-title">From Date</span>
						<div class="pf-field">
							<input placeholder="06.11.2007" type="text" class="datepicker" name="education_from_date_edit" id="education_from_date_edit"> 
						</div>
					</div>
					<div class="col-lg-6">
						<span class="pf-title">To Date</span>
						<div class="pf-field">
							<input placeholder="06.11.2012" type="text" class="datepicker" name="education_to_date_edit" id="education_to_date_edit">
						</div>
					</div>
					<div class="col-lg-12">
						<span class="pf-title">School Name</span>
						<div class="pf-field">
							<input type="text" name="education_school_name_edit" id="education_school_name_edit">
						</div>
					</div>
					<div class="col-lg-12">
						<span class="pf-title">Description</span>
						<div class="pf-field">
							<textarea name="education_description" id="education_description_edit"></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  <button type="button" id="updateEducation" class="btn btn-primary">Save changes</button>
		</div>
	  </div>
	</div>
</div>

<!-- Work Experience Modal -->
<div class="modal fade" id="editWorkExperienceModal" tabindex="-1" role="dialog" aria-labelledby="editWorkExperienceModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="editWorkExperienceModal">Edit Work Experience</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
				<input type="hidden" name="workExperienceIndex" id="workExperienceIndex">
				<div class="row">
					<div class="col-lg-12">
						<span class="pf-title">Title</span>
						<div class="pf-field">
							<input placeholder="Tooms.." type="text" name="work_title_edit" id="work_title_edit">
						</div>
					</div>
					<div class="col-lg-5">
						<span class="pf-title">From Date</span>
						<div class="pf-field">
							<input placeholder="06.11.2007" type="text" class="datepicker" name="work_from_date_edit" id="work_from_date_edit">
						</div>
					</div>
					<div class="col-lg-5">
						<span class="pf-title edit-work-to-date-div">To Date</span>
						<div class="pf-field edit-work-to-date-div">
							<input placeholder="06.11.2012" type="text" class="datepicker" name="work_to_date_edit" id="work_to_date_edit">
						</div>
					</div>
					<div class="col-lg-2">
					   <span class="pf-title">Now</span>
						<div>
						  <input type="checkbox" id="work_present_edit" data-toggle="toggle" data-size="normal" data-onstyle="primary" data-offstyle="danger">
					   </div>
					</div>
					<div class="col-lg-12">
						<span class="pf-title">Company</span>
						<div class="pf-field">
							<input type="text" name="work_company_edit" id="work_company_edit">
						</div>
					</div>
					<div class="col-lg-12">
						<span class="pf-title">Description</span>
						<div class="pf-field">
							<textarea name="work_description" id="work_description_edit"></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  <button type="button" id="updateWorkExperience" class="btn btn-primary">Save changes</button>
		</div>
	  </div>
	</div>
</div>

<!-- Skillset Modal -->
<div class="modal fade" id="editSkillsetModal" tabindex="-1" role="dialog" aria-labelledby="editSkillsetModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="editSkillsetModal">Edit Skillset</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
				<input type="hidden" name="skillsetIndex" id="skillsetIndex">
				<div class="row">
					<div class="col-lg-8">
                        <span class="pf-title">Skill Heading</span>
                        <div class="pf-field">
                            <input placeholder="" type="text" id="skill_name_edit" name="skill_name_edit">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <span class="pf-title">Percentage</span>
                        <div class="pf-field">
                            <input placeholder="" type="number" id="skill_percentage_edit" name="skill_percentage_edit">
                        </div>
                    </div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  <button type="button" id="updateSkillset" class="btn btn-primary">Save changes</button>
		</div>
	  </div>
	</div>
</div>

<!-- Achievement Modal -->
<div class="modal fade" id="editAchievementModal" tabindex="-1" role="dialog" aria-labelledby="editAchievementModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="editAchievementModal">Edit Skillset</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
				<input type="hidden" name="achievementIndex" id="achievementIndex">
				<div class="row">
					<div class="col-lg-12">
                        <span class="pf-title">Title</span>
                        <div class="pf-field">
                            <input type="text" name="achievement_title_edit" id="achievement_title_edit">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <span class="pf-title">From Date</span>
                        <div class="pf-field">
                            <input placeholder="06.11.2007" type="text" class="datepicker" name="achievement_from_date_edit" id="achievement_from_date_edit">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <span class="pf-title">To Date</span>
                        <div class="pf-field">
                            <input placeholder="06.11.2012" type="text" class="datepicker" name="achievement_to_date_edit" id="achievement_to_date_edit">
                        </div>
                    </div>
                     <div class="col-lg-12">
                         <span class="pf-title">Description</span>
                         <div class="pf-field">
                             <textarea name="achievement_description_edit" id="achievement_description_edit"></textarea>
                         </div>
                     </div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  <button type="button" id="updateAchievement" class="btn btn-primary">Save changes</button>
		</div>
	  </div>
	</div>
</div>