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
    <title>문의글 검색</title>

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
                    <h2>고객센터</h2>
                    <p>무엇을 도와드릴까요?</p>
                </div>
                <div class="title_menu">
                    <a href="../board/board.php"><span>자유게시판</span></a>
                    <a href="../notice/notice.php"><span>공지사항</span></a>
                    <a href="service.php"><span>고객센터</span></a>
                </div>
            </div>
            <div class="board__inner">
            <div class="board__search">
<?php
    function msg($alert){
        echo "<p class='result'>총 ".$alert." 건이 검색되었습니다.</p>";
    }

    $searchKeyword = $_GET['searchKeyword'];
    $searchKeyword = $connect -> real_escape_string(trim($searchKeyword));
    $sql = "SELECT b.serviceID, b.serviceTitle, b.serviceContents, m.youName, b.regTime, b.serviceView FROM myProject_Service b JOIN myProject m ON(b.memberID = m.memberID) WHERE b.serviceTitle LIKE '%{$searchKeyword}%' ORDER BY serviceID DESC LIMIT 10";
    // $sql = "SELECT b.boardID, b.boardTitle, b.boardContents, m.youName, b.regTime, b.boardView FROM myBoard b JOIN myMember m ON(b.memberID = m.memberID) WHERE b.boardContents LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT 10";
    // $sql = "SELECT b.boardID, b.boardTitle, b.boardContents, m.youName, b.regTime, b.boardView FROM myBoard b JOIN myMember m ON(b.memberID = m.memberID) WHERE m.youName LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT 10";
    // $sql = "SELECT b.boardID, b.boardTitle, b.boardContents, m.youName, b.regTime, b.boardView FROM myProject_Board b JOIN myProject m ON(b.memberID = m.memberID) ";

    $result = $connect -> query($sql);

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
    if(isset($_GET['page'])) {
        $page = (int) $_GET['page'];
    }else {
        $page = 1;
    }

    // 게시판 불러올 갯수
    $pageView = 10;
    $pageLimit = ($pageView * $page) - $pageView;

            $sql = "SELECT b.serviceID, b.serviceTitle, b.serviceContents, m.youName, b.regTime, b.serviceView FROM myProject_Service b JOIN myProject m ON(b.memberID = m.memberID) WHERE b.serviceTitle LIKE '%{$searchKeyword}%' ORDER BY serviceID DESC LIMIT {$pageLimit}, {$pageView}"; 
            $result = $connect -> query($sql);
            if($result){
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
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                </tr> -->
                        </tbody>
                    </table>
                </div>
                <div class="right">
                    <a href="boardWrite.php" class="search-btn">글쓰기</a>
                </div>
                <div class="board__pages">
                    <ul>        
                    <?php
  
   $serviceCount = $count2;
//값을 가져오는지 확인하기 위해
   // echo "<pre>";
   // var_dump($serviceCount);
   // echo "</pre>";

   // 총 페이지 갯수 구하기
   $serviceCount = ceil($serviceCount/$pageView); 
   // echo $serviceCount; 갯수 나오는지 확인

   //현재 페이지를 기준으로 보여주고 싶은 갯수
   $pageCurrent = 3;
   $startPage = $page - $pageCurrent;
   $endPage = $page + $pageCurrent;

   //처음 페이지 초기화
   if($startPage < 1) $startPage = 1;

   //마지막 페이지 초기화
   if($endPage >= $serviceCount) $endPage = $serviceCount;


   //페이지 넘버 표시
   for($i=$startPage; $i<=$endPage; $i++) {
       //보고있는 페이지에 active 붙여서 색상나오게 하기
       $active = "";

       if($i == $page){
           $active = "active";
       }
       echo "<li class='{$active}'><a href='serviceSearch.php?page={$i}&searchKeyword={$searchKeyword}'>{$i}</a></li>";
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