$(function() {
    /** Start quiz filtering **/
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();

        var page = $(this).attr('href').split('page=')[1];
        getMoreQuizzes(page);
    });

    $('#quiz_category, #level, #quiz_year, #quiz_term').on('change', function() {
        getMoreQuizzes();
    });

    function getMoreQuizzes(page) {
        var selectedCategory = $("#quiz_category option:selected").val();
        var selectedLevel = $("#level option:selected").val();
        var selectedYear = $("#quiz_year option:selected").val();
        var selectedTerm = $("#quiz_term option:selected").val();

        $.ajax({
            type: "GET",
            data: {
                'quiz_category': selectedCategory,
                'level': selectedLevel,
                'quiz_year': selectedYear,
                'quiz_term': selectedTerm
            },
            url: "get-more-quizs" + "?page=" + page,
            success: function(data) {
                $('#quiz_data').html(data);
                window.livewire.rescan();
            }
        });
    }
    /** Start quiz filtering **/
});
