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
 * @throws InvalidArgumentException if the arguments is not of type 'array'
 *
 * @return void
 *
 */
    function arrayPractice($array1, $array2, $array3)
    {
        try {
            $inValid = [];
            $argList = func_get_args();
            foreach ($argList as $key => $value) {
                if (!is_array($value)) {
                    $inValid[] = $key + 1;
                }
            }
            if (count($inValid) > 0) {
                $txt = 'Invalid parameter';
                foreach ($inValid as $value) {
                    $txt .= ' ' . $value . ',';
                }
                $txt = substr($txt, 0, -1);
                throw new Exception($txt);
            }
        }
        catch(Exception $e) {
            echo '<b>LogicException:</b> ' . $e->getMessage();
            die();
        }

        //find number 1 in array 1
        echo '<b>Cau 1:</b><br>';
        if (in_array(1, $array1)) {
            echo 'Found';
        } else {
            echo 'Not found';
        }

        //merge array 2 and array 3 => arrayM
        echo '<br><b>Cau 2:</b><br>';
        $arrayM = array_unique(array_merge($array2, $array3));
        echo implode(', ', $arrayM);

        //print values of (*) (arrayM) whose sum of digits divide 2 = 0
        echo '<br><b>Cau 3:</b><br>';
        $array_tmp = array_filter($arrayM, 'divide2');
        echo implode(', ', $array_tmp);

        //print values of array 1 that exist in (*) (arrayM) in ascending order
        echo '<br><b>Cau 4:</b><br>';
        $array_tmp = array_intersect($array1, $arrayM);
        sort($array_tmp);
        echo implode(', ', $array_tmp);

        //print values of array 1 whose keys is not in (*) in descending order
        echo '<br><b>Cau 5:</b><br>';
        $array_tmp = array_flip($arrayM);
        $array_tmp = array_diff_key($array1, $array_tmp);
        rsort($array_tmp);
        echo implode(', ', $array_tmp);
    }
/**
 * test if $num divide 2 = 0
 *
 * @param int $num
 *
 * @return boolean return true if $num divide 2 = 0
 *
 */
    function divide2($num)
    {
        if ((array_sum(str_split($num))) % 2 == 0) {
            return true;
        }
    }

    arrayPractice([1, -3, 0, 10], [1, 2, 3], [3, 11, 5, 7]);
    echo '<br><br>';
    arrayPractice([0, -3, 0, 10, 12], [1, 9, -3, 51], [33, 11, 9, 5, 7]);
    echo '<br><br>';
    arrayPractice(1, [1, 2, 3], 'poke');
