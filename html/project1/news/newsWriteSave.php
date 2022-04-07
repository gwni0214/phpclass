<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>뉴스 글쓰기</title>
</head>
<body>
<?php
    $memberID = $_SESSION['memberID'];
    $newsAuthor = $_SESSION['youName'];
    $newsTitle = $_POST['newsTitle'];
    $newsContents = $_POST['newsContents'];
    $newsView = 1;
    $newsRegTime = time();

    // 이미지 파일 확인하기
    $newsImgFile = $_FILES['newsImgFile'];
    $newsImgSize = $_FILES['newsImgFile']['size'];
    $newsImgType = $_FILES['newsImgFile']['type'];
    $newsImgName = $_FILES['newsImgFile']['Name'];
    $newsImgTmp = $_FILES['newsImgFile']['tmp_name'];

    
    $sql = "SELECT * FROM myNews WHERE memberID = 1";
    $result = $connect -> query($sql);
    if($result){
        $newsInfo = $result -> fetch_array(MYSQLI_ASSOC);
        
        //이미지 파일명 확인
        $fileTypeExtension = explode("/", $newsImgType);
        $fileType = $fileTypeExtension[0];  //image
        $fileExtension = $fileTypeExtension[1];  //jpeg

        if($memberID == 1){
            $myNewsDir = "../assets/img/news/";
            $newsImgName = "Img_".time().rand(1,99999)."."."{$fileExtension}";


            if($fileType == "image"){
                
                if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
                    $sql = "INSERT INTO myNews(memberID, newsTitle, newsContents, newsAuthor, newsView, newsImgFile, newsDelete,newsLike, newsRegTime) 
                    VALUES('$memberID', '$newsTitle', '$newsContents', '$newsAuthor', '$newsView', '$newsImgName', '1', '0', '$newsRegTime')";
                    $result = $connect -> query($sql);
                    $result = move_uploaded_file($newsImgTmp, $myNewsDir.$newsImgName);
                    Header("Location: news.php");
                } else {
                    echo "<script>alert('지원하는 이미지 파일 형식이 아닙니다. jpg, png, gif 사진 파일만 지원 합니다.');</script>";
                    $sql = "INSERT INTO myNews(memberID, newsTitle, newsContents, newsAuthor, newsView, newsImgFile, newsDelete,newsLike, newsRegTime) 
                    VALUES('$memberID', '$newsTitle', '$newsContents', '$newsAuthor', '$newsView', 'default.jpg', '1','0', '$newsRegTime')";
                    $result = $connect -> query($sql);
                    $result = move_uploaded_file($newsImgTmp, $myNewsDir.$newsImgName);
                 }
            } else if ($fileType == "" || $fileType == null){
                echo "<script>alert('게시글이 등록되었습니다.'); location.href = 'news.php';</script>";
                $sql = "INSERT INTO myNews(memberID, newsTitle, newsContents, newsAuthor, newsView, newsImgFile, newsDelete,newsLike, newsRegTime) 
                VALUES('$memberID', '$newsTitle', '$newsContents', '$newsAuthor', '$newsView', 'default.jpg', '1','0', '$newsRegTime')";
                $connect -> query($sql);
                }
        } else {
            echo "<script>alert('권한이 없습니다.'); history.back(1);</script>";
            }
    } echo "페이지 오류";
?>
</body>
</html>
