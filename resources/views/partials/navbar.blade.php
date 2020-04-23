
<div class="spinner-wrapper">
    <div class="spinner">
          <div class="bounce1"></div>
          <div class="bounce2"></div>
          <div class="bounce3"></div>
    </div>
</div>
<div class="responsive-header">
    <div class="responsive-menubar">
        <div class="res-logo"><a href="/" title=""><img src="http://placehold.it/178x40" alt="" /></a></div>
        <div class="menu-resaction">
            <div class="res-openmenu">
                <img src="images/icon.png" alt="" /> @lang('navbar.menu')
            </div>
            <div class="res-closemenu">
                <img src="images/icon2.png" alt="" /> @lang('navbar.close')
            </div>
        </div>
    </div>
    <div class="responsive-opensec">
        <div class="btn-extars">
            {{-- <a href="#" title="" class="post-job-btn"><i class="la la-plus"></i>Post Jobs</a> --}}
            <ul class="account-btns">
                @if (Auth::user() && Auth::user()->isCompany())
                <div class="btns-profiles-sec">
					<span><img src="http://placehold.it/50x50" alt="" /> {{  Auth::user()->username }} <i class="la la-angle-down"></i></span>
					<ul>
						<li><a href="/company/profile" title=""><i class="la la-file-text"></i>@lang('company_menu.company_profile')</a></li>
                        <li><a href="/company/manage-jobs" title=""><i class="la la-briefcase"></i>@lang('company_menu.manage_job')</a></li>
                        <li><a href="/company/applicants" title=""><i class="la la-copy"></i>@lang('company_menu.applicants')</a></li>
                        <li><a href="/company/interview-room" title=""><i class="la la-video-camera"></i>@lang('company_menu.interview_room')</a></li>
                        {{-- <li><a href="/company/transaction" title=""><i class="la la-money"></i>Transactions</a></li> --}}
                        {{-- <li><a href="/company/resume" title=""><i class="la la-paper-plane"></i>Resumes</a></li> --}}
                        {{-- <li><a href="/company/packages" title=""><i class="la la-user"></i>Packages</a></li> --}}
                        <li><a href="/company/new-job" title=""><i class="la la-file-text"></i>@lang('company_menu.post_job')</a></li>
                        {{-- <li><a href="/company/job-alert" title=""><i class="la la-flash"></i>Job Alerts</a></li> --}}
                        <li><a href="/company/account-setting" title=""><i class="la la-lock"></i>@lang('company_menu.account_setting')</a></li>
                        <li><a href="/logout" title=""><i class="la la-unlink"></i>@lang('company_menu.logout')</a></li>
					</ul>
				</div>
                @elseif (Auth::user() && Auth::user()->isJobSeeker())
                <div class="btns-profiles-sec">
					<span><img src="http://placehold.it/50x50" alt="" /> {{  Auth::user()->username }} <i class="la la-angle-down"></i></span>
					<ul>
						<li><a href="/jobseeker/profile" title=""><i class="la la-file-text"></i>@lang('jobseeker_menu.my_profile')</a></li>
                        <li><a href="/jobseeker/resume" title=""><i class="la la-briefcase"></i>@lang('jobseeker_menu.my_resume')</a></li>
                        {{-- <li><a href="/jobseeker/add-resume" title=""><i class="la la-briefcase"></i>Add Resume</a></li> --}}
                        <li><a href="/jobseeker/template/list" title=""><i class="la la-briefcase"></i>@lang('jobseeker_menu.cv_template')</a></li>
                        {{-- <li><a href="/jobseeker/shortlist" title=""><i class="la la-money"></i>@lang('jobseeker_menu.shortlisted_job')</a></li> --}}
                        <li><a href="/jobseeker/applied-job" title=""><i class="la la-paper-plane"></i>@lang('jobseeker_menu.applied_job')</a></li>
                        <li><a href="/jobseeker/interview-room" title=""><i class="la la-video-camera"></i>@lang('jobseeker_menu.interview_room')</a></li>
                        {{-- <li><a href="/jobseeker/job-alert" title=""><i class="la la-user"></i>Job Alerts</a></li> --}}
                        <li><a href="/jobseeker/cover-letter" title=""><i class="la la-file-text"></i>@lang('jobseeker_menu.video_cv')</a></li>
                        <li><a href="/jobseeker/account-setting" title=""><i class="la la-lock"></i>@lang('jobseeker_menu.account_setting')</a></li>
                        <li><a href="/logout" title=""><i class="la la-unlink"></i>@lang('jobseeker_menu.logout')</a></li>
					</ul>
				</div>
                @else
                <ul class="account-btns">
                    <li class="signup-popup"><a href="/signup" title=""><i class="la la-key"></i>@lang('navbar.singup')</a></li>
                    <li class="signin-popup"><a href="/login" title=""><i class="la la-external-link-square"></i>@lang('navbar.login')</a></li>
                </ul>
                @endif
            </ul>
        </div><!-- Btn Extras -->
        <div class="responsivemenu">
            <ul>
                <li>
                    <a href="/" title="">@lang('navbar.home')</a>
                    
                </li>
                <li>
                    <a href="/jobs" title="">@lang('navbar.job')</a>
                    
                </li>
                <li>
                    <a href="/company" title="">@lang('navbar.company')</a>
                    
                </li>
                @if (Auth::user() && Auth::user()->isCompany())
                    <li>
                        <a href="/candidates" title="">@lang('navbar.candidate')</a>
                    </li>
                @endif
                <li class="menu-item-has-children">
                    <a><img src="{{ session('locale','en') === 'en' ? asset('/images/united-states-of-america-flag.png') : asset('/images/cambodia-flag.png') }}" width="35" height="23"/></a>
                    <ul style="width:85px">
                        <li><a href="/locale/en" title=""><img src="{{ asset('/images/united-states-of-america-flag.png') }}" width="35" height="23"/></a></li>
                        <li><a href="/locale/kh" title=""><img src="{{ asset('/images/cambodia-flag.png') }}" width="35" height="23"/></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

