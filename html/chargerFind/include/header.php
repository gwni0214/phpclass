          
    </header>
    <header id="header">
        <div class="logo">
            <span class="logo_img"></span>
            <h1><a href="../pages/main.php"> Charge Find</a></h1>
        </div>
        <div class="header_hidden"></div>
        <div class="menu_list">
            <li><a href="#">지도</a></li>
            <li><a href="#">뉴스</a></li>
            <li><a href="../board/board.php">커뮤니티</a></li>
        </div>
        </div>
        <div class="nav">
            <ul>
            <?php if(isset($_SESSION['memberID'])){ ?>
        <li><a href="#"><?=$_SESSION['youNickname']?>님 환영합니다.</a></li>
        <li><a href="../login/logout.php">로그아웃</a></li>
        <?php } else { ?>
            <li><a href="../login/join.php">회원 가입</a></li>
            <li><a href="../login/login.php">로그인</a></li>
            <?php } ?>
                    </ul>
        </div>
    </header>