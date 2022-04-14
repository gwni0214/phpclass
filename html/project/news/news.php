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
                    <p>전기차와 관련된 뉴스들을 제공합니다. 새로운 소식 놓치지 마세요!</p>
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
    $sql = "SELECT newsID, newsImgFile, newsTitle, newsContents, newsAuthor, newsLike, newsRegTime FROM myNews ORDER BY newsID DESC LIMIT {$pageLimit}, {$pageView}";
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
                <div class="news__title"><a href="newsView.php?newsID=<?=$news['newsID']?>"><?=$news['newsTitle']?></a>                      
            </div>
                <div class="news__desc"><a href="newsView.php?newsID=<?=$news['newsID']?>"><?=$news['newsContents']?></a></div>

                <div class="news__info">
                    <span class="author"><?=$news['newsAuthor']?></span>
                    <span class="date"><?=date('Y-m-d', $news['newsRegTime'])?></a></span>
                    <!--좋아요-->
                    <button type="button" class="btn-like" data-name="<?=$news['newsID']?>">
                        <span class="heart_shape">좋아요♡</span><span class="likeCount" style="margin-left:10px;"><?=$news['newsLike']?></span></span>                        
                    </button>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    var memberID = "<?=$memberID?>"

if(!memberID){
    $(".btn-like").click(function(){
        alert("로그인 후 이용해주세요!");
    })
    
} else {

    $(".btn-like").on("click", function(e) {
        var button = $(e.currentTarget || e.target)
        var likeCount = button.find(".likeCount")
        var heartShape = button.find(".heart_shape")
        // console.log(heartShape);
        $.ajax({
            type : "POST",
            url : "like.php",
            data : {"articleId": button.data('name'), "memberID": memberID},
            dataType : "json",
            success : function(data){
                var addCount = (data.data == "like" ? 1 : data.data == "unlike" ? -1 : 0)
                likeCount.text(+likeCount.text() + addCount)
                heartShape.text(data.data == "like" ? "좋아요♥" : data.data == "unlike" ? "좋아요♡" : "♡")
            },
            error : function(request, status, error){
                        console.log("request" + request);
                        console.log("status" + status);
                        console.log("error" + error);
            }
        })
    })
    $(".btn-like").each(function(idx, el) {
        var button = $(el)
        var heartShape = button.find(".heart_shape")
        $.get("like.php", {
            getLikedByCode: button.data('name')
        }, function(res) {
            if (res == "unliked") {
                    heartShape.find("i").removeClass("fas").addClass("far")
                } else if (res == "liked") {
                    heartShape.find("i").removeClass("far").addClass("fas")
                }
        })
    })
}
</script>

</body>
</html>