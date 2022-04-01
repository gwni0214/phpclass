<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>뉴스 작성하기</title>
        <!-- 주소
        ekfvoddl0321.dothome.co.kr/project/board/boardWrite.php
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
                        <h2>뉴스 쓰기</h2>
                        <p>전기차와 관련된 뉴스들은 제공합니다.</p>
                    </div>
                </div>
            <div class="board__inner">
            <div class="board__modify">
                        <form action="newsWriteSave.php" name="newsWriteSave" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <legend class="ir_so">뉴스 작성 영역</legend>
                                <div>
                                    <label for="newsTitle">제목</label>
                                    <input type="text" name="newsTitle" id="newsTitle" placeholder="제목을 넣어주세요" required>
                                </div>
                                <div>
                                    <label for="newsContents">내용</label>
                                    <textarea name="newsContents" id="newsContents" placeholder="내용을 입력해주세요." required></textarea>
                                    <!-- <input type="text" name="boardContents" id="boardContents"> -->
                                </div>
                                <div>
                                    <label for="newsImgFile">파일</label>
                                    <input type="file" name="newsImgFile" id="newsImgFile" placeholder="사진을 넣어주세요. 사진은 jpg, gif, png 파일만 지원이 됩니다.">
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