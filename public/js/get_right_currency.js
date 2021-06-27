$(function() {
    /** Start getting currency from standard **/
    $("select.standard").change(function() {
        let selectedStandardId = $(this).children("option:selected").val();
        getRightCurrency(selectedStandardId);
    });

    function getRightCurrency(selectedStandardId) {
        $.ajax({
            type: "GET",
            url: "/teacher/get-right-currency/" + selectedStandardId,
            dataType: "JSON",
            success: function (response) {
                $("#currency").empty();
                if(response["name"] == "USD") {
                    $("#currency").append("<span>USD</span>");
                } else if(response["name"] == "UGX"){
                    $("#currency").append("<span>UGX</span>");
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }
    /** End getting currency from standard */
});
