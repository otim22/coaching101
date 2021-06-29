$(function() {
    /** Start Filter levels by standard **/
    $("select.standard").change(function() {
        let selectedStandardId = $(this).children("option:selected").val();
        getLevelsToStandard(selectedStandardId);
    });

    function getLevelsToStandard(selectedStandardId) {
        $.ajax({
            type: "GET",
            url: "/teacher/get-levels-to-standard/" + selectedStandardId,
            dataType: "JSON",
            success: function (response) {
                let len = response.length;
                $("#level_id").empty();
                if(len > 0) {
                    $("#level_id").append("<option selected>Select year</option>");
                    for(let i = 0; i < len; i++) {
                        let id = response[i]['id'];
                        let name = response[i]['name'];
                        $("#level_id").append("<option value='"+id+"'>"+name+"</option>");
                    }
                } else {
                    $("#level_id").append("<option selected>Not data</option>");
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText, 'Error');
            }
        });
    }
    /** End Filter levels by standard **/

    /** Start Filter levels by standards **/
    $("select.level").change(function() {
        let selectedLevelId = $(this).children("option:selected").val();
        getYearsToLevel(selectedLevelId)
    });

    function getYearsToLevel(selectedLevelId) {
        $.ajax({
            type: "GET",
            url: "/teacher/get-years-to-level/" + selectedLevelId,
            dataType: "JSON",
            success: function (response) {
                let len = response.length;
                $("#year_id").empty();
                if(len > 0) {
                    $("#year_id").append("<option selected>Select level</option>");
                    for(let i = 0; i < len; i++) {
                        let id = response[i]['id'];
                        let name = response[i]['name'];
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
    /** End Filter levels by standards **/
});
