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
    <title>게시판 작성하기</title>

        <!-- 주소
        ekfvoddl0321.dothome.co.kr/project/board/boardWrite.php 
    -->

    <!-- style -->
    <?php
        include "../include/style.php";
    ?>
    <!-- //style -->

    <style>
        #footer {
            background-color: #f5f5f5;
        }
    </style>
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
                        <h2>게시글 쓰기</h2>
                        <p>고객 여러분의 편리한 이용을 위한 다양한 서비스를 제공합니다.</p>
                    </div>
                    <div class="title_menu">
                        <a href="board.php"><span>자유게시판</span></a>
                        <a href="../notice/notice.php"><span>공지사항</span></a>
                        <a href="#"><span>고객센터</span></a>
                    </div>
                </div>
            <div class="board__inner">
            <div class="board__modify">
                        <form action="boardWriteSave.php" name="boardWriteSave" method="post">
                            <fieldset>
                                <legend class="ir_so">게시글 작성 영역</legend>
                                <div>
                                    <label for="boardTitle">제목</label>
                                    <input type="text" name="boardTitle" id="boardTitle" placeholder="제목을 넣어주세요" required>
                                </div>
                                <div>
                                    <label for="boardContents">내용</label>
                                    <textarea name="boardContents" id="boardContents" placeholder="내용을 입력해주세요." required></textarea>
                                    <!-- <input type="text" name="boardContents" id="boardContents"> -->
                                </div>
                                <div class="right">
                                    <button type="submit" value="저장하기" class="search-btn">저장하기</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
            </div>
        </section>
        </main>

        
        <!-- footer -->
        <?php
        include "../include/footer.php";
    ?>
    <!-- //footer -->
</body>
</html>