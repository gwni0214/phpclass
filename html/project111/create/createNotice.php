<!-- //  ekfvoddl0321.dothome.co.kr/project/create/createNotice.php  -->
<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE myProject_Notice (";
    $sql .= "noticeID int(10) unsigned auto_increment,";
    $sql .= "memberID int(10) unsigned NOT NULL,";
    $sql .= "noticeTitle varchar(50) NOT NULL,";
    $sql .= "noticeContents longtext NOT NULL,";
    $sql .= "noticeView int(10) NOT NULL,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY (noticeID)";
    $sql .= ") charset=utf8;";

    $result = $connect -> query($sql);
    
    if($result){
        echo "create table true";
    } else {
        echo "create table false";
    }
?>