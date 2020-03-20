
<div class="spinner-wrapper">
    <div class="spinner">
          <div class="bounce1"></div>
          <div class="bounce2"></div>
          <div class="bounce3"></div>
    </div>
</div>
<div class="responsive-header">
    <div class="responsive-menubar">
        <div class="res-logo"><a href="index.html" title=""><img src="http://placehold.it/178x40" alt="" /></a></div>
        <div class="menu-resaction">
            <div class="res-openmenu">
                <img src="images/icon.png" alt="" /> Menu
            </div>
            <div class="res-closemenu">
                <img src="images/icon2.png" alt="" /> Close
            </div>
        </div>
    </div>
    <div class="responsive-opensec">
        <div class="btn-extars">
            {{-- <a href="#" title="" class="post-job-btn"><i class="la la-plus"></i>Post Jobs</a> --}}
            <ul class="account-btns">
                <li class="signup-popup"><a href="/signup" title=""><i class="la la-key"></i> Sign Up</a></li>
                <li class="signin-popup"><a href="/login" title=""><i class="la la-external-link-square"></i> Login</a></li>
            </ul>
        </div><!-- Btn Extras -->
        <form class="res-search">
            <input type="text" placeholder="Job title, keywords or company name" />
            <button type="submit"><i class="la la-search"></i></button>
        </form>
        <div class="responsivemenu">
            <ul>
                <li class="menu-item-has-children">
                    <a href="/jobs" title="">Jobs</a>
                    
                </li>
                <li class="menu-item-has-children">
                    <a href="/company" title="">Company</a>
                    
                </li>
                <li class="menu-item-has-children">
                    <a href="/candidates" title="">Candidates</a>
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
						<li><a href="/company/profile" title=""><i class="la la-file-text"></i>Company Profile</a></li>
                        <li><a href="/company/manage-jobs" title=""><i class="la la-briefcase"></i>Manage Jobs</a></li>
                        <li><a href="/company/applicants" title=""><i class="la la-copy"></i>Applicants</a></li>
                        <li><a href="/company/interview-room" title=""><i class="la la-video-camera"></i>Interview Room</a></li>
						{{-- <li><a href="/company/transaction" title=""><i class="la la-money"></i>Transactions</a></li> --}}
						{{-- <li><a href="/company/resume" title=""><i class="la la-paper-plane"></i>Resumes</a></li> --}}
						{{-- <li><a href="/company/packages" title=""><i class="la la-user"></i>Packages</a></li> --}}
						<li><a href="/company/new-job" title=""><i class="la la-file-text"></i>Post a New Job</a></li>
						{{-- <li><a href="/company/job-alert" title=""><i class="la la-flash"></i>Job Alerts</a></li> --}}
						<li><a href="/company/account-setting" title=""><i class="la la-lock"></i>Account Setting</a></li>
						<li><a href="/logout" title=""><i class="la la-unlink"></i>Logout</a></li>
					</ul>
				</div>
                @elseif (Auth::user() && Auth::user()->isJobSeeker())
                <div class="btns-profiles-sec">
					<span><img src="http://placehold.it/50x50" alt="" /> {{  Auth::user()->username }} <i class="la la-angle-down"></i></span>
					<ul>
						<li><a href="/jobseeker/profile" title=""><i class="la la-file-text"></i>My Profile</a></li>
                        <li><a href="/jobseeker/resume" title=""><i class="la la-briefcase"></i>My Resume</a></li>
                        {{-- <li><a href="/jobseeker/add-resume" title=""><i class="la la-briefcase"></i>Add Resume</a></li> --}}
                        <li><a href="/jobseeker/template/list" title=""><i class="la la-briefcase"></i>CV Templates</a></li>
                        <li><a href="/jobseeker/add-resume" title=""><i class="la la-briefcase"></i>Add Resume</a></li>
						<li><a href="/jobseeker/shortlist" title=""><i class="la la-money"></i>Shorlisted Job</a></li>
                        <li><a href="/jobseeker/applied-job" title=""><i class="la la-paper-plane"></i>Applied Job</a></li>
                        <li><a href="/jobseeker/interview-room" title=""><i class="la la-video-camera"></i>Interview Room</a></li>
					    {{-- <li><a href="/jobseeker/job-notify" title=""><i class="la la-user"></i>Job Alerts</a></li> --}}
						<li><a href="/jobseeker/cover-letter" title=""><i class="la la-file-text"></i>Cover Letter & Video CV</a></li>
						<li><a href="/jobseeker/account-setting" title=""><i class="la la-lock"></i>Account Setting</a></li>
						<li><a href="/logout" title=""><i class="la la-unlink"></i>Logout</a></li>
					</ul>
				</div>
                @else
                <ul class="account-btns">
                    <li class="signup-popup"><a href="/signup" title=""><i class="la la-key"></i> Sign Up</a></li>
                    <li class="signin-popup"><a href="/login" title=""><i class="la la-external-link-square"></i> Login</a></li>
                </ul>
                @endif
            </div><!-- Btn Extras -->
            <nav>
                <ul>
                    <li class="menu-item-has-children">
                        <a href="/jobs" title="">Jobs</a>
                        
                    </li>
                    <li class="menu-item-has-children">
                        <a href="/company" title="">Company</a>
                        
                    </li>
                    <li class="menu-item-has-children">
                        <a href="/candidates" title="">Candidates</a>
                    </li>
                </ul>
            </nav><!-- Menus -->
        </div>
    </div>
</header>