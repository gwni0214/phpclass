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
    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
            <section class="join-type">
                <div class="member-form">
                    <h3>계정 생성하기</h3>                                                    
                    <form action="joinSave.php" name="join" method="post">
                        <fieldset>
                            <legend class="ir_so">회원가입 입력 폼</legend>
                            <div class="join-box">
                                <div>
                                    <label for="youEmail">이메일 주소</label>                                    
                                    <input type="email" id="youEmail" name="youEmail" placeholder="Sample@naver.com" autocomplete="off" autofocus required>
                                </div>
                                <div>
                                    <label for="youPass">비밀번호</label>
                                    <img class="BP" src="../html/asset/img/BP.png" alt="느낌표">
                                    <div class="hidden">
                                        <p>20글자 이내로 특수문자 사용하여 작성해주세요!</p>
                                    </div> 
                                    <input type="password" id="youPass" name="youPass" maxlength="20" placeholder="비밀번호를 적어주세요!" autocomplete="off"  required>
                                </div>
                                <div>
                                    <label for="youPassC">비밀번호 확인</label> 
                                    <input type="password" id="youPassC" name="youPassC" maxlength="20" placeholder="다시 비밀번호를 적어주세요!" autocomplete="off"  required>
                                </div>
                                <div>
                                    <label for="youGender" class="label">성별</label>
                                    <div class="gender">
                                        <div><p>남자</p><input class="gendertype" type="radio" id="youGender" name="youGender" value="male"></div>
                                        <div><p>여자</p><input class="gendertype" type="radio" id="youGender" name="youGender" value="female"></div>
                                    </div>
                                </div>                                                                    
                                <div>
                                    <label for="youName">이름</label> 
                                    <input type="text" id="youName" name="youName" maxlength="5" placeholder="이름을 적어주세요!" autocomplete="off"  required>
                                </div>
                                <div>
                                    <label for="youBirth">생년월일</label> 
                                    <input type="text" id="youBirth" name="youBirth" placeholder="YYYY-MM-DD" maxlength="12" autocomplete="off"  required>
                                </div>
                                <div>
                                    <label for="youPhone">휴대폰 번호</label> 
                                    <input type="text" id="youPhone" name="youPhone" placeholder="000-0000-0000" maxlength="15" autocomplete="off"  required>
                                </div>
                                <div>
                                    <label for="youNickname">닉네임</label> 
                                    <input type="text" id="youNickname" name="youNickname" placeholder="닉네임을 적어주세요!" maxlength="15" autocomplete="off"  required>
                                </div>
                            </div>
                            <button id="joinBtn" class="join-submit" type="submit">계정 생성하기</button>
                            <span class="spanOR">또 는</span>
                            <button id="loginBtn" class="login-submit">로그인 하러가기</button>
                        </fieldset>
                    </form>
                </div>
            </section>
    </main>

    <?php
        include "../include/footer.php";
    ?>
    <!--//footer-->
</body>
</html>