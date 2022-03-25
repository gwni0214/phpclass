<?php
   $sql = "SELECT count(boardID) FROM myProject_Board";
   $result = $connect -> query($sql);

   $boardCount = $result -> fetch_array(MYSQLI_ASSOC); //값을 가져오는지 확인하기 위해
   $boardCount = $boardCount['count(boardID)'];
//값을 가져오는지 확인하기 위해
   // echo "<pre>";
   // var_dump($boardCount);
   // echo "</pre>";

   // 총 페이지 갯수 구하기
   $boardCount = ceil($boardCount/$pageView);
   // echo $boardCount; 갯수 나오는지 확인

   //현재 페이지를 기준으로 보여주고 싶은 갯수
   $pageCurrent = 3;
   $startPage = $page - $pageCurrent;
   $endPage = $page + $pageCurrent;

   //처음 페이지 초기화
   if($startPage < 1) $startPage = 1;

   //마지막 페이지 초기화
   if($endPage >= $boardCount) $endPage = $boardCount;


   //페이지 넘버 표시
   for($i=$startPage; $i<=$endPage; $i++) {
       //보고있는 페이지에 active 붙여서 색상나오게 하기
       $active = "";

       if($i == $page){
           $active = "active";
       }
       echo "<li class='{$active}'><a href='board.php?page={$i}'>{$i}</a></li>";
   }

?>