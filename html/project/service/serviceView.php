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
        ekfvoddl0321.dothome.co.kr/project/service/serviceView.php 
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
                        <h2>고객센터</h2>
                        <p>무엇을 도와드릴까요?</p>
                    </div>
                </div>
                <div class="board__inner">
                    <div class="board__View">
<?php
    $serviceID = $_GET['serviceID'];

    // echo $serviceID; //화면에 누른게시글 아이디값이 나오는지 확인

    $sql = "SELECT b.serviceTitle, m.youName, b.regTime, b.serviceView, b.serviceContents FROM myProject_Service b JOIN myProject m ON(m.memberID = b.memberID) WHERE b.serviceID = {$serviceID}";
    $result = $connect -> query($sql);

    $sql = "UPDATE myProject_Service SET serviceView = serviceView + 1 WHERE serviceID = {$serviceID}";
    $connect -> query($sql);

    if($result){
        $serviceInfo = $result -> fetch_array(MYSQLI_ASSOC);
        $data2 = nl2br($serviceInfo['serviceContents']);

        // echo "<pre>";
        // var_dump($boardInfo);
        // echo "<pre>";

        echo "<div class='view_Title'>";
        echo " <h3>".$serviceInfo['serviceTitle']."</h3>";
        echo "</div>";

        echo " <div class='view_Info'>";
        echo " <h3>".$serviceInfo['youName']." : <span>".date('Y-m-d H:i', $serviceInfo['regTime'])."<span></h3>";
        echo "</div>";
        echo "<img src='../assets/img/service.jpg' alt='이미지'>";

        echo " <div class='view_Con'>".$data2."</div>";
    }
?>

                        <div class="board__btn">
                            <a href="service.php">목록보기</a>
                            <a href="serviceRemove.php?serviceID=<?=$serviceID?>" onclick="return noticeRemove();">삭제하기</a>
                            <a href="serviceModify.php?serviceID=<?=$serviceID?>">수정하기</a>
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
