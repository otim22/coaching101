$(function() {
    const sixty = 60

    function handleTimeInSeconds(timeInSeconds) {
        if(timeInSeconds < sixty) {
            return '00:00:'+addZero(timeInSeconds)
        } else {
            if(timeInSeconds / sixty < sixty) {
                const mins = Math.floor(timeInSeconds / sixty)
                const timeLeft = timeInSeconds - mins * sixty

                return `00:${addZero(mins)}:${addZero(timeLeft)}`
            } else {
                const hours = Math.floor(timeInSeconds / sixty / sixty)
                const mins = Math.floor(timeInSeconds / sixty - hours * sixty)
                const secs = timeInSeconds - mins * sixty - hours * sixty * sixty

                return `${addZero(hours)}:${addZero(mins)}:${addZero(secs)}`
            }
        }
    }

    function countdown(timeInMinutes) {
        let timeInSeconds = timeInMinutes * sixty
        
        function tick() {
            var counter = document.getElementById("timer")
            duration = timeInSeconds == 0 ? 0 :  timeInSeconds--

            if (duration < sixty) {
                $("#timer").css({ color: "red" })
                $("#clock-image").css({ color: "red" })
            }

            counter.innerHTML = handleTimeInSeconds(duration)
            localStorage.setItem('saved_countdown', (duration / sixty))

            if (duration > 0) {
                setTimeout(tick, 1000)
            } else {
                let hiddenSave = $('#hidden-save')
                let visibleNext = $('#visible-next')
                let visiblePrev = $('#visible-prev')
                let hiddenTimeRemainder = $('#hidden-timeup')

                hiddenSave.removeClass('hidden')
                hiddenTimeRemainder.removeClass('hidden')
                visibleNext.addClass('hidden')
                visiblePrev.addClass('hidden')
                disableOptions()
            }
        }
        tick()
    }

    function disableOptions() {
        let elem = document.getElementsByClassName('exam-check')
        for (let i = 0; i < elem.length; i++) {
            elem[i].disabled = true;
        }
    }

    function addZero(timeLeft) {
        let time = timeLeft.toString()
        return time.length > 1 ? time : "0" + time
    }

    let duration = 1
    let saved_countdown = localStorage.getItem('saved_countdown')

    if(saved_countdown != null) {
        duration = saved_countdown;
    }

    countdown(duration)
})
