$(document).ready(function() {
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        getMoreSubjects(page);
    });

    $('#category').on('change', function() {
        getMoreSubjects();
    });

    $('#year').on('change', function() {
        getMoreSubjects();
    });

    $('#term').on('change', function() {
        getMoreSubjects();
    });
});

function getMoreSubjects(page) {
    // Filter by category
    var selectedCategory = $("#category option:selected").val();
    // Filter by year
    var selectedYear = $("#year option:selected").val();
    // Filter by term
    var selectedTerm = $("#term option:selected").val();

    $.ajax({
        type: "GET",
        data: {
            'category': selectedCategory,
            'year': selectedYear,
            'term': selectedTerm
        },
        url: "/get-more-subjects" + "?page=" + page,
        success: function(data) {
            $('#subject_data').html(data);
        }
    });
}
