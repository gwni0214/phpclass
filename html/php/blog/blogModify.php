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
    <title>블로그</title>
    <?php
        include "../include/style.php";
    ?>
    <style>
        .footer {
            background: #f5f5f5;
        }
    </style>
    <!--//style-->
</head>
<body>
<?php
            include "../include/skip.php";
        ?>
    <!--skip--> 
    <?php
            include "../include/header.php";
        ?>
    <!--header-->
    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="blog-type" class="center mb100">
        <div class="board__inner">                   
                    <div class="board__modify">
                        <form action="blogModifySave.php" name="boardModify" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <legend class="ir_so">게시판 수정 영역</legend>
<?php
$blogID = $_GET['blogID'];
$sql = "SELECT * FROM myBlog WHERE blogID = {$blogID}";
$result = $connect -> query($sql);

if($result){
    $blogInfo = $result -> fetch_array(MYSQLI_ASSOC);

    // echo "<pre>";
    // echo var_dump($blogInfo);
    // echo "</pre>";
    echo "<div style='display:none;'><label for='blogID'>번호</label><input type='text' name='blogID' id='blogID' value='".$blogInfo['blogID']."'></div>";
    echo "<div><label for='blogTitle'>제목</label><input type='text' name='blogTitle' id='blogTitle' value='".$blogInfo['blogTitle']."'></div>";
    echo "<div><label for='blogContents'>내용</label><textarea  name='blogContents' id='blogContents'>".$blogInfo['blogContents']."</textarea></div>";
    echo "<div><label for='blogImgFile'>파일</label><input type='file' name='blogImgFile' id='blogImgFile' accept='.jpg, .png, .gif, .jpeg' placeholder='사진을 넣어주세요! 사진은 jpg, gif, png만 가능합니다' ></div> ";
    echo "<div><label for='youPass'>비밀번호</label><input type='password' name='youPass' id='youPass' placeholder='로그인 비밀번호를 입력해주세요!'></div>";
}
?>
                                <div class="board__btn">
                                    <button type="submit" value="저장하기">수정하기</button>                        
                                    <a href="blog.php">목록보기</a>                        
                                </div>
                            </fieldset>
                        </form>
                    </div>
        </div>
                        
        </section>
    </main>




    <?php
            include "../include/footer.php";
        ?>

<script>
    function noticeRemove(){
        let notice = confirm("정말 삭제하시겠습니까?", "");
        return notice;
    }
</script>
</body>
</html>