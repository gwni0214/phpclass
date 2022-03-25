<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    // include "../connect/sessionCheck.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charger Find</title>
    <!-- 주소
  ekfvoddl0321.dothome.co.kr/project/notice/notice.php
 -->
 <!-- style -->
 <?php
        include "../include/style.php";
    ?>
 <!-- //style -->

</head>
<body>
    <?php
        include "../include/header.php";
    ?>

<main id="main">
    <div class="board_section">
        <section class="board">
            <div class="title">
                <div class="title_box">
                    <h2>공지사항</h2>
                    <p>새로운 소식을 빠르게 만나보세요.</p>
                </div>
                <div class="title_menu">
                    <a href="../board/board.php"><span>자유게시판</span></a>
                    <a href="notice.php"><span>공지사항</span></a>
                    <a href="../service/service.php"><span>고객센터</span></a>
                </div>
            </div>
            <div class="board__inner">
                <div class="board__search">
                    <form action="noticeSearch.php" name="noticeSearch" method="get" class="board_form">
                        <fieldset>
                            <legend class="ir_so">게시판 검색 영역</legend>
                            <div class="center">
                                <input type="search" name="searchKeyword" class="search-form" placeholder="검색어를 입력하세요." aria-label="search" required>
                                <button type="sumit" class="search_img"></button>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="board__table">
                    <table class="hover">
                        <thead>
                            <colgroup>
                                <col style="width: 5%";>
                                <col>
                                <col style="width: 10%";>
                                <col style="width: 12%";>
                                <col style="width: 7%";>
                            </colgroup>
                            <tr>
                                <th>번호</th>
                                <th>제목</th>
                                <th>등록자</th>
                                <th>등록일</th>
                                <th>조회수</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
    //b.boardID, b.boardTitle, m.youName, b.regTime, b.boardView
    if(isset($_GET['page'])) {
        $page = (int) $_GET['page'];
    }else {
        $page = 1;
    }

    // 게시판 불러올 갯수
    $pageView = 10;
    $pageLimit = ($pageView * $page) - $pageView;

    $sql = "SELECT b.noticeID, b.noticeTitle, m.youName, b.regTime, b.noticeView FROM myProject_Notice b JOIN myProject m
     ON(m.memberID = b.memberID) ORDER by noticeID DESC LIMIT {$pageLimit}, {$pageView}";
    $result = $connect -> query($sql);

    if($result) {
        $count = $result -> num_rows;

        if($count > 0) {
            for($i=1; $i<=$count; $i++){
                $noticeInfo = $result -> fetch_array(MYSQLI_ASSOC);
                echo "<tr>";
                echo "<td>".$noticeInfo['noticeID']."</td>";
                echo "<td class='left'><a href='noticeView.php?noticeID={$noticeInfo['noticeID']}'>".$noticeInfo['noticeTitle']."</a></td>";
                echo "<td>".$noticeInfo['youName']."</td>";
                echo "<td>".date('Y-m-d', $noticeInfo['regTime'])."</td>";
                echo "<td>".$noticeInfo['noticeView']."</td>";
                echo "</tr>";
            }
        }
    }
?>
                            <!-- <tr>
                                <td>1</td>
                                <td>전기차 충전소 자리 많이 비는 곳!!</td>
                                <td>2022-03-04</td>
                                <td>혀누</td>
                                <td>10</td>
                            </tr> -->

                        </tbody>
                    </table>
                </div>
                <div class="right">
                    <a href="noticeWrite.php" class="search-btn">글쓰기</a>
                </div>
                <div class="board__pages">
                    <ul>        
<?php
   include "noticePage.php";
?>
                    </ul>
                </div>
        </section>
    </div>
</main>

<?php
        include "../include/footer.php";
    ?>

</body>
</html>