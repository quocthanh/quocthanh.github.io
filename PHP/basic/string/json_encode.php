<?php
/**
 * json_encode: return JSON string of value
 */
$arr1 = [1, 3, 5, 7];
echo json_encode($arr1);

echo '<br><br>';
$arr1 = [1, 2 => 3, 5, 7];
echo json_encode($arr1);

?>
<?php
echo '<br><br>';
$arr1 = [1, 3, 5, 7];

?>
<script>
var ar = <?= json_encode($arr1) ?>;
console.log(ar);
console.log(typeof ar);
</script>

<?php
echo '<br><br>';
$arr1 = [1, 2 => 3, 5, 7];

?>
<script>
var ar = <?= json_encode($arr1) ?>;
console.log(ar);
</script>
