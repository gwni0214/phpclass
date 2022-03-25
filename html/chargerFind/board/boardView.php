<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시글 보기</title>
    <?php
        include "../include/style.php";
    ?>
</head>
<body>
<?php
        include "../include/header.php";
    ?>
    <!--//header-->


    <main id="board_contents">
                <h2 class="ir_so">컨텐츠 영역</h2>
                <section id="board-type" class="section center mb100">
                    <div class="container">
                        <h3 class="section__title">게시글 보기</h3>
                        <p class="section__desc">
                            자연 경관을 담은 글을 만나보세요!                   
                        </p>
                        <div class="board__inner">                   
                            <div class="board__table">
                                <table>
                                    <colgroup>
                                        <col style="width: 30%;">
                                        <col style="width: 70%;">
                                    </colgroup>
                                    <tbody>

                                    <?php
    $boardID = $_GET['boardID'];

    $sql = "SELECT b.boardTitle, m.youName, b.regTime, b.boardView, b.boardContents FROM myProject_Board b JOIN myProject m ON(m.memberID = b.memberID) WHERE b.boardID = {$boardID}";
    $result = $connect -> query($sql);

    $sql = "UPDATE myProject_Board SET boardView = boardView+1 WHERE boardID = {$boardID}";
    $connect -> query($sql);


    if($result){
        $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);
        
        // echo "<pre>";
        // var_dump($boardInfo);
        // echo "</pre>";

        echo "<tr><th>제목</th><td class='left'>".$boardInfo['boardTitle']."</td></tr>";
        echo "<tr><th>글쓴이</th><td class='left'>".$boardInfo['youName']."</td></tr>";
        echo "<tr><th>등록일</th><td class='left'>".date('Y-m-d H:i', $boardInfo['regTime'])."</td></tr>";
        echo "<tr><th>조회수</th><td class='left'>".$boardInfo['boardView']."</td></tr>";
        echo "<tr><th>내용</th><td class='left height'>".$boardInfo['boardContents']."</td></tr>";
    }    
?>
                                        <!-- <tr>
                                            <th>제목</th>
                                            <td class="left">히말라야 경관을 확인해보세요!</td>
                                        </tr>
                                        <tr>
                                            <th>글쓴이</th>
                                            <td class="left">박근희</td>
                                        </tr>
                                        <tr>
                                            <th>등록일</th>
                                            <td class="left">2022-03-17</td>
                                        </tr>
                                        <tr>
                                            <th>조회수</th>
                                            <td class="left">10</td>
                                        </tr>
                                        <tr>
                                            <th>내용</th>
                                            <td class="left height">남극에사는 펭귄은 
                                                이것저것 먹습니다ㅁㄴㅇㅁㄴㅇㅁㄴㅇㅁㄴㅇㅁㄴㅇㅁㄴㅇ.
                                                이것도 먹고 저것도 먹고 다 많이 먹고 귀엽고 합니다. 정말 귀엽죠?
                                                펭펭펭 펭귄짱</td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="board__btn">
                                <a href="board.php">목록보기</a>
                                <a href="boardRemove.php?boardID=<?=$boardID?>" onclick="return noticeRemove();">삭제하기</a>
                                <a href="boardModify.php?boardID=<?=$boardID?>">수정하기</a>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
            <!-- //main -->

    <?php
        include "../include/footer.php";
    ?>

        <script>
            function noticeRemove(){
                let notice = confirm("정말 삭제하시겠습니까?", "");
                return notice;
            }
        </script>
</body>
</html>