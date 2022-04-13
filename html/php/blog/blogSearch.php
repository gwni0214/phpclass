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
                    <?php
    function msg($alert){
        echo "<p class='result'>총 ".$alert." 건이 검색되었습니다.</p>";
    }
    $searchKeyword = $_GET['searchKeyword'];
    $searchOption = $_GET['searchOption'];
    $searchKeyword = $connect -> real_escape_string(trim($searchKeyword));
    $searchOption = $connect -> real_escape_string(trim($searchOption));
    //쿼리문 작성
    $sql = "SELECT b.blogID, b.blogTitle, b.blogContents, m.youName, b.blogRegTime, b.blogImgFile, b.blogView FROM myBlog b JOIN myMember m ON(b.memberID = m.memberID) WHERE b.blogTitle LIKE '%{$searchKeyword}%' ORDER BY blogID DESC" ;
    $result = $connect -> query($sql);
    //갯수파악
    if($result){
        $count2 = $result -> num_rows;
        msg($count2);
    }
?>                       
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
        $sql = "SELECT b.blogID, b.blogTitle, b.blogCategory, b.blogContents, m.youName, b.blogRegTime, b.blogImgFile, b.blogView FROM myBlog b JOIN myMember m ON(b.memberID = m.memberID) WHERE b.blogTitle LIKE '%{$searchKeyword}%' ORDER BY blogID DESC LIMIT  {$pageLimit}, {$pageView}" ;
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
                        <div class="blog__btn">
                        <a href="blog.php">목록보기</a>
                    </div>
                    </div>
                                        
                    <div class="blog__pages">
                        <ul>
                        <?php
    $result -> fetch_array(MYSQLI_ASSOC);
    $boardCount = $count2;
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
        echo "<li><a href='blogSearch.php?page=1&searchKeyword={$searchKeyword}'>&lt;&lt;</a></li>";
    }
    //이전 페이지
    if($page != 1){
        $prevPage = $page -1;
        echo "<li><a href='blogSearch.php?page={$prevPage}&searchKeyword={$searchKeyword}'>이전</a></li>";
    }
    
    // echo $boardCount;
    //1 2 3 4 5 6 7 8 9 10 11 12 13 14......
    //페이지 넘버 표시
    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";
        if($i == $page){
            $active = "active";
        }
        echo "<li class='{$active}'><a href='blogSearch.php?page={$i}&searchKeyword={$searchKeyword}'>{$i}</a></li>";
    }
    //다음 페이지
    if($page != $endPage && $page = $count2){
        $nextPage = $page +1;
        echo "<li><a href='blogSearch.php?page={$nextPage}&searchKeyword={$searchKeyword}'>다음</a></li>";
    }
    //마지막 페이지
    if($page != $endPage && $page = $count2){        
        echo "<li><a href='blogSearch.php?page=30&searchKeyword={$searchKeyword}'>&gt;&gt;</a></li>";
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