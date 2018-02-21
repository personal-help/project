<?php
$host = "localhost";
$account = "root";
$password = "";
$dbname = "database";

$connect = mysql_connect($host, $account, $password);
$db = mysql_select_db("database", $connect);
mysql_set_charset("UTF-8");
?>