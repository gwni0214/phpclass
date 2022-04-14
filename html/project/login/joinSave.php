<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>

        <!-- style -->
    <?php
        include "../include/style.php";
    ?>
    <!-- //style -->

</head>
<!-- 주소
    ekfvoddl0321.dothome.co.kr/project/login/joinSave.php 
-->
<body>
<?php
        include "../include/header.php";
?>
<!-- //header -->

<div id="join_wrap">
<section class="join_container section">
        <div class="join_mo">

        </div>
    </section>
</div>


<?php
        include "../include/footer.php";
?>
<!-- //footer -->
<?php

include "../connect/connect.php";

    $youEmail = $_POST['youEmail'];
    $youPass = $_POST['youPass'];
    $youPassC = $_POST['youPassC'];
    $youGender = $_POST['youGender'];
    $youName = $_POST['youName'];
    $youBirth = $_POST['youBirth'];
    $youPhone = $_POST['youPhone'];
    $youNickname = $_POST['youNickname'];
    $youPhoto = $_POST['youPhoto'];
    $regTime = time();

// echo $youEmail, $youPass, $youPassC, $youName, $youBirth, $youPhone, $regTime;

$youEmail = $connect -> real_escape_string(trim($_POST['youEmail']));
$youNickname = $connect -> real_escape_string(trim($_POST['youNickname']));
$youName = $connect -> real_escape_string(trim($_POST['youName']));
$youBirth = $connect -> real_escape_string(trim($_POST['youBirth']));
$youPhone = $connect -> real_escape_string(trim($_POST['youPhone']));
$youPass = $connect -> real_escape_string(trim($_POST['youPass']));


function msg($alert){
    echo "<p class='alert'>{$alert}</p>";
}

//비밀번호 유효성 검사
if($youPass !== $youPassC){
    msg("비밀번호가 일치하지 않습니다.<br>다시 확인 해주세요!");
    exit; //조건이 맞으면 바로 끝남. 밑으로 안내려감

    // $youPass = $connect -> real_escape_string($youPass); //해킹방지
}

//회원가입
if($isEmailCheck = true && $isPhoneCheck = true){
    $sql = "INSERT INTO myProject(youEmail, youPass, youGender, youName, youBirth, youPhone, youNickname, youPhoto, regTime) 
    VALUES('$youEmail', '$youPass', '$youGender', '$youName', '$youBirth', '$youPhone', '$youNickname', 'default.svg', '$regTime')";
    
    $result = $connect -> query($sql);

    if($result){
        msg("회원가입을 축하합니다. 로그인을 해주세요.");
    } else {
        msg("에러발생01 -- 관리자에게 문의하세요.");
        exit;
    }
} else {
    msg("이메일 또는 핸드폰 번호가 틀립니다. 다시 한번 확인해주세요.");
}
?>

</body>
</html>