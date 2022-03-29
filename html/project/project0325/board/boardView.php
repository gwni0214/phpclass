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
                    <h2>게시글 보기</h2>
                    <p>고객 여러분의 편리한 이용을 위한 다양한 서비스를 제공합니다.</p>
                </div>
                <div class="title_menu">
                    <a href="board.php"><span>자유게시판</span></a>
                    <a href="../notice/notice.php"><span>공지사항</span></a>
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
    $boardID = $_GET['boardID'];

    // echo $boardID; //화면에 누른게시글 아이디값이 나오는지 확인

    $sql = "SELECT b.boardTitle, m.youName, b.regTime, b.boardView, b.boardContents FROM myProject_Board b JOIN myProject m ON(m.memberID = b.memberID) WHERE b.boardID = {$boardID}";
    $result = $connect -> query($sql);

    $sql = "UPDATE myProject_Board SET boardView = boardView + 1 WHERE boardID = {$boardID}";
    $connect -> query($sql);

    if($result){
        $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);

        // echo "<pre>";
        // var_dump($boardInfo);
        // echo "<pre>";

        echo "<tr><th>제목</th><td class='left'>".$boardInfo['boardTitle']."</td></tr>";
        echo "<tr><th>글쓴이</th><td class='left'>".$boardInfo['youName']."</td></tr>";
        echo "<tr><th>등록일</th><td class='left'>".date('Y-m-d H:i', $boardInfo['regTime'])."</td></tr>";
        echo "<tr><th>조회수</th><td class='left'>".$boardInfo['boardView']."</td></tr>";
        echo "<tr><th>내용</th><td class='left height'>".$boardInfo['boardContents']."</td></tr>";
    }

?>
                            </tbody>
                        </table>
                    </div>
                    <div class="board__btn">
                        <a href="board.php">목록보기</a>
                        <a href="boardRemove.php?boardID=<?=$boardID?>" onclick="return noticeRemove();">삭제하기</a>
                        <a href="boardModify.php?boardID=<?=$boardID?>">수정하기</a>
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