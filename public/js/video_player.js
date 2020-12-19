$(function () {
    var player = videojs(document.querySelector('.video-js'), {
        controls: true,
        preload: 'auto',
        controlslist: 'nodownload',
        playbackRates: [0.25, 0.5, 0.75, 1, 1.25, 1.5, 1.75, 2],
    });

    console.log(player)

    // Play through the playlist automatically.
    // player.autoadvance(0);
});
