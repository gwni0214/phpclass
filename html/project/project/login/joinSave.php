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
    $regTime = time();

// echo $youEmail, $youPass, $youPassC, $youName, $youBirth, $youPhone, $regTime;

function msg($alert){
    echo "<p class='alert'>{$alert}</p>";
}

//비밀번호 유효성 검사
if($youPass !== $youPassC){
    msg("비밀번호가 일치하지 않습니다.<br>다시 확인 해주세요!");
    exit; //조건이 맞으면 바로 끝남. 밑으로 안내려감

    // $youPass = $connect -> real_escape_string($youPass); //해킹방지
}

//이름 유효성 검사
$check_name = preg_match("/^[가-힣]{1,}$/", $youName);
if($check_name == false){
    msg("이름이 정확하지 않습니다.<br>한글로만 적어주세요!");
    exit; //조건이 맞으면 바로 끝남. 밑으로 안내려감
    // $check_name = $connect -> real_escape_string($check_name); //해킹방지
}
// 닉네임
// $check_nickname = preg_match($youNickname);
// if($check_nickname == false){
//     msg("이미 사용중인 닉네임이 있습니다. 다시한번 확인해 주세요");
//     exit; //조건이 맞으면 바로 끝남. 밑으로 안내려감
//     // $check_name = $connect -> real_escape_string($check_name); //해킹방지
// }

//생년월일 유효성 검사
$check_birth = preg_match("/^(19[0-9][0-9]|20[0-9][0-9])-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $youBirth);
if($check_birth == false){
    msg("생년월일이 정확하지 않습니다.<br>올바른 생년월일(YYYY-MM-DD)을 적어주세요!");
    exit;
}

//휴대폰 번호 유효성 검사
$check_phone = preg_match("/^(010|011|016|017|018|019)-[0-9]{3,4}-[0-9]{4}$/", $youPhone);
if($check_phone == false){
    msg("번호가 정확하지 않습니다.<br>올바른 번호(000-0000-0000)을 입력해주세요!");
    exit; //조건이 맞으면 바로 끝남. 밑으로 안내려감
}

//회원가입 --> 유효성 통과 --> 이메일주소(중복검사) && 핸드폰 번호(중복검사) --> 중복된 데이터가 있으면 --> 로그인 유도
//회원가입 --> 유효성 통과 --> 이메일주소(중복검사) && 핸드폰 번호(중복검사) --> 중복된 데이터가 없으면 --> 회원가입 유도

//이메일 주소(중복검사)
$isEmailCheck = false;

//이메일 목록 가져오기
$sql = "SELECT youEmail from myProject WHERE youEmail = '$youEmail'";
$result = $connect -> query($sql);

if($result){
    $count = $result -> num_rows;
    if($count == 0){
        //회원가입 가능
        $isEmailCheck = true;
    }else {
        msg("이미 회원가입이 되어있습니다. 로그인을 해주세요!");
        exit;
    }
} else {
    msg("에러발생01 -- 관리자에게 문의하세요!");
    exit;
}

//핸드폰 번호 중복검사
$isPhoneCheck = false;

//휴대폰 목록 가져오기
$sql = "SELECT youPhone from myProject WHERE youPhone = '$youPhone'";
$result = $connect -> query($sql);

if($result){
    $count = $result -> num_rows;
    if($count == 0){
        //회원가입 가능
        $isPhoneCheck = true;
    }else {
        msg("이미 회원가입이 되어있습니다. 로그인을 해주세요!");
        exit;
    }
} else {
    msg("에러발생02 -- 관리자에게 문의하세요!");
    exit;
}

//회원가입
if($isEmailCheck = true && $isPhoneCheck = true){
    $sql = "INSERT INTO myProject(youEmail, youPass, youGender, youName, youBirth, youPhone, youNickname, regTime) 
    VALUES('$youEmail', '$youPass', '$youGender', '$youName', '$youBirth', '$youPhone', '$youNickname', '$regTime')";
    
    $result = $connect -> query($sql);

    if($result){
        msg("회원가입을 축하합니다. 로그인을 해주세요.");
    } else {
        msg("에러발생03 -- 관리자에게 문의하세요.");
        exit;
    }
} else {
    msg("이메일 또는 핸드폰 번호가 틀립니다. 다시 한번 확인해주세요.");
}
?>

</body>
</html>