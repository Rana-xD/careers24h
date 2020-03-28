<div class="modal fade" id="interviewdateModal" tabindex="-1" role="dialog" aria-labelledby="interviewdateModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title w-100 text-center" id="interviewdateModal">@lang('applicant.interview_date')</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="datetimepicker"></div>
                        <input type="hidden" id="pivot-id-modal" name="pivot-id-modal">
                        <input type="hidden" id="datepicker_date" name="datepicker_date">
                    </div>
                    <div class="col-lg-12">
                        <span class="pf-title">@lang('applicant.online_interview')</span>
						<div>
						  <input type="checkbox" id="online-interview" data-toggle="toggle" data-size="normal" data-on=" " data-off=" " data-onstyle="primary" data-offstyle="danger">
					   </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" id="setInterviewDate" class="btn btn-primary">@lang('applicant.add')</button>
          </div>
	  </div>
	</div>
</div>
