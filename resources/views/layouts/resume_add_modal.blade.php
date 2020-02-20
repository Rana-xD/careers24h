<!-- Education Modal -->
<div class="modal fade" id="addEducationModal" tabindex="-1" role="dialog" aria-labelledby="addEducationModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="addEducationModal">Add Education</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<span class="pf-title">Title</span>
						<div class="pf-field">
							<input placeholder="Tooms.." type="text" name="eduction_title" id="eduction_title">
						</div>
					</div>
					<div class="col-lg-6">
						<span class="pf-title">From Date</span>
						<div class="pf-field">
							<input placeholder="06.11.2007" type="text" class="datepicker" name="education_from_date" id="education_from_date"> 
						</div>
					</div>
					<div class="col-lg-6">
						<span class="pf-title">To Date</span>
						<div class="pf-field">
							<input placeholder="06.11.2012" type="text" class="datepicker" name="education_to_date" id="education_to_date">
						</div>
					</div>
					<div class="col-lg-12">
						<span class="pf-title">School Name</span>
						<div class="pf-field">
							<input type="text" name="education_school_name" id="education_school_name">
						</div>
					</div>
					<div class="col-lg-12">
						<span class="pf-title">Description</span>
						<div class="pf-field">
							<textarea name="education_description" id="education_description"></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  <button type="button" id="addEducation" class="btn btn-primary">Add</button>
		</div>
	  </div>
	</div>
</div>

<!-- Work Experience Modal -->
<div class="modal fade" id="addWorkExperienceModal" tabindex="-1" role="dialog" aria-labelledby="addWorkExperienceModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="addWorkExperienceModal">Add Work Experience</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<span class="pf-title">Title</span>
						<div class="pf-field">
							<input placeholder="Tooms.." type="text" name="work_title" id="work_title">
						</div>
					</div>
					<div class="col-lg-5">
						<span class="pf-title">From Date</span>
						<div class="pf-field">
							<input placeholder="06.11.2007" type="text" class="datepicker" name="work_from_date" id="work_from_date">
						</div>
					</div>
					<div class="col-lg-5">
						<span class="pf-title work-to-date-div">To Date</span>
						<div class="pf-field work-to-date-div">
							<input placeholder="06.11.2012" type="text" class="datepicker" name="work_to_date" id="work_to_date">
						</div>
					</div>
					<div class="col-lg-2">
					   <span class="pf-title">Now</span>
						<div>
						  <input type="checkbox" id="work_present" data-toggle="toggle" data-size="normal" data-on=" " data-off=" " data-onstyle="primary" data-offstyle="danger">
					   </div>
					</div>
					<div class="col-lg-12">
						<span class="pf-title">Company</span>
						<div class="pf-field">
							<input type="text" name="work_company" id="work_company">
						</div>
					</div>
					<div class="col-lg-12">
						<span class="pf-title">Description</span>
						<div class="pf-field">
							<textarea name="work_description" id="work_description"></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  <button type="button" id="addWorkExperience" class="btn btn-primary">Add</button>
		</div>
	  </div>
	</div>
</div>

<!-- Skillset Modal -->
<div class="modal fade" id="addSkillsetModal" tabindex="-1" role="dialog" aria-labelledby="addSkillsetModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="addSkillsetModal">Add Skillset</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-8">
                        <span class="pf-title">Skill Heading</span>
                        <div class="pf-field">
                            <input placeholder="" type="text" id="skill_name" name="skill_name">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <span class="pf-title">Percentage</span>
                        <div class="pf-field">
                            <input placeholder="" type="number" id="skill_percentage" name="skill_percentage">
                        </div>
                    </div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  <button type="button" id="addSkillset" class="btn btn-primary">Add</button>
		</div>
	  </div>
	</div>
</div>

<!-- Achievement Modal -->
<div class="modal fade" id="addAchievementModal" tabindex="-1" role="dialog" aria-labelledby="addAchievementModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="addAchievementModal">Add Achievement</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
                        <span class="pf-title">Title</span>
                        <div class="pf-field">
                            <input type="text" name="achievement_title" id="achievement_title">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <span class="pf-title">From Date</span>
                        <div class="pf-field">
                            <input placeholder="06.11.2007" type="text" class="datepicker" name="achievement_from_date" id="achievement_from_date">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <span class="pf-title">To Date</span>
                        <div class="pf-field">
                            <input placeholder="06.11.2012" type="text" class="datepicker" name="achievement_to_date" id="achievement_to_date">
                        </div>
                    </div>
                     <div class="col-lg-12">
                         <span class="pf-title">Description</span>
                         <div class="pf-field">
                             <textarea name="achievement_description" id="achievement_description"></textarea>
                         </div>
                     </div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  <button type="button" id="addAchievement" class="btn btn-primary">Add</button>
		</div>
	  </div>
	</div>
</div>