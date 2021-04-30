$(function() {
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
});
