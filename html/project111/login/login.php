<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <!-- 주소
  ekfvoddl0321.dothome.co.kr/project/login/login.php
 -->
 <!-- style -->
 <?php
        include "../include/style.php";
    ?>
 <!-- //style -->

</head>
<body>
    <?php
        include "../include/header.php";
    ?>

<div id="join_wrap">
<section class="join_container section">
        <div class="member_form">
            <form action="loginSave.php" name="login" method="post">
                <h2>로그인</h2>
                <fieldset>
                    <legend class="ir_so">회원가입 입력폼</legend>
                    <div class="join-box">
                        <div>
                            <div class="label_box">
                                <label for="youEmail" class="label">이메일 주소</label>
                                <a href="javascript:void(0);"><div class="logo2"></div></a>
                            </div>
                            <!-- hidden -->
                            <div class="hidden2">
                                <p>20자 이내로 @ 포함 작성해 주세요!</p>
                            </div>
                            <!-- hidden -->
                            <input class="input" type="email" id="youEmail" name="youEmail"
                                autocomplete="off" autofocus required>
                        </div>
                        <div>
                            <div class="label_box">
                            <label for="youPass" class="label">비밀번호</label>
                            <a href="javascript:void(0);"><div class="logo"></div></a>
                        </div>
                            <!-- hidden -->
                            <div class="hidden">
                                <p>20글자 이내로 특수문자 사용하여 작성해주세요!</p>
                            </div>
                            <!-- hidden -->
                            <input class="input" type="password" id="youPass" name="youPass" maxlength="20" autocomplete="off" required>
                        </div>
                        <button id="joinBtn" class="join-submit" type="submit">로그인 완료</button>
                    </div>
                </fieldset>
                <span class="line">또는</span>
                <div class="account2"><a href="join.php">계정생성하기</a></div>
            </form>
        </div>
    </section>
</div>

<?php
        include "../include/footer.php";
    ?>
    

    <script>

            let hidden = document.querySelector(".label_box .logo")

            hidden.addEventListener("mouseover", () => {
                document.querySelector(".hidden").classList.add("active")
            })
            hidden.addEventListener("mouseout", () => {
                document.querySelector(".hidden").classList.remove("active")
            })



            let hidden2 = document.querySelector(".label_box .logo2")

            hidden2.addEventListener("mouseover", () => {
                document.querySelector(".hidden2").classList.add("active")
            })
            hidden2.addEventListener("mouseout", () => {
                document.querySelector(".hidden2").classList.remove("active")
            })

</script>
</body>
</html>