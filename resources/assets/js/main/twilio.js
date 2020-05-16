const AudioContext = window.AudioContext || window.webkitAudioContext;
const audioContext = AudioContext ? new AudioContext() : null;
const $modals = $("#modals");
const $selectMicModal = $("#select-mic", $modals);
const $selectCameraModal = $("#select-camera", $modals);
const $showErrorModal = $("#show-error", $modals);
const localTracks = {
    audio: null,
    video: null,
};
const connectOptions = {
    // Available only in Small Group or Group Rooms only. Please set "Room Type"
    // to "Group" or "Small Group" in your Twilio Console:
    // https://www.twilio.com/console/video/configure
    bandwidthProfile: {
        video: {
            dominantSpeakerPriority: "high",
            mode: "collaboration",
            renderDimensions: {
                high: { height: 720, width: 1280 },
                standard: { height: 90, width: 160 },
            },
        },
    },

    // Available only in Small Group or Group Rooms only. Please set "Room Type"
    // to "Group" or "Small Group" in your Twilio Console:
    // https://www.twilio.com/console/video/configure
    // dominantSpeaker: true,

    // Comment this line to disable verbose logging.
    logLevel: "debug",

    // Comment this line if you are playing music.
    maxAudioBitrate: 16000,

    // VP8 simulcast enables the media server in a Small Group or Group Room
    // to adapt your encoded video quality for each RemoteParticipant based on
    // their individual bandwidth constraints. This has no utility if you are
    // using Peer-to-Peer Rooms, so you can comment this line.
    preferredVideoCodecs: [{ codec: "VP8", simulcast: true }],

    // Capture 720p video @ 24 fps.
    video: { },
};
const deviceIds = {
    audio: localStorage.getItem("audioDeviceId"),
    video: localStorage.getItem("videoDeviceId"),
};
const $leave = $("#leave-room");
const $room = $("#room");
const $activeParticipant = $("div#active-participant > div.participant.main", $room);
const $activeVideo = $("video", $activeParticipant);
const $participants = $("div#participants", $room);
let activeParticipant = null;
let isActiveParticipantPinned = false;
window.selectCamera = async (accessToken, roomName) => {
    deviceIds.video = await selectMedia("video", $selectCameraModal, (stream) => {
        const $video = $("video", $selectCameraModal);
        $video.get(0).srcObject = stream;
    });
    connectOptions.name = roomName;
    connectOptions.video.deviceId = { exact: deviceIds.video };
    return selectMicrophone(accessToken);
};

