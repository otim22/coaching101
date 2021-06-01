$(function () {
    /** Start Survey answer **/
    let maxField = 4;
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
    /** End Survey answer **/

    /** Start Delete a particular survey_answer */
    $("p.survey_answer-delete").on("click", function() {
        var studentLearnDeleteUrl = $(this).attr("data-survey_answer-delete-url");
        var studentLearnId = $(this).attr("data-survey_answer-id");
        deleteStudentLearn(studentLearnDeleteUrl, studentLearnId);
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

    /** Start edit survey button */
    $('.edit-button').click(function() {
        $(".edit-button").each(function( index ) {
            var editKey = index + 1;
            var currentEditButton = '.edit-button-' + editKey
            if($(this).hasClass('active')) {
                $(currentEditButton).removeClass('active');
                var currentEditSurveyAnswer = '.survey-answer-' + editKey
                var hideUpdateButtonOnEdit  = '.update-button-' + editKey
                $(currentEditSurveyAnswer).find('input').each(function( index ) {
                    $(this).attr('readonly', true);
                });
                $(hideUpdateButtonOnEdit).removeClass('hidden');
            }
            $(hideUpdateButtonOnEdit).addClass('hidden');
        });
        $(this).addClass('active')
        if($(this).hasClass('active')) {
            var editDataKey = $(this).attr('data-id')
            var currentEditSurveyInput = '.survey-answer-input-' + editDataKey
            var showUpdateButton = '.update-button-' + editDataKey
            var hideDeleteButtonOnEdit  = '.delete-button-' + editDataKey
            $(currentEditSurveyInput).removeAttr('readonly');
            $(showUpdateButton).removeClass('hidden');
            $(hideDeleteButtonOnEdit).addClass('hidden');
        }
    });
    /** End edit survey button */

    /** Start delete survey button */
    $('.delete-button').click(function() {
        $(".delete-button").each(function( index ) {
            var deleteKey = index + 1;
            var currentDeleteButton = '.delete-button-' + deleteKey
            if($(this).hasClass('active')) {
                $(currentDeleteButton).removeClass('active');
                var currentDeleteSurveyAnswer = '.survey-answer-' + deleteKey
                var hideDeleteButton  = '.delete-button-' + deleteKey
                $(currentDeleteSurveyAnswer).find('input').each(function( index ) {
                    $(this).attr('readonly', true);
                });
                $(hideDeleteButton).addClass('hidden');
            }
        });
        $(this).addClass('active')
        if($(this).hasClass('active')) {
            var deleteDataKey = $(this).attr('data-id')
            var currentDeleteSurveyInput = '.survey-answer-input-' + deleteDataKey
            var showDeleteButton = '.delete-button-' + deleteDataKey
            var hideUpdateButtonOnDelete  = '.update-button-' + deleteDataKey
            $(currentDeleteSurveyInput).removeAttr('readonly');
            $(showDeleteButton).removeClass('hidden');
            $(hideUpdateButtonOnDelete).addClass('hidden');
        }
    });
    /** End delete survey button */
});
