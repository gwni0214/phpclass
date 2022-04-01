<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $serviceID = $_POST['serviceID'];
        $serviceTitle = $_POST['serviceTitle'];
        $serviceContents = $_POST['serviceContents'];
        $youPass = $_POST['youPass'];
        $memberID = $_SESSION['memberID'];
        $serviceTitle = $connect -> real_escape_string($serviceTitle);
        $serviceContents = $connect -> real_escape_string($serviceContents);

        // echo $serviceID;

        //쿼리문 작성
        $sql = "SELECT youPass, memberID FROM myProject WHERE memberID = {$memberID}";
        $result = $connect -> query($sql);

        if($result){
            $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
            // echo "<pre>";
            // var_dump($memberInfo);
            // echo "</pre>";

            // 아이디 비밀번호 확인
            if($memberInfo['youPass'] == $youPass && $memberInfo['memberID'] == $memberID){

                //수정(쿼리문 작성)
                $sql = "UPDATE myProject_Service SET serviceTitle = '{$serviceTitle}', serviceContents = '{$serviceContents}' WHERE serviceID = '{$serviceID}'";
                $connect -> query($sql);
            } else {
                echo "<script>alert('비밀번호가 일치하지 않습니다. 다시 한번확인해주세요!'); history.back(1)</script>";
            }
        }
    ?>
    <script>
        location.href = "service.php";
    </script>
</body>
</html>