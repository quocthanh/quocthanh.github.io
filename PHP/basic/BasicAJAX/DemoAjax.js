/**
 * send a request to server using AJAX
 */
$(function() {
    $('#submit').click(function() {
        $.get("receive.php", function(data) {
            alert(data);
        });
    });
});
