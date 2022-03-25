<!-- 주소 
    ekfvoddl0321.dothome.co.kr/project/include/header.php
 -->

 <header id="header">
        <div class="logo">
            <span class="logo_img"></span>
            <h1><a href="../include/main.php"> Charge Find</a></h1>
        </div>
        <div class="header_hidden"></div>
        <div class="menu_list">
            <li><a href="#">지도</a></li>
            <li><a href="#">뉴스</a></li>
            <li><a href="../include/community.php">커뮤니티</a></li>
        </div>
        </div>
        <div class="nav">
            <ul>
            <?php 
                 if(isset($_SESSION['memberID'])){ 
                    //  $sql = "SELECT * FROM myProject";
                    //  $result = $connect -> query($sql);
                    //  $img = $result -> fetch_array(MYSQLI_ASSOC);
                 
                    //  echo "<pre>";
                    //  var_dump($_SESSION);
                    //  echo "</pre>";
                    $memberID = $_SESSION['memberID'];

                    $sql = "SELECT * FROM myProject WHERE memberID = {$memberID}";
                    $result = $connect -> query($sql);
                    
                
                    if($result){
                        $img = $result -> fetch_array(MYSQLI_ASSOC);
                 
            ?>  <!-- isset 함수는 변수가 설정되었는지 확인해주는 함수입니다. -->
            <li class="setting_li"><a href="../mypage/mypage.php" class="setting">
                <img src="../assets/img/<?=$img['youPhoto']?>" alt="이미지">
            <!-- <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><mask id="mask0_1_955" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="30" height="30"><path d="M15 30C23.2843 30 30 23.2843 30 15C30 6.71573 23.2843 0 15 0C6.71573 0 0 6.71573 0 15C0 23.2843 6.71573 30 15 30Z" fill="white"/></mask><g mask="url(#mask0_1_955)"><path d="M15 30C23.2843 30 30 23.2843 30 15C30 6.71573 23.2843 0 15 0C6.71573 0 0 6.71573 0 15C0 23.2843 6.71573 30 15 30Z" fill="#414141"/><path fill-rule="evenodd" clip-rule="evenodd" d="M15 30.076H26.154V26.523C26.154 25.35 25.352 23.866 24.372 23.226L18.937 19.926C18.512 19.673 18.024 19.306 18.024 18.233C18.024 17.53 18.617 16.973 18.796 16.753C19.6683 15.8065 20.1517 14.5661 20.15 13.279V10.646C20.15 7.79199 17.846 6.15399 15 6.15399C12.153 6.15399 9.84799 7.79199 9.84799 10.646V13.279C9.84799 14.623 10.365 15.838 11.204 16.753C11.382 16.973 11.975 17.53 11.975 18.233C11.975 19.307 11.487 19.673 11.062 19.925L5.62599 23.226C4.64699 23.866 3.84599 25.35 3.84599 26.523V30.076H15Z" fill="#595959"/></g></svg>     -->
            <?=$_SESSION['youNickname']?>님 환영합니다.</a></li>
            <li><a href="../login/logout.php">로그아웃</a></li>
            <?php } ?>
        <?php } else { ?>
            <li><a href="../login/join.php">회원가입</a></li>
            <li><a href="../login/login.php">로그인</a></li>
        <?php } ?>

        
            </ul>
        </div>
    </header>

    
    <script>
            document.querySelector(".header_hidden").addEventListener("click",()=>{
            document.querySelector(".menu_list").classList.toggle("hid")
            document.querySelector(".nav").classList.toggle("hid")
            })
    </script>