@if ($role=== 'COMPANY')
    @include('layouts.company_profile')
@else
    @include('layouts.jobseeker_profile')
@endif