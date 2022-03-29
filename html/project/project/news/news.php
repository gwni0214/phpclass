<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    // include "../connect/sessionCheck.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Charger Find</title>
    <!-- 주소
  ekfvoddl0321.dothome.co.kr/project/board/board.php
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
<main id="main">
    <div class="board_section">
        <section class="board">
            <div class="title">
                <div class="title_box">
                    <h2>전기차 News</h2>
                    <p>전기차와 관련된 뉴스들은 제공합니다.</p>
                </div>
                <!-- 이미지 타입 -->
                    <!-- <div>
                        <img src="../assets/img/board_main.jpg" alt="이미지">
                    </div> -->
                </div>
            </div>
            <div class="board__inner">
                <div class="board__search">
                    <form action="newsSearch.php" name="newsSearch" method="get" class="board_form">
                        <fieldset>
                            <legend class="ir_so">뉴스 검색 영역</legend>
                            <div class="center inpyt_form">
                                <input type="search" name="searchKeyword" class="search-form" placeholder="검색어를 입력하세요." aria-label="search" required>
                                <button type="sumit" class="search_img"></button>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="news__cont">
<?php
    //b.boardID, b.boardTitle, m.youName, b.regTime, b.boardView
    if(isset($_GET['page'])) {
        $page = (int) $_GET['page'];
    }else {
        $page = 1;
    }
    // 게시판 불러올 갯수
    $pageView = 5;
    $pageLimit = ($pageView * $page) - $pageView;
    $sql = "SELECT newsID, newsImgFile, newsTitle, newsContents, newsAuthor, newsRegTime FROM myNews ORDER BY newsID DESC LIMIT {$pageLimit}, {$pageView}";
    // $sql = "SELECT * FROM myNews WHERE newsDelete = 1 ORDER BY newsID DESC";
    $result = $connect -> query($sql);
    if($result){
        $count = $result -> num_rows;
        $news = $result -> fetch_array(MYSQLI_ASSOC);
    }
?>
<?php foreach($result as $news){ ?>
    <article class="news">
            <figure class="news__header">
                <a href="newsView.php?newsID=<?=$news['newsID']?>"><img src="../assets/img/news/<?=$news['newsImgFile']?>" alt="뉴스 이미지"></a>
            </figure>
            <div class="news__body">
                <div class="news__title"><a href="newsView.php?newsID=<?=$news['newsID']?>"><?=$news['newsTitle']?></a></div>
                <div class="news__desc"><a href="newsView.php?newsID=<?=$news['newsID']?>"><?=$news['newsContents']?></a></div>
                <div class="news__info">
                    <span class="author"><?=$news['newsAuthor']?></span>
                    <span class="date"><?=date('Y-m-d', $news['newsRegTime'])?></a></span>
                </div>
            </div>
    </article>
<?php } ?>
                </div>
                <div class="right">
                    <a href="newsWrite.php" class="search-btn">글쓰기</a>
                </div>
                <div class="board__pages">
                    <ul>
<?php
   include "newsPage.php";
?>
                    </ul>
                </div>
        </section>
    </div>
</main>
<?php
        include "../include/footer.php";
    ?>
</body>
</html>