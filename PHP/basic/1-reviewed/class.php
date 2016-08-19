<?php
    class Car {
        public function car() {
            $this->model = 'it \'s fun';
            $this->aaa = "what is this function?";
        }
    }

    $newOb = new Car();

    echo $newOb->model . '<br>';
    var_dump($newOb);
    echo "<br>" . str_word_count($newOb->model);
    echo "<br>" . strpos("aa bbb dd ee", "dr");

?>