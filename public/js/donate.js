$(function() {
    let url = location.href.replace(/\/$/, "");

    if (location.hash) {
        const hash = url.split("#");
        $('#nav-tab a[href="#'+hash[1]+'"]').tab("show");
        url = location.href.replace(/\/#/, "#");
        history.replaceState(null, null, url);

        setTimeout(() => {
            $(window).scrollTop(0);
        }, 400);
    }

    $('a[data-toggle="tab"]').on("click", function() {
        let newUrl;
        const hash = $(this).attr("href");

        if(hash == "#home") {
            newUrl = url.split("#")[0];
        }   else {
            newUrl = url.split("#")[0] + hash;
        }

        newUrl += "/";
        history.replaceState(null, null, newUrl);
    });

    /** Toggle sponsor icon button */
    $('#sponsorSomeoneId').click(function() {
        $(this).find('i').toggleClass('fa-plus-circle fa-minus-circle')
    });

    /**  Set input value for monthly sponsor */
    $('#monthly-tab').click(function() {
        $("#monthlyInterval").val("monthly")
    });
});
