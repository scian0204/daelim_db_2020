<?php
/*
echo __LINE__."테이블 구조를 확인합니다.<br>";

include "theme.conf.php";
include "../dbinfo.php";

//DB접속 
$db0 = new mysqli(
    $dbinfo['master']['dbhost'],
    $dbinfo['master']['dbuser'],
    $dbinfo['master']['dbpass'],
    $dbinfo['master']['dbschema']
    );


    if($db0) {
        echo __LINE__."DB 접속 성공, 명령 실행 준비 단계.<br>";

        $tablename = "instagram";
        $tableinfo = desc($db0, $tablename);
        print_r($tableinfo);
        foreach($tableinfo as $fieldname) {
            echo "<br>".$fieldname;
            echo "<input type=text name='".$fieldname."'>";
            echo "<br>";
        }
        

    } else {
        echo __LINE__."접속 실패<br>";
    } */

function desc($db, $tablename) {
   // global $db0;
    $query = "desc ".$tablename.";";
    //echo __LINE__.$query."<br>";

    $result = mysqli_query($db, $query);

    if ($result) {
        //echo __LINE__."SQL 명령 실행 성공. 결과값 존재<br>";
        $fields = [];

        while($row = mysqli_fetch_object($result)){
            //print_r($row);
            //echo "필드명: ".$row->Field."<br>";
            $fields [] = $row->Field;
        }

    } else {
        //echo __LINE__."SQL 실행 오류<br>";
    }
    return $fields;
}
