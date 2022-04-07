<?php
    include "../connect/connect.php";
    // include "../connect/session.php";
    
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
                    
                        
                        <div class="join-box2">
            <ul>
            <?php
    // WHERE youName = {$youName}, youBirth = {$youBirth}, youPhone = {$youPhone}
    $youName = $_POST['youName'];
    $youBirth = $_POST['youBirth'];
    $youPhone = $_POST['youPhone'];
    // echo $youName;
    // echo $youBirth;
    // echo $youPhone;
    $sql = "SELECT * FROM myProject WHERE youPhone = '{$youPhone}'" ;
    $result = $connect -> query($sql);
    $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
    // echo "<pre>";
    // echo var_dump($memberInfo['youName']);
    // echo "</pre>";
   
    if($result){
        
        if($youName == $memberInfo['youName'] && $youBirth == $memberInfo['youBirth'] && $youPhone == $memberInfo['youPhone']){
            echo "<li><strong>이메일</strong><span>".$memberInfo['youEmail']."</span></li>";
        }
         else {
            echo "<li><strong>입력하신 정보가 일치하지 않습니다! 다시 입력해주세요!</strong></li>";
            
        }
        
    }
    
?>
                
            </ul>
        </div>
        
                    <a href="login.php" class="mypageBtn">로그인 하러가기</a>
                    <a href="passFind.php" class="mypageBtn2">비밀번호 찾기</a>
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
