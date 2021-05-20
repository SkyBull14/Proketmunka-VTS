<?php

class DataCheck {
    public $data;
    function __construct (String $data) {
        $this->data = $data;
        echo $this->check($this->data);
    }//isset igaz ha üres
    public function check($data) {
        if(empty($data)) {
            echo "Nem üres"."<br>";
            echo $this->data;
        } else {
            echo "Üres";
        }
    } 

    public function fg2($data) {
        
    }
}

  $valami = new DataCheck("Azt a réz fán fütyülőjét!");
 
?>