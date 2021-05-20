<?php
 function isDogWalker ($var) {
    if($var === true) {
        return true;
    } else {
        return false;
    }
 }

 function isValidInputFormat($var) {
     $email_rex = "/^[0-9-a-z-A-ZáéíöőüűÁÉÍÖŐÜŰ]+@.+\.[a-z]{2,}$/u";
     $name_rex = "/^[a-z-A-ZáéíöőüűÁÉÍÖŐÜŰ]+$/";
     $other_rex = "/^.+$/";
    switch($var) {
        case preg_match($email_rex,$var) : 
            return true;  break;
        case preg_match($name_rex) : 
            return true;  break;
        case preg_match($other_rex) : 
            return true; break;
        default : 
            return false; break;
    }
 }
?>