//create cookie
var exp = new Date();
exp.setTime(exp.getTime() + 24*60*60*1000);
document.cookie = 'msg=i am so handsome; expires=' + exp.toGMTString() + '; path=/';

//read cookie from document.cookie
var cookieArr = document.cookie.split(';');
var length = cookieArr.length;
for (var i = 0; i < length; i++) {
    var cookie = cookieArr[i];

    //erase white spaces
    while (cookie.charAt(0) === ' ') {
        cookie = cookie.substring(1);
    }

    //find the cookie 'msg'
    if (cookie.indexOf('msg') === 0) {
        document.getElementById("check").innerHTML =
        'Cookie "msg" is set' + '<br>' +
        'Value: ' + cookie.substring(4);
        break;
    }
}