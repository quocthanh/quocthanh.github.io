/**
 * send a request to server using AJAX
 */
function send() {
    $.get("receive.php", function(data) {
        alert(data);
    });
}
