<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
    <!-- 주소
  ekfvoddl0321.dothome.co.kr/project/login/join.php
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
    <!-- //header -->

    <main id="join_wrap">
        <section class="join_container section">
            <div class="member_form">
                <form action="joinSave.php" name="join" method="post">
                    <h2>계정 생성하기</h2>
                    <fieldset>
                        <legend class="ir_so">회원가입 입력폼</legend>
                        <div class="join-box">
                            <div>
                                <div class="label_box">
                                    <label for="youEmail" class="label">이메일 주소</label>
                                </div>
                                <input class="input" type="email" id="youEmail" name="youEmail" maxlength="30"
                                    placeholder="Email 주소를 입력해 주세요." autocomplete="off" autofocus required>
                            </div>
                            <div>
                                <div class="label_box">
                                    <label for="youPass" class="label">비밀번호</label>
                                    <a href="javascript:void(0);">
                                        <div class="logo"></div>
                                    </a>
                                </div>
                                <!-- hidden -->
                                <div class="hidden">
                                    <p>20글자 이내로 특수문자 사용하여 작성해주세요!</p>
                                </div>
                                <!-- hidden -->
                                <input class="input" type="password" id="youPass" name="youPass" maxlength="20"
                                    placeholder="비밀번호를 입력해 주세요." maxlength="20" autocomplete="off" required>
                            </div>
                            <div>
                                <div class="label_box">
                                    <label for="youPassC" class="label">비밀번호 확인</label>
                                </div>
                                <input class="input" type="password" id="youPassC" name="youPassC" maxlength="20"
                                    placeholder="다시 비밀번호를 입력해 주세요." maxlength="20" autocomplete="off" required>
                            </div>
                            <div>
                                <div class="label_box">
                                    <p>성별</p>
                                </div>
                                <label class="radio"><input type="radio" name="youGender" value="남성" id="youGender" required> 남성</label>
                                <label class="radio"><input type="radio" name="youGender" value="여성" id="youGender" required> 여성</label>
                            </div>
                            <div>
                                <div class="label_box">
                                    <label for="youName" class="label">이름</label>
                                </div>
                                <input class="input" type="text" id="youName" name="youName"
                                    placeholder="이름을 적어주세요." autocomplete="off" required>
                            </div>
                            <div>
                                <div class="label_box">
                                    <label for="youBirth" class="label">생년월일</label>
                                </div>
                                <input class="input" type="date" id="youBirth" name="youBirth" autocomplete="off"required>
                            </div>
                            <div>
                                <div class="label_box">
                                    <label for="youPhone" class="label">휴대폰 번호</label>
                                </div>
                                <input class="input" type="tel" id="youPhone" name="youPhone" maxlength="15"
                                    placeholder="000-0000-0000"  autocomplete="off" required>
                            </div>
                            <div>
                                <div>
                                    <div class="label_box">
                                        <label for="youNickname" class="label">닉네임</label>
                                    </div>
                                    <input class="input" type="text" id="youNickname" name="youNickname" maxlength="10"
                                        placeholder="닉네임을 입력해 주세요." autocomplete="off" required>
                                </div>
                            </div>
                            <button id="joinBtn" class="join-submit" type="submit">계정 생성하기</button>

                    </fieldset>
                    <span class="line">또는</span>
                    <div class="account"><a href="login.php">로그인</a></div>
                </form>
            </div>
        </section>
    </main>


    <script>
        let hidden = document.querySelector(".label_box .logo")

        hidden.addEventListener("mouseover", () => {
            document.querySelector(".hidden").classList.add("active")
        })
        hidden.addEventListener("mouseout", () => {
            document.querySelector(".hidden").classList.remove("active")
        })

    </script>
</body>

</html>