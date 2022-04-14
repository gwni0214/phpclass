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
  ekfvoddl0321.dothome.co.kr/project/news/newsIssue.php
 -->
 <!-- style -->
<?php
        include "../include/style.php";
?>
 <!-- //style -->
 <style>
     #header {
         background-color: #1b1b1b;
         border-bottom: 1px solid #7777;
     }
     #footer {
         background-color: #1b1b1b;
         border-top: 1px solid #7777;
     }
     .Mailto ul li a {
    color: #fff;
    line-height: 2;
    }
    .Mailto ul li:first-child {
        color: #fff;
    }
    .git {
    color: #fff;
    }
    .git ul li a {
    color: #ffff;
    }
     .menu_list li a {
         color: #fff;
     }
     .title {
         color: #fff;
     }
     .nav ul li:first-child a {
        color: #fff;
        border: 1px solid #fff;
    }
    .nav ul li a {
        color: #fff;
        border: 1px solid #fff;
    }
     .news {
         display: flex;
     }
     .news_main a {
         color: #fff !important;
     }
     .news_main {
         padding: 40px 100px;
         margin-bottom: 200px;
     }
     .news .news__header{
         margin-left: 100px;
     }

    .news .news__header img{
    border-radius: 10px;
    }
    .menu_hover {
        background-color: #1b1b1b;
        color: #fff;
    }
    .menu_hover a{
        color: #fff;
    }
    .menu_hover2 {
        background-color: #1b1b1b;
        color: #fff;
    }
    .menu_hover2 a{
        color: #fff;
    }
 </style>
</head>
<body>
    <?php
        include "../include/header.php";
    ?>
<main id="main" class="issue">
    <div class="board_section">
        <section class="board">
            <div class="title">
                <div class="title_box">
                    <h2>주간 NEWS</h2>
                    <p>금주의 핫한 새로운 소식 놓치지 마세요!</p>
                </div>
                <!-- 이미지 타입 -->
                    <!-- <div>
                        <img src="../assets/img/board_main.jpg" alt="이미지">
                    </div> -->
                </div>
            </div>
            <div class="board__inner">
                <div class="news__cont newsissue_box">
<?php
    //b.boardID, b.boardTitle, m.youName, b.regTime, b.boardView
    if(isset($_GET['page'])) {
        $page = (int) $_GET['page'];
    }else {
        $page = 1;
    }
    // 게시판 불러올 갯수
    $pageView = 3;
    $pageLimit = ($pageView * $page) - $pageView;
    $sql = "SELECT * FROM myNews ORDER BY newsLike DESC LIMIT {$pageLimit}, {$pageView}";
    // $sql = "SELECT * FROM myNews WHERE newsDelete = 1 ORDER BY newsID DESC";
    $result = $connect -> query($sql);
    if($result){
        $count = $result -> num_rows;
        $news = $result -> fetch_array(MYSQLI_ASSOC);
    }
?>
<?php foreach($result as $news){ ?>
    <article class="news_issue">
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
        </section>
    </div>

    <?php
    // 게시판 불러올 갯수
    $sql2 = "SELECT * FROM myNews ORDER BY newsID DESC LIMIT 3";
    // $sql = "SELECT * FROM myNews WHERE newsDelete = 1 ORDER BY newsID DESC";
    $result2 = $connect -> query($sql2);
    if($result2){
        $news2 = $result2 -> fetch_array(MYSQLI_ASSOC);
    }
?>
    <?php foreach($result2 as $news2){ ?>
    <article class="news">
            <figure class="news__header">
                <a href="newsView.php?newsID=<?=$new2s['newsID']?>"><img src="../assets/img/news/<?=$news2['newsImgFile']?>" alt="뉴스 이미지"></a>
            </figure>
            <div class="news__body news_main">
                <div class="news__title"><a href="newsView.php?newsID=<?=$news2['newsID']?>"><?=$news2['newsTitle']?></a>                      
            </div>
                <div class="news__desc"><a href="newsView.php?newsID=<?=$news2['newsID']?>"><?=$news2['newsContents']?></a></div>

                <div class="news__info">
                    <span class="author"><?=$news2['newsAuthor']?></span>
                    <span class="date"><?=date('Y-m-d', $news2['newsRegTime'])?></a></span>
                    <!--좋아요-->
                    <button type="button" class="btn-like" data-name="<?=$news2['newsID']?>">
                        <span class="heart_shape">좋아요♡</span><span class="likeCount" style="margin-left:10px;"><?=$news2['newsLike']?></span></span>                        
                    </button>
                </div>
            </div>
    </article>
    <?php } ?>

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