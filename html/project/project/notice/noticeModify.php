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
    <title>게시글 수정하기</title>

        <!-- 주소
        ekfvoddl0321.dothome.co.kr/project/notice/noticeModify.php 
    -->

    <!-- style -->
    <?php
        include "../include/style.php";
    ?>
    <!-- //style -->

    <style>
        #footer {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>

        <!-- header -->
    <?php
        include "../include/header.php";
        
    ?>
    <!-- //header -->

    <main id="main">
    <div class="board_section">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <!-- section -->
        <section id="board-type" class="board">
            <div class="title">
                <div class="title_box">
                    <h2>공지사항</h2>
                    <p>새로운 소식을 빠르게 만나보세요.</p>
                </div>
                <div class="title_menu">
                    <a href="../board/board.php"><span>자유게시판</span></a>
                    <a href="notice.php"><span>공지사항</span></a>
                    <a href="../service/service.php"><span>고객센터</span></a>
                </div>
            </div>
                <div class="board__inner">
                    <div class="board__modify">
                        <form action="noticeModifySave.php" name="noticeModify" method="post">
                            <fieldset>
                                <legend class="ir_so">게시글 수정 영역</legend>
<?php
    $noticeID = $_GET['noticeID'];

    // 쿼리문 작성(해당 ID값의 제목, 내용을 출력)
    $sql = "SELECT noticeID, noticeTitle, noticeContents FROM myProject_Notice WHERE noticeID = {$noticeID}";
    $result = $connect -> query($sql);

    if($result) {
        $noticeInfo = $result -> fetch_array(MYSQLI_ASSOC);

        // echo "<div><label for='boardID'>번호</label><input type='text' name='boardID' id='boardID' value='".$boardInfo[$boardID]."'></div>";
        // echo "<div><label for='boardTitle'>제목</label><input type='text' name='boardTitle' id='boardTitle'>".$boardInfo[$boardTitle]."</div>";
        // echo "<div><label for='boardContents'>내용</label><textarea name='boardContents' id='boardContents' rows='15'>".$boardInfo[$boardContents]."</textarea></div>";
        // echo "<div><label for='boardPass'>비밀번호</label><input type='password' name='boardPass' id='boardPass' placeholder='로그인 비밀번호를 입력해 주세요!'></div>";
        
        echo "<div style='display:none;'><label for='noticeID'>번호</label><input type='text' name='noticeID' id='noticeID' value='".$noticeInfo['noticeID']."'></div>";
        echo "<div><label for='noticeTitle'>제목</label><input type='text' name='noticeTitle' id='boardTitle' value='".$noticeInfo['noticeTitle']."'></div>";
        echo "<div><label for='noticeContents'>내용</label><textarea name='noticeContents' id='noticeContents'>".$noticeInfo['noticeContents']."</textarea></div>";
        echo "<div><label for='youPass'>비밀번호</label><input type='password' name='youPass' id='youPass' placeholder='로그인 비밀번호를 입력해주세요!!' autocomplete='off' required></div>";
    }
?>

                                <div class="board__btn">
                                    <button type="submit" value="수정하기">수정하기</button>
                                    <a href="notice.php">목록보기</a>
                                </div>
                            </fieldset>
                        </form>
                    </div>
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