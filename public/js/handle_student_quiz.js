$(function() {
    const optionsClicked = [];
    const quizAns = {};

    /** handle checkbox **/
    $(".options input:checkbox").on('click', function() {
        // in the handler, 'this' refers to the box clicked on
        let $box = $(this);
        if ($box.is(":checked")) {
            // the name of the box is retrieved using the .attr() method
            // as it is assumed and expected to be immutable
            let group = "input:checkbox[name='" + $box.attr("name") + "']";
            // the checked state of the group/box on the other hand will change
            // and the current value is retrieved using .prop() method
            $(group).prop("checked", false);
            $box.prop("checked", true);

            hiddenCorrectAnswer = $(this).attr("data-correct");
        } else {
            $box.prop("checked", false);
        }
        if (optionsClicked.includes($box.val()) === false) optionsClicked.push($box.val());
    });
    /** handle checkbox **/

    $(".next-question").on('click', function() {
        const optionId = optionsClicked[optionsClicked.length - 1]
        const questionId = $(this).attr("data-question-id");
        const quizId = $(this).attr("data-quiz-id");
        const userQuizAnsUrl = $(this).attr("data-user-ans");
        const lastOption = $(this).attr("data-last-option");

        quizAns.quizId = quizId;
        quizAns.questionId = questionId;
        quizAns.optionId = optionId;
        quizAns.lastOption = lastOption;

        $.ajax({
            type: "POST",
            url: userQuizAnsUrl,
            dataType: "JSON",
            contentType:'application/x-www-form-urlencoded',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: quizAns,
            success: function (response) {
                console.log(response);
            },
            error: function(xhr) {
                console.error();(xhr.responseText);
           }
        });
    });
    $(".submit-questions").on('click', function() {
        const optionId = optionsClicked[optionsClicked.length - 1]
        const questionId = $(this).attr("data-question-id");
        const quizId = $(this).attr("data-quiz-id");
        const userQuizAnsUrl = $(this).attr("data-user-ans");
        const lastOption = $(this).attr("data-last-option");

        quizAns.quizId = quizId;
        quizAns.questionId = questionId;
        quizAns.optionId = optionId;
        quizAns.lastOption = lastOption;

        $.ajax({
            type: "POST",
            url: userQuizAnsUrl,
            dataType: "JSON",
            contentType:'application/x-www-form-urlencoded',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: quizAns,
            success: function (response) {
                console.log(response);
            },
            error: function(xhr) {
                console.error();(xhr.responseText);
           }
        });
    });
});
