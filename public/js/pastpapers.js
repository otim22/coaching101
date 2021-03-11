$(document).ready(function() {
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();

        var page = $(this).attr('href').split('page=')[1];
        getMorePastpapers(page);
    });

    $('#pastpaper_category, #pastpaper_year, #pastpaper_term').on('change', function() {
        getMorePastpapers();
    });
});

function getMorePastpapers(page) {
    var selectedCategory = $("#pastpaper_category option:selected").val();
    var selectedYear = $("#pastpaper_year option:selected").val();
    var selectedTerm = $("#pastpaper_term option:selected").val();

    $.ajax({
        type: "GET",
        data: {
            'pastpaper_category': selectedCategory,
            'pastpaper_year': selectedYear,
            'pastpaper_term': selectedTerm
        },
        url: "get-more-pastpapers" + "?page=" + page,
        success: function(data) {
            $('#pastpaper_data').html(data);
            window.livewire.rescan();
        }
    });
}
