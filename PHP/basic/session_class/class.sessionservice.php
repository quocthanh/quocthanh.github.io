<?php
// SessionService Class
class SessionService
{
    //start session
    public static function start()
    {
        session_start();
    }
    /**
     * set a session variable
     *
     * @param string $key
     * @param mixed $value
     *
     * @return void
     */
    public static function write($key, $value)
    {
        self::checkKey($key);

        $_SESSION[$key] = $value;
    }
    /**
     * return true if session variable exist
     *
     * @param string $key
     *
     * @return bool
     */
    public static function check($key)
    {
        self::checkKey($key);

        return isset($_SESSION[$key]);
    }
    /**
     * read a value of a session
     *
     * @param string $key
     *
     * @return string value of session,
     * if session doesn't exist, return false
     */
    public static function read($key)
    {
        return self::check($key) ? $_SESSION[$key] : false;
    }
    /**
     * delete a session
     *
     * @param string $key
     *
     * @return void
     */
    public static function delete($key)
    {
        self::checkKey($key);

        unset($_SESSION[$key]);
    }
    //destroy a session
    public static function destroy()
    {
        session_destroy();
    }
    private function checkKey($key)
    {
        if (gettype($key) !== 'string') {
            throw new LogicException('Invalid key!!!');
        }
    }
}
