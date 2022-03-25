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
    <title>회원 정보</title>

    <?php
        include "../include/style.php";
    ?>
    <!-- //style -->
</head>
<body>
    <?php
        include "../include/skip.php";
    ?>
    <!-- //skip -->
    
    <?php
        include "../include/header.php";
    ?>
    <!-- //header -->

    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section class="join-type gray">
            <div class="member-form">
                <h3>회원 정보</h3>

                <form action="mypageModifySave.php" name="mypage" method="post">
                    <fieldset>
                        <legend class="ir_so">회원정보 입력폼</legend>
                        <div class="join-intro">
                            <div class="face">
<?php
    $memberID = $_SESSION['memberID'];
    $youIntro = $_POST['youIntro'];
    $youEmail = $_POST['youEmail'];
    $youNickName = $_POST['youNickName'];
    $youName = $_POST['youName'];
    $youBirth = $_POST['youBirth'];
    $youPhone = $_POST['youPhone'];
    $youGender = $_POST['youGender'];
    $youSite = $_POST['youSite'];
    $youPass = $_POST['youPass'];
    $youPhoto = $_POST['youPhoto'];
    $sql = "SELECT youEmail, youNickName, youName, youBirth, youPhone, youGender, youSite, youIntro, youPhoto FROM myMember WHERE memberID = {$memberID}";
    $result = $connect -> query($sql);
    $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
?>
    <img src="../asset/img/mypage/<?=$memberInfo['youPhoto']?>" alt="이미지">

                                
                            </div>
                        </div>
                        <div class="join-box">
                       <div class="modify"><label for="youPhoto">파일</label><input type="file" name="youPhoto" id="youPhoto" placeholder="사진을 넣어주세요. 사진은 jpg, gif, png 파일만 지원이 됩니다."></div>
<?php
    

    $sql = "SELECT youEmail, youNickName, youName, youBirth, youPhone, youGender, youSite, youIntro, youPhoto FROM myMember WHERE memberID = {$memberID}";
    $result = $connect -> query($sql);

    if($result){
        $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
        
       
        echo "<div class='modify'><label for='youIntro'>자기 소개</label><input type='text' id='youIntro' name='youIntro' autocomplete='off' value='".$memberInfo['youIntro']."'></div>";
        echo "<div class='modify'><label for='youEmail'>이메일</label><input type='email' id='youEmail' name='youEmail' autocomplete='off' value='".$memberInfo['youEmail']."'></div>";
        echo "<div class='modify'><label for='youNickName'>닉네임</label><input type='text' id='youNickName' name='youNickName' maxlength='20' autocomplete='off' value='".$memberInfo['youNickName']."'></div>";
        echo "<div class='modify'><label for='youName'>이름</label><input type='text' id='youName' name='youName' maxlength='5' autocomplete='off' value='".$memberInfo['youName']."'></div>";
        echo "<div class='modify'><label for='youBirth'>생년월일</label><input type='text' id='youBirth' name='youBirth' maxlength='12' autocomplete='off' value='".$memberInfo['youBirth']."'></div>";
        echo "<div class='modify'><label for='youPhone'>핸드폰 번호</label><input type='text' id='youPhone' name='youPhone' maxlength='15' autocomplete='off' value='".$memberInfo['youPhone']."'></div>";
        echo "<div class='modify'><label for='youGender'>성별</label><input type='text' id='youGender' name='youGender' maxlength='5' autocomplete='off' value='".$memberInfo['youGender']."'></div>";
        echo "<div class='modify'><label for='youSite'>사이트</label><input type='text' id='youSite' name='youSite' maxlength='15' autocomplete='off' value='".$memberInfo['youSite']."'></div>";
        echo "<div class='modify'><label for='youPass'>비밀번호 입력</label><input type='password' id='youPass' name='youPass' maxlength='15' placeholder='로그인 비밀번호를 입력해주세요.' autocomplete='off'></div>";
    }
?>
                            <!-- <div class="modify">
                                <label for="youEmail">이메일</label>
                                <input type="email" id="youEmail" name="youEmail" autocomplete="off">
                            </div>
                            <div class="modify">
                                <label for="youName">이름</label>
                                <input type="text" id="youName" name="youName" maxlength="5" autocomplete="off">
                            </div>
                            <div class="modify">
                                <label for="youBirth">생년월일</label>
                                <input type="text" id="youBirth" name="youBirth" maxlength="12" autocomplete="off">
                            </div>
                            <div class="modify">
                                <label for="youPhone">휴대폰 번호</label>
                                <input type="text" id="youPhone" name="youPhone" maxlength="15" autocomplete="off">
                            </div>
                            <div>
                                <label for="youPass">비밀번호 입력</label>
                                <input type="password" id="youPass" name="youPass" maxlength="15" placeholder="로그인 비밀번호를 입력해주세요." autocomplete="off" required>
                            </div> -->


                        </div>
                        <button id="joinBtn" class="join-submit" type="submit">회원정보 수정</button>
                        
                    </fieldset>
                </form>

            </div>
        </section>
    </main>
    <!-- //main -->

    <?php
        include "../include/footer.php";
    ?>
    <!-- //footer -->
</body>
</html>