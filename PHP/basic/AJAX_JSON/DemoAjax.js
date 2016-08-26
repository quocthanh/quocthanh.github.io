/**
 * check the input field, if valid, then
 * convert array to JSON, then
 * send a array to server using AJAX
 *
 */
$(function() {
    var inputArray;

    $('#submit').click(function() {
        //clear messages
        $('#error').text('');
        $('#sum').text('');
        $('#product').text('');

        if (checkAndParseArray()) {
            $.get("receive.php", "input=" + inputArray,function(data) {
                data = JSON.parse(data);
                $('#sum').text('Sum: ' + data[0]);
                $('#product').text('Product: ' + data[1]);
            });
        } else {
            $('#error').text("Hey! Don't try to fool me!!!");
        }
    });

    /**
     * check the value of input field
     * if it has right format of number array, return true
     * then convert it to JSON string
     * else, return false
     *
     * @return bool
     */
    function checkAndParseArray() {
        var check = true;
        inputArray = $('#numbers').val().trim();

        //check length
        length = inputArray.length;
        check &= length > 0;

        //check format
        var reg = /^(([ ]*(-)?(\d)+((\.)(\d)+)?([ ])*,)+([ ]*(-)?(\d)+((\.)(\d)+)?))$/;
        check &= inputArray.search(reg) != -1;

        //convert to JSON string
        if (check) {
            inputArray = inputArray.split(",");
            length = inputArray.length;

            for (var g = 0; g < length; g++) {
                inputArray[g] = Number(inputArray[g]);
            }

            inputArray = JSON.stringify(inputArray);
        }

        return check;
    }
});
