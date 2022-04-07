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
        $blogID = $_POST['blogID'];
        $blogTitle = $_POST['blogTitle'];
        $blogContents = $_POST['blogContents'];
        $blogImgFile = $_FILES['blogImgFile'];
        $youPass = $_POST['youPass'];
        $memberID = $_SESSION['memberID'];
        $blogTitle = $connect -> real_escape_string($blogTitle);
        $blogContents = $connect -> real_escape_string($blogContents);
        $blogImgSize = $_FILES['blogImgFile']['size'];
        $blogImgType = $_FILES['blogImgFile']['type'];
        $blogImgName = $_FILES['blogImgFile']['Name'];
        $blogImgTmp = $_FILES['blogImgFile']['tmp_name'];
        $regTime = time();
        echo $blogID;
        //이미지 파일명 확인
        $fileTypeExtension = explode("/", $blogImgType);
        $fileType = $fileTypeExtension[0];  //image
        $fileExtension = $fileTypeExtension[1];  //jpeg
        $blogDir = "../asset/img/blog/";
        $blogImgName = "Img_".time().rand(1,99999)."."."{$fileExtension}";
        //쿼리문 작성
        $sql = "SELECT youPass, memberID FROM myMember WHERE memberID = {$memberID}";
        $result = $connect -> query($sql);
        if($result){
            $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
            // echo "<pre>";
            // var_dump($blogImgFile);
            // echo "</pre>";
            // 아이디 비밀번호 확인
            if($memberInfo['youPass'] == $youPass && $memberInfo['memberID'] == $memberID){
                //수정(쿼리문 작성)
                if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
                $sql = "UPDATE myBlog SET blogTitle = '{$blogTitle}', blogContents = '{$blogContents}', blogImgFile = '{$blogImgName}', blogModtime = '{$regTime}' WHERE blogID = '{$blogID}'";
                $connect -> query($sql);
                $result = $connect -> query($sql);
                $result = move_uploaded_file($blogImgTmp, $blogDir.$blogImgName);
                } else {
                    $sql = "UPDATE myBlog SET blogTitle = '{$blogTitle}', blogContents = '{$blogContents}',  blogModtime = '{$regTime}' WHERE blogID = '{$blogID}'";
                    $connect -> query($sql);
                }
            } else {
                echo "<script>alert('비밀번호가 일치하지 않습니다. 다시 한번확인해주세요!');</script>";
            }
        }
    ?>
    <script>
        location.href = "blog.php";
    </script>
</body>
</html>