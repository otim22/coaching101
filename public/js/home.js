$(function() {
    /* Start handle filtering subjects videos*/
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        getMoreSubjects(page);
    });
    $('#category, #year, #term').on('change', function() {
        getMoreSubjects();
    });
    function getMoreSubjects(page) {
        var selectedCategory = $("#category option:selected").val();
        var selectedYear = $("#year option:selected").val();
        var selectedTerm = $("#term option:selected").val();
        $.ajax({
            type: "GET",
            data: {
                'category': selectedCategory,
                'year': selectedYear,
                'term': selectedTerm
            },
            url: "get-more-subjects" + "?page=" + page,
            success: function(data) {
                $('#subject_data').html(data);
                window.livewire.rescan();
            }
        });
    }
    /* End handle filtering subjects videos*/

    /** Start Filter years by levels objective **/
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
                $("#year").empty();
                if(len > 0) {
                    for(var i = 0; i < len; i++) {
                        var id = response[i]['id'];
                        var name = response[i]['name'];
                        $("#year").append("<option value='"+id+"'>"+name+"</option>");
                    }
                } else {
                    $("#year").append("<option selected>Not data</option>");
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }
    /** End Filter years by levels objective **/
});
