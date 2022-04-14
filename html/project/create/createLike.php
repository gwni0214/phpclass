<!-- //  ekfvoddl0321.dothome.co.kr/project/create/createLike.php  -->

<?php
    include "../connect/connect.php";
    $sql = "CREATE TABLE likeTable (";
    $sql .= "likeID int(10) unsigned auto_increment,";
    $sql .= "memberID int(10) unsigned NOT NULL,";
    $sql .= "newsID int(10) unsigned NOT NULL,";
    $sql .= "likeRegTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY (likeID)";
    $sql .= ") charset=utf8;";
    $result = $connect -> query($sql);
    if($result){
        echo "create table true";
    } else {
        echo "create table false";
    }
?>