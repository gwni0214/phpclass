<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    // include "../connect/sessionCheck.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원 가입</title>
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
                <form action="mypageSave.php" name="join" method="post" enctype="multipart/form-data">
                    <h2>계정 수정하기</h2>
                    <fieldset>
                        <legend class="ir_so">회원가입 입력폼</legend>
                        <label for='youPhoto' class="youFace youFace2"><img src="../assets/img/<?=$img['youPhoto']?>" alt="이미지"></label>
                        <div class="join-box">

<?php
    $memberID = $_SESSION['memberID'];

    $sql = "SELECT * FROM myProject WHERE memberID = {$memberID}";
    $result = $connect -> query($sql);
    

    if($result){
        $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
            echo "<div><div class='label_box'><label for='youEmail' class='label'>이메일 주소</label></div><input class='input' type='email' id='youEmail' name='youEmail' maxlength='30' placeholder='Email 주소를 입력해 주세요.' autocomplete='off' autofocus  value='".$memberInfo['youEmail']."' required></div>";
            echo "<div><div class='label_box'><label for='youName' class='label'>이름</label></div><input class='input' type='text' id='youName' name='youName' placeholder='이름을 적어주세요.' autocomplete='off' value='".$memberInfo['youName']."' required></div>";
            echo "<div><div class='label_box'><label for='youBirth' class='label'>생년월일</label></div><input class='input' type='date' id='youBirth' name='youBirth' autocomplete='off' value='".$memberInfo['youBirth']."' required></div>";
            echo "<div><div class='label_box'><label for='youPhone' class='label'>휴대폰 번호</label></div><input class='input' type='tel' id='youPhone' name='youPhone' maxlength='15' placeholder='000-0000-0000' autocomplete='off'  value='".$memberInfo['youPhone']."' required></div>";
            echo "<div><div class='label_box'><label for='youPass' class='label'>비밀번호</label><a href='javascript:void(0);'><div class='logo'></div></a></div> <div class='hidden'><p>20글자 이내로 특수문자 사용하여 작성해주세요!</p></div> <input class='input' type='password' id='youPass' name='youPass' maxlength='20' placeholder='비밀번호를 입력해 주세요.' maxlength='20' autocomplete='off' value='".$memberInfo['youPass']."' required></div>";
            echo "<div><div class='label_box'><label for='youNickname' class='label'>닉네임</label></div><input class='input' type='text' id='youNickname' name='youNickname' maxlength='10'placeholder='닉네임을 입력해 주세요.' autocomplete='off' value='".$memberInfo['youNickname']."' required></div>";
            echo "<div><div class='label_box'><label for='youPhoto' class='label'>파일</label></div><input class='input' type='file' id='youPhoto' name='youPhoto'></div>";

        }

                               
?>
                            <button id="joinBtn" class="join-submit" type="submit">계정 수정하기</button>
                            </div>
                    </fieldset>
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