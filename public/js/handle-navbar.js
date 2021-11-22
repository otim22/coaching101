/** Start sticky navbar  */
document.addEventListener("DOMContentLoaded", function() {
    var lastScrollTop = 0;
    $(window).scroll(function(event) {
        var scroll = $(window).scrollTop();
        if (scroll >= 100) {
            document.getElementById('navbar_top').classList.add('nav-fade-down')
            document.getElementById('navbar_top').classList.add('fixed-top')

            if (scroll > lastScrollTop) {
               // downscroll code
               document.getElementById('top-bar').classList.remove('nav-fade-down')
               document.getElementById('top-bar').classList.remove('fixed-top')
               document.getElementById('navbar_top').classList.add('fixed-top')
            } else {
                // upscroll code
                document.getElementById('navbar_top').classList.remove('nav-fade-down')
                document.getElementById('navbar_top').classList.remove('fixed-top')
                document.getElementById('top-bar').classList.add('nav-fade-down')
                document.getElementById('top-bar').classList.add('fixed-top')
            }
            lastScrollTop = scroll;
        } else {
            document.getElementById('navbar_top').classList.remove('nav-fade-down')
            document.getElementById('navbar_top').classList.remove('fixed-top')
        }
    })
})
/** End sticky navbar  */
