<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $memberID = $_SESSION['memberID'];
    $boardTitle = $_POST['boardTitle'];
    $boardContents = $_POST['boardContents'];
    $boardView = 1;
    $regTime = time();

    $boardTitle = $connect -> real_escape_string($boardTitle);  //특수문자 방지
    $boardContents = $connect -> real_escape_string($boardContents);    //특수문자 방지



    // echo $memberID, $boardTitle, $boardContents, $boardView, $regTime;

    $sql = "INSERT INTO myProject_Board(memberID, boardTitle, boardContents, boardView, regTime) VALUES('$memberID', '$boardTitle', '$boardContents', '$boardView', '$regTime')";
    $connect -> query($sql);

    Header("Location: ../board/board.php");
?>