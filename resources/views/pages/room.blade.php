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
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsible-content" aria-controls="collapsible-content" aria-expanded="false" aria-label="Toggle Navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsible-content">
        <button class="btn btn-outline-primary" id="leave-room">Leave Room</button>
      </div>
    </nav>
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
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="select-mic-label">Microphone</h5>
              </div>
              <div class="modal-body" style="text-align: center">
                <select style="width: 100%"></select>
                <svg focusable="false" viewBox="0 0 100 100" aria-hidden="true" height="100" width="100" style="margin: 10px 0">
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
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="select-camera-label">Camera</h5>
              </div>
              <div class="modal-body" style="text-align: center">
                <select style="width: 100%"></select>
                <video autoplay muted playsInline style="margin: 10px 0; width: 60%"></video>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary">Apply</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="join-room" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="join-room-label" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="join-room-label">Video Chat</h5>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label id="room-name-label" for="room-name">Room Name</label>
                  <input id="room-name" class="form-control" type="text" />
                </div>
                <div class="form-group">
                  <label id="screen-name-label" for="screen-name">User Name</label>
                  <input id="screen-name" class="form-control" type="text" />
                </div>
                <div class="alert alert-warning" role="alert">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-dark">Change Microphone and Camera</button>
                <button type="button" class="btn btn-primary">Join</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="show-error" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="show-error-label" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="show-error-label">Error</h5>
              </div>
              <div class="modal-body">
                <div class="alert alert-warning" role="alert">
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
@include('partials.footer_script')
<script src="{{ asset('js/twilio.js')  }}"></script>
<script>
    window.addEventListener('load', CAREER24H.twilio.joinRoom('{{ $accessToken }})'));
</script>
</html>
