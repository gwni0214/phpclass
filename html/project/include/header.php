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
                <li><a href="../map/map.php">지도</a></li>
                <li><a href="javascript:;">뉴스</a></li>
                <li><a href="javascript:;">커뮤니티</a></li>
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
    <div class="menu_hover">
        <div>
            <img src="../assets/img/img01.jpeg" alt="메뉴이미지">
        </div>
        <div class="menu_hoverText">
            <h3>커뮤니티 게시판</h3>
            <p>우리가 함께하는 커뮤니티</p>
        </div>
        <div class="menu_hoverText">
            <ul>
                <p>뉴스 바로가기</p>
                <li>
                    <div><a href="../news/news.php">뉴스 전체보기</a></div>
                    <div><a href="../news/newsIssue.php">주간이슈</a></div>
                </li>
            </ul>
            <ul>
            <p>게시판 바로가기</p>
                <li>
                    <div><a href="../board/board.php">자유게시판</a></div>
                    <div><a href="../notice/notice.php">공지사항</a></div>
                    <div><a href="../service/service.php">고객센터</a></div>
                </li>
            </ul>
        </div>
    </div>

    <div class="menu_hover2">
        <div>
            <img src="../assets/img/news.jpg" alt="메뉴이미지">
        </div>
        <div class="menu_hoverText">
            <h3>뉴스 게시판</h3>
            <p>새로운 소식을 만나보세요!</p>
        </div>
        <div class="menu_hoverText menu_hoverCon">
            <ul>
                <p>뉴스 바로가기</p>
                <li>
                    <div><a href="../news/news.php">뉴스 전체보기</a></div>
                    <div><a href="../news/newsIssue.php">주간이슈</a></div>
                </li>
            </ul>
            <ul>
            <p>게시판 바로가기</p>
                <li>
                    <div><a href="../board/board.php">자유게시판</a></div>
                    <div><a href="../notice/notice.php">공지사항</a></div>
                    <div><a href="../service/service.php">고객센터</a></div>
                </li>
            </ul>
        </div>
    </div>

    
    <script>
            document.querySelector(".header_hidden").addEventListener("click",()=>{
            document.querySelector(".menu_list").classList.toggle("hid")
            document.querySelector(".nav").classList.toggle("hid")
            })

            //히든 메뉴바
            let news = document.querySelector(".menu_list li:nth-child(2)")
            let board = document.querySelector(".menu_list li:nth-child(3)")
            
            news.addEventListener("click",()=>{
            document.querySelector(".menu_hover").classList.remove("active")
            document.querySelector(".menu_hover2").classList.toggle("active")
            })
            board.addEventListener("click",()=>{
            document.querySelector(".menu_hover2").classList.remove("active")
            document.querySelector(".menu_hover").classList.toggle("active")
            })
    </script>