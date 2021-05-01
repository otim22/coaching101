$(function() {
    /** Toggle sponsor icon button */
    $('#sponsorSomeoneId').click(function() {
        $(this).find('i').toggleClass('fa-plus-circle fa-minus-circle')
    });

    $('#sponsorSomeoneMonthlyId').click(function() {
        $(this).find('i').toggleClass('fa-plus-circle fa-minus-circle')
    });

    /**  Set input value for monthly sponsor */
    $('#monthly-tab').click(function() {
        $("#monthlyInterval").val("monthly")
    });
});
