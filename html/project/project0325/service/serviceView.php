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
    <title>문의글 보기</title>

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
                    <h2>고객센터</h2>
                    <p>무엇을 도와드릴까요?</p>
                </div>
                <div class="title_menu">
                    <a href="../board/board.php"><span>자유게시판</span></a>
                    <a href="../service/service.php"><span>공지사항</span></a>
                    <a href="service.php"><span>고객센터</span></a>
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
    $serviceID = $_GET['serviceID'];

    // echo $serviceID; //화면에 누른게시글 아이디값이 나오는지 확인

    $sql = "SELECT b.serviceTitle, m.youName, b.regTime, b.serviceView, b.serviceContents FROM myProject_Service b JOIN myProject m ON(m.memberID = b.memberID) WHERE b.serviceID = {$serviceID}";
    $result = $connect -> query($sql);

    $sql = "UPDATE myProject_Service SET serviceView = serviceView + 1 WHERE serviceID = {$serviceID}";
    $connect -> query($sql);

    if($result){
        $serviceInfo = $result -> fetch_array(MYSQLI_ASSOC);

        // echo "<pre>";
        // var_dump($serviceInfo);
        // echo "<pre>";

        echo "<tr><th>제목</th><td class='left'>".$serviceInfo['serviceTitle']."</td></tr>";
        echo "<tr><th>글쓴이</th><td class='left'>".$serviceInfo['youName']."</td></tr>";
        echo "<tr><th>등록일</th><td class='left'>".date('Y-m-d H:i', $serviceInfo['regTime'])."</td></tr>";
        echo "<tr><th>조회수</th><td class='left'>".$serviceInfo['serviceView']."</td></tr>";
        echo "<tr><th>내용</th><td class='left height'>".$serviceInfo['serviceContents']."</td></tr>";
    }

?>
                            </tbody>
                        </table>
                    </div>
                    <div class="board__btn">
                        <a href="service.php">목록보기</a>
                        <a href="serviceRemove.php?serviceID=<?=$serviceID?>" onclick="return serviceRemove();">삭제하기</a>
                        <a href="serviceModify.php?serviceID=<?=$serviceID?>">수정하기</a>
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