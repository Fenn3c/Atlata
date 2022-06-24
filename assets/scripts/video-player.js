let playing = false;
let isDragging = false;
const video = document.getElementById('video')
const pauseable = document.getElementById('pauseable')
const playBtn = document.getElementById('play')
const playBtnSmall = document.getElementById('play-small')
const stopBtnSmall = document.getElementById('stop-small')
const volumeBtn = document.getElementById('volume')
const volumeOffBtn = document.getElementById('volume-off')
const fullscreen = document.getElementById('fullscreen')
const timer = document.getElementById('timer')
const videoProgress = document.getElementById('video-progress')


function switchState() {
    playBtn.classList.toggle('hidden')
    playBtnSmall.classList.toggle('hidden')
    stopBtnSmall.classList.toggle('hidden')
    if (playing) {
        video.pause()
        playing = false
    } else {
        video.play()
        playing = true
    }
}


video.addEventListener('ended', () => {
    video.pause()
    playing = false
})
pauseable.addEventListener('click', () => {
    switchState()
})
document.addEventListener('keyup', (e) => {
    if (e.code === 'Space') {
        e.preventDefault();
        switchState()
    }
})
playBtnSmall.addEventListener('click', (e) => {
    e.preventDefault();
    switchState()
})
playBtn.addEventListener('click', (e) => {
    e.preventDefault();
    switchState()
})
stopBtnSmall.addEventListener('click', (e) => {
    e.preventDefault();
    switchState()
})
volumeBtn.addEventListener('click', (e) => {
    e.preventDefault();
    volumeBtn.classList.toggle('hidden')
    volumeOffBtn.classList.toggle('hidden')
    video.muted = true
})
volumeOffBtn.addEventListener('click', (e) => {
    e.preventDefault();
    volumeBtn.classList.toggle('hidden')
    volumeOffBtn.classList.toggle('hidden')
    video.muted = false

})
fullscreen.addEventListener('click', (e) => {
    e.preventDefault();
    console.log(e.target)
    video.requestFullscreen()
})

function formatTime(seconds) {
    minutes = Math.floor(seconds / 60);
    minutes = (minutes >= 10) ? minutes : "0" + minutes;
    seconds = Math.floor(seconds % 60);
    seconds = (seconds >= 10) ? seconds : "0" + seconds;
    return minutes + ":" + seconds;
}

videoProgress.addEventListener('mousedown', (e) => {
    isDragging = true;
    console.log('start')
})
videoProgress.addEventListener('mouseup', (e) => {
    isDragging = false;
    console.log('end')
})

video.addEventListener("timeupdate", (e) => {
    if (!isDragging) {
        videoProgress.value = video.currentTime * 1000
        videoProgress.max = video.duration * 1000
        timer.innerHTML = `${formatTime(video.currentTime)} / ${formatTime(video.duration)}`;
    }
});
videoProgress.addEventListener('change', (e) => {
    video.currentTime = e.target.value / 1000;
})