$(document).ready(function() {
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();

        var page = $(this).attr('href').split('page=')[1];
        getMoreSubjects(page);
    });

    $('#category, #year, #term').on('change', function() {
        getMoreSubjects();
    });
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
