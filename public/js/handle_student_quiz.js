$(function() {
    let questions = []
    let quizAns = {}
    let arrayOfAns = []
    let parsedLocalData = []
    let isEmpty = false

    const quiz_id = $('.quiz').attr("data-quiz-id")
    const quiz_question_id = $('.question').attr("data-question-id")
    const user_id = $('.question').attr("data-user")

    let localData = localStorage.getItem("answers")
    if(localData) {
        parsedLocalData = JSON.parse(localData)
    }

    if(parsedLocalData.length) {
        let $box = $(document).find(".options input[type=checkbox]")
        parsedLocalData.map(function(currentObject) {
            if (currentObject.hasOwnProperty('quiz_question_id') && currentObject.quiz_question_id == quiz_question_id) {
                $box.each(function() {
                    if($(this).val() === currentObject.quiz_option_id) {
                        $(this).prop("checked", true)
                    }
                })
            }
        })
    }

    /** handle checkbox **/
    $(".options input:checkbox").on('click', function() {
        let $box = $(this)
        if ($box.is(":checked")) {
            let group = "input:checkbox[name='" + $box.attr("name") + "']"
            $(group).prop("checked", false)
            $box.prop("checked", true)
            isEmpty = false
        } else {
            $box.prop("checked", false)
            isEmpty = true;
        }
        submitToLocalStorage($box.val())
    });
    /** handle checkbox **/

    function submitToLocalStorage(quiz_option_id) {
        quizAns.quiz_id = quiz_id
        quizAns.quiz_question_id = quiz_question_id
        quizAns.quiz_option_id = quiz_option_id
        quizAns.user_id = user_id

        updateLocalStorage(quiz_option_id)
        removeItemFromArr(quiz_option_id)
        addItemToQuestionsArr()

        localStorage.setItem("answers", JSON.stringify(arrayOfAns))
    }

    function updateLocalStorage(quiz_option_id) {
        if(parsedLocalData.length) {
            parsedLocalData.map(function(currentObject, index) {
                if (currentObject.hasOwnProperty('quiz_question_id') && currentObject.quiz_question_id == quiz_question_id) {
                    currentObject['quiz_option_id'] = quiz_option_id
                    parsedLocalData[index] = currentObject
                }
                if (!questions.includes(currentObject.quiz_question_id)) {
                    questions.push(currentObject.quiz_question_id)
                }
            })
            arrayOfAns = parsedLocalData
        }
    }

    function removeItemFromArr(quiz_option_id) {
        if (isEmpty) {
            arrayOfAns = parsedLocalData.filter(function(el) {
                return el.quiz_option_id != quiz_option_id
            })
        }
    }

    function addItemToQuestionsArr() {
        if (!questions.includes(quiz_question_id)) {
            arrayOfAns.push(quizAns)
            questions.push(quiz_question_id)
        }
    }

    $(".submit-questions").on('click', function() {
        let dataUrl = $(this).attr("data-url")
        let dataUser = $(this).attr("data-user")
        let data = localStorage.getItem("answers")

        if (data) {
            let parsedData = JSON.parse(data)
            parsedData.map((item) => {
                $.ajax({
                    type: "POST",
                    url: dataUrl,
                    dataType: "JSON",
                    contentType:'application/x-www-form-urlencoded',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: item,
                    success: function (response) {
                        console.log(response)
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText)
                    }
                })
            })
            localStorage.removeItem("answers")
            window.location.href = "/quiz-results"
        } else {
            var flash = $('#flashMessage')
            $('.flash-message').removeClass('hidden')
        }
    })
})
