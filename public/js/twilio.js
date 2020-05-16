/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/main/twilio.js":
/*!********************************************!*\
  !*** ./resources/assets/js/main/twilio.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var CAREER24H;
if (!CAREER24H) CAREER24H = {};
if (!CAREER24H.twilio) CAREER24H.twilio = {};

(function ($) {
  var func = CAREER24H.twilio;
  var connectOptions = {
    // Available only in Small Group or Group Rooms only. Please set "Room Type"
    // to "Group" or "Small Group" in your Twilio Console:
    // https://www.twilio.com/console/video/configure
    bandwidthProfile: {
      video: {
        dominantSpeakerPriority: 'high',
        mode: 'collaboration',
        renderDimensions: {
          high: {
            height: 720,
            width: 1280
          },
          standard: {
            height: 90,
            width: 160
          }
        }
      }
    },
    // Available only in Small Group or Group Rooms only. Please set "Room Type"
    // to "Group" or "Small Group" in your Twilio Console:
    // https://www.twilio.com/console/video/configure
    dominantSpeaker: true,
    // Comment this line to disable verbose logging.
    logLevel: 'debug',
    // Comment this line if you are playing music.
    maxAudioBitrate: 16000,
    // VP8 simulcast enables the media server in a Small Group or Group Room
    // to adapt your encoded video quality for each RemoteParticipant based on
    // their individual bandwidth constraints. This has no utility if you are
    // using Peer-to-Peer Rooms, so you can comment this line.
    preferredVideoCodecs: [{
      codec: 'VP8',
      simulcast: true
    }],
    // For desktop browsers, capture 720p video @ 24 fps.
    video: {
      height: 720,
      frameRate: 24,
      width: 1280
    }
  };
  var $leave = $('#leave-room');
  var $room = $('#room');
  var $activeParticipant = $('div#active-participant > div.participant.main', $room);
  var $activeVideo = $('video', $activeParticipant);
  var $participants = $('div#participants', $room);
  var activeParticipant = null;
  var isActiveParticipantPinned = false;

  func.joinRoom = function (token) {
    twilioVideo.connect(token, connectOptions).then(function (room) {
      // Save the LocalVideoTrack.
      var localVideoTrack = Array.from(room.localParticipant.videoTracks.values())[0].track; // Make the Room available in the JavaScript console for debugging.

      window.room = room; // Handle the LocalParticipant's media.

      participantConnected(room.localParticipant, room); // Subscribe to the media published by RemoteParticipants already in the Room.

      room.participants.forEach(function (participant) {
        participantConnected(participant, room);
      }); // Subscribe to the media published by RemoteParticipants joining the Room later.

      room.on('participantConnected', function (participant) {
        participantConnected(participant, room);
      }); // Handle a disconnected RemoteParticipant.

      room.on('participantDisconnected', function (participant) {
        participantDisconnected(participant, room);
      }); // Set the current active Participant.

      setCurrentActiveParticipant(room); // Update the active Participant when changed, only if the user has not
      // pinned any particular Participant as the active Participant.

      room.on('dominantSpeakerChanged', function () {
        if (!isActiveParticipantPinned) {
          setCurrentActiveParticipant(room);
        }
      }); // Leave the Room when the "Leave Room" button is clicked.

      $leave.click(function onLeave() {
        $leave.off('click', onLeave);
        room.disconnect();
      });
      return new Promise(function (resolve, reject) {
        // Leave the Room when the "beforeunload" event is fired.
        window.onbeforeunload = function () {
          room.disconnect();
        };

        room.once('disconnected', function (room, error) {
          // Clear the event handlers on document and window..
          window.onbeforeunload = null; // Stop the LocalVideoTrack.

          localVideoTrack.stop(); // Handle the disconnected LocalParticipant.

          participantDisconnected(room.localParticipant, room); // Handle the disconnected RemoteParticipants.

          room.participants.forEach(function (participant) {
            participantDisconnected(participant, room);
          }); // Clear the active Participant's video.

          $activeVideo.get(0).srcObject = null; // Clear the Room reference used for debugging from the JavaScript console.

          window.room = null;

          if (error) {
            // Reject the Promise with the TwilioError so that the Room selection
            // modal (plus the TwilioError message) can be displayed.
            reject(error);
          } else {
            // Resolve the Promise so that the Room selection modal can be
            // displayed.
            resolve();
          }
        });
      });
    });
  };

  function setActiveParticipant(participant) {
    if (activeParticipant) {
      var _$activeParticipant = $("div#".concat(activeParticipant.sid), $participants);

      _$activeParticipant.removeClass('active');

      _$activeParticipant.removeClass('pinned'); // Detach any existing VideoTrack of the active Participant.


      var _ref = Array.from(activeParticipant.videoTracks.values())[0] || {},
          activeTrack = _ref.track;

      if (activeTrack) {
        activeTrack.detach($activeVideo.get(0));
        $activeVideo.css('opacity', '0');
      }
    } // Set the new active Participant.


    activeParticipant = participant;
    var identity = participant.identity,
        sid = participant.sid;
    var $participant = $("div#".concat(sid), $participants);
    $participant.addClass('active');

    if (isActiveParticipantPinned) {
      $participant.addClass('pinned');
    } // Attach the new active Participant's video.


    var _ref2 = Array.from(participant.videoTracks.values())[0] || {},
        track = _ref2.track;

    if (track) {
      track.attach($activeVideo.get(0));
      $activeVideo.css('opacity', '');
    } // Set the new active Participant's identity


    $activeParticipant.attr('data-identity', identity);
  }
  /**
   * Set the current active Participant in the Room.
   * @param room - the Room which contains the current active Participant
   */


  function setCurrentActiveParticipant(room) {
    var dominantSpeaker = room.dominantSpeaker,
        localParticipant = room.localParticipant;
    setActiveParticipant(dominantSpeaker || localParticipant);
  }
  /**
   * Set up the Participant's media container.
   * @param participant - the Participant whose media container is to be set up
   * @param room - the Room that the Participant joined
   */


  function setupParticipantContainer(participant, room) {
    var identity = participant.identity,
        sid = participant.sid; // Add a container for the Participant's media.

    var $container = $("<div class=\"participant\" data-identity=\"".concat(identity, "\" id=\"").concat(sid, "\">\n          <audio autoplay ").concat(participant === room.localParticipant ? 'muted' : '', " style=\"opacity: 0\"></audio>\n          <video autoplay muted playsinline style=\"opacity: 0\"></video>\n        </div>")); // Toggle the pinning of the active Participant's video.

    $container.on('click', function () {
      if (activeParticipant === participant && isActiveParticipantPinned) {
        // Unpin the RemoteParticipant and update the current active Participant.
        setVideoPriority(participant, null);
        isActiveParticipantPinned = false;
        setCurrentActiveParticipant(room);
      } else {
        // Pin the RemoteParticipant as the active Participant.
        if (isActiveParticipantPinned) {
          setVideoPriority(activeParticipant, null);
        }

        setVideoPriority(participant, 'high');
        isActiveParticipantPinned = true;
        setActiveParticipant(participant);
      }
    }); // Add the Participant's container to the DOM.

    $participants.append($container);
  }
  /**
   * Set the VideoTrack priority for the given RemoteParticipant. This has no
   * effect in Peer-to-Peer Rooms.
   * @param participant - the RemoteParticipant whose VideoTrack priority is to be set
   * @param priority - null | 'low' | 'standard' | 'high'
   */


  function setVideoPriority(participant, priority) {
    participant.videoTracks.forEach(function (publication) {
      var track = publication.track;

      if (track && track.setPriority) {
        track.setPriority(priority);
      }
    });
  }
  /**
   * Attach a Track to the DOM.
   * @param track - the Track to attach
   * @param participant - the Participant which published the Track
   */


  function attachTrack(track, participant) {
    // Attach the Participant's Track to the thumbnail.
    var $media = $("div#".concat(participant.sid, " > ").concat(track.kind), $participants);
    $media.css('opacity', '');
    track.attach($media.get(0)); // If the attached Track is a VideoTrack that is published by the active
    // Participant, then attach it to the main video as well.

    if (track.kind === 'video' && participant === activeParticipant) {
      track.attach($activeVideo.get(0));
      $activeVideo.css('opacity', '');
    }
  }
  /**
   * Detach a Track from the DOM.
   * @param track - the Track to be detached
   * @param participant - the Participant that is publishing the Track
   */


  function detachTrack(track, participant) {
    // Detach the Participant's Track from the thumbnail.
    var $media = $("div#".concat(participant.sid, " > ").concat(track.kind), $participants);
    $media.css('opacity', '0');
    track.detach($media.get(0)); // If the detached Track is a VideoTrack that is published by the active
    // Participant, then detach it from the main video as well.

    if (track.kind === 'video' && participant === activeParticipant) {
      track.detach($activeVideo.get(0));
      $activeVideo.css('opacity', '0');
    }
  }
  /**
   * Handle the Participant's media.
   * @param participant - the Participant
   * @param room - the Room that the Participant joined
   */


  function participantConnected(participant, room) {
    // Set up the Participant's media container.
    setupParticipantContainer(participant, room); // Handle the TrackPublications already published by the Participant.

    participant.tracks.forEach(function (publication) {
      trackPublished(publication, participant);
    }); // Handle theTrackPublications that will be published by the Participant later.

    participant.on('trackPublished', function (publication) {
      trackPublished(publication, participant);
    });
  }
  /**
   * Handle a disconnected Participant.
   * @param participant - the disconnected Participant
   * @param room - the Room that the Participant disconnected from
   */


  function participantDisconnected(participant, room) {
    // If the disconnected Participant was pinned as the active Participant, then
    // unpin it so that the active Participant can be updated.
    if (activeParticipant === participant && isActiveParticipantPinned) {
      isActiveParticipantPinned = false;
      setCurrentActiveParticipant(room);
    } // Remove the Participant's media container.


    $("div#".concat(participant.sid), $participants).remove();
  }
  /**
   * Handle to the TrackPublication's media.
   * @param publication - the TrackPublication
   * @param participant - the publishing Participant
   */


  function trackPublished(publication, participant) {
    // If the TrackPublication is already subscribed to, then attach the Track to the DOM.
    if (publication.track) {
      attachTrack(publication.track, participant);
    } // Once the TrackPublication is subscribed to, attach the Track to the DOM.


    publication.on('subscribed', function (track) {
      attachTrack(track, participant);
    }); // Once the TrackPublication is unsubscribed from, detach the Track from the DOM.

    publication.on('unsubscribed', function (track) {
      detachTrack(track, participant);
    });
  }
})(jQuery);

/***/ }),

/***/ 2:
/*!**************************************************!*\
  !*** multi ./resources/assets/js/main/twilio.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/rana/Desktop/Rana/Personal/Projects/career24h/resources/assets/js/main/twilio.js */"./resources/assets/js/main/twilio.js");


/***/ })

/******/ });