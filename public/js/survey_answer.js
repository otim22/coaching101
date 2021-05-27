/** Start Survey answer **/
$(function () {
    let maxField = 10;
    let startValue = 1;

    $('#survey_answer').on('keyup', function() {
        if($(this).val().length >= 8) {
            document.querySelector('.btn_survey_answer').classList.add('seen');
        }
    })

    // Clone the hidden element and shows it
    $('.btn_survey_answer').click(function() {
        let all_items = document.querySelector('#hidden_survey_answer');

        if(startValue < maxField) {
            startValue++;
            all_items.classList.remove('hidden');

            $('.survey_answer_section').first().clone()
                                                            .find('input:text').val('').end()
                                                            .appendTo('.dynamic_survey_answer');

            all_items.classList.add('hidden');
        }

        attach_delete();
    });

    // Attach functionality to delete buttons
    function attach_delete() {
        $('.delete_survey_answer').off();
        $('.delete_survey_answer').click(function() {
            $(this).closest('.survey_answer_section').remove();
            startValue--;
        });
    }
});

/** Start Delete a particular survey_answer */
$(function() {
    $("p.survey_answer-delete").on("click", function() {
        var studentLearnDeleteUrl = $(this).attr("data-survey_answer-delete-url");
        var studentLearnId = $(this).attr("data-survey_answer-id");
        deleteStudentLearn(studentLearnDeleteUrl, studentLearnId);
    });
});

function deleteStudentLearn(studentLearnDeleteUrl, studentLearnId) {
    $.ajax({
        type: "POST",
        url: studentLearnDeleteUrl,
        dataType: "JSON",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: studentLearnId
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
/** End Delete a particular survey_answer */

/** End Survey answer **/
