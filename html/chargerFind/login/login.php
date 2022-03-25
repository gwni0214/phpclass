<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <?php
        include "../include/style.php";
    ?>
</head>
<body>
    <?php
        include "../include/header.php";
    ?>
    <!--//header-->
    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
            <section class="join-type">
                <div class="member-form">
                    <h3>로그인</h3>                                                    
                    <form action="loginSave.php" name="join" method="post">
                        <fieldset>
                            <legend class="ir_so">로그인 폼</legend>
                            <div class="join-box">
                                <div>
                                    <label for="youEmail">이메일 주소</label>
                                    <img class="BP" src="../html/asset/img/BP.png" alt="느낌표">
                                    <div class="hidden">
                                        <p>이메일 양식에 맞게 작성해주세요!</p>
                                    </div>  
                                    <input type="email" id="youEmail" name="youEmail" placeholder="Sample@naver.com" autocomplete="off" autofocus required>
                                </div>
                                <div>
                                    <label for="youPass">비밀번호</label>
                                    <img class="BP2" src="../html/asset/img/BP.png" alt="느낌표">
                                    <div class="hidden2">
                                        <p>20글자 이내로 특수문자 사용하여 작성해주세요!</p>
                                    </div> 
                                    <input type="password" id="youPass" name="youPass" maxlength="20" placeholder="비밀번호를 적어주세요!" autocomplete="off"  required>
                                </div>                               
                            </div>
                            <button id="joinBtn" class="join-submit mt0" type="submit">로그인 완료</button>
                            <span class="spanOR">또 는</span>
                            <button id="loginBtn" class="login-submit" type="submit">로그인 하기</button>
                        </fieldset>
                    </form>
                </div>
            </section>
    </main>

    <?php
        include "../include/footer.php";
    ?>
    <!--//footer-->
    <?php
        include "../include/script.php";
    ?>
</body>
</html>