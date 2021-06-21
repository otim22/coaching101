$(function() {
    /** Start Filter levels by standards **/
    $("select.standard").change(function() {
        var selectedStandardId = $(this).children("option:selected").val();
        getMatchingLevelsToStandard(selectedStandardId)
    });

    function getMatchingLevelsToStandard(selectedStandardId) {
        $.ajax({
            type: "GET",
            url: "get-matching-levels-to-standard/" + selectedStandardId,
            dataType: "JSON",
            success: function (response) {
                console.log(response)
                var len = response.length;
                $("#level_id").empty();
                if(len > 0) {
                    $("#level_id").append("<option selected>Select level</option>");
                    for(var i = 0; i < len; i++) {
                        var id = response[i]['id'];
                        var name = response[i]['name'];
                        $("#level_id").append("<option value='"+id+"'>"+name+"</option>");
                    }
                } else {
                    $("#level_id").append("<option selected>Not data</option>");
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }
    /** End Filter levels by standards **/

    /** Start Filter years by levels **/
    $("select.level").change(function() {
        var selectedLevelId = $(this).children("option:selected").val();
        getMatchingYearstoLevel(selectedLevelId)
    });

    function getMatchingYearstoLevel(selectedLevelId) {
        $.ajax({
            type: "GET",
            url: "get-matching-years-to-level/" + selectedLevelId,
            dataType: "JSON",
            success: function (response) {
                var len = response.length;
                $("#year_id").empty();
                if(len > 0) {
                    $("#year_id").append("<option selected>Select year</option>");
                    for(var i = 0; i < len; i++) {
                        var id = response[i]['id'];
                        var name = response[i]['name'];
                        $("#year_id").append("<option value='"+id+"'>"+name+"</option>");
                    }
                } else {
                    $("#year_id").append("<option selected>Not data</option>");
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }
    /** End Filter years by levels **/
});
