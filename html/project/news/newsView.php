<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>뉴스 보기</title>

        <!-- 주소
        ekfvoddl0321.dothome.co.kr/project/board/boardView.php 
    -->

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
            <!-- section -->
            <section class="board">
            <div class="title">
                <div class="title_box">
                    <h2>뉴스 보기</h2>
                    <p>전기차와 관련된 뉴스들은 제공합니다.</p>
                </div>
            </div>
            <div class="board__inner">
                <div class="board__View news__View">
                <?php
                
   $newsID = $_GET['newsID'];

   // echo $newsID; //화면에 누른게시글 아이디값이 나오는지 확인
//    newsID	memberID	newsTitle	newsContents	newsAuthor	newsView	newsImgFile	newsDelete	newsRegTime
   $sql = "SELECT * FROM myNews WHERE newsID = {$newsID}";
   $result = $connect -> query($sql);

    if($result){
        $newsInfo = $result -> fetch_array(MYSQLI_ASSOC);
        $data2 = nl2br($newsInfo['newsContents']);
        // echo "<pre>";
        // var_dump($boardInfo);
        // echo "<pre>";

        echo "<div class='view_Title'>";
        echo " <h3>".$newsInfo['newsTitle']."</h3>";
        echo "</div>";

        echo " <div class='view_Info'>";
        echo " <h3>".$newsInfo['newsAuthor']." : <span>".date('Y-m-d H:i', $newsInfo['newsRegTime'])."<span></h3>";
        echo "</div>";
        echo " <div class='news__View_img'>";
        echo "<img src='../assets/img/news/".$newsInfo['newsImgFile']."' alt='이미지'>";
        echo "</div>";
        echo " <div class='view_Con'>".$data2."</div>";
    }
?>

                    <!--좋아요-->
                    <button type="button" class="btn-like" data-name="<?=$newsInfo['newsID']?>" style="float:left; margin-top:10px; ">
                        <span class="heart_shape">좋아요♡</span><span class="likeCount" style="margin-left:10px;"><?=$newsInfo['newsLike']?></span></span>                        
                    </button>
                    <div class="board__btn">                     
                        <a href="news.php">목록보기</a>
                        <a href="newsRemove.php?newsID=<?=$newsID?>" onclick="return newsRemove();">삭제하기</a>
                        <a href="newsModify.php?newsID=<?=$newsID?>">수정하기</a>
                    </div>
                </div>
            </div>  
        </section>
    </div>
        </main>

        
        <!-- footer -->
        <?php
        include "../include/footer.php";
    ?>
    <!-- //footer -->
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



