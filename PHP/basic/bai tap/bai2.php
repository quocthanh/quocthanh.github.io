<?php
/*cau 1-------------------------------------------------------*/
    echo '<b>Cau 1</b><br>';
    echo 'This is a string  $_$' . '<br>';
    echo "This is another string  \$_\$" . '<br>';
/*cau 2-------------------------------------------------------*/
/**
 * find a string in another string,
 * if found return true, else return false.
 *
 * @param string $str1
 * @param string $str2
 *
 * @return bool
 */
    function isInString($str1, $str2)
    {
        $argList = func_get_args();
        argsTypeValidate($argList, 'string');

        return strpos($str1, $str2) !== false;
    }
    echo '<b>Cau 2</b><br>';
    var_dump(isInString('aa bb cc', 'aa'));
    echo '<br>';
/*cau 3-------------------------------------------------------*/
/**
 * return true if a string is UTF-8 multibyte encoding
 *
 * @param string $str
 *
 * @return bool
 *
 */
    function isMultiByte($str)
    {
        $argList = func_get_args();
        argsTypeValidate($argList, 'string');

        return mb_strlen($str, 'UTF-8') < strlen($str);
    }
    echo '<b>Cau 3</b><br>';
    var_dump(isMultiByte('344 la lá'));
    echo '<br>';
/*cau 4-------------------------------------------------------*/
    echo '<b>Cau 4</b><br>';
    $trim = 'trim';
    $trim = rtrim($trim, 'm');
    echo $trim;
    echo '<br>';
    $trim = 'trim';
    $trim = strrev($trim);
    $trim = ltrim($trim, 'm');
    echo $trim;
    echo '<br>';

/**
 * validate the type of inputs
 * throw exception if inputs is not the required type
 *
 * @param array $argList
 * @param string $type
 *
 * @throws LogicException
 *
 */
    function argsTypeValidate($argList, $type)
    {
        $invalidParameters = array_filter($argList, function($param) use ($type) {
            return gettype($param) !== $type ? true : false;
        });
        if (count($invalidParameters) > 0) {
            $msg = 'Invalid parameter';
            foreach ($invalidParameters as $key => $value) {
                $msg .= ' ' . ($key + 1) . ',';
            }
            $msg = substr($msg, 0, -1);
            throw new LogicException($msg);
        }
    }
