//Clone the hidden element and shows it
$(function () {
    let maxField = 10;
    let startValue = 1;

    $('#students_learn').on('keyup', function() {
        if($(this).val().length >= 8) {
            document.querySelector('.btn-students_learn').classList.add('seen');
        }
    })

    $('.btn-students_learn').click(function() {
        if(startValue < maxField) {
            startValue++;

            $('.student_learn-section').first().clone()
            .find("input:text").val("").end()
            .appendTo('.dynamic-student_learn');

            document.querySelector('.hidden').classList.add('seen');
        }

        attach_delete();

    });

    //Attach functionality to delete buttons
    function attach_delete() {
        $('.delete-student_learn').off();
        $('.delete-student_learn').click(function() {
            $(this).closest('.student_learn-section').remove();
            startValue--;
        });
    }
})
