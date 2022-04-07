<!-- //  ekfvoddl0321.dothome.co.kr/project/create/createBoardLike.php  -->

<?php
    include "../connect/connect.php";
    $sql = "CREATE TABLE BoardLikeTable (";
    $sql .= "boardLikeID int(10) unsigned auto_increment,";
    $sql .= "memberID int(10) unsigned NOT NULL,";
    $sql .= "boardID int(10) unsigned NOT NULL,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY (boardLikeID)";
    $sql .= ") charset=utf8;";
    $result = $connect -> query($sql);
    if($result){
        echo "create table true";
    } else {
        echo "create table false";
    }
?>