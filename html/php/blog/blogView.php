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
<?php foreach($result as $blogInfo){ ?>
    <div class="blog__label" style="background-image:url(../asset/img/blog/<?=$blogInfo['blogImgFile']?>);">
        <h3 class="section__title"><?=$blogInfo['blogTitle']?></h3>
            <div> 
                <span class="author"><a href="#"><?=$blogInfo['blogAuthor']?></a></span> 
                <span class="date"><?=date('Y-m-d',$blogInfo['blogRegTime'])?></span><br> 
                 
            </div> 
    </div>

    <div class="container">                                        
        <div class="blog__layout">                                                
            <div class="blog__left">
                <h4><?=$blogInfo['blogTitle']?></h4>
                <div>
                <?=$blogInfo['blogContents']?>
                </div>
                <div class="board__btn mt100">
                        <a href="blog.php">목록보기</a>
                        <a href="blogRemove.php?blogID=<?=$blogInfo['blogID']?>" onclick="return noticeRemove();">삭제하기</a>
                        <a href="blogModify.php?blogID=<?=$blogInfo['blogID']?>">수정하기</a>
                    </div>
            </div>
            <div class="blog__right">
                <div class="ad">
                <iframe src="https://ads-partners.coupang.com/widgets.html?id=572082&template=carousel&trackingCode=AF3320742&subId=&width=300&height=300" width="300" height="300" frameborder="0" scrolling="no" referrerpolicy="unsafe-url"></iframe>
                </div>
            </div>
        </div>
        
    </div>
    <?php } ?>
    
                        
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