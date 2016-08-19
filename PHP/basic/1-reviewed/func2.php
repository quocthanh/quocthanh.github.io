<?php
	function hihi($x) {
		echo $x . "<br>";
	}
	hihi(5);
	hihi("5");
	hihi();
/**
 * Hien review:
 *
 * 1. Trường hợp gọi hàm hihi không truyền param: hihi()
 * Thì function hihi cần đặt giá trị mặc định cho param $x, giá trị đó tùy theo mục đính sử dụng:
 * function hihi($x = '')
 * {
 *     ...
 * }
 */
?>