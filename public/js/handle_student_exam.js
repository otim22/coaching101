$(function() {
    let questions = []
    let examAns = {}
    let arrayOfAns = []
    let parsedLocalData = []
    let isEmpty = false

    const exam_id = $('.exam').attr("data-exam-id")
    const exam_question_id = $('.question').attr("data-question-id")
    const user_id = $('.question').attr("data-user")

    let localData = localStorage.getItem("answers")
    if(localData) {
        parsedLocalData = JSON.parse(localData)
    }

    if(parsedLocalData.length) {
        let $box = $(document).find(".options input[type=checkbox]")
        parsedLocalData.map(function(currentObject) {
            if (currentObject.hasOwnProperty('exam_question_id') && currentObject.exam_question_id == exam_question_id) {
                $box.each(function() {
                    if($(this).val() === currentObject.exam_option_id) {
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
            $(group).prop("checked").disabled = true
            isEmpty = true
        }
        submitToLocalStorage($box.val())
    });
    /** handle checkbox **/

    function submitToLocalStorage(exam_option_id) {
        examAns.exam_id = exam_id
        examAns.exam_question_id = exam_question_id
        examAns.exam_option_id = exam_option_id
        examAns.user_id = user_id

        updateLocalStorage(exam_option_id)
        removeItemFromArr(exam_option_id)
        addItemToQuestionsArr()

        localStorage.setItem("answers", JSON.stringify(arrayOfAns))
    }

    function updateLocalStorage(exam_option_id) {
        if(parsedLocalData.length) {
            parsedLocalData.map(function(currentObject, index) {
                if (currentObject.hasOwnProperty('exam_question_id') && currentObject.exam_question_id == exam_question_id) {
                    currentObject['exam_option_id'] = exam_option_id
                    parsedLocalData[index] = currentObject
                }
                if (!questions.includes(currentObject.exam_question_id)) {
                    questions.push(currentObject.exam_question_id)
                }
            })
            arrayOfAns = parsedLocalData
        }
    }

    function removeItemFromArr(exam_option_id) {
        if (isEmpty) {
            arrayOfAns = parsedLocalData.filter(function(el) {
                return el.exam_option_id != exam_option_id
            })
        }
    }

    function addItemToQuestionsArr() {
        if (!questions.includes(exam_question_id)) {
            arrayOfAns.push(examAns)
            questions.push(exam_question_id)
        }
    }

    $(".submit-questions").on('click', function() {
        let dataUrl = $(this).attr("data-url")
        let dataExamId = $(this).attr("data-exam-id")
        let data = localStorage.getItem("answers")

        $.ajax({
            type: "POST",
            url: dataUrl,
            contentType:'application/json; charset=utf-8',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: data,
            success: function (response) {
                console.log("success")
                localStorage.removeItem("answers")
                localStorage.removeItem("saved_countdown")
                console.log(dataExamId);
                window.location.href = "/exam-results/" + dataExamId
            },
            error: function(xhr) {
                console.error(xhr.responseText)
            }
        })
    })
})
