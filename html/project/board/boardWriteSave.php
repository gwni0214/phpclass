<!-- 
      ekfvoddl0321.dothome.co.kr/project/board/boardWriteSave.php
 -->
 <?php
    include "../connect/connect.php";
    include "../connect/session.php";
    // include "../connect/sessionCheck.php";

    $memberID = $_SESSION['memberID'];
    $boardTitle = $_POST['boardTitle'];
    $boardContents = $_POST['boardContents'];
    $boardView = 1;
    $regTime = time();

    $boardTitle = $connect -> real_escape_string($boardTitle); //해킹방지
    $boardContents = $connect -> real_escape_string($boardContents); //해킹방지

    // echo $memberID, $boardTitle, $boardContents, $boardView, $regTime

    $sql = "INSERT INTO myProject_Board(memberID, boardTitle, boardContents, boardView, regTime) VALUES('$memberID', '$boardTitle', '$boardContents','$boardView','$regTime')";
    $connect -> query($sql);

    Header("location: ../board/board.php");
?>









    <!-- $memberID = $_POST['memberID'];
    $boardTitle = $_POST['boardTitle'];
    $boardContents = $_POST['boardContents'];
    $boardView = $_POST['boardView'];
    $regTime = time();
    // echo $youName, $youText, $regTime;

    $sql = "INSERT INTO myComment(memberID, boardTitle,boardContents,boardView, regTime) VALUES('$memberID', '$boardTitle', '$boardContents','$boardView','$regTime')";
    $result = $connect -> query($sql); //DB에 값을 넣어주는코드 //result는 값이 제대로 들어가는지 확인하기 위해서 안써도 상관x 


    //데이터 들어가는지 확인
    // if($result){
    //     echo "INSERT INTO TRUE";
    // } else {
    //     echo "INSERT INTO FALES";
    // }

    Header("location: ../comment/comment.php"); -->

<script>

</script>