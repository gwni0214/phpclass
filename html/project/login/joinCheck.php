<?php
    include "../connect/connect.php";

    // 변수 설정
    $type = $_POST['type'];

    // 쿼리문 생성
    $sql = "SELECT youEmail, youNickname FROM myProject ";

    if($type == "emailCheck"){
        $youEmail = $connect -> real_escape_string(trim($_POST['youEmail']));
        $sql .= "WHERE youEmail = '{$youEmail}'";
    }

    if($type == "nickCheck"){
        $youNickname = $connect -> real_escape_string(trim($_POST['youNickname']));
        $sql .= "WHERE youNickname = '{$youNickname}'";
    }
    $result = $connect -> query($sql);
    $jsonResult = "bad";

    // 데이터 유무 확인
    if($result -> num_rows == 0){
        $jsonResult = "good";
    }
    // json 파일로 변경
    echo json_encode(array("result" => $jsonResult));
?>