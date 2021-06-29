<div>
    <video id="topic_video_player"
                poster="{{ $topic->getFirstMediaUrl('thumb') }}"
                class="video-js vjs-fluid vjs-big-play-centered">
        <source src="{{ asset($topic->getFirstMediaUrl('content_file')) }}" type='video/mp4'>
        <p class="vjs-no-js">
            To view this video please enable JavaScript, and consider upgrading to a
            web browser that
            <a href="https://videojs.com/html5-video-support/" target="_blank">
                supports HTML5 video
            </a>
        </p>
    </video>
</div>
