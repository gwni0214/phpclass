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
        <section id="blog-type" class="section center mb100">
            <div class="container">
                <h3 class="section__title">자연 경관 블로그</h3>
                <p class="section__desc">
                    자연 경관을 담은 블로그를 만나보세요!                   
                </p>
                <div class="blog__inner">
                    <div class="blog__search">
                        <form action="blogSearch.php" method="get">
                            <fieldset>
                                <legend class="ir_so">검색영역</legend>                                
                                <input type="search" name="searchKeyword" id="searchKeyword" class="search" placeholder="검색어를 입력헤주세요!">
                                <label for="searchKeyword" class="ir_so">검색</label>
                                <button class="button">검색</button>                                
                            </fieldset>                            
                        </form>                        
                    </div>
                    <div class="blog__btn">
                        <a href="blogWrite.php">글쓰기</a>
                    </div>
                    <div class="blog__cont">
<?php
        if(isset($_GET['page'])) {
            $page = (int) $_GET['page'];
        }else {
            $page = 1;
        }

        // 게시판 불러올 갯수
        $pageView = 3;
        $pageLimit = ($pageView * $page) - $pageView;

        $sql = "SELECT blogID, blogTitle, blogCategory, blogContents, blogAuthor, blogRegTime, blogImgFile FROM myBlog WHERE blogDelete = 1 ORDER BY blogID DESC LIMIT {$pageLimit}, {$pageView}";
        $result = $connect -> query($sql);
        $blog = $result -> fetch_array(MYSQLI_ASSOC);
        
        // echo "<pre>";
        // var_dump($result);
        // echo "</pre>";
        // echo $blog['blogTitle'];
        // echo $blog['blogCategory'];
        // echo $blog['blogContents'];
        // echo $blog['blogAuthor'];
        // echo $blog['blogRegTime'];
        
?>
    <?php foreach($result as $blog){ ?>
      
         <article class="blog"> 
         <figure class="blog__header">
         <a href="blogView.php?blogID=<?=$blog['blogID']?>" style="background-image:url(../asset/img/blog/<?=$blog['blogImgFile']?>)"></a>
          
         
         </figure> 
         <div class="blog__body"> 
         <span class="blog__cate"><?=$blog['blogCategory']?></span> 
         <div class="blog__title"><a href="blogView.php?blogID=<?=$blog['blogID']?>"><?=$blog['blogTitle']?></a></div> 
         <div class="blog__desc"><?=$blog['blogContents']?></div> 
         <div class="blog__info"> 
         <span class="author"><a href="#"><?=$blog['blogAuthor']?></a></span> 
         <span class="date"><?=date('Y-m-d',$blog['blogRegTime'])?></span> 
          
         </div> 
         </div> 
         </article> 
         
    <?php } ?>

                        <!-- <article class="blog">
                            <figure class="blog__header">
                                <img src="../asset/img/blog/card01.jpg" alt="블로그 이미지">
                            </figure>
                            <div class="blog__body">
                                <span class="blog__cate">숲의 환경</span>
                                <div class="blog__title">숲의 환경은 싱그러운 숲의 사진과 글을 올립니다.</div>
                                <div class="blog__desc">숲에서 시원한 공기를 마시며 명상하고 싶어요. 빨리 마스크를 벗고 편하게 숲을 다니고싶습니다.</div>
                                <div class="blog__info">
                                    <span class="author"><a href="#">박근희</a></span>
                                    <span class="date">2022-03-24 22:11</span>
                                    <span class="modify"><a href="#">수정</a></span>
                                    <span class="delete"><a href="#">삭제</a></span>
                                </div>                                
                            </div>
                        </article> -->
                       
                    </div>
                                        
                    <div class="blog__pages">
                        <ul>
                        <?php
    $sql = "SELECT count(blogID) FROM myBlog";
    $result = $connect -> query($sql);
    $boardCount = $result -> fetch_array(MYSQLI_ASSOC);
    $boardCount = $boardCount['count(blogID)'];
    // echo "<pre>";
    // var_dump($boardCount);
    // echo "</pre>";
    // echo $boardCount;
    // 페이지 넘버 갯수
    // 300/10 = 30
    // 301/10 = 31
    // 306/10 = 31
    // 309/10 = 31
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
    //처음으로 페이지
    if($page != 1){        
        echo "<li><a href='blog.php?page=1'><span class='material-icons'>
        keyboard_double_arrow_left
        </span></a></li>";
    }
    //이전 페이지
    if($page != 1){
        $prevPage = $page -1;
        echo "<li><a href='blog.php?page={$prevPage}'>이전</a></li>";
    }
    
    // echo $boardCount;
    //1 2 3 4 5 6 7 8 9 10 11 12 13 14......
    //페이지 넘버 표시
    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";
        if($i == $page){
            $active = "active";
        }
        echo "<li class='{$active}'><a href='blog.php?page={$i}'>{$i}</a></li>";
    }
    //다음 페이지
    if($page != $endPage && $boardCount != 0){
        $nextPage = $page +1;
        echo "<li><a href='blog.php?page={$nextPage}'>다음</a></li>";
    }
    //마지막 페이지
    if($page != $endPage && $boardCount != 0){        
        echo "<li><a href='blog.php?page={$boardCount}'><span class='material-icons'>
        keyboard_double_arrow_right
        </span></a></li>";
    }

    
?>                                                      
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>




    <?php
            include "../include/footer.php";
        ?>
</body>
</html>