/* Music Player */
/* Elements */
const playListSongsElement = document.getElementsByClassName(
    "playListSongs"
)[0];
const currentProgressBarElement = document.getElementById("currentProgressBar");
const nowPlayingElement = document.getElementsByClassName("nowPlaying")[0];

/* controls buttons */
const playButton = document.getElementsByClassName("playBtn")[0];
const pauseButton = document.getElementsByClassName("pauseBtn")[0];
const nextButton = document.getElementsByClassName("nextBtn")[0];
const previousButton = document.getElementsByClassName("previousBtn")[0];

/* audio player */
const audioPlayer = document.getElementsByClassName("audioPlayer")[0];

/* progress bar */
const currentProgressBar = document.getElementById("currentProgressBar");

/* current & total time bar */
const playInfo = document.getElementsByClassName("currentAndTotalTime")[0];

/* song tracks */
const tracksString = document.getElementById("tracks").value;
const tracks = JSON.parse(tracksString);
// console.log("here is ", tracksArray[0].title);

/* tracks list */
for (let i = 0; i < tracks.length; i++) {
    const trackTag = document.createElement("div");
    trackTag.addEventListener("click", () => {
        currentPlayingIndex = i;
        isPlaying = true;
        playSong();
        updatePlayPauseButtons();
        nowPlayingElement.textContent = currentPlaying(currentPlayingIndex);
    });
    trackTag.classList.add("mb-1", "mt-3", "tracks");
    const title = (i + 1).toString() + ". " + tracks[i].title;
    trackTag.textContent = title;
    playListSongsElement.append(trackTag);
}

/* ---------------- Player Start---------------- */
let duration = 0;
let durationText = "00:00";

audioPlayer.addEventListener("loadeddata", () => {
    duration = Math.floor(audioPlayer.duration);
    durationText = generatePlayInfo(duration);
});

audioPlayer.addEventListener("timeupdate", () => {
    const currentTime = Math.floor(audioPlayer.currentTime);
    const currentTimeText = generatePlayInfo(currentTime);
    const playInformation = currentTimeText + " / " + durationText;

    playInfo.textContent = playInformation;
    calculatePlayInfo(currentTime);
});

/* ---------------- Player End---------------- */

/* ---------------- buttons func start---------------- */

let isPlaying = false;
let currentPlayingIndex = 0;
//play button
playButton.addEventListener("click", () => {
    const currentDurationSeconds = Math.floor(audioPlayer.currentTime);
    isPlaying = true;
    if (currentDurationSeconds === 0) {
        playSong();
        updatePlayPauseButtons();
        nowPlayingElement.textContent = currentPlaying(currentPlayingIndex);
    } else {
        audioPlayer.play();
        updatePlayPauseButtons();
        nowPlayingElement.textContent = currentPlaying(currentPlayingIndex);
    }
});

//pause button
pauseButton.addEventListener("click", () => {
    isPlaying = false;
    audioPlayer.pause();
    updatePlayPauseButtons();
});

//previous button
previousButton.addEventListener("click", () => {
    if (currentPlayingIndex === 0) {
        return;
    }
    currentPlayingIndex -= 1;
    playSong();
    nowPlayingElement.textContent = currentPlaying(currentPlayingIndex);
});

//next button
nextButton.addEventListener("click", () => {
    if (currentPlayingIndex === tracks.length - 1) {
        return;
    }
    currentPlayingIndex += 1;
    playSong();
    nowPlayingElement.textContent = currentPlaying(currentPlayingIndex);
});

/* ---------------- buttons func end ---------------- */

/* ---------------- Functions Start---------------- */

/* PlaySong Func */
const playSong = () => {
    const songToPlay = tracks[currentPlayingIndex].path;
    audioPlayer.src = songToPlay;
    audioPlayer.play();
};

/* Update Play Pause Btn Func */
const updatePlayPauseButtons = () => {
    if (isPlaying === true) {
        playButton.style.display = "none";
        pauseButton.style.display = "inline";
    } else {
        playButton.style.display = "inline";
        pauseButton.style.display = "none";
    }
};

/* Generate Play Information  */
const generatePlayInfo = totalDuration => {
    // console.log("duration", totalDuration);
    const minutes = Math.floor(totalDuration / 60);
    const seconds = totalDuration % 60;

    const minuteText = minutes < 10 ? "0" + minutes.toString() : minutes;
    const secondText = seconds < 10 ? "0" + seconds.toString() : seconds;
    // console.log(minuteText, "_", secondText);
    return minuteText + ": " + secondText;
};

/* Calculate Play Information Func */
const calculatePlayInfo = currentTime => {
    const currentProgressWidth = (360 / duration) * currentTime;
    currentProgressBarElement.style.width =
        currentProgressWidth.toString() + "px";
};

/* current playing song name func */
const currentPlaying = currentIndex => {
    return tracks[currentIndex].title;
};
/* ---------------- Functions End---------------- */
