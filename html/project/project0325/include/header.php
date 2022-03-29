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
            <li><a href="../include/main.php#community">커뮤니티</a></li>
        </div>
        </div>
        <div class="nav">
            <ul>
            <?php 
                 if(isset($_SESSION['memberID'])){ 
                    //  echo "<pre>";
                    //  var_dump($_SESSION);
                    //  echo "</pre>";
                    $memberID = $_SESSION['memberID'];

                    $sql = "SELECT * FROM myProject WHERE memberID = {$memberID}";
                    $result = $connect -> query($sql);
                    
                
                    if($result){
                        $img = $result -> fetch_array(MYSQLI_ASSOC);
                 
            ?>
            <li class="setting_li"><a href="../mypage/mypage.php" class="setting">
                <img src="../assets/img/<?=$img['youPhoto']?>" alt="이미지">
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