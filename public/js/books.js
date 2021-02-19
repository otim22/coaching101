$(document).ready(function() {
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();

        var page = $(this).attr('href').split('page=')[1];
        getMoreBooks(page);
    });

    $('#book_category, #book_year, #book_term').on('change', function() {
        getMoreBooks();
    });
});

function getMoreBooks(page) {
    var selectedCategory = $("#book_category option:selected").val();
    var selectedYear = $("#book_year option:selected").val();
    var selectedTerm = $("#book_term option:selected").val();

    $.ajax({
        type: "GET",
        data: {
            'book_category': selectedCategory,
            'book_year': selectedYear,
            'book_term': selectedTerm
        },
        url: "get-more-books" + "?page=" + page,
        success: function(data) {
            $('#book_data').html(data);
        }
    });
}
