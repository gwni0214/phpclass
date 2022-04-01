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
<?php
    $blogID = $_GET['blogID'];
    $sql = "SELECT blogID, blogTitle, blogCategory, blogContents, blogAuthor, blogRegTime, blogImgFile FROM myBlog WHERE blogDelete = 1 AND blogID = {$blogID}";
    $result = $connect -> query($sql);
    $sql = "UPDATE myBlog SET blogView = blogView+1 WHERE blogID = {$blogID}";
    $connect -> query($sql);
    
    if($result){
        $blogInfo = $result -> fetch_array(MYSQLI_ASSOC);
        // echo "<pre>";
        // echo var_dump($blogInfo['blogTitle']);
        // echo "</pre>";        
    }            
?>
    <form action="blogModifySave.php" name="boardModify" method="post"  enctype="multipart/form-data">
        <fieldset>
    <div class="blog__label" style="background-image:url(../asset/img/blog/<?=$blogInfo['blogImgFile']?>);">
    <div>
        <label for="blogTitle"></label>
        <input type="text" name="blogTitle" id="blogTitle" value="<?=$blogInfo['blogTitle']?>">
    </div>
    
        <h3 class="section__title"><?=$blogInfo['blogTitle']?></h3>
            <div> 
                <span class="author"><a href="#"><?=$blogInfo['blogAuthor']?></a></span> 
                <span class="date"><?=date('Y-m-d',$blogInfo['blogRegTime'])?></span><br> 
           
            </div> 
    </div>

    <div class="container">                                        
        <div class="blog__layout">                                                
            <div class="blog__left">
                <div>
                    <label for="blogContents"></label>
                    <textarea name="blogContents" id="blogContents"><?=$blogInfo['blogContents']?></textarea>
                </div>
            
            </div>
            <div class="blog__right">
                광고 ㅁㄴㅇㅁㄴㅇ
            </div>
        </div>

    <div>
        <label for="blogImgFile"></label>
        <input type="file" name="blogImgFile" id="blogImgFile" placeholder="사진을 넣어주세요. 사진은 jpg, gif, png 파일만 지원이 됩니다.">
    </div>
    <div>
        <label for="youPass"></label>
        <input type="password" name="youPass" id="youPass" placeholder="로그인 비밀번호를 입력해주세요!">
    </div>

    </div>
    <div class="board__btn">
        <button type="submit" value="저장하기">수정하기</button>                        
        <a href="blog.php">목록보기</a>                        
    </div>
    </fieldset>
</form>
  
                        
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