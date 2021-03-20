$(document).ready(function() {
    $('#hidden-social-1').stop().hide();
    $('#hidden-social-2').stop().hide();
    $('#hidden-social-3').stop().hide();
    
    $("#team-1").mouseenter(function() {
        $('#hidden-social-1').stop().show();
    });
    $("#team-2").mouseenter(function() {
        $('#hidden-social-2').stop().show();
    });
    $("#team-3").mouseenter(function() {
        $('#hidden-social-3').stop().show();
    });

    $("#team-1, #hidden-social-1").mouseleave(function() {
        if(!$('#hidden-social-1').is(':hover')) {
            $('#hidden-social-1').hide();
        };
    });
    $("#team-2, #hidden-social-2").mouseleave(function() {
        if(!$('#hidden-social-2').is(':hover')) {
            $('#hidden-social-2').hide();
        };
    });
    $("#team-3, #hidden-social-3").mouseleave(function() {
        if(!$('#hidden-social-3').is(':hover')) {
            $('#hidden-social-3').hide();
        };
    });
});
