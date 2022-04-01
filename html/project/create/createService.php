<!-- //  ekfvoddl0321.dothome.co.kr/project/create/createService.php  -->
<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE myProject_Service (";
    $sql .= "serviceID int(10) unsigned auto_increment,";
    $sql .= "memberID int(10) unsigned NOT NULL,";
    $sql .= "serviceTitle varchar(50) NOT NULL,";
    $sql .= "serviceContents longtext NOT NULL,";
    $sql .= "serviceView int(10) NOT NULL,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY (serviceID)";
    $sql .= ") charset=utf8;";

    $result = $connect -> query($sql);
    
    if($result){
        echo "create table true";
    } else {
        echo "create table false";
    }
?>