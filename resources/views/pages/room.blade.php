<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Room</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
</head>
<body>

    <input type="hidden" id="role" value="{{ $role }}">
    <div class="container-fluid">
      <div class="row" id="room">
        <div id="participants" class="col-xs-12 col-sm-3 col-md-2" style="text-align: center"></div>
        <div id="active-participant" class="col-xs-12 col-sm-9 col-md-10" style="text-align: center">
          <div class="participant main">
            <video autoplay playsinline muted></video>
          </div>
        </div>
      </div>
      <div id="modals">
        <div class="modal fade" id="select-mic" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="select-mic-label" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="select-mic-label">Microphone</h5>
              </div>
              <div class="modal-body" style="text-align: center">
                <select style="width: 100%"></select>
                <svg focusable="false" viewBox="0 0 100 100" aria-hidden="true" height="100" width="100" style="margin: 20px 0 0 0">
                  <defs>
                    <clipPath id="level-indicator">
                      <rect x="0" y="100" width="100" height="100" />
                    </clipPath>
                  </defs>
                  <path fill="rgb(220, 220, 220)" d="m52 38v14c0 9.757-8.242 18-18 18h-8c-9.757 0-18-8.243-18-18v-14h-8v14c0 14.094 11.906 26 26 26v14h-17v8h42v-8h-17v-14c14.094 0 26-11.906 26-26v-14h-8z"></path>
                  <path fill="rgb(220, 220, 220)" d="m26 64h8c5.714 0 10.788-4.483 11.804-10h-11.887v-4h12.083v-4h-12.083v-4h12.083v-4h-12.083v-4h12.083v-4h-12.083v-4h12.083v-4h-12.083v-4h12.083v-4h-12.083v-4h11.887c-1.016-5.517-6.09-10-11.804-10h-8c-6.393 0-12 5.607-12 12v40c0 6.393 5.607 12 12 12z"></path>
                  <path fill="#080" clip-path="url(#level-indicator)" d="m52 38v14c0 9.757-8.242 18-18 18h-8c-9.757 0-18-8.243-18-18v-14h-8v14c0 14.094 11.906 26 26 26v14h-17v8h42v-8h-17v-14c14.094 0 26-11.906 26-26v-14h-8z"></path>
                  <path fill="#080" clip-path="url(#level-indicator)" d="m26 64h8c5.714 0 10.788-4.483 11.804-10h-11.887v-4h12.083v-4h-12.083v-4h12.083v-4h-12.083v-4h12.083v-4h-12.083v-4h12.083v-4h-12.083v-4h12.083v-4h-12.083v-4h11.887c-1.016-5.517-6.09-10-11.804-10h-8c-6.393 0-12 5.607-12 12v40c0 6.393 5.607 12 12 12z"></path>
                </svg>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary">Apply</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="select-camera" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="select-camera-label" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="select-camera-label">Camera</h5>
              </div>
              <div class="modal-body" style="text-align: center">
                <select style="width: 100%"></select>
                <video autoplay muted playsInline style="margin: 20px 0 0 0; width: 100%"></video>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary">Apply</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-primary site-footer">
        <button class="btn" id="leave-room"><img src="{{ asset('/images/end-call-button.png') }}" width="50" height="50"/></button>
    </div>
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> --}}
  </body>
@include('partials.footer_script')
<script src="{{ asset('js/twilio.js')  }}"></script>
<script>
  window.addEventListener('load', twilioVideo.isSupported ? selectCamera('{{ $accessToken }}','{{ $roomName }}') :  () => {
        showError($showErrorModal, new Error('This browser is not supported.'));
  });
</script>
</html>
