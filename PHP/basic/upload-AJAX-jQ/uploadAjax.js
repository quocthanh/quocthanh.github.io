/**
 * Upload file using AJAX
 * update progress bar during upload progress
 */
function upload() {
    //check the input field
    if ($('#imgFile').val() === "") {
        //showmessage
        $('.errorMessage').text('***Please choose a file :)');
        //reset progress bar
        $('#Progress').css('width', '0%');
        $('#percent').text('0%');

        return;
    }
    //object FormData: store the file for ajax use
    var dataObj = new FormData();
    dataObj.append('imgFile', $('#imgFile')[0].files[0]);

    $.ajax({
        url: 'upload.php',
        type: 'POST',
        beforeSend: function() {
            //clear message
            $('.errorMessage, #response').text('');
        },
        success: function(response) {
            $('#response').html(response);
        },
        error: function() {
            $('#response').text('Request Fail!!!');
        },
        xhr: function() {
            var xhr = new XMLHttpRequest();

            xhr.upload.addEventListener("progress", changeProgress, false);

            return xhr;
        },
        data: dataObj,
        cache: false,
        contentType: false,
        processData: false
    });
}
/**
 * change the progress bar
 * based on the size of file being loaded
 *
 * @param event e
 *
 */
function changeProgress(e) {
    if (e.lengthComputable) {
        var per = e.loaded / e.total;
        per = parseInt(per * 100);

        $('#Progress').css('width', per + '%');
        $('#percent').text(per + '%');
    }
}