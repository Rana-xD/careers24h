<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="{{ asset('js/modernizr.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/script.js') }}" type="text/javascript"></script>
{{-- <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script> --}}
<script src="{{ asset('js/wow.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/slick.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/parallax.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/select-chosen.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.scrollbar.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/libraries.js')  }}"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-bs4.min.js"></script>
{{-- <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCYc537bQom7ajFpWE5sQaVyz1SQa9_tuY&sensor=true&libraries=places"></script>
<script src="{{ asset("js/maps2.js") }}" type="text/javascript"></script> --}}
<script src="{{ asset('js/combined.js')  }}"></script>
@if (Auth::user() && Auth::user()->isCompany())
<script src="{{ asset('js/auth_company.js')  }}"></script>
@elseif(Auth::user() && Auth::user()->isJobSeeker())
<script src="{{ asset('js/auth_jobseeker.js')  }}"></script>    
@endif