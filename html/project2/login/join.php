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
                <form action="joinSave.php" name="join" method="post" onsubmit="return joinChecks()">
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
                                <a href="#c" class="test" onclick="emailChecking()">중복검사</a>
                                <p class="comment" id="youEmailComment"></p>
                            </div>
                            <div>
                                <div class="label_box">
                                    <label for="youPass" class="label">비밀번호</label>
                                    <a href="javascript:void(0);"></a>
                                </div>
                                <!-- hidden -->
                                <input class="input" type="password" id="youPass" name="youPass" maxlength="20"
                                    placeholder="비밀번호를 입력해 주세요." maxlength="20" autocomplete="off" required>
                                    <p class="comment" id="youPassComment"></p>
                            </div>
                            <div>
                                <div class="label_box">
                                    <label for="youPassC" class="label">비밀번호 확인</label>
                                </div>
                                <input class="input" type="password" id="youPassC" name="youPassC" maxlength="20"
                                    placeholder="다시 비밀번호를 입력해 주세요." maxlength="20" autocomplete="off" required>
                                <p class="comment" id="youPassCComment"></p>
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
                                <p class="comment" id="youNameComment"></p>
                            </div>
                            <div>
                                <div class="label_box">
                                    <label for="youBirth" class="label">생년월일</label>
                                </div>
                                <input class="input" type="date" id="youBirth" name="youBirth" autocomplete="off"required>
                                <p class="comment" id="youBirthComment"></p>
                            </div>
                            <div>
                                <div class="label_box">
                                    <label for="youPhone" class="label">휴대폰 번호</label>
                                </div>
                                <input class="input" type="tel" id="youPhone" name="youPhone" maxlength="15"
                                    placeholder="000-0000-0000"  autocomplete="off" required>
                                <p class="comment" id="youPhoneComment"></p>
                            </div>
                            <div>
                                <div>
                                    <div class="label_box">
                                        <label for="youNickname" class="label">닉네임</label>
                                    </div>
                                    <input class="input" type="text" id="youNickname" name="youNickname" maxlength="10"
                                        placeholder="닉네임을 입력해 주세요." autocomplete="off" required>
                                    <a href="#c" class="test" onclick="nickChecking()">중복검사</a>
                                    <p class="comment" id="youNicknameComment"></p>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        let hidden = document.querySelector(".label_box .logo")
        hidden.addEventListener("mouseover", () => {
            document.querySelector(".hidden").classList.add("active")
        })
        hidden.addEventListener("mouseout", () => {
            document.querySelector(".hidden").classList.remove("active")
        })
        let emailCheck = false;
        let nickCheck = false;
        function emailChecking(){
            let youEmail = $("#youEmail").val();
            
            if(youEmail == null || youEmail == ''){
                $("#youEmailComment").text("이메일을 입력해주세요.");
            } else {
                $.ajax({
                    type : "POST",
                    url : "joinCheck.php",
                    data : {"youEmail" : youEmail, "type": "emailCheck"},
                    dataType : "json",
                    success : function(data){
                        if(data.result == "good"){
                            $("#youEmailComment").text("사용 가능한 이메일 입니다.");
                            emailCheck = true;
                        } else {
                            $("#youEmailComment").text("이미 존재하는 이메일입니다. 로그인을 해주세요.");
                            emailCheck = false;
                        }
                    },
                    error : function(request, status, error){
                        consol.log("request" + request);
                        consol.log("status" + status);
                        consol.log("error" + error);
                    }
                });
            }
        }
        function nickChecking(){
            let youNickname = $("#youNickname").val();
            if(youNickname == null || youNickname == ''){
                $("#youNicknameComment").text("닉네임을 입력해주세요.");
            } else {
                $.ajax({
                    type : "POST",
                    url : "joinCheck.php",
                    data : {"youNickname" : youNickname, "type": "nickCheck"},
                    dataType : "json",
                    success : function(data){
                        if(data.result == "good"){
                            $("#youNicknameComment").text("사용 가능한 닉네임 입니다.");
                            nickCheck = true;
                        } else {
                            $("#youNicknameComment").text("이미 존재하는 닉네임입니다. 변경 해주세요.");
                            nickCheck = false;
                        }
                    },
                    error : function(request, status, error){
                        consol.log("request" + request);
                        consol.log("status" + status);
                        consol.log("error" + error);
                    }
                });
            }
        }
        function joinChecks(){
            
            // 이메일 공백 검사
            if($("#youEmail").val() == ''){
                $("#youEmailComment").text("이메일을 입력해주세요.");
                return false;
            }
            // 이메일 유효성 검사
            let getMail = RegExp(/^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+\.[A-Za-z0-9\-]+/);
            if(!getMail.test($("#youEmail").val())){
                $("#youEmailComment").text("이메일 형식에 맞게 작성해주세요.");
                $("#youEmail").val("");
                return false;
            }
            // 이메일 중복 검사
            if(emailCheck == false){
                $("#youEmailComment").text("이메일 중복 검사를 확인해주세요.");
                return false;
            }
            // 닉네임 공백 검사
            if($("#youNickname").val() == ''){
                $("#youNicknameComment").text("닉네임을 입력해주세요.");
                return false;
            }
            // 닉네임 유효성 검사
            let getNick = RegExp(/^[ㄱ-ㅎ|가-힣|0-9]+$/);
            if(!getNick.test($("#youNickname").val())){
                $("#youNicknameComment").text("닉네임은 한글, 숫자만 사용할 수 있습니다.");
                $("#youNickname").val("");
                return false;
            }
            // 닉네임 중복 검사
            if(nickCheck == false){
                $("#youNicknameComment").text("닉네임 중복 검사를 확인해주세요.");
                return false;
            }
            // 비밀번호 공백 검사
            if($("#youPass").val() == ''){
                $("#youPassComment").text("비밀번호를 입력해주세요.");
                return false;
            }
            
            // 비밀번호 유효성 검사
            let getPass = $("#youPass").val();
            let getPassNum = getPass.search(/[0-9]/g);
            let getPassEng = getPass.search(/[a-z]/ig);
            let getPassSpe = getPass.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);
            if(getPass.length < 8 || getPass.length > 20){
                $("#youPassComment").text("8자리 ~ 20자리 이내로 입력해주세요.");
                return false;
            }else if(getPass.search(/\s/) != -1){
                $("#youPassComment").text("비밀번호는 공백 없이 입력해주세요.");
                return false;
            }else if(getPassNum < 0 || getPassEng < 0 || getPassSpe < 0 ){
                $("#youPassComment").text("영문,숫자, 특수문자를 혼합하여 입력해주세요.");
                return false;
            }
            // 확인 비밀번호 공백 확인
            if($("#youPassC").val() == ''){
                $("#youPassCComment").text("확인 비밀번호를 입력해주세요.");
                return false;
            }
            // 비밀번호 == 확인 비밀번호 맞는지 확인
            if($("#youPass").val() !== $("#youPassC").val()){
                $("#youPassCComment").text("비밀번호가 동일하지 않습니다.");
                return false;
            }
            // 이름 공백 검사
            if($("#youName").val() == ''){
                $("#youNameComment").text("이름을 입력해주세요.");
                return false;
            }
            // 이름 유효성 검사
            let getName = RegExp(/^[가-힣]+$/);
            if(!getName.test($("#youName").val())){
                $("#youNameComment").text("이름은 한글만 사용할 수 있습니다.");
                $("#youName").val("");
                return false;
            }
            // 생년월일 공백 검사
            if($("#youBirth").val() == ''){
                $("#youBirthComment").text("생년월일을 입력해주세요.");
                return false;
            }
            // 생년월일 유효성 검사
            let getBirth = RegExp(/^(19[0-9][0-9]|20\d{2})-(0[0-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/);
            if(!getBirth.test($("#youBirth").val())){
                $("#youBirthComment").text("생년월일이 정확하지 않습니다. 올바른 생년월일(YYYY-MM-DD)을 입력해주세요.");
                $("#youBirth").val("");
                return false;
            }
            // 휴대폰번호 공백 검사
            if($("#youPhone").val() == ''){
                $("#youPhoneComment").text("핸드폰 번호를 입력해주세요.");
                return false;
            }
            // 휴대폰 번호 유효성 검사
            let getPhone = RegExp(/^01([0|1|6|7|8|9]?)-?([0-9]{3,4})-?([0-9]{4})$/);
            if(!getPhone.test($("#youPhone").val())){
                $("#youPhoneComment").text("휴대폰번호가 정확하지 않습니다. 올바른 휴대폰번호(000-0000-0000)를 입력해주세요.");
                $("#youPhone").val("");
                return false;
            }
        }
    </script>
</body>
</html>