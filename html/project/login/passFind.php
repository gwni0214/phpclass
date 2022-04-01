<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>비밀번호 찾기</title>
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
            <form action="passFindSave.php" name="passFind" method="post">
                <h2>비밀번호 찾기</h2>
                <fieldset>
                    <legend class="ir_so">비밀번호 찾기 입력폼</legend>
                    <div class="join-box">
                        <div>
                            <div class="label_box">
                                <label for="youEmail" class="label">이메일 주소</label>
                            </div>
                            <input class="input" type="email" id="youEmail" name="youEmail" autocomplete="off" autofocus required>
                            <div class="label_box">
                                <label for="youName" class="label">이름</label>
                            </div>
                            <input class="input" type="text" id="youName" name="youName" maxlength="20" autocomplete="off" required>
                            <div class="label_box">
                                <label for="youPass" class="label">새로운 비밀번호</label>
                            </div>
                            <input class="input" type="password" id="youPass" name="youPass" maxlength="20" autocomplete="off" required>
                            <div class="label_box">
                                <label for="youPassC" class="label">비밀번호 확인</label>
                            </div>
                            <input class="input" type="password" id="youPassC" name="youPassC" maxlength="20" autocomplete="off" required>
                            <button id="joinBtn" class="join-submit" type="submit">비밀번호 변경</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </section>
</div>

<?php
        include "../include/footer.php";
    ?>

</body>
</html>