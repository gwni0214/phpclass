<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <!-- 
        ekfvoddl0321.dothome.co.kr/php/login/loginSave.php 
 -->
</head>
<body>

<?php
        include "../connect/connect.php";
        include "../connect/session.php";

        $youEmail = $_POST['youEmail'];
        $youPass = $_POST['youPass'];

        // echo $youEmail, $youPass;

        //메세지 출력 함수
        function msg($alert){
            echo "<p class='alert'>{$alert}</p>";
        }

        //데이터 가져오기 -> 유효성 검사(필요X) -> 데이터 불러오기
        $sql = "SELECT memberID, youName, youEmail, youPass, youNickname FROM myProject WHERE youEmail = '$youEmail' && youPass = '$youPass'";
        $result = $connect -> query($sql);

        if($result){
            $count = $result -> num_rows;       //갯수 가져오기

            if($count == 0){
                msg("이메일 또는 비밀번호가 잘못되었습니다. 다시 한번 확인해주세요.");
            } else {
                //로그인 성공
                $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);     //데이터 가져오기(배열로 MYSQLI에서 내림차순으로 가져와라)

                //섹션 추가
                $_SESSION['memberID'] = $memberInfo['memberID'];
                $_SESSION['youName'] = $memberInfo['youName'];
                $_SESSION['youEmail'] = $memberInfo['youEmail'];
                $_SESSION['youNickname'] = $memberInfo['youNickname'];

                Header("location: ../include/main.php");

                //메인
                // Header("location: ../pages/main.php");

                // echo $memberID;
                // echo $memberInfo;
                echo "<pre>";
                var_dump($memberInfo);
                echo "</pre>";
            }
        }

    ?>
    


</body>
</html>