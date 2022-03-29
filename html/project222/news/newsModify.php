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
    <title>뉴스 수정하기</title>
        <!-- 주소
        ekfvoddl0321.dothome.co.kr/project/board/boardWrite.php
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
                        <h2>뉴스 수정하기</h2>
                    </div>
                </div>
            <div class="board__inner">
            <div class="board__modify">
                        <form action="newsModifySave.php" name="newsModifySave" method="post" enctype="multipart/form-data">
                        <fieldset>
                                <legend class="ir_so">게시글 수정 영역</legend>
<?php
    $newsID = $_GET['newsID'];

    // 쿼리문 작성(해당 ID값의 제목, 내용을 출력)
    $sql = "SELECT newsID, newsTitle, newsContents, newsImgFile FROM myNews WHERE newsID = {$newsID}";
    $result = $connect -> query($sql);

    if($result) {
        $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);

        // echo "<div><label for='boardID'>번호</label><input type='text' name='boardID' id='boardID' value='".$boardInfo[$boardID]."'></div>";
        // echo "<div><label for='boardTitle'>제목</label><input type='text' name='boardTitle' id='boardTitle'>".$boardInfo[$boardTitle]."</div>";
        // echo "<div><label for='boardContents'>내용</label><textarea name='boardContents' id='boardContents' rows='15'>".$boardInfo[$boardContents]."</textarea></div>";
        // echo "<div><label for='boardPass'>비밀번호</label><input type='password' name='boardPass' id='boardPass' placeholder='로그인 비밀번호를 입력해 주세요!'></div>";
        echo " <div class='news__Modi'>";
        echo "<img src='../assets/img/news/".$boardInfo['newsImgFile']."' alt='이미지'>";
        echo "</div>";
        echo "<div style='display:none;'><label for='newsID'>번호</label><input type='text' name='newsID' id='newsID' value='".$boardInfo['newsID']."'></div>";
        echo "<div><label for='newsTitle'>제목</label><input type='text' name='newsTitle' id='newsTitle' value='".$boardInfo['newsTitle']."'></div>";
        echo "<div><label for='newsContents'>내용</label><textarea name='newsContents' id='newsContents'>".$boardInfo['newsContents']."</textarea></div>";
        echo "<div><label for='newsImgFile'>파일</label><input type='file' name='newsImgFile' id='newsImgFile' placeholder='사진을 넣어주세요. 사진은 jpg, gif, png 파일만 지원이 됩니다.'></div>";
        echo "<div><label for='youPass'>비밀번호</label><input type='password' name='youPass' id='youPass' placeholder='로그인 비밀번호를 입력해주세요!!' autocomplete='off' required></div>";
    }
?>
                                <div class="board__btn">
                                    <button type="submit" value="수정하기">수정하기</button>
                                    <a href="news.php">목록보기</a>
                                </div>
                            </fieldset>
                        </form>
                    </div>
            </div>
        </section>
        </main>
        <!-- footer -->
        <?php
        include "../include/footer.php";
    ?>
    <!-- //footer -->
</body>
</html>