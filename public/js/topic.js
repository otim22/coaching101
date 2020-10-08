$(function() {
    /** Upload content file */
    $('#content_file_path').on('change', function() {
        //get the file name
        var fileName = $(this).val();

        // removing the fake path (Chrome)
        fileName = fileName.replace("C:\\fakepath\\", "");

        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    })

    /** Handle multiple upload resource attachment files */
    $('.btn-add').click(function(event) {
        event.preventDefault();

        let controlForm = $('.controls:first');

        $('.entry').first().clone().find('input:file').val('').end()
                            .appendTo('.controls');

        controlForm.find('.entry:not(:first) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html(
                    `<p><svg width="1em" height="1em" viewBox="0 0 16 20" class="bi bi-trash mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>Trash</p>`);

        attach_delete();
    });

    function attach_delete() {
        $('.btn-remove').off();
        $('.btn-remove').click(function() {
            $(this).closest('.entry').remove();
        });
    }
})

/** Clone Topic section */
$(function () {
    $('.remove_topic').attr('disabled', true);

    $('.btn_add_topic').click(function(event) {
        event.preventDefault();

        let controlForm = $('.clone');
        document.querySelector('.topic_form').reset();
        $('.card').clone().appendTo('.clone');



        attach_delete();
    });

    function attach_delete() {
        $('.remove_topic').off();
        $('.remove_topic').attr('disabled', false);
        $('.remove_topic').click(function() {
            $(this).closest('.card').remove();
        });
    }
})