async function selectMicrophone(accessToken) {
    deviceIds.audio = await selectMedia("audio", $selectMicModal, (stream) => {
        const $levelIndicator = $("svg rect", $selectMicModal);
        const maxLevel = Number($levelIndicator.attr("height"));
        micLevel(stream, maxLevel, (level) => $levelIndicator.attr("y", maxLevel - level));
    });
    connectOptions.audio = { deviceId: { exact: deviceIds.audio } };
    return joinRoom(accessToken, connectOptions);
}
async function joinRoom(token, connectOptions) {
    let role = $('#role').val();
    // Join to the Room with the given AccessToken and ConnectOptions.
    const room = await twilioVideo.connect(token, connectOptions);

    // Save the LocalVideoTrack.
    let localVideoTrack = Array.from(room.localParticipant.videoTracks.values())[0].track;

    // Make the Room available in the JavaScript console for debugging.
    window.room = room;

    // Handle the LocalParticipant's media.
    participantConnected(room.localParticipant, room);

    // Subscribe to the media published by RemoteParticipants already in the Room.
    room.participants.forEach((participant) => {
        participantConnected(participant, room);
    });

    // Subscribe to the media published by RemoteParticipants joining the Room later.
    room.on("participantConnected", (participant) => {
        participantConnected(participant, room);
    });

    // Handle a disconnected RemoteParticipant.
    room.on("participantDisconnected", (participant) => {
        participantDisconnected(participant, room);
    });
    

    // Set the current active Participant.
    setCurrentActiveParticipant(room);

    // Update the active Participant when changed, only if the user has not
    // pinned any particular Participant as the active Participant.
    // room.on("dominantSpeakerChanged", () => {
    //     if (!isActiveParticipantPinned) {
    //         setCurrentActiveParticipant(room);
    //     }
    // });

    // Leave the Room when the "Leave Room" button is clicked.
    $leave.click(function onLeave() {
        $leave.off("click", onLeave);
        room.disconnect();
    });

    return new Promise((resolve, reject) => {
        // Leave the Room when the "beforeunload" event is fired.
        window.onbeforeunload = () => {
            room.disconnect();
        };

        room.once("disconnected", (room, error) => {
            // Clear the event handlers on document and window..
            window.onbeforeunload = null;

            // Stop the LocalVideoTrack.
            localVideoTrack.stop();

            // Handle the disconnected LocalParticipant.
            participantDisconnected(room.localParticipant, room);

            // Handle the disconnected RemoteParticipants.
            room.participants.forEach((participant) => {
                participantDisconnected(participant, room);
            });

            // Clear the active Participant's video.
            $activeVideo.get(0).srcObject = null;

            // Clear the Room reference used for debugging from the JavaScript console.
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
}

/**
 * Set the active Participant's video.
 * @param participant - the active Participant
 */
function setActiveParticipant(participant) {
    if (activeParticipant) {
        const $activeParticipant = $(`div#${activeParticipant.sid}`, $participants);
        $activeParticipant.removeClass("active");
        $activeParticipant.removeClass("pinned");

        // Detach any existing VideoTrack of the active Participant.
        const { track: activeTrack } = Array.from(activeParticipant.videoTracks.values())[0] || {};
        if (activeTrack) {
            activeTrack.detach($activeVideo.get(0));
            $activeVideo.css("opacity", "0");
        }
    }

    // Set the new active Participant.
    activeParticipant = participant;
    const { identity, sid } = participant;
    const $participant = $(`div#${sid}`, $participants);

    $participant.addClass("active");
    if (isActiveParticipantPinned) {
        $participant.addClass("pinned");
    }

    // Attach the new active Participant's video.
    const { track } = Array.from(participant.videoTracks.values())[0] || {};
    if (track) {
        track.attach($activeVideo.get(0));
        $activeVideo.css("opacity", "");
    }

    // Set the new active Participant's identity
    $activeParticipant.attr("data-identity", identity);
}

/**
 * Set the current active Participant in the Room.
 * @param room - the Room which contains the current active Participant
 */
function setCurrentActiveParticipant(room) {
    const { dominantSpeaker, localParticipant } = room;
    setActiveParticipant(dominantSpeaker || localParticipant);
}

/**
 * Set up the Participant's media container.
 * @param participant - the Participant whose media container is to be set up
 * @param room - the Room that the Participant joined
 */
function setupParticipantContainer(participant, room) {
    const { identity, sid } = participant;

    // Add a container for the Participant's media.
    const $container = $(`<div class="participant" data-identity="${identity}" id="${sid}">
      <audio autoplay ${participant === room.localParticipant ? "muted" : ""} style="opacity: 0"></audio>
      <video autoplay muted playsinline style="opacity: 0"></video>
    </div>`);

    // Toggle the pinning of the active Participant's video.
    $container.on("click", () => {
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
            setVideoPriority(participant, "high");
            isActiveParticipantPinned = true;
            setActiveParticipant(participant);
        }
    });

    // Add the Participant's container to the DOM.
    $participants.append($container);
}

/**
 * Set the VideoTrack priority for the given RemoteParticipant. This has no
 * effect in Peer-to-Peer Rooms.
 * @param participant - the RemoteParticipant whose VideoTrack priority is to be set
 * @param priority - null | 'low' | 'standard' | 'high'
 */
function setVideoPriority(participant, priority) {
    participant.videoTracks.forEach((publication) => {
        const track = publication.track;
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
    const $media = $(`div#${participant.sid} > ${track.kind}`, $participants);
    $media.css("opacity", "");
    track.attach($media.get(0));

    // If the attached Track is a VideoTrack that is published by the active
    // Participant, then attach it to the main video as well.
    if (track.kind === "video" && participant === activeParticipant) {
        track.attach($activeVideo.get(0));
        $activeVideo.css("opacity", "");
    }
}

/**
 * Detach a Track from the DOM.
 * @param track - the Track to be detached
 * @param participant - the Participant that is publishing the Track
 */
function detachTrack(track, participant) {
    // Detach the Participant's Track from the thumbnail.
    const $media = $(`div#${participant.sid} > ${track.kind}`, $participants);
    $media.css("opacity", "0");
    track.detach($media.get(0));

    // If the detached Track is a VideoTrack that is published by the active
    // Participant, then detach it from the main video as well.
    if (track.kind === "video" && participant === activeParticipant) {
        track.detach($activeVideo.get(0));
        $activeVideo.css("opacity", "0");
    }
}

/**
 * Handle the Participant's media.
 * @param participant - the Participant
 * @param room - the Room that the Participant joined
 */
function participantConnected(participant, room) {
    // Set up the Participant's media container.
    setupParticipantContainer(participant, room);

    // Handle the TrackPublications already published by the Participant.
    participant.tracks.forEach((publication) => {
        trackPublished(publication, participant);
    });

    // Handle theTrackPublications that will be published by the Participant later.
    participant.on("trackPublished", (publication) => {
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
    }

    // Remove the Participant's media container.
    $(`div#${participant.sid}`, $participants).remove();
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
    }

    // Once the TrackPublication is subscribed to, attach the Track to the DOM.
    publication.on("subscribed", (track) => {
        attachTrack(track, participant);
    });

    // Once the TrackPublication is unsubscribed from, detach the Track from the DOM.
    publication.on("unsubscribed", (track) => {
        detachTrack(track, participant);
    });
}

function micLevel(stream, maxLevel, onLevel) {
    audioContext.resume().then(() => {
        const analyser = audioContext.createAnalyser();
        analyser.fftSize = 1024;
        analyser.smoothingTimeConstant = 0.5;

        const source = audioContext.createMediaStreamSource(stream);
        source.connect(analyser);
        const samples = new Uint8Array(analyser.frequencyBinCount);

        const track = stream.getTracks()[0];
        let level = null;

        requestAnimationFrame(function checkLevel() {
            analyser.getByteFrequencyData(samples);
            const rms = rootMeanSquare(samples);
            const log2Rms = rms && Math.log2(rms);
            const newLevel = Math.ceil((maxLevel * log2Rms) / 8);

            if (level !== newLevel) {
                level = newLevel;
                onLevel(level);
            }

            requestAnimationFrame(track.readyState === "ended" ? () => onLevel(0) : checkLevel);
        });
    });
}
function rootMeanSquare(samples) {
    const sumSq = samples.reduce((sumSq, sample) => sumSq + sample * sample, 0);
    return Math.sqrt(sumSq / samples.length);
}
async function applyInputDevice(kind, deviceId, render) {
    // Create a new LocalTrack from the given Device ID.
    const [track] = await twilioVideo.createLocalTracks({ [kind]: { deviceId } });

    // Stop the previous LocalTrack, if present.
    if (localTracks[kind]) {
        localTracks[kind].stop();
    }

    // Render the current LocalTrack.
    localTracks[kind] = track;
    render(new MediaStream([track.mediaStreamTrack]));
}

async function getInputDevices(kind) {
    const devices = await navigator.mediaDevices.enumerateDevices();
    return devices.filter((device) => device.kind === `${kind}input`);
}
async function selectMedia(kind, $modal, render) {
    const $apply = $("button", $modal);
    const $inputDevices = $("select", $modal);
    const setDevice = () => applyInputDevice(kind, $inputDevices.val(), render);

    // Get the list of available media input devices.
    let devices = await getInputDevices(kind);

    // Apply the default media input device.
    await applyInputDevice(kind, devices[0].deviceId, render);

    // If all device IDs and/or labels are empty, that means they were
    // enumerated before the user granted media permissions. So, enumerate
    // the devices again.
    if (devices.every(({ deviceId, label }) => !deviceId || !label)) {
        devices = await getInputDevices(kind);
    }

    // Populate the modal with the list of available media input devices.
    $inputDevices.html(
        devices.map(({ deviceId, label }) => {
            return `<option value="${deviceId}">${label}</option>`;
        })
    );

    return new Promise((resolve) => {
        $modal.on("shown.bs.modal", function onShow() {
            $modal.off("shown.bs.modal", onShow);

            // When the user selects a different media input device, apply it.
            $inputDevices.change(setDevice);

            // When the user clicks the "Apply" button, close the modal.
            $apply.click(function onApply() {
                $inputDevices.off("change", setDevice);
                $apply.off("click", onApply);
                $modal.modal("hide");
            });
        });

        // When the modal is closed, save the device ID.
        $modal.on("hidden.bs.modal", function onHide() {
            $modal.off("hidden.bs.modal", onHide);

            // Stop the LocalTrack, if present.
            if (localTracks[kind]) {
                localTracks[kind].stop();
                localTracks[kind] = null;
            }

            // Resolve the Promise with the saved device ID.
            const deviceId = $inputDevices.val();
            localStorage.setItem(`${kind}DeviceId`, deviceId);
            resolve(deviceId);
        });

        // Show the modal.
        $modal.modal({
            backdrop: "static",
            focus: true,
            keyboard: false,
            show: true,
        });
    });
}

function showError($modal, error) {
    // Add the appropriate error message to the alert.
    $("div.alert", $modal).html(getUserFriendlyError(error));
    $modal.modal({
        backdrop: "static",
        focus: true,
        keyboard: false,
        show: true,
    });
}

