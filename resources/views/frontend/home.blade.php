@extends('layouts.master')
@section('title', '2am Music Player')
@section('content')
    <div class="container">
        <div class="nowPlaying text-light text-center currentRunningMusic"></div>
        <!-- Audio Player Start -->
        <audio src="" class="audioPlayer mt-3">
            Your Browser does not support this player or audio.
        </audio>
        <!-- custom parts -->
        <div class="currentAndTotalTime text-center">00:00 / 00:00</div>
        <!-- progress bar -->
        <div id="progressBar">
            <div id="currentProgressBar"></div>
        </div>
        <!-- buttons -->
        <div class="musinControls">
            <i class="fas fa-step-backward controls previousBtn"></i>
            <i class="fas fa-play controls playBtn"></i>
            <i class="fas fa-pause controls pauseBtn"></i>
            <i class="fas fa-step-forward controls nextBtn"></i>
        </div>
        <!-- Audio Player End -->
    </div>
    <!-- Track List Start -->
    <div class="mt-5">
        <div class="text-light border-dark">
            <h3 class="text-center header">2am Play List</h3>
            <div class="playListSongs"></div>
        </div>
    </div>
    <!-- Track List End -->
    <!-- Tracks Start -->
    <input type="hidden" value="{{ $songs }}" name="tracks" id="tracks">
    <!-- Tracks End -->
@endsection
@section('script')
    <script src="{{ asset('assets/custom/js/script.js') }}"></script>
@endsection
