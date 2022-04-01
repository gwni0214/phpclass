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
    <title>PHP 사이트</title>
    <?php
            include "../include/style.php";
        ?>
    <!--//style-->
</head>
<body>
<?php
        include "../include/header.php";
    ?>
    <!--//header-->

    <main id="contents">
    <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="blog-type" class="section center mb100 type">
            <div class="container">
                <h3 class="section__title">새로운 자연 경관</h3>
                <p class="section__desc">
                    자연 경관을 담은 블로그를 만나보세요!                   
                </p>
                <div class="blog__inner">
                    <div class="blog__cont">
<?php
 if(isset($_GET['page'])) {
    $page = (int) $_GET['page'];
}else {
    $page = 1;
}
    $pageView = 3;
    $pageLimit = ($pageView * $page) - $pageView;
    $sql ="SELECT blogID, blogTitle, blogCategory, blogContents, blogAuthor, blogRegTime, blogImgFile FROM myBlog WHERE blogDelete = 1 ORDER BY blogID DESC LIMIT {$pageLimit}, {$pageView}";
    $result = $connect -> query($sql);
    $blog = $result -> fetch_array(MYSQLI_ASSOC);
?>
<?php foreach($result as $blog){ ?>
    <article class="blog">
        <figure class="blog__header" aria-hidden="true">
            <a href="../blog/blogView.php?blogID=<?=$blog['blogID']?>" style="background-image:url(../asset/img/blog/<?=$blog['blogImgFile']?>)"></a> 
        </figure> 
        <div class="blog__body"> 
            <span class="blog__cate"><?=$blog['blogCategory']?></span> 
            <div class="blog__title"><?=$blog['blogTitle']?></div> 
            <div class="blog__desc"><?=$blog['blogContents']?></div> 
                <div class="blog__info"> 
                    <span class="author"><a href="#"><?=$blog['blogAuthor']?></a></span> 
                    <span class="date"><?=date('Y-m-d',$blog['blogRegTime'])?></span>                              
                </div> 
        </div> 
    </article> 
<?php } ?>
                        
                        
                    </div>
                    <div class="blog__btn">
                        <a href="#">더 보기</a>
                    </div>
                </div>
            </div>
        </section>
    <!--blog__type-->
    <section id="notice-type" class="section center mb100 gray">
        <div class="container">
            <h3 class="section__title">새로운 자연 경관</h3>
            <p class="section__desc">
                자연 경관을 담은 블로그를 만나보세요!                   
            </p>
            <div class="notice__inner">
                <article class="notice">
                    <h4>공지사항</h4>
                    <ul>
<?php
    $pageView = 4;
    $pageLimit = ($pageView * $page) - $pageView;
    $sql ="SELECT boardID, boardTitle, boardContents, regTime FROM myBoard ORDER BY boardID DESC LIMIT {$pageLimit}, {$pageView}";
    $result = $connect -> query($sql);
    $board = $result -> fetch_array(MYSQLI_ASSOC);
    
?>

<?php foreach($result as $board){ ?>
                        <li><a href="../board/boardView.php?boardID=<?=$board['boardID']?>"><?=$board['boardTitle']?></a><span class="time"><?=date('Y-m-d',$board['regTime'])?></span></li>
                       
<?php } ?>
                    </ul>
                    <a href="../board/board.php" class="more">더보기</a>
                </article>
                <article class="notice">
                    <h4>댓글</h4>
                    <ul>
<?php
    $pageView = 4;
    $pageLimit = ($pageView * $page) - $pageView;
    $sql ="SELECT youText, regTime FROM myComment ORDER BY commentID DESC LIMIT {$pageLimit}, {$pageView}";
    $result = $connect -> query($sql);
    $comment = $result -> fetch_array(MYSQLI_ASSOC);
?>

<?php foreach($result as $comment){ ?>
                        <li><a href="../comment/comment.php"><?=$comment['youText']?></a><span class="time"><?=date('Y-m-d',$comment['regTime'])?></span></li>
                       
<?php } ?>
                    </ul>
                    <a href="../comment/comment.php" class="more">더보기</a>
                </article>
            </div>
        </div>        
    </section>


    </main>
    <!--//main-->

    <?php
    include "../include/footer.php";
    ?>
</body>
</html>