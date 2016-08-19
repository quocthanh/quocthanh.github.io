<?php
/**
 * Hien review:
 * 
 * 1. Phương thức Car nên viết thường ký tự đầu tiên,
 * và cần thêm keyword phạm vi
 * →
 * public function car()
 * {
 *     ...
 * }
 * 
 * 2. Dư khoảng cách trước và sau dấu trỏ ->
 * →
 * $this->model
 */
	class Car {
		function Car() {
			$this -> model = "it 's fun";
			$this -> aaa = "what is this function?";
		}
	}
	
	$newOb = new Car();
	
	echo $newOb->model . "<br>";
	var_dump($newOb);
	echo "<br>" . str_word_count($newOb->model);
	echo "<br>" . strpos("aa bbb dd ee", "dr");
?>