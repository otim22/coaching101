/** Start pastpapers filtering **/
$(function() {
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
/** Start pastpapers filtering **/

/** Start pastpaper objectives **/
$(function () {
    let maxField = 10;
    let startValue = 1;

    $('#pastpapers_objective').on('keyup', function() {
        if($(this).val().length >= 8) {
            document.querySelector('.btn_pastpapers_objective').classList.add('seen');
        }
    })

    // Clone the hidden element and shows it
    $('.btn_pastpapers_objective').click(function() {
        let all_items = document.querySelector('#hidden_pastpaper_objective');

        if(startValue < maxField) {
            startValue++;
            all_items.classList.remove('hidden');
            $('.pastpaper_objective_section').first().clone()
                                                            .find('input:text').val('').end()
                                                            .appendTo('.dynamic_pastpaper_objective');

            all_items.classList.add('hidden');
        }
        attach_delete();
    });

    // Attach functionality to delete buttons
    function attach_delete() {
        $('.delete_pastpaper_objective').off();
        $('.delete_pastpaper_objective').click(function() {
            $(this).closest('.pastpaper_objective_section').remove();
            startValue--;
        });
    }
});
/** End pastpaper objectives **/

/** Start Delete a particular objective */
$(function() {
    $("p.to-delete").on("click", function() {
        var deleteUrl = $(this).attr("data-delete-url");
        var objectiveId = $(this).attr("data-objective-id");
        deleteObjective(deleteUrl, objectiveId);
    });
});

function deleteObjective(deleteUrl, objectiveId) {
    $.ajax({
        type: "POST",
        url: deleteUrl,
        dataType: "JSON",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: objectiveId,
        },
        success: function (response) {
            console.log(response);
        },
        error: function(xhr) {
            console.log(xhr.responseText);
       }
    });

    setTimeout(function () {
        document.location.reload(true);
    }, 1000);
}
/** End Delete a particular objective */
