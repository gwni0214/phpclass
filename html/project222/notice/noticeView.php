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
    <title>게시글 보기</title>

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
                    <h2>공지사항</h2>
                    <p>새로운 소식을 빠르게 만나보세요.</p>
                </div>
            </div>
            <div class="board__inner">
                <div class="board__View">
<?php
   $noticeID = $_GET['noticeID'];

   // echo $noticeID; //화면에 누른게시글 아이디값이 나오는지 확인

   $sql = "SELECT b.noticeTitle, m.youName, b.regTime, b.noticeView, b.noticeContents FROM myProject_Notice b JOIN myProject m ON(m.memberID = b.memberID) WHERE b.noticeID = {$noticeID}";
   $result = $connect -> query($sql);

   $sql = "UPDATE myProject_Notice SET noticeView = noticeView + 1 WHERE noticeID = {$noticeID}";
   $connect -> query($sql);

    if($result){
        $noticeInfo = $result -> fetch_array(MYSQLI_ASSOC);
        $data2 = nl2br($noticeInfo['noticeContents']);
        // echo "<pre>";
        // var_dump($boardInfo);
        // echo "<pre>";

        echo "<div class='view_Title'>";
        echo " <h3>".$noticeInfo['noticeTitle']."</h3>";
        echo "</div>";

        echo " <div class='view_Info'>";
        echo " <h3>".$noticeInfo['youName']." : <span>".date('Y-m-d H:i', $noticeInfo['regTime'])."<span></h3>";
        echo "</div>";
        echo "<img src='../assets/img/notice.jpg' alt='이미지'>";

        echo " <div class='view_Con'>".$data2."</div>";
    }
?>

                    <div class="board__btn">
                        <a href="notice.php">목록보기</a>
                        <a href="noticeRemove.php?noticeID=<?=$noticeID?>" onclick="return noticeRemove();">삭제하기</a>
                        <a href="noticeModify.php?noticeID=<?=$noticeID?>">수정하기</a>
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
