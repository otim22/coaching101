$(function() {
    /** Start notes filtering **/
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();

        var page = $(this).attr('href').split('page=')[1];
        getMoreNotes(page);
    });

    $('#notes_category, #notes_year, #notes_term').on('change', function() {
        getMoreNotes();
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
    /** Start notes filtering **/

    /** Start note objectives **/
    let maxField = 10;
    let startValue = 1;

    $('#notes_objective').on('keyup', function() {
        if($(this).val().length >= 8) {
            document.querySelector('.btn_notes_objective').classList.add('seen');
        }
    })

    // Clone the hidden element and shows it
    $('.btn_notes_objective').click(function() {
        let all_items = document.querySelector('#hidden_note_objective');

        if(startValue < maxField) {
            startValue++;
            all_items.classList.remove('hidden');

            $('.note_objective_section').first().clone()
                                                            .find('input:text').val('').end()
                                                            .appendTo('.dynamic_note_objective');

            all_items.classList.add('hidden');
        }
        attach_delete();
    });

    // Attach functionality to delete buttons
    function attach_delete() {
        $('.delete_note_objective').off();
        $('.delete_note_objective').click(function() {
            $(this).closest('.note_objective_section').remove();
            startValue--;
        });
    }
    /** End note objectives **/

    /** Start Delete a particular objective */
    $("p.to-delete").on("click", function() {
        var deleteUrl = $(this).attr("data-delete-url");
        var objectiveId = $(this).attr("data-objective-id");
        deleteObjective(deleteUrl, objectiveId);
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

    /** Start Filter years by levels **/
    $("select.level").change(function() {
        var selectedLevelId = $(this).children("option:selected").val();
        getMatchingYearstoLevel(selectedLevelId)
    });

    function getMatchingYearstoLevel(selectedLevelId) {
        $.ajax({
            type: "GET",
            url: "get-matching-years-to-level/" + selectedLevelId,
            dataType: "JSON",
            success: function (response) {
                var len = response.length;
                $("#notes_year").empty();
                if(len > 0) {
                    $("#notes_year").append("<option selected>Select year</option>");
                    for(var i = 0; i < len; i++) {
                        var id = response[i]['id'];
                        var name = response[i]['name'];
                        $("#notes_year").append("<option value='"+id+"'>"+name+"</option>");
                    }
                } else {
                    $("#notes_year").append("<option selected>Not data</option>");
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }
    /** End Filter years by levels **/
});
