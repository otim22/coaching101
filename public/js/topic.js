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
    $('.btn-resource_attachment').click(function(event) {
        event.preventDefault();

        if($('input#resource_attachment_path:file').val().length <= 0) {
            return false;
        }

        let controlForm = $('.resource-controls:first');

        $('.resource-entry').first().clone().find('input:file').val('').end()
                            .appendTo('.resource-controls');

        controlForm.find('.resource-entry:not(:first) .btn-resource_attachment')
            .removeClass('btn-resource_attachment').addClass('btn-remove')
            .html(`<p class="red_color"><i class="fa subject-icon fa-minus-circle"></i>Delete file</p>`).end();

        attach_delete();
    });

    function attach_delete() {
        $('.btn-remove').off();
        $('.btn-remove').click(function() {
            $(this).closest('.resource-entry').remove();
        });
    }
});
