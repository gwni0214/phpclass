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
    <title>문의사항 수정하기</title>

        <!-- 주소
        ekfvoddl0321.dothome.co.kr/project/notice/noticeModify.php 
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
        <h2 class="ir_so">컨텐츠 영역</h2>
        <!-- section -->
        <section id="board-type" class="board">
            <div class="title">
                <div class="title_box">
                    <h2>고객센터</h2>
                    <p>무엇을 도와드릴까요?</p>
                </div>
            </div>
                <div class="board__inner">
                    <div class="board__modify">
                        <form action="serviceModifySave.php" name="serviceModify" method="post">
                            <fieldset>
                                <legend class="ir_so">게시글 수정 영역</legend>
<?php
    $serviceID = $_GET['serviceID'];

    // 쿼리문 작성(해당 ID값의 제목, 내용을 출력)
    $sql = "SELECT serviceID, serviceTitle, serviceContents FROM myProject_Service WHERE serviceID = {$serviceID}";
    $result = $connect -> query($sql);

    if($result) {
        $serviceInfo = $result -> fetch_array(MYSQLI_ASSOC);

        // echo "<div><label for='boardID'>번호</label><input type='text' name='boardID' id='boardID' value='".$boardInfo[$boardID]."'></div>";
        // echo "<div><label for='boardTitle'>제목</label><input type='text' name='boardTitle' id='boardTitle'>".$boardInfo[$boardTitle]."</div>";
        // echo "<div><label for='boardContents'>내용</label><textarea name='boardContents' id='boardContents' rows='15'>".$boardInfo[$boardContents]."</textarea></div>";
        // echo "<div><label for='boardPass'>비밀번호</label><input type='password' name='boardPass' id='boardPass' placeholder='로그인 비밀번호를 입력해 주세요!'></div>";
        
        echo "<div style='display:none;'><label for='serviceID'>번호</label><input type='text' name='serviceID' id='serviceID' value='".$serviceInfo['serviceID']."'></div>";
        echo "<div><label for='serviceTitle'>제목</label><input type='text' name='serviceTitle' id='boardTitle' value='".$serviceInfo['serviceTitle']."'></div>";
        echo "<div><label for='serviceContents'>내용</label><textarea name='serviceContents' id='serviceContents'>".$serviceInfo['serviceContents']."</textarea></div>";
        echo "<div><label for='youPass'>비밀번호</label><input type='password' name='youPass' id='youPass' placeholder='로그인 비밀번호를 입력해주세요!!' autocomplete='off' required></div>";
    }
?>

                                <div class="board__btn">
                                    <button type="submit" value="수정하기">수정하기</button>
                                    <a href="service.php">목록보기</a>
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