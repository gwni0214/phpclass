<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE myNews (";
    $sql .= "newsID int(10) unsigned auto_increment,";
    $sql .= "memberID int(10) unsigned NOT NULL,";
    $sql .= "newsTitle varchar(255) NOT NULL,";
    $sql .= "newsContents longtext NOT NULL,";
    $sql .= "newsAuthor varchar(20) NOT NULL,";
    $sql .= "newsView int(10) NOT NULL,";
    $sql .= "newsImgFile varchar(100) DEFAULT NULL,";
    $sql .= "newsDelete int(10) NOT NULL,";
    $sql .= "newsRegTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY (newsID)";
    $sql .= ") charset=utf8;";

    $result = $connect -> query($sql);

    if($result){
        echo "create table true";
    } else {
        echo "create table false";
    }
?>