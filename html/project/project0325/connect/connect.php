<?php
    $host = "localhost";
    $user = "ekfvoddl0321";
    $pass = "tlwkr7246!##";
    $db = "ekfvoddl0321";
    $connect = new mysqli($host, $user, $pass, $db);
    $connect -> set_charset("utf8");
    
    if(mysqli_connect_errno()){
        echo "DATABASE Connect False";
    } else {
        // echo "DATABASE Connect True";
    }
?>