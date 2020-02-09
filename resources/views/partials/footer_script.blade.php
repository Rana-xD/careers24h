<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/modernizr.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/script.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/wow.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/slick.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/parallax.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/select-chosen.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.scrollbar.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/libraries.js')  }}"></script>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCYc537bQom7ajFpWE5sQaVyz1SQa9_tuY&sensor=true&libraries=places"></script>
<script src="{{ asset("js/maps2.js") }}" type="text/javascript"></script>
<script src="{{ asset('js/combined.js')  }}"></script>
@if (Auth::user() && Auth::user()->isCompany())
<script src="{{ asset('js/auth_company.js')  }}"></script>
@elseif(Auth::user() && Auth::user()->isJobSeeker())
<script src="{{ asset('js/auth_jobseeker.js')  }}"></script>    
@endif