<?php
    include "../connect/connect.php";

    //변수설정
    $type = $_POST['type'];
    $newsView = $_POST['newsView'];

    //쿼리문 생성
    $sql = "SELECT newsView FROM myNews ";
    if($type == "viewCheck"){
        
        $sql .= "WHERE newsView = '{$newsView}'";
    }
    
    $result = $connect -> query($sql);
    $jsonResult = "bad";

    //데이터 유무 확인
    if($result -> num_rows == 0){
        $jsonResult = "good";
    }
    echo json_encode(array("result" => $jsonResult));
?>