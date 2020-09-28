$(function() {
    $('#content_file_path').on('change',function() {
        //get the file name
        var fileName = $(this).val();

        // removing the fake path (Chrome)
        fileName = fileName.replace("C:\\fakepath\\", "");

        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
     })

    $('#resource_attachment_path').on('change',function() {
        //get the file name
        var fileName = $(this).val();

        // removing the fake path (Chrome)
        fileName = fileName.replace("C:\\fakepath\\", "");

        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
     })
})
