<?php
/**
 * test some cases of json_decode, JSON.parse
 */
var_dump(json_decode('[1, 2, 3]'));
echo '<br>';
var_dump(json_decode('[1,a,2, 3]'));
echo '<br>';
var_dump(json_decode('[1,[,2[, 3]'));

?>

<script>
$var = '[1, 2, 4]';
$res = JSON.parse($var);
console.log($res);

$var = '[1, [2, 4]';
$res = JSON.parse($var);
console.log($res);
</script>