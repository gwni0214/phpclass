<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    // include "../connect/sessionCheck.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>뉴스 보기</title>

        <!-- 주소
        ekfvoddl0321.dothome.co.kr/project/board/boardView.php 
    -->

    <!-- style -->
    <?php
        include "../include/style.php";
    ?>
    <!-- //style -->

</head>
<body>

        <!-- header -->
    <?php
        include "../include/header.php";
        
    ?>
    <!-- //header -->

    <main id="main">
        <div class="board_section">
            <!-- section -->
            <section class="board">
            <div class="title">
                <div class="title_box">
                    <h2>뉴스 보기</h2>
                    <p>전기차와 관련된 뉴스들은 제공합니다.</p>
                </div>
            </div>
            <div class="board__inner">
                <div class="board__View news__View">
                <?php
                
   $newsID = $_GET['newsID'];

   // echo $newsID; //화면에 누른게시글 아이디값이 나오는지 확인
//    newsID	memberID	newsTitle	newsContents	newsAuthor	newsView	newsImgFile	newsDelete	newsRegTime
 
 
   

    

    $sql = "SELECT b.newsTitle, m.youName, b.regTime, b.newsView, b.newsContents FROM myNews b JOIN myProject m ON(m.memberID = b.memberID) WHERE b.newsID = {$newsID}";
    $result = $connect -> query($sql);

    $sql = "UPDATE myNews SET newsView = newsView + 1 WHERE newsID = {$newsID}";
    $connect -> query($sql);

   


   

    if($result){
        $newsInfo = $result -> fetch_array(MYSQLI_ASSOC);
        $data2 = nl2br($newsInfo['newsContents']);
        // echo "<pre>";
        // var_dump($boardInfo);
        // echo "<pre>";

        echo "<div class='view_Title'>";
        echo " <h3>".$newsInfo['newsTitle']."</h3>";
        echo "</div>";

        echo " <div class='view_Info'>";
        echo " <h3>".$newsInfo['newsAuthor']." : <span>".date('Y-m-d H:i', $newsInfo['newsRegTime'])."<span></h3>";
        echo "</div>";
        echo " <div class='news__View_img'>";
        echo "<img src='../assets/img/news/".$newsInfo['newsImgFile']."' alt='이미지'>";
        echo "</div>";
        echo " <div class='view_Con'>".$data2."</div>";
    }
?>


                    <div class="board__btn">
                        <a href="news.php">목록보기</a>
                        <a href="newsRemove.php?newsID=<?=$newsID?>" onclick="return newsRemove();">삭제하기</a>
                        <a href="newsModify.php?newsID=<?=$newsID?>">수정하기</a>
                    </div>
                </div>
            </div>  
        </section>
    </div>
        </main>

        
        <!-- footer -->
        <?php
        include "../include/footer.php";
    ?>
    <!-- //footer -->
</body>
</html>
<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>


