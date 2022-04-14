<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>뉴스 검색</title>
        <!-- style -->
        <?php
        include "../include/style.php";
    ?>
    <!-- //style -->
</head>
<body>
        <!-- header -->
    <?php
        include "../include/header.php";
    ?>
    <!-- //header -->
    <main id="main">
    <div class="board_section">
        <section class="board">
            <div class="title">
                <div class="title_box">
                    <h2>뉴스 검색하기</h2>
                    <p>전기차와 관련된 뉴스들은 제공합니다.</p>
                </div>
            </div>
            <div class="board__inner">
                <div class="board__search">
                <?php
    function msg($alert){
        echo "<p class='result'>총 ".$alert." 건이 검색되었습니다.</p>";
    }
    $searchKeyword = $_GET['searchKeyword'];
    $searchOption = $_GET['searchOption'];
    $searchKeyword = $connect -> real_escape_string(trim($searchKeyword));
    $searchOption = $connect -> real_escape_string(trim($searchOption));
    //쿼리문 작성
    $sql = "SELECT b.newsID, b.newsTitle, b.newsContents, m.youName, b.newsRegTime, b.newsImgFile, b.newsView FROM myNews b JOIN myProject m ON(b.memberID = m.memberID) WHERE b.newsTitle LIKE '%{$searchKeyword}%' ORDER BY newsID DESC" ;
    $result = $connect -> query($sql);
    
    //갯수파악
    if($result){
        $count2 = $result -> num_rows;
        msg($count2);
    }
?>
                    </div>
                <div class="news__cont">
<?php
    //b.boardID, b.boardTitle, m.youName, b.regTime, b.boardView
        if(isset($_GET['page'])){
            $page = (int) $_GET['page'];
        } else {
            $page = 1;
        }
        //게시판 불러올 갯수
        $pageView = 3;
        $pageLimit = ($pageView * $page) - $pageView;
        //LIMIT {$pageLimit}, {$pageView}
        $sql = "SELECT b.newsID, b.newsTitle, b.newsContents, m.youName, b.newsRegTime, b.newsImgFile, b.newsView FROM myNews b JOIN myProject m ON(b.memberID = m.memberID) WHERE b.newsTitle LIKE '%{$searchKeyword}%' ORDER BY newsID DESC LIMIT {$pageLimit}, {$pageView}" ;
        $result = $connect -> query($sql);
        if($result){
            $count = $result -> num_rows;
            if($result > 0){
                for($i=1; $i<=$count; $i++){
                    $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);

                    echo "<article class='news'>";
                    echo "<figure class='news__header'>";
                    // echo "<img src='../assets/img/news/Img_16484315324445.jpeg' alt='뉴스 이미지'>";
                    echo "<a href='newsView.php?newsID=".$boardInfo['newsID']."'><img src='../assets/img/news/".$boardInfo['newsImgFile']."' alt='뉴스 이미지'></a>";
                    echo "</figure>";
                    echo "<div class='news__body'>";
                    echo "<div class='news__title'><a href='newsView.php?newsID=".$boardInfo['newsID']."'>".$boardInfo['newsTitle']."</a></div>";
                    echo "<div class='news__desc'><a href='newsView.php?newsID=".$boardInfo['newsID']."'>".$boardInfo['newsContents']."</a></div>";
                    echo "<div class='news__info'>";
                    echo "<span class='author'>".$boardInfo['youName']."</span>";
                    echo "<span class='date'>".date('Y-m-d',$boardInfo['newsRegTime'])."</span>";
                    echo "</div>";
                    echo "</div>";
                    echo "</article>";
                }
            }
        }
?>
                </div>
                <div class="right">
                    <a href="news.php" class="search-btn">목록보기</a>
                </div>
                <div class="board__pages">
                    <ul>
                    <?php
    $result -> fetch_array(MYSQLI_ASSOC);
    $boardCount = $count2;
    //총 페이지 갯수
    $boardCount = ceil($boardCount/$pageView);
    //현재 페이지를 기준으로 보여주고싶은 갯수
    $pageCurrent = 5;
    $startPage = $page - $pageCurrent;
    $endPage = $page +$pageCurrent;
    //처음 페이지 초기화(마이너스 값 안나오게)
    if($startPage < 1){
        $startPage = 1;
    }
    //마지막 페이지 초기화(30넘어서 안나오게)
    if($endPage >= $boardCount){
        $endPage = $boardCount;
    }
    //페이지 넘버 표시
    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";
        if($i == $page){
            $active = "active";
        }
        echo "<li class='{$active}'><a href='newsSearch.php?page={$i}&searchKeyword={$searchKeyword}'>{$i}</a></li>";
    }
?>
                    </ul>
                </div>
        </section>
    </div>
</main>
            <!-- footer -->
    <?php
        include "../include/footer.php";
    ?>
    <!-- //footer -->
</body>
</html>