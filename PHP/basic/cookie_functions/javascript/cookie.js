/**
 * set cookie
 *
 * @param string key
 * @param string/number  value
 * @param number expired_seconds optional
 * @param string path optional
 *
 * @return void
 */
function setCookie(key, value, expired_seconds, path)
{
    //check input
    try {
        if ((typeof key) !== 'string') {
            throw 'Invalid key!!!';
        }
        if ((typeof value) !== 'string' && (typeof value) !== 'number') {
            throw 'Invalid value!!!';
        }
        if (
            expired_seconds !== undefined &&
            expired_seconds !== null &&
            (typeof expired_seconds) !== 'number'
        ) {
            throw 'Invalid expires!!!';
        }
    } catch (err) {
        console.log(err);
        return;
    }

    //convert expired_seconds to GMT string
    var expires = '';
    if (expired_seconds !== undefined && expired_seconds !== null) {
        var exp = new Date();
        exp.setTime(expired_seconds*1000);
        expires = '; expires=' + exp.toGMTString();
    }

    var pathStr = '';
    if (path !== undefined) {
        pathStr = '; path=' + path;
    }

    document.cookie = key + '=' + value +
                      expires +
                      pathStr;
}
/**
 * get cookie
 *
 * @param string key
 *
 * @return string, if key  not found
 * return empty
 */
function getCookie(key)
{
    //check input
    try {
        if ((typeof key) !== 'string') {
            throw 'invalid key';
        }
    } catch (err) {
        console.log(err);
        return;
    }

    //convert cookies string to array
    var cookieArr = document.cookie.split(';');

    var length = cookieArr.length;
    for (var i = 0; i < length; i++) {
        var cookie = cookieArr[i];

        //erase white spaces
        while (cookie.charAt(0) === ' ') {
            cookie = cookie.substring(1);
        }

        //find the cookie with key
        if (cookie.indexOf(key) === 0 && cookie.charAt(key.length) === '=') {
            return cookie.substring(key.length + 1);
        }
    }
    return '';
}
/**
 * delete cookie
 *
 * @param string key
 * @param string path optional
 *
 * @return void
 */
function deleteCookie(key, path)
{
    //check input
    try {
        if ((typeof key) !== 'string') {
            throw 'invalid key!!!';
        }
    } catch (err) {
        console.log(err);
        return;
    }

    var pathStr = '';
    if (path !== undefined) {
        pathStr = '; path=' + path;
    }

    document.cookie = key + '=; expires=Thu, 01 Jan 1970 00:00:00 UTC' + pathStr;
}
