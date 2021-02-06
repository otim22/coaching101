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
    console.log(selectedCategory);
    // Filter by year
    var selectedYear = $("#year option:selected").val();
    console.log(selectedYear);
    // Filter by term
    var selectedTerm = $("#term option:selected").val();
    console.log(selectedTerm);

    $.ajax({
        type: "GET",
        data: {
            'category': selectedCategory,
            'year': selectedYear,
            'term': selectedTerm
        },
        url: "get-more-subjects" + "?page=" + page,
        success: function(data) {
            console.log(data);
            $('#subject_data').html(data);
        }
    });
}