<header class="stick-top forsticky">
    <div class="menu-sec">
        <div class="container">
            <div class="logo">
                <a href="/" title=""><img class="hidesticky" src="http://placehold.it/178x40" alt="" /><img class="showsticky" src="http://placehold.it/178x40" alt="" /></a>
            </div><!-- Logo -->
            <div class="btn-extars">
                @if (Auth::user() && Auth::user()->isCompany())
                <div class="btns-profiles-sec">
					<span><img src="http://placehold.it/50x50" alt="" /> {{  Auth::user()->username }} <i class="la la-angle-down"></i></span>
					<ul>
						<li><a href="/company/profile" title=""><i class="la la-file-text"></i>@lang('company_menu.company_profile')</a></li>
                        <li><a href="/company/manage-jobs" title=""><i class="la la-briefcase"></i>@lang('company_menu.manage_job')</a></li>
                        <li><a href="/company/applicants" title=""><i class="la la-copy"></i>@lang('company_menu.applicants')</a></li>
                        <li><a href="/company/interview-room" title=""><i class="la la-video-camera"></i>@lang('company_menu.interview_room')</a></li>
                        {{-- <li><a href="/company/transaction" title=""><i class="la la-money"></i>Transactions</a></li> --}}
                        {{-- <li><a href="/company/resume" title=""><i class="la la-paper-plane"></i>Resumes</a></li> --}}
                        {{-- <li><a href="/company/packages" title=""><i class="la la-user"></i>Packages</a></li> --}}
                        <li><a href="/company/new-job" title=""><i class="la la-file-text"></i>@lang('company_menu.post_job')</a></li>
                        {{-- <li><a href="/company/job-alert" title=""><i class="la la-flash"></i>Job Alerts</a></li> --}}
                        <li><a href="/company/account-setting" title=""><i class="la la-lock"></i>@lang('company_menu.account_setting')</a></li>
                        <li><a href="/logout" title=""><i class="la la-unlink"></i>@lang('company_menu.logout')</a></li>
					</ul>
				</div>
                @elseif (Auth::user() && Auth::user()->isJobSeeker())
                <div class="btns-profiles-sec">
					<span><img src="http://placehold.it/50x50" alt="" /> {{  Auth::user()->username }} <i class="la la-angle-down"></i></span>
					<ul>
						<li><a href="/jobseeker/profile" title=""><i class="la la-file-text"></i>@lang('jobseeker_menu.my_profile')</a></li>
                        <li><a href="/jobseeker/resume" title=""><i class="la la-briefcase"></i>@lang('jobseeker_menu.my_resume')</a></li>
                        {{-- <li><a href="/jobseeker/add-resume" title=""><i class="la la-briefcase"></i>Add Resume</a></li> --}}
                        <li><a href="/jobseeker/template/list" title=""><i class="la la-briefcase"></i>@lang('jobseeker_menu.cv_template')</a></li>
                        {{-- <li><a href="/jobseeker/shortlist" title=""><i class="la la-money"></i>@lang('jobseeker_menu.shortlisted_job')</a></li> --}}
                        <li><a href="/jobseeker/applied-job" title=""><i class="la la-paper-plane"></i>@lang('jobseeker_menu.applied_job')</a></li>
                        <li><a href="/jobseeker/interview-room" title=""><i class="la la-video-camera"></i>@lang('jobseeker_menu.interview_room')</a></li>
                        {{-- <li><a href="/jobseeker/job-alert" title=""><i class="la la-user"></i>Job Alerts</a></li> --}}
                        <li><a href="/jobseeker/cover-letter" title=""><i class="la la-file-text"></i>@lang('jobseeker_menu.video_cv')</a></li>
                        <li><a href="/jobseeker/account-setting" title=""><i class="la la-lock"></i>@lang('jobseeker_menu.account_setting')</a></li>
                        <li><a href="/logout" title=""><i class="la la-unlink"></i>@lang('jobseeker_menu.logout')</a></li>
					</ul>
				</div>
                @else
                <ul class="account-btns">
                    <li class="signup-popup"><a href="/signup" title=""><i class="la la-key"></i>@lang('navbar.singup')</a></li>
                    <li class="signin-popup"><a href="/login" title=""><i class="la la-external-link-square"></i>@lang('navbar.login')</a></li>
                </ul>
                @endif
            </div><!-- Btn Extras -->
            <nav>
                <ul>
                    <li>
                        <a href="/" title="">@lang('navbar.home')</a>
                        
                    </li>
                    <li>
                        <a href="/jobs" title="">@lang('navbar.job')</a>
                        
                    </li>
                    <li>
                        <a href="/company" title="">@lang('navbar.company')</a>
                        
                    </li>
                    @if (Auth::user() && Auth::user()->isCompany())
                    <li>
                        <a href="/candidates" title="">@lang('navbar.candidate')</a>
                    </li>
                    @endif
                    <li class="menu-item-has-children">
                        <a href="#" title=""><img src="{{ session('locale','en') === 'en' ? asset('/images/united-states-of-america-flag.png') : asset('/images/cambodia-flag.png') }}" width="35" height="23"/></a>
                        <ul style="width:85px">
                            <li><a href="/locale/en" title=""><img src="{{ asset('/images/united-states-of-america-flag.png') }}" width="35" height="23"/></a></li>
                            <li><a href="/locale/kh" title=""><img src="{{ asset('/images/cambodia-flag.png') }}" width="35" height="23"/></a></li>
                        </ul>
                    </li>
                </ul>
            </nav><!-- Menus -->
        </div>
    </div>
</header>