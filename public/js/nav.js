$(function() {
    /** Start of search js */
    var navItems = $('#navbarSupportedContent');
    var smSearch = $('#smSearch');
    var smCart = $('#smCart');
    var smInitials = $('#smInitials');
    var navbarToggler = $('#navbarButtonToggler');
    var search = $('#search-bar');

     // open search
    $('[data-toggle=search-form]').click(function() {
        navItems.attr("style","display:none !important");
        navbarToggler.attr("style","display:none !important");
        search.removeAttr('style');
        $('.top-search .search').focus();
    });

    $('#navbarSupportedContentOther .sm-search').on('click', 'a', function () {
        navItems.attr("style","display:none !important");
        navbarToggler.attr("style","display:none !important");
        smSearch.attr("style","display:none !important");
        smCart.attr("style","display:none !important");
        smInitials.attr("style","display:none !important");
        search.removeAttr('style');
    });

     // close search
    $('[data-toggle=search-form-close]').click(function() {
        search.addClass("hidden");
        navItems.removeAttr('style');
        smSearch.removeAttr('style');
        smCart.removeAttr('style');
        smInitials.removeAttr('style');
        navbarToggler.removeAttr('style');
    });
    /** End of search js */

    /** Start of standard js */
    $(".std-menu .uniqueStandard").on("click", function() {
        var standardUrl = $(this).attr("data-standard-url");
        var standardId = $(this).attr("data-standard-id");

        activateStandard(standardUrl, standardId);
    });
    function activateStandard(standardUrl, standardId) {
        $.ajax({
            type: "POST",
            url: standardUrl,
            dataType: "JSON",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: standardId,
            },
            success: function (response) {
                document.location.reload(true);
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }
    /** End of standard js */
});

/** Start sticky navbar  */
document.addEventListener("DOMContentLoaded", function() {
    window.addEventListener('scroll', function() {
        if (window.scrollY > 80) {
            document.getElementById('navbar_top').classList.add('fixed-top');
            document.getElementById('navbar_top').classList.add('nav-fade-down');
            navbar_height = document.querySelector('.navbar').offsetHeight;
            document.body.style.paddingTop = navbar_height + 'px';
        } else {
            document.getElementById('navbar_top').classList.remove('fixed-top');
            document.getElementById('navbar_top').classList.remove('nav-fade-down');
            document.body.style.paddingTop = '0';
        }
    });
});
/** End sticky navbar  */
