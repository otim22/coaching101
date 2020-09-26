/** Start Students learn **/
$(function () {
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
});
/** End Students learn **/

/** Start Class requirement**/
$(function () {
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
});
/** End Class requirement **/

/** Start Target students **/
$(function () {
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
});
/** End Target students **/
