<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>탈퇴하기</title>
</head>
<body>
<?php
    $memberID = $_SESSION['memberID'];
    $youEmail = $_POST['youEmail'];
    $sql = "SELECT * FROM myProject WHERE memberID = {$memberID}";
    $result = $connect -> query($sql);
    if($result){
        $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
        if($memberInfo['youEmail'] == $youEmail){
            $sql = "DELETE FROM myProject WHERE youEmail = '{$youEmail}';";
            $connect -> query($sql);
            $result = $connect -> query($sql);
            echo "<script>alert('회원 탈퇴가 완료되었습니다.');</script>";
        }
    }
    
    echo $memberInfo;
    echo "<pre>";
    echo var_dump($memberInfo);
    echo "</pre>";
    
?>
<script>
        location.href = "../login/login.php";
</script>
</body>
</html>