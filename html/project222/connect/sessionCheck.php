<?php
    if(!isset($_SESSION['memberID'])){   //sset은 있는지 확인할때 쓴다
        Header("Location: ../login/login.php");
    }
?>