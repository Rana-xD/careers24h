<div class="modal fade" id="resumeModal" tabindex="-1" role="dialog" aria-labelledby="resumeModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title w-100 text-center" id="resumeModal">Resume</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
            <div class="cand-single-user">
                 <div class="can-detail-s">
                    <img src="{{ $applicant->user_profile }}" alt="" width="145" height="145"/>
                     <h3>{{ $applicant->full_name  }}</h3>
                     <p>{{ $applicant->age }} years old, {{ $applicant->gender }}</p>
                     <p><i class="la la-graduation-cap"></i> {{ $applicant->education_level }}, <i class="la la-certificate"></i> {{ $applicant->career_level }}</p>
                     <p><i class="la la-envelope"></i>{{ $applicant->email  }}</p>
                     <p><i class="la la-map-marker"></i>{{ __('city.'.$applicant->city) }} / @lang('city.Cambodia')</p>
                 </div>
                 
             </div>
            <div class="manage-jobs-sec">
                <div class="border-title"><h3>@lang('my_resume.education')</h3></div>
                <div class="edu-history-sec">
                   @if (!empty($educations))
                    @foreach ($educations as $index => $item)
                    <div class="edu-history">
                       <i class="la la-graduation-cap"></i>
                       <div class="edu-hisinfo">
                           <h3 class="title">{{  $item['title'] }}</h3>
                           <i>{{ DateTime::createFromFormat('m-d-Y', $item['from'])->format('M-Y') }} - {{ DateTime::createFromFormat('m-d-Y', $item['to'])->format('M-Y') }}</i>
                           <span class="school_name">{{ $item['school'] }}</span>
                           <p class="description">{{ $item['description'] }}</p>
                       </div>
                   </div>
                    @endforeach
                    @endif
                </div>
                <div class="border-title"><h3>@lang('my_resume.work_experience')</h3></div>
                <div class="edu-history-sec">
                   @if (!empty($work_experience))
                    @foreach ($work_experience as $index => $item)
                    <div class="edu-history style2">
                       <i></i>
                       <div class="edu-hisinfo">
                           <h3 class="title">{{ $item['title'] }} <span class="company">{{ $item['company'] }}</span></h3>
                           <i>{{ DateTime::createFromFormat('m-d-Y', $item['from'])->format('M-Y') }} - {{  $item['to'] === 'Now' ? 'Now' : DateTime::createFromFormat('m-d-Y', $item['to'])->format('M-Y') }}</i>
                              <p class="description">{{ $item['description'] }}</p>
                       </div>
                   </div>
                    @endforeach
                    @endif
                </div>
                <div class="border-title"><h3>@lang('my_resume.professional_skill')</h3></div>
                <div class="progress-sec">
                   @if (!empty($skillset))
                    @foreach ($skillset as $index => $item)
                    <div class="progress-sec with-edit">
                        <span class="skill">{{ $item['skill'] }}</span>
                       <div class="progressbar"> <div class="progress" style="width: {{ $item['percentage'] }}%;"><span>{{ $item['percentage'] }}%</span></div> </div>
                       </div>
                    @endforeach
                    @endif
                </div>
                <div class="border-title"><h3>@lang('my_resume.achievement')</h3></div>
                <div class="edu-history-sec">
                    @if (!empty($achievement))
                    @foreach ($achievement as $index => $item)
                    <div class="edu-history style2">
                       <i></i>
                       <div class="edu-hisinfo">
                           <h3 class="title">{{ $item['title'] }}</h3>
                           <i>{{ DateTime::createFromFormat('m-d-Y', $item['from'])->format('M-Y') }} - {{ DateTime::createFromFormat('m-d-Y', $item['to'])->format('M-Y') }}</i>
                           <p class="description">{{ $item['description'] }}</p>
                       </div>
                   </div>
                    @endforeach
                    @endif
                </div>
            </div>
		</div>
	  </div>
	</div>
</div>