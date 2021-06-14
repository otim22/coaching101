$(function () {
    /** Start Students learn **/
    let maxField = 10;
    let startValue = 1;

    $('#students_learn').on('keyup', function() {
        if($(this).val().length >= 8) {
            document.querySelector('.btn_students_learn').classList.add('seen');
        }
    })

    // Clone the hidden element and shows it
    $('.btn_students_learn').click(function() {
        let all_items = document.querySelector('#hidden_student_learn');

        if(startValue < maxField) {
            startValue++;
            all_items.classList.remove('hidden');

            $('.student_learn_section').first().clone()
                                                            .find('input:text').val('').end()
                                                            .appendTo('.dynamic_student_learn');

            all_items.classList.add('hidden');
        }

        attach_delete();
    });

    // Attach functionality to delete buttons
    function attach_delete() {
        $('.delete_student_learn').off();
        $('.delete_student_learn').click(function() {
            $(this).closest('.student_learn_section').remove();
            startValue--;
        });
    }
    /** End Students learn **/

    /** Start Delete a particular student_learn */
    $("p.student_learn-delete").on("click", function() {
        var studentLearnDeleteUrl = $(this).attr("data-student_learn-delete-url");
        var studentLearnId = $(this).attr("data-student_learn-id");
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
    /** End Delete a particular student_learn */

    /** Start Class requirement */
    let maxField = 10;
    let startValue = 1;

    $('#class_requirement').on('keyup', function() {
        if($(this).val().length >= 8) {
            document.querySelector('.btn_class_requirement').classList.add('seen');
        }
    })

    // Clone the hidden element and shows it
    $('.btn_class_requirement').click(function() {
        let all_items = document.querySelector('#hidden_class_requirement');

        if(startValue < maxField) {
            startValue++;
            all_items.classList.remove('hidden');

            $('.class_requirement_section').first().clone()
                                                            .find('input:text').val('').end()
                                                            .appendTo('.dynamic_class_requirement');

            all_items.classList.add('hidden');
        }

        attach_delete();
    });

    // Attach functionality to delete buttons
    function attach_delete() {
        $('.delete_class_requirement').off();
        $('.delete_class_requirement').click(function() {
            $(this).closest('.class_requirement_section').remove();
            startValue--;
        });
    }

    $("p.class_requirement-delete").on("click", function() {
        var classRequirementDeleteUrl = $(this).attr("data-class_requirement-delete-url");
        var classRequirementId = $(this).attr("data-class_requirement-id");
        deleteClassRequirement(classRequirementDeleteUrl, classRequirementId);
    });

    function deleteClassRequirement(classRequirementDeleteUrl, classRequirementId) {
        $.ajax({
            type: "POST",
            url: classRequirementDeleteUrl,
            dataType: "JSON",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: classRequirementId,
            },
            success: function (response) {
                document.location.reload(true);
                console.log(response);
            },
            error: function(xhr) {
                console.log(xhr.responseText);
           }
        });

        /** To be removed after checking success response */
        setTimeout(function () {
            document.location.reload(true);
        }, 1000);
    }
    /** End Delete a particular class_requirement */
    /** End Class requirement */

    /** Start Target students **/
    let maxField = 10;
    let startValue = 1;

    $('#target_students').on('keyup', function() {
        if($(this).val().length >= 8) {
            document.querySelector('.btn_target_students').classList.add('seen');
        }
    })

    // Clone the hidden element and shows it
    $('.btn_target_students').click(function() {
        let all_items = document.querySelector('#hidden_target_students');

        if(startValue < maxField) {
            startValue++;
            all_items.classList.remove('hidden');

            $('.target_students_section').first().clone()
                                                            .find('input:text').val('').end()
                                                            .appendTo('.dynamic_target_students');

            all_items.classList.add('hidden');
        }

        attach_delete();
    });

    // Attach functionality to delete buttons
    function attach_delete() {
        $('.delete_target_students').off();
        $('.delete_target_students').click(function() {
            $(this).closest('.target_students_section').remove();
            startValue--;
        });
    }

    /** Start Delete a particular target_student */
    $("p.target_student-delete").on("click", function() {
        var targetStudentDeleteUrl = $(this).attr("data-target_student-delete-url");
        var targetStudentId = $(this).attr("data-target_student-id");
        deleteTargetStudent(targetStudentDeleteUrl, targetStudentId);
    });

    function deleteTargetStudent(targetStudentDeleteUrl, targetStudentId) {
        $.ajax({
            type: "POST",
            url: targetStudentDeleteUrl,
            dataType: "JSON",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: targetStudentId,
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
    /** End Delete a particular target_student */
    /** End Target students **/
});
