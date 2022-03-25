<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    // include "../connect/sessionCheck.php";
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
        $youBirth = $_POST['youBirth'];
        $youPhone = $_POST['youPhone'];
        $youPass = $_POST['youPass'];
        $youNickname = $_POST['youNickname'];
        $memberID = $_SESSION['memberID'];

        $youPhoto = $_FILES['youPhoto'];
        $myPageSize = $_FILES['youPhoto']['size'];
        $myPageType = $_FILES['youPhoto']['type'];
        $myPageName = $_FILES['youPhoto']['name'];
        $myPageTmp = $_FILES['youPhoto']['tmp_name'];

        $memberContents = $connect -> real_escape_string($memberContents);

        // echo $boardID;
        // echo "<pre>";
        // var_dump($youPhoto);
        // echo "</pre>";
        //쿼리문 작성
        $sql = "SELECT * FROM myProject WHERE memberID = {$memberID}";
        $result = $connect -> query($sql);

        if($result){
            $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
            // echo "<pre>";
            // var_dump($memberInfo);
            // echo "</pre>";

            // 이미지 업로드
            $fileTypeExtension = explode("/", $myPageType);
            $fileType = $fileTypeExtension[0];  //image
            $fileExtension = $fileTypeExtension[1];  //jpeg

            // 아이디 비밀번호 확인
            if($memberInfo['memberID'] == $memberID){
                $myPageDir = "../assets/img/";
                $myPageName = "Img_".time().rand(1,99999)."."."{$fileExtension}";
         

                //수정(쿼리문 작성)
                $sql = "UPDATE myProject SET youEmail = '{$youEmail}', youName = '{$youName}', youBirth = '{$youBirth}', youPhone = '{$youPhone}', youPass = '{$youPass}', youNickname = '{$youNickname}', youPhoto = '{$myPageName}' WHERE memberID = '{$memberID}'";
                $connect -> query($sql);
                $result = $connect -> query($sql);
                $result = move_uploaded_file($myPageTmp, $myPageDir.$myPageName);
            } else {
                echo "오류";
            }
        }
        ?>
    <script>
        location.href = "../login/login.php";
    </script>
</body>
</html>