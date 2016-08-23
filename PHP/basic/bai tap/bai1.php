<?php
/**
 * receive 3 arrays, find number 1 in array 1
 * merge array 2 and 3 (*), ouput the string,
 * print values of (*) whose sum of digits divide 2 = 0,
 * print values of array 1 that exist in (*) in ascending order,
 * print values of array 1 whose keys is not in (*) in descending order.
 *
 * @param array $array1
 * @param array $array2
 * @param array $array3
 *
 * @throws LogicException if the arguments is not of type 'array'
 *
 * @return void
 *
 */
    function arrayPractice($array1, $array2, $array3)
    {
        $argList = func_get_args();

        $invalidParameters = array_filter($argList, function ($param) {
            return !is_array($param);
        });

        if (count($invalidParameters) > 0) {
            $msg = 'Invalid parameter';
            foreach ($invalidParameters as $key => $value) {
                $msg .= ' ' . ($key + 1) . ',';
            }
            $msg = substr($msg, 0, -1);
            throw new LogicException($msg);
        }

        //find number 1 in array 1
        echo '<b>Cau 1:</b><br>';
        echo in_array(1, $array1) ? 'Found' : 'Not Found';

        //merge array 2 and array 3 => arrayMerge
        echo '<br><b>Cau 2:</b><br>';
        $arrayMerge = array_unique(array_merge($array2, $array3));
        echo implode(', ', $arrayMerge);

        //print values of (*) (arrayMerge) whose sum of digits divide 2 = 0
        echo '<br><b>Cau 3:</b><br>';
        $modTwo = array_filter($arrayMerge, 'isSumOfDigitsEven');
        echo implode(', ', $modTwo);

        //print values of array 1 that exist in (*) (arrayMerge) in ascending order
        echo '<br><b>Cau 4:</b><br>';
        $intersectArray = array_intersect($array1, $arrayMerge);
        sort($intersectArray);
        echo implode(', ', $intersectArray);

        //print values of array 1 whose keys is not in (*) in descending order
        echo '<br><b>Cau 5:</b><br>';
        $diffKey = array_flip($arrayMerge);
        $diffKey = array_diff_key($array1, $diffKey);
        rsort($diffKey);
        echo implode(', ', $diffKey);
    }
/**
 * return true if sun of digits is even
 * else, return false.
 *
 * @param int $num
 *
 * @return boolean
 *
 */
    function isSumOfDigitsEven($num)
    {
        return array_sum(str_split($num)) % 2 === 0;
    }

    arrayPractice([1, -3, 0, 10], [1, 2, 3], [3, 11, 5, 7]);
    echo '<br><br>';
    arrayPractice([0, -3, 0, 10, 12], [1, 9, -3, 51], [33, 11, 9, 5, 7]);
    echo '<br><br>';
    $arr1 = [1, 2, 3];
    arrayPractice($arr1, [], []);
    echo '<br><br>';
    arrayPractice(1, [1, 2, 3], 'poke');
