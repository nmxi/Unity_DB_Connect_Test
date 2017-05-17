<?php

require_once('mysql_connect.php');
$pdo = connectDB();

//POSTうけとり
$id = $_POST["id"]; //要求されてくるid

try {
    $stmt = $pdo->query("SELECT * FROM `unity` WHERE `id` = '". $id. "'");
    foreach ($stmt as $row) {
        // データベースのフィールド名で出力
        $res = $row['id'];
        $res = $res. $row['name'];
        $res = $res. $row['point'];
        $res = $res. $row['data'];
    }

} catch (PDOException $e) {
    var_dump($e->getMessage());
}
$pdo = null;    //DB切断

echo $res;  //unity に結果を返す