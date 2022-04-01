<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>블로그 글쓰기</title>
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
                <h3 class="section__title">게시글 작성하기</h3>
                <p class="section__desc">
                    자유로운 자연에 대해서 글을 써보세요!                   
                </p>
                <div class="blog__inner">
                    <div class="blog__write">
                        <form action="blogWriteSave.php" name="blogWrite" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <legend class="ir_so">블로그 게시글 작성 영역</legend>
                                <div>
                                    <label for="blogCategory">카테고리</label>
                                    <select name="blogCategory" id="blogCategory">
                                        <option value="mountain">mountain</option>
                                        <option value="ocean">ocean</option>
                                        <option value="space">space</option>
                                        <option value="etc">etc</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="blogTitle">제목</label>
                                    <input type="text" name="blogTitle" id="blogTitle" placeholder="제목을 넣어주세요!" required>
                                </div>
                                <div>
                                    <label for="blogContents">내용</label>
                                    <textarea name="blogContents" id="blogContents" placeholder="내용을 넣어주세요!" required></textarea>
                                </div>
                                <div>
                                    <label for="blogImgFile">파일</label>
                                    <input type="file" name="blogImgFile" id="blogImgFile" accept=".jpg, .png, .gif, .jpeg" placeholder="사진을 넣어주세요! 사진은 jpg, gif, png만 가능합니다" >
                                </div>                               
                                    <button type="submit" value="저장하기">저장하기</button>                                                          
                            </fieldset>
                        </form>
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