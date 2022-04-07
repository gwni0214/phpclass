<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
    // include "../connect/sessionCheck.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>마이페이지</title>
    <!--  주소
        ekfvoddl0321.dothome.co.kr/project/mypage/mypage.php
    -->
    <!-- style -->
    <?php
        include "../include/style.php";
    ?>
    <!-- //style -->

</head>
<body>
    <!-- skip -->

    <!-- header -->
    <?php
        include "../include/header.php";
    ?>
    <!-- //header -->

    <main id="join_wrap">
        <section class="join_container section">
            <div class="member_form">
                <form>
                    <h2>마이페이지</h2>
                    
                        <div class="youFace"><img src="../assets/img/<?=$img['youPhoto']?>" alt="이미지"></div>
                        <div class="join-box2">




            <ul>
            <?php
    $memberID = $_SESSION['memberID'];

    $sql = "SELECT * FROM myProject WHERE memberID = {$memberID}";
    $result = $connect -> query($sql);
    if($result){
        $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
        echo "<li><strong>이메일</strong><span>".$memberInfo['youEmail']."</span></li>";
        echo "<li><strong>닉네임</strong><span>".$memberInfo['youNickname']."</span></li>";
        echo "<li><strong>이름</strong><span>".$memberInfo['youName']."</span></li>";
        echo "<li><strong>생일</strong><span>".$memberInfo['youBirth']."</span></li>";
        echo "<li><strong>번호</strong><span>".$memberInfo['youPhone']."</span></li>";
        echo "<li><strong>성별</strong><span>".$memberInfo['youGender']."</span></li>";
        
    }
?>
                
            </ul>
        </div>
        
                    <a href="mypageModify.php" class="mypageBtn">계정 수정하기</a>
                    <a href="mypageRemove.php" class="mypageBtn2">계정 탈퇴하기</a>
                </form>
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
