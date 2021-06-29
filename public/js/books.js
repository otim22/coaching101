$(function() {
    /** Start book filtering **/
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();

        var page = $(this).attr('href').split('page=')[1];
        getMoreBooks(page);
    });

    $('#book_category, #book_year, #book_term').on('change', function() {
        getMoreBooks();
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
                window.livewire.rescan();
            }
        });
    }
    /** Start book filtering **/

    /** Start book objectives **/
    let maxField = 10;
    let startValue = 1;

    $('#books_objective').on('keyup', function() {
        if($(this).val().length >= 8) {
            document.querySelector('.btn_books_objective').classList.add('seen');
        }
    })

    // Clone the hidden element and shows it
    $('.btn_books_objective').click(function() {
        let all_items = document.querySelector('#hidden_book_objective');

        if(startValue < maxField) {
            startValue++;
            all_items.classList.remove('hidden');

            $('.book_objective_section').first().clone()
                                                            .find('input:text').val('').end()
                                                            .appendTo('.dynamic_book_objective');

            all_items.classList.add('hidden');
        }

        attach_delete();
    });

    // Attach functionality to delete buttons
    function attach_delete() {
        $('.delete_book_objective').off();
        $('.delete_book_objective').click(function() {
            $(this).closest('.book_objective_section').remove();
            startValue--;
        });
    }
    /** End book objectives **/

    /** Start Delete a particular objective **/
    $("p.objective-delete").on("click", function() {
        var objectiveDeleteUrl = $(this).attr("data-objective-delete-url");
        var objectiveId = $(this).attr("data-objective-id");
        deleteStudentLearn(objectiveDeleteUrl, objectiveId);
    });

    function deleteStudentLearn(objectiveDeleteUrl, objectiveId) {
        $.ajax({
            type: "POST",
            url: objectiveDeleteUrl,
            dataType: "JSON",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: objectiveId
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
    /** End Delete a particular objective **/
});
