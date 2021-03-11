$(function() {
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();

        var page = $(this).attr('href').split('page=')[1];
        getMoreNotes(page);
    });

    $('#notes_category, #notes_year, #notes_term').on('change', function() {
        getMoreNotes();
    });
});

function getMoreNotes(page) {
    var selectedCategory = $("#notes_category option:selected").val();
    var selectedYear = $("#notes_year option:selected").val();
    var selectedTerm = $("#notes_term option:selected").val();

    $.ajax({
        type: "GET",
        data: {
            'notes_category': selectedCategory,
            'notes_year': selectedYear,
            'notes_term': selectedTerm
        },
        url: "get-more-notes" + "?page=" + page,
        success: function(data) {
            $('#notes_data').html(data);
            window.livewire.rescan();
        }
    });
}
