<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    //변수설정
    $type = $_POST['type'];

    //쿼리문 생성
    $sql = "SELECT newsLike, newsID FROM myNews ";
    if($type == "newLikeCheck"){
        $newsLike = $connect -> real_escape_string(trim($_POST['newsLike']));
        $sql .= "WHERE newsLike = '{$newsLike}'";
    }
    
    $result = $connect -> query($sql);
    $jsonResult = "bad";

    //데이터 유무 확인
    if($result -> num_rows == 0){
        $jsonResult = "good";
    }
    echo json_encode(array("result" => $jsonResult));
?>