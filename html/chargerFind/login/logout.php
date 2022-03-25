<?php

    include "../connect/session.php";
    unset($_SESSION['memberID']);
    unset($_SESSION['youName']);
    unset($_SESSION['youEmail']);
    unset($_SESSION['youGender']);

    Header("Location: ../pages/main.php");
?>