<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>이메일 찾기</title>
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
            <form action="emailFindSave.php" name="login" method="post">
                <h2>이메일 찾기</h2>
                <fieldset>
                    <legend class="ir_so">회원 입력폼</legend>
                    <div class="join-box">
                        <div>
                            <div class="label_box">
                                <label for="youName" class="label">이름</label>                                                     
                            </div>                            
                            <input class="input" type="text" id="youName" name="youName" autocomplete="off" autofocus required>
                        </div>
                        <div>
                            <div class="label_box">
                            <label for="youBirth" class="label">생년월일</label>                                                       
                            </div>                            
                            <input class="input" type="date" id="youBirth" name="youBirth" autocomplete="off"required>
                        </div>
                        <div>
                            <div class="label_box">
                            <label for="youPhone" class="label">전화번호</label>                                                       
                            </div>                            
                            <input class="input" type="tel" id="youPhone" name="youPhone" maxlength="15" placeholder="000-0000-0000"  autocomplete="off" required>
                        </div>
                        <button id="joinBtn" class="join-submit" type="submit">이메일 찾기</button>
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