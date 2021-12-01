$(function() {
    /** Start exam filtering **/
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();

        var page = $(this).attr('href').split('page=')[1];
        getMoreexams(page);
    });

    $('#exam_category, #level, #exam_year, #exam_term').on('change', function() {
        getMoreexams();
    });

    function getMoreexams(page) {
        var selectedCategory = $("#exam_category option:selected").val();
        var selectedLevel = $("#level option:selected").val();
        var selectedYear = $("#exam_year option:selected").val();
        var selectedTerm = $("#exam_term option:selected").val();

        $.ajax({
            type: "GET",
            data: {
                'exam_category': selectedCategory,
                'level': selectedLevel,
                'exam_year': selectedYear,
                'exam_term': selectedTerm
            },
            url: "get-more-exams" + "?page=" + page,
            success: function(data) {
                $('#exam_data').html(data);
                window.livewire.rescan();
            }
        });
    }
    /** Start exam filtering **/
});
