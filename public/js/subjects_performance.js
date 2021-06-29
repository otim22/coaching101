$(function() {
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();

        var page = $(this).attr('href').split('page=')[1];
        getSubjectsForTeacherPerforamce(page);
    });

    $('#performance_filter').on('change', function() {
        getSubjectsForTeacherPerforamce();
    });
});

function getSubjectsForTeacherPerforamce(page) {
    var selectedPerformanceFilter = $("#performance_filter option:selected").val();

    $.ajax({
        type: "GET",
        data: {
            'performance_filter': selectedPerformanceFilter,
        },
        url: "get-more-subjects-for-teacher-performance" + "?page=" + page,
        success: function(data) {
            $('#subject_data').html(data);
            window.livewire.rescan();
        }
    });
}
