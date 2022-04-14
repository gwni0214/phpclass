<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    // include "../connect/sessionCheck.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시글 보기</title>

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
                    <h2>게시글 보기</h2>
                    <p>고객 여러분의 편리한 이용을 위한 다양한 서비스를 제공합니다.</p>
                </div>
            </div>
            <div class="board__inner">
                <div class="board__View">
                <?php
    $memberID = $_SESSION['memberID'];
    $boardID = $_GET['boardID'];

    // echo $boardID; //화면에 누른게시글 아이디값이 나오는지 확인

    $sql = "SELECT * FROM myProject_Board b JOIN myProject m ON(m.memberID = b.memberID) WHERE b.boardID = {$boardID}";
    $result = $connect -> query($sql);

    $sql = "UPDATE myProject_Board SET boardView = boardView + 1 WHERE boardID = {$boardID}";
    $connect -> query($sql);

    if($result){
        $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);
        $data2 = nl2br($boardInfo['boardContents']);

        // echo "<pre>";
        // var_dump($boardInfo);
        // echo "<pre>";

        echo "<div class='view_Title'>";
        echo " <h3>".$boardInfo['boardTitle']."</h3>";
        echo "</div>";

        echo " <div class='view_Info'>";
        echo " <h3>".$boardInfo['youName']." : <span>".date('Y-m-d H:i', $boardInfo['regTime'])."<span></h3>";
        echo "</div>";
        echo "<img src='../assets/img/board.jpg' alt='이미지'>";

        echo " <div class='view_Con'>".$data2."</div>";
    }
?>
                <!--좋아요-->
                <button type="button" class="btn-like" data-name="<?=$boardInfo['boardID']?>" style="float:left; margin-top:10px; ">
                        <span class="heart_shape">좋아요♡</span><span class="likeCount" style="margin-left:10px;"><?=$boardInfo['boardLike']?></span></span>                        
                    </button>
                    <div class="board__btn">
                        <a href="board.php">목록보기</a>
                        <a href="boardRemove.php?boardID=<?=$boardID?>" onclick="return noticeRemove();">삭제하기</a>
                        <a href="boardModify.php?boardID=<?=$boardID?>">수정하기</a>
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
    var memberID = "<?=$memberID?>";

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
            url : "boardLike.php",
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
        $.get("boardLike.php", {
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

