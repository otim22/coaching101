$(function() {
    /** Start of search js */
    var navItems = $('#navbarSupportedContent');
    var smSearch = $('#smSearch');
    var smCart = $('#smCart');
    var smInitials = $('#smInitials');
    var navbarToggler = $('#navbarButtonToggler');
    var search = $('#search-bar');

     // open search
    $('nav .navbar-nav li.search').on('click', 'a', function (e) {
        navItems.attr("style","display:none !important");
        navbarToggler.attr("style","display:none !important");
        search.removeAttr('style');
     	e.preventDefault();
    });

    $('#navbarSupportedContentOther .sm-search').on('click', 'a', function (e) {
        navItems.attr("style","display:none !important");
        navbarToggler.attr("style","display:none !important");
        smSearch.attr("style","display:none !important");
        smCart.attr("style","display:none !important");
        smInitials.attr("style","display:none !important");
        search.removeAttr('style');
     	e.preventDefault();
    });

     // close search
    $(document).mouseup(function (e) {
        var container = $('.search-bar form');
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            search.attr("style","display:none !important");
            navItems.removeAttr('style');
            smSearch.removeAttr('style');
            smCart.removeAttr('style');
            smInitials.removeAttr('style');
            navbarToggler.removeAttr('style');
        }
    });
    /** End of search js */

    /** Start of standard js */
    $(".dropdown-menu .uniqueStandard").on("click", function() {
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
