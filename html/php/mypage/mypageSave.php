<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    
    $youEmail = $_POST['youEmail'];
    $youName = $_POST['youName'];
    $youBirth = $_POST['youBirth'];
    $youPhone = $_POST['youPhone'];
    $youPass = $_POST['youPass'];
    $memberID = $_SESSION['memberID'];
                
    // echo $memberID, $youEmail, $youName, $youBirth, $youPhone;
    $sql = "SELECT youEmail, youName, youBirth, youPhone, youPass FROM myMember WHERE memberID = {$memberID}";   
    $result = $connect -> query($sql);

    $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
    if($result){
                        
        //아이디 비밀번호 확인
        if($memberInfo['youPass'] == $youPass){
            //수정(쿼리문 작성)
            $sql = "UPDATE myMember SET youEmail = '{$youEmail}', youName = '{$youName}', youBirth = '{$youBirth}', youPhone = '{$youPhone}' WHERE memberID = '{$memberID}'";
            $connect -> query($sql);
            echo "<script>history.back(1);</script>";

        } else {
            echo "<script>alert('비밀번호가 일치하지 않습니다. 다시 한 번 확인해주세요!'); history.back(1);</script>";
        }
    } 

    
?>