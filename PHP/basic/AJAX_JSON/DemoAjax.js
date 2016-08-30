/**
 * check the input field, if valid, then
 * convert array to JSON, then
 * send a array to server using AJAX
 *
 */
var inputArray;

function send() {
    //clear messages
    $('#error, #sum, #product').text('');

    if (!checkAndParseArray()) {
        $('#error').text("Hey! Don't try to fool me!!!");
        return;
    }
    $.get("receive.php", "input=" + inputArray, function(data) {
        data = JSON.parse(data);
        $('#sum').text('Sum: ' + data['sum']);
        $('#product').text('Product: ' + data['product']);
    });
}

/**
 * check the value of input field
 * if it has right format of number array, return true
 * then convert it to JSON string
 * else, return false
 *
 * @return bool
 */
function checkAndParseArray() {
    inputArray = $('#numbers').val().trim();

    //check format
    var reg = /^(([ ]*(-)?(\d)+((\.)(\d)+)?([ ])*,)+([ ]*(-)?(\d)+((\.)(\d)+)?))$/;
    var check = inputArray.search(reg) !== -1;

    //convert to JSON string
    if (check) {
        inputArray = inputArray.split(",");

        $.each(inputArray, function(index, value) {
            inputArray[index] = inputArray[index].trim();
        });

        inputArray = JSON.stringify(inputArray);
    }

    return check;
}
