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
    <title>게시글 쓰기</title>
    <?php
        include "../include/style.php";
    ?>
</head>
<body>
<?php
        include "../include/header.php";
    ?>
    <!--//header-->

    <main id="board_contents">
                <h2 class="ir_so">컨텐츠 영역</h2>
                <section id="board-type" class="section center mb100">
                    <div class="container">
                        <h3 class="section__title">게시글 쓰기</h3>
                        <p class="section__desc">
                            고객 여러분의 편리한 이용을 위한 다양한 서비스를 제공합니다.                   
                        </p>
                        <div class="board__inner">                   
                            <div class="board__modify">
                                <form action="boardWriteSave.php" name="boardModify" method="post">
                                    <fieldset>
                                        <legend class="ir_so">게시판 작성 영역</legend>                                
                                        <div>
                                            <label for="boardTitle">제목</label>
                                            <input type="text" name="boardTitle" id="boardTitle" placeholder="제목을 넣어주세요!">
                                        </div>
                                        <div>
                                            <label for="boardContents">내용</label>
                                            <textarea name="boardContents" id="boardContents" placeholder="내용을 넣어주세요!"></textarea>
                                        </div>
                                        <div class="board__btn">
                                            <button type="submit" value="저장하기">작성하기</button>                        
                                        </div>
                                    </fieldset>                            
                                </form>                        
                            </div>
                            
                        </div>
                    </div>
                </section>
            </main>
            <!-- //main -->

    <?php
        include "../include/footer.php";
    ?>
    <!--//footer-->
</body>
</html>