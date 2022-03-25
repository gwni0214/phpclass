
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
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $memberID = $_SESSION['memberID'];
    $blogAuthor = $_SESSION['youName'];
    $blogCategory = $_POST['blogCategory'];
    $blogTitle = $_POST['blogTitle'];
    $blogContents = $_POST['blogContents'];    
    $blogView = 1;
    $blogLike = 0;
    $blogRegtime = time();
    
    $blogImgFile = $_FILES['blogImgFile'];
    $blogImgSize = $_FILES['blogImgFile']['size'];
    $blogImgType = $_FILES['blogImgFile']['type'];
    $blogImgName = $_FILES['blogImgFile']['name'];
    $blogImgTmp = $_FILES['blogImgFile']['tmp_name'];
    //이차배열로 var_dummp 안의 값 가져오기
    // echo $blogImgSize;
    // echo "<pre>";
    // echo var_dump($blogImgFile);
    // echo "</pre>";
    // array(5) {
    //     ["name"]=>
    //     string(12) "windmill.jpg"
    //     ["type"]=>
    //     string(10) "image/jpeg"
    //     ["tmp_name"]=>
    //     string(14) "/tmp/phpI9veKA"
    //     ["error"]=>
    //     int(0)
    //     ["size"]=>
    //     int(161317)
    //   }

    

    //이미지 파일명 확인
    $fileTypeExtension = explode("/",$blogImgType); //split 메서드와 동일
    $fileType = $fileTypeExtension[0]; //image
    $fileExtension = $fileTypeExtension[1];  //jpeg
    
    // echo $fileType;
    // echo $fileExtension;

    //이미지 확인작업 / 이미지 확장자 확인 작업/ 용량확인(숙제)
    if($fileType == "image"){
        //확장자 확인
        if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
            $blogImgDir = "../asset/img/blog/";
            $blogImgName = "Img_".time().rand(1,99999)."."."{$fileExtension}";             
                $sql = "INSERT INTO myBlog(memberID, blogTitle, blogContents, blogAuthor, blogCategory, blogView, blogLike, blogImgFile, blogImgSize, blogDelete, blogRegtime) VALUES('$memberID', '$blogTitle', '$blogContents', '$blogAuthor', '$blogCategory', '$blogView', '$blogLike', '$blogImgName', '$blogImgSize', '1', '$blogRegtime')";                                      
        } else {
            echo "<script>alert('지원하는 이미지 파일 형식이 아닙니다. jpg, png, gif 사진 파일만 지원 합니다.'); history.back(1);</script>";
        }
    } else {
        $sql = "INSERT INTO myBlog(memberID, blogTitle, blogContents, blogAuthor, blogCategory, blogView, blogLike, blogImgFile, blogDelete, blogRegtime) VALUES('$memberID', '$blogTitle', '$blogContents', '$blogAuthor', '$blogCategory', '$blogView', '$blogLike', 'default.svg', '1', '$blogRegtime')";        
    }
    $result = $connect -> query($sql);
    $result = move_uploaded_file($blogImgTmp, $blogImgDir.$blogImgName);
    Header("Location: blog.php");
    
?>
 


</body>
</html>