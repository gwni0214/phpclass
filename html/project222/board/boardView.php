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
                    <h2>게시글 보기</h2>
                    <p>고객 여러분의 편리한 이용을 위한 다양한 서비스를 제공합니다.</p>
                </div>
            </div>
            <div class="board__inner">
                <div class="board__View">
                <?php
    $boardID = $_GET['boardID'];

    // echo $boardID; //화면에 누른게시글 아이디값이 나오는지 확인

    $sql = "SELECT b.boardTitle, m.youName, b.regTime, b.boardView, b.boardContents FROM myProject_Board b JOIN myProject m ON(m.memberID = b.memberID) WHERE b.boardID = {$boardID}";
    $result = $connect -> query($sql);

    $sql = "UPDATE myProject_Board SET boardView = boardView + 1 WHERE boardID = {$boardID}";
    $connect -> query($sql);

    if($result){
        $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);
        $data2 = nl2br($boardInfo['boardContents']);

        // echo "<pre>";
        // var_dump($boardInfo);
        // echo "<pre>";

        echo "<div class='view_Title'>";
        echo " <h3>".$boardInfo['boardTitle']."</h3>";
        echo "</div>";

        echo " <div class='view_Info'>";
        echo " <h3>".$boardInfo['youName']." : <span>".date('Y-m-d H:i', $boardInfo['regTime'])."<span></h3>";
        echo "</div>";
        echo "<img src='../assets/img/board.jpg' alt='이미지'>";

        echo " <div class='view_Con'>".$data2."</div>";
    }
?>

                    <div class="board__btn">
                        <a href="board.php">목록보기</a>
                        <a href="boardRemove.php?boardID=<?=$boardID?>" onclick="return noticeRemove();">삭제하기</a>
                        <a href="boardModify.php?boardID=<?=$boardID?>">수정하기</a>
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

<!-- <table>
                            <colgroup>
                                <col style="width: 30%">
                                <col style="width: 70%">
                            </colgroup>
                            <tbody>
                                <tr>
                                <td class='left table_Title'>나랏말사미</td>
                                <div class="table_Info">
                                        <td class='left'>현우</td>
                                        <td class='left'>2022-01-22</td>
                                </div>
                                  
                                </tr>
                                <tr><th>내용</th><td class='left height'>언제 어디서나 스마트 모빌리티 파트너, 에버온 입니다. 저희 에버온에서는 보다 안정적인 충전 서비스를 위해 아래와 같이 시스템 업그레이드를 진행할 예정입니다. 업그레이드 시간 중에는 부득이 일부 서비스가 중단됨에 따라 회원님들께 불편을 끼쳐드리게 되어 송구합니다. 앞으로도 저희 에버온은 더욱 편리한 충전서비스를 제공 할 수 있도록 최선의 노력을 다하겠습니다. 1. 작업일시 : 2020. 12. 22 (화) 02:00 ~ 05:00 2. 서비스별 중단 시간 1) 02:00 ~ 05:00 웹/앱 서비스 중단, 알림용 문자/메일 발송 및 결제 중단 2) 04:00 ~ 05:00 충전 시작 불가 (회원카드 태깅시 인식 불가) 단, 4시 이전 시작된 충전은 계속 유지되고 충전 종료도 가능 * 작업이 완료되는 05:00 ~ 이후 즉시 서비스가 재가동될 예정입니다. * 단, 업그레이드 작업 중 긴급사항 발생시 서비스 재가동 시각은 변동될 수 있습니다.</td></tr>
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

        // echo "<tr><th>제목</th><td class='left'>".$boardInfo['boardTitle']."</td></tr>";
        // echo "<tr><th>글쓴이</th><td class='left'>".$boardInfo['youName']."</td></tr>";
        // echo "<tr><th>등록일</th><td class='left'>".date('Y-m-d H:i', $boardInfo['regTime'])."</td></tr>";
        // echo "<tr><th>조회수</th><td class='left'>".$boardInfo['boardView']."</td></tr>";
        // echo "<tr><th>내용</th><td class='left height'>".$boardInfo['boardContents']."</td></tr>";
    }

?>
                            </tbody>
                        </table> -->