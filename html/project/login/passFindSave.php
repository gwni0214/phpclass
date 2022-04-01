<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $youEmail = $_POST['youEmail'];
        $youName = $_POST['youName'];
        $youPass = $_POST['youPass'];
        
        
        //쿼리문 작성
        $sql = "SELECT youEmail, youName, youPass FROM myProject WHERE youEmail = '{$youEmail}'";
        $result = $connect -> query($sql);
        if($result){
            $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
            // 아이디 비밀번호 확인            
            if($memberInfo['youEmail'] == $youEmail && $memberInfo['youName'] == $youName){
                $sql = "UPDATE myProject SET youPass = '{$youPass}' WHERE youEmail = '{$youEmail}'";
                $connect -> query($sql);
                $result = $connect -> query($sql);

                echo "<script>alert('정보가 수정되었습니다! 다시 로그인 해주세요'); location.href = 'login.php';</script>";
            } else {
                echo "<script>alert('입력하신 정보가 일치하지 않습니다! 다시 입력해주세요!'); history.back(1);</script>";
            }
        }
        ?>
    <script>
       
    </script>
</body>
</html>