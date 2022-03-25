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
    <title>자유게시판</title>
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
                        <h3 class="section__title">자유게시판</h3>
                        <p class="section__desc">
                            고객 여러분의 편리한 이용을 위한 다양한 서비스를 제공합니다.                   
                        </p>
                        
                            
                        
                        <div class="board__inner">
                            <div class="board__search">
                                <form action="boardSearch.php" name="boardSearch" method="get">
                                    <fieldset>
                                        <legend class="ir_so">게시판 검색 영역</legend>
                                        <div>
                                            <input type="search" name="searchKeyword" class="search-form" placeholder=" 검색어를 입력하세요!" aria-label="search" required>
                                        </div>
                                        
                                        <div>
                                            <button type="submit" class="search-btn"></button>
                                        </div>
                                        
                                    </fieldset>
                                </form>
                                
                            </div>
                            <div class="board__table">
                                <table class="hover">
                                    <colgroup>
                                        <col style="width: 5%;">
                                        <col>
                                        <col style="width: 10%;">
                                        <col style="width: 12%;">
                                        <col style="width: 7%;">
                                    </colgroup>
                                    <thead>
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
        //게시판 불러올 갯수
        $pageView = 10;
        $pageLimit = ($pageView * $page) - $pageView;
        // LIMIT 0, 10 
        // LIMIT 10, 20 
        // LIMIT 20, 30 
        //LIMIT {$pageLimit}, {$pageView}

        $sql = "SELECT b.boardID, b.boardTitle, m.youName, b.regTime, b.boardView FROM myProject_Board b JOIN myProject m ON(m.memberID = b.memberID) ORDER BY boardID DESC LIMIT {$pageLimit}, {$pageView}";
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
                                            <td class="blueNumber">1</td>
                                            <td class="left">충전 후 세차 / 세차 후 충전해도 안전한가요?</td>
                                            <td>박근희</td>
                                            <td>2022-03-17</td>
                                            <td>10</td>
                                        </tr> -->
                                                                       
                                    </tbody>
                                </table>
                                <a href="boardWrite.php" class="boardWrite_btn">글쓰기</a>
                            </div>
                            <div class="board__pages">
                        <ul>
                            <?php
                                include "boardPage.php";
                            ?>
                        </ul>
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