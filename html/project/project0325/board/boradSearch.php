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
    <title>게시판 검색</title>

            <!-- 주소
        ekfvoddl0321.dothome.co.kr/project/board/boradSearch.php 
        richclub9.dothome.co.kr/php/board/board.php 
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
        <section class="board">
            <div class="title">
                <div class="title_box">
                    <h2>게시글 검색하기</h2>
                    <p>고객 여러분의 편리한 이용을 위한 다양한 서비스를 제공합니다.</p>
                </div>
                <div class="title_menu">
                    <a href="board.php"><span>자유게시판</span></a>
                    <a href="../notice/notice.php"><span>공지사항</span></a>
                    <a href="../service/service.php"><span>고객센터</span></a>
                </div>
            </div>
            <div class="board__inner">
                <div class="board__search">
                <?php
    function msg($alert){
        echo "<p class='result'>총 ".$alert." 건이 검색되었습니다.</p>";
    }
    $searchKeyword = $_GET['searchKeyword'];
    $searchOption = $_GET['searchOption'];
    $searchKeyword = $connect -> real_escape_string(trim($searchKeyword));
    $searchOption = $connect -> real_escape_string(trim($searchOption));
    //쿼리문 작성
    //b.boardID, b.boardTitle, b.boardContents, m.youName, b.regTime, b.boardView
    // $sql = "SELECT b.boardID, b.boardTitle, b.boardContents, m.youName, b.regTime, b.boardView FROM myBoard b JOIN myMember m ON(b.memberID = m.memberID) WHERE b.boardTitle LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT 10";
    // $sql = "SELECT b.boardID, b.boardTitle, b.boardContents, m.youName, b.regTime, b.boardView FROM myBoard b JOIN myMember m ON(b.memberID = m.memberID) WHERE b.boardContents LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT 10";
    // $sql = "SELECT b.boardID, b.boardTitle, b.boardContents, m.youName, b.regTime, b.boardView FROM myBoard b JOIN myMember m ON(b.memberID = m.memberID) WHERE m.youName LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT 10";
    $sql = "SELECT b.boardID, b.boardTitle, b.boardContents, m.youName, b.regTime, b.boardView FROM myProject_Board b JOIN myProject m ON(b.memberID = m.memberID) WHERE b.boardTitle LIKE '%{$searchKeyword}%' ORDER BY boardID DESC" ;
    // switch($searchOption){
    //     case 'title':
    //         $sql .= "WHERE b.boardTitle LIKE '%{$searchKeyword}%' ORDER BY boardID DESC";
    //         break;
    //     case 'content':
    //         $sql .= "WHERE b.boardContents LIKE '%{$searchKeyword}%' ORDER BY boardID DESC";
    //         break;
    //     case 'name':
    //         $sql .= "WHERE m.youName LIKE '%{$searchKeyword}%' ORDER BY boardID DESC";
    //         break;
    // }
    $result = $connect -> query($sql);
    //갯수파악
    if($result){
        $count2 = $result -> num_rows;
        msg($count2);
    }
?>

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
        if(isset($_GET['page'])){
            $page = (int) $_GET['page'];
        } else {
            $page = 1;
        }
        // if(isset($searchKeyword)){
        //     $pageB = (int) $searchKeyword;
        // } else {
        //     $pageB = 1;
        // }
        //게시판 불러올 갯수
        $pageView = 10;
        $pageLimit = ($pageView * $page) - $pageView;
        // LIMIT 0, 10
        // LIMIT 10, 20
        // LIMIT 20, 30
        //LIMIT {$pageLimit}, {$pageView}
        $sql = "SELECT b.boardID, b.boardTitle, b.boardContents, m.youName, b.regTime, b.boardView FROM myProject_Board b JOIN myProject m ON(b.memberID = m.memberID) WHERE b.boardTitle LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT {$pageLimit}, {$pageView}" ;
        // switch($searchOption){
        //     case 'title':
        //         $sql .= "WHERE b.boardTitle LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT {$pageLimit}, {$pageView}";
        //         break;
        //     case 'content':
        //         $sql .= "WHERE b.boardContents LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT {$pageLimit}, {$pageView}";
        //         break;
        //     case 'name':
        //         $sql .= "WHERE m.youName LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT {$pageLimit}, {$pageView}";
        //         break;
        // }
        $result = $connect -> query($sql);
        if($result){
            $count = $result -> num_rows;
            if($result > 0){
                for($i=1; $i<=$count; $i++){
                    $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);
                    echo "<tr>";
                    echo "<td class='blueNumber'>".$boardInfo['boardID']."</td>";
                    echo "<td class='left'><a href='boardView.php?boardID={$boardInfo['boardID']}'>".$boardInfo['boardTitle']."</a></td>";
                    echo "<td>".$boardInfo['youName']."</td>";
                    echo "<td>".date('Y-m-d',$boardInfo['regTime'])."</td>";
                    echo "<td>".$boardInfo['boardView']."</td>";
                    echo "</tr>";
                }
            }
        }
?>

                                <!-- <tr>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                </tr> -->
                        </tbody>
                    </table>
                </div>
                <div class="right">
                    <a href="board.php" class="search-btn">목록보기</a>
                </div>
                <div class="board__pages">
                    <ul>        
                    <?php
    // $sql = "SELECT count(boardID) FROM myBoard";
    // $result = $connect -> query($sql);
    // $boardCount = $result -> fetch_array(MYSQLI_ASSOC);
    $boardCount = $count2;
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
    // echo $boardCount;
    //1 2 3 4 5 6 7 8 9 10 11 12 13 14......
    //페이지 넘버 표시
    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";
        if($i == $page){
            $active = "active";
        }
        echo "<li class='{$active}'><a href='boradSearch.php?page={$i}&searchKeyword={$searchKeyword}'>{$i}</a></li>";
    }
?>
                    </ul>
                </div>
        </section>
    </div>
</main>

            <!-- footer -->
    <?php
        include "../include/footer.php";
    ?>
    <!-- //footer -->
</body>
</html>