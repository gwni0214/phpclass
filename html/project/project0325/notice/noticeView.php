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
            <!-- section -->
            <section class="board">
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
            <div class="board__table">
                        <table>
                            <colgroup>
                                <col style="width: 30%">
                                <col style="width: 70%">
                            </colgroup>
                            <tbody>
<?php
    $noticeID = $_GET['noticeID'];

    // echo $noticeID; //화면에 누른게시글 아이디값이 나오는지 확인

    $sql = "SELECT b.noticeTitle, m.youName, b.regTime, b.noticeView, b.noticeContents FROM myProject_Notice b JOIN myProject m ON(m.memberID = b.memberID) WHERE b.noticeID = {$noticeID}";
    $result = $connect -> query($sql);

    $sql = "UPDATE myProject_Notice SET noticeView = noticeView + 1 WHERE noticeID = {$noticeID}";
    $connect -> query($sql);

    if($result){
        $noticeInfo = $result -> fetch_array(MYSQLI_ASSOC);

        // echo "<pre>";
        // var_dump($noticeInfo);
        // echo "<pre>";

        echo "<tr><th>제목</th><td class='left'>".$noticeInfo['noticeTitle']."</td></tr>";
        echo "<tr><th>글쓴이</th><td class='left'>".$noticeInfo['youName']."</td></tr>";
        echo "<tr><th>등록일</th><td class='left'>".date('Y-m-d H:i', $noticeInfo['regTime'])."</td></tr>";
        echo "<tr><th>조회수</th><td class='left'>".$noticeInfo['noticeView']."</td></tr>";
        echo "<tr><th>내용</th><td class='left height'>".$noticeInfo['noticeContents']."</td></tr>";
    }

?>
                            </tbody>
                        </table>
                    </div>
                    <div class="board__btn">
                        <a href="notice.php">목록보기</a>
                        <a href="noticeRemove.php?noticeID=<?=$noticeID?>" onclick="return noticeRemove();">삭제하기</a>
                        <a href="noticeModify.php?noticeID=<?=$noticeID?>">수정하기</a>
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