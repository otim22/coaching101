$(function() {
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
                $("#exam_year").empty();
                if(len > 0) {
                    $("#exam_year").append("<option selected>All classes</option>");
                    for(var i = 0; i < len; i++) {
                        var id = response[i]['id'];
                        var name = response[i]['name'];
                        $("#exam_year").append("<option value='"+id+"'>"+name+"</option>");
                    }
                } else {
                    $("#exam_year").append("<option selected>Not data</option>");
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }
    /** End Filter years by levels **/
});
