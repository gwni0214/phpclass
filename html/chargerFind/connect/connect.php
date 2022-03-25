<?php
    $host = "localhost";
    $user = "sbxjs6999";
    $pass = "gwni416ekrcudy!";
    $db = "sbxjs6999";
    $connect = new mysqli($host, $user, $pass, $db);
    $connect -> set_charset("utf8");

    if(mysqli_connect_errno()){
        echo "DATABASE Connect False";
    } else{
        // echo "DATABASE Connect True";
    }
?>