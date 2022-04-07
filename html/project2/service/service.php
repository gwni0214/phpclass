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
                    <!-- <h2>고객센터</h2>
                    <p>고객만족을 위한 다양한 기업이 Charge Find와 함께합니다</p>
                    <p>무엇을 도와드릴까요?</p> -->
                    <div>
                        <img src="../assets/img/service_mein.jpg" alt="이미지">
                    </div>
                </div>
            </div>
            <div class="board__inner">
                <div class="board__search">
                    <form action="serviceSearch.php" name="serviceSearch" method="get" class="board_form">
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

    $sql = "SELECT b.serviceID, b.serviceTitle, m.youName, b.regTime, b.serviceView FROM myProject_Service b JOIN myProject m
     ON(m.memberID = b.memberID) ORDER by serviceID DESC LIMIT {$pageLimit}, {$pageView}";
    $result = $connect -> query($sql);

    if($result) {
        $count = $result -> num_rows;

        if($count > 0) {
            for($i=1; $i<=$count; $i++){
                $serviceInfo = $result -> fetch_array(MYSQLI_ASSOC);
                echo "<tr>";
                echo "<td>".$serviceInfo['serviceID']."</td>";
                echo "<td class='left'><a href='serviceView.php?serviceID={$serviceInfo['serviceID']}'>".$serviceInfo['serviceTitle']."</a></td>";
                echo "<td>".$serviceInfo['youName']."</td>";
                echo "<td>".date('Y-m-d', $serviceInfo['regTime'])."</td>";
                echo "<td>".$serviceInfo['serviceView']."</td>";
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
                    <a href="serviceWrite.php" class="search-btn">글쓰기</a>
                </div>
                <div class="board__pages">
                    <ul>        
<?php
   include "servicePage.php";
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