<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
    <?php
        include "../include/style.php";
    ?>
</head>
<body>
    <?php
        include "../include/header.php";
    ?>
    <!--//header-->
    <!-- <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
            <section class="join-type">

            </section>
    </main> -->

    <?php
        include "../include/footer.php";
    ?>
    <!--//footer-->

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
            
            // echo $youEmail, $youPass, $youPass, $youName, $youBirth, $youPhone, $regTime;


            // 메세지 출력
            function msg($alert){
                echo "<p class='alert'>{$alert}</p>";
            }
            // // 이메일 유효성 검사
            // $check_email = filter_var($youEmail, FILTER_VALIDATE_EMAIL);
            // $check_email = preg_match("/^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i", $youEmail);

            // if($check_email == false){
            //     echo "이메일이 잘못되었습니다. <br> 올바른 이메일을 적어주세요.";
            //     exit;
            // }

            // 비밀번호 유효성 검사
            if($youPass !== $youPassC){
                msg("비밀번호가 일치하지 않습니다. <br>다시 한번 확인해주세요!");
                exit;
            }
           


            //이름 유효성 검사
            $check_name = preg_match("/^[가-힣]{1,}$/", $youName);

            if($check_name == false){
                msg("이름이 정확하지 않습니다.<br>한글로만 적어주세요!");
                exit;
            }
            // //닉네임 유효성 검사
            $check_Nick = preg_match("/^[가-힣]{1,}$/", $youNickname);

            if($check_Nick == false){
                msg("닉네임이 정확하지 않습니다.<br>한글로만 적어주세요!");
                exit;
            }
            //성별 검사
            // $genderAnswer = $_POST['youGender'];
            // if($genderAnswer == "남자"){
                  
            // } else {
            //     msg("성별을 선택해주세요!");
            //    exit;
            // }
            

            //생년월일 유효성 검사
            $check_birth = preg_match("/^(19[0-9][0-9]|20[0-9][0-9])-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $youBirth);

            if($check_birth == false){
                msg("생년월일이 정확하지 않습니다.<br>올바른 생년월일(YYYY-MM-DD)을 적어주세요!");
                exit;
            }

            // //휴대폰 번호 유효성 검사
            $check_phone = preg_match("/^(010|011|016|017|018|019)-[0-9]{3,4}-[0-9]{4}$/", $youPhone);

            if($check_phone == false){
                msg("번호가 정확하지 않습니다.<br>올바른 번호(000-0000-0000)를 적어주세요!");
                exit;
            }

            //회원가입 -> 유효성 검사 통과 -> 이메일 주소(중복검사)&& 핸드폰 번호 중복검사 ->중복된 데이터가 있으면 --> 로그인유도
            //회원가입 -> 유효성 검사 통과 -> 이메일 주소(중복검사)&& 핸드폰 번호 중복검사 ->중복된 데이터가 없으면-> 회원가입 등록


            //이메일주소 중복검사
            $isEmailCheck = false;
            //이메일 목록 가져오기
            $sql = " SELECT youEmail FROM myProject WHERE youEmail = '$youEmail'";
            $result = $connect -> query($sql);

            if($result){
                $count = $result -> num_rows;
                if($count == 0){
                    //회원가입 가능
                    $isEmailCheck = true;
                } else {
                    msg("이미 회원가입이 되어 있습니다. 로그인을 해주세요!");
                    exit;
                }
            } else {
                msg("에러발생01 -- 관리자에게 문의하세요!");
                exit;
            }
            // //핸드폰 번호 중복검사
            $isPhoneCheck = false;
            //핸드폰 번호 목록 가져오기
            $sql = " SELECT youPhone FROM myProject WHERE youPhone = '$youPhone'";
            $result = $connect -> query($sql);

            if($result){
                $count = $result -> num_rows;
                if($count == 0){
                    //회원가입 가능
                    $isPhoneCheck = true;
                } else {
                    msg("이미 회원가입이 되어 있습니다. 로그인을 해주세요!");
                    exit;
                }
            } else {
                msg("에러발생02 -- 관리자에게 문의하세요!");
                exit;
            }

            //회원가입
            if($isEmailCheck = true && $isPhoneCheck = true){
                $sql = "INSERT INTO myProject(youEmail, youPass, youGender, youName, youBirth, youPhone, youNickname, regTime) VALUES('$youEmail', '$youPass', '$youGender', '$youName', '$youBirth', '$youPhone', '$youNickname', '$regTime')";

                $result = $connect -> query($sql);

                if($result){
                    msg("회원가입을 축하합니다. 로그인을 해주세요!");
                } else {
                    msg("에러발생03 -- 관리자에게 문의하세요");
                    exit;                    
                } 
            }else {
                msg("이메일 또는 핸드폰 번호가 틀립니다. 다시 한번 확인해주세요!");
            }
        

            

        ?>
</body>
</html>