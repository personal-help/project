<html>
  <link rel="shortcut icon" href="http://disput.azstatic.com/uploads/monthly_2016_06/wpid-logo-nedir4.png.5ba7a68ae17a4a61c102d0bd3c472525.thumb.png.e86610d9e19c904154f89bd43e067761.png">
   <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
     <title>Data base</title>

<body>
<table cellpadding=4px border = 2px>
<header>
    <p id="t1"> <a href="index.php">БАЗА ДАННЫХ</a>
    <input id="log" type="text" name="user" required placeholder="Имя пользователя">
    <input id="log1" d type="password" name="password" required placeholder="Пароль">
    <input id="reg" type="button" src="red" value="ВХОД">
    <a href="index2.php"> <input id="reg" type="button" src="red" value="РЕГИСТРАЦИЯ"> </a>

    </p>
</header> 
<hr>
   <h1><p align="center">Инструкция применения</p></h1>
   <h3><p align="justify" id="t3">Для добавления данных в базу необходимо заполнить 3 формы в строке и нажать кнопку "Добавить". 
   Чтобы отобразить введённые данные в таблице нажмите на слова "БАЗА ДАННЫХ" в верхней левой части.
   Для того чтобы удалить данные в строке с одной формой ввода вписать номер удаляемой строки и нажать "Удалить".
   Для отображения изменений нажать на "БАЗА ДАННЫХ"</p></h3>
<hr>

<table cellpadding=5px border=5px>

 <?php
$host = "localhost";
$account = "root";
$password = "";
$dbname = "database";

$connect = mysql_connect($host, $account, $password);
$db = mysql_select_db("database", $connect);
mysql_set_charset("UTF-8");

$sql ="SELECT * FROM agency";
$result = mysql_query($sql, $connect);
while ($row = mysql_fetch_assoc($result)){
	echo"<tr>";
    foreach($row as $value){
        echo "<td> $value </td>" ;
}
}
 ?>

<?php
$host = "localhost";
$account = "root";
$password = "";
$dbname = "database";

$connect = mysql_connect($host, $account, $password);
$db = mysql_select_db("database", $connect);
mysql_set_charset("UTF-8");

    if (isset($_POST["name"]))
    {
         $sql = mysql_query("INSERT INTO agency (name,surename,position,provider)  
                                    VALUES ('".$_POST['name']."','".$_POST['surename']."','".$_POST['position']."','".$_POST['provider']."')");
         if ($sql) {    echo "<p>Данные успешно добавлены в таблицу.</p>";}
                        else {echo "<p>Произошла ошибка.</p>";}
    }
?>

<?php
$host = "localhost";
$account = "root";
$password = "";
$dbname = "service";

$connect = mysql_connect($host, $account, $password);
$db = mysql_select_db("database", $connect);
mysql_set_charset("UTF8");

	if (isset($_GET['del'])) {
    $sql = mysql_query('DELETE FROM `agency` WHERE `ID` = "'.$_GET['del'].'"');
    if ($sql)   {   echo "<p>Строка удалена.</p>";}
                    else {echo "<p>Произошла ошибка.</p>";}
                }
?>

<?php/*
$host = "localhost";
$account = "root";
$password = "";
$dbname = "service";

$connect = mysql_connect($host, $account, $password);
$db = mysql_select_db("service", $connect);
mysql_set_charset("UTF8");

  $sql=mysql_query('UPDATE `catalog` SET 
		 '.'`Name`="		'.$_POST['name'].'",
		 '.'`descript`=		' .$_POST ['descript'].' 
		 '.'`Price`= 		'.$_POST ['price'].' 
		 '.'WHERE `ID`= 	' .$_RED  ['red']);
*/?>

<form action="index2.php" method="post">
       <input id="in" type="text" name="name" required placeholder="Название">
	   <input id="in" type="text" name="surename" required placeholder="Описание">
       <input id="in" type="text" name="position" required placeholder="Цена">
       <input id="in" type="text" name="provider" required placeholder="Цена">
       <input id="in" type="submit" value="Добавить"> <hr>
</form>

<form action="index2.php" method="get">
		<input id="de" type="text" name="del"  placeholder="Номер">
        <input id="de" type="submit" value="Удалить"> <hr>
<form>

<form action="index2.php" method="red">
		<input id="de" type="text" name="red" placeholder="Номер">
		<input id="in" type="text" name="Name"  placeholder="Название">
		<input id="in" type="text" name="descript"  placeholder="Описание">
		<input id="in" type="text" name="Price"  placeholder="Цена">
		<input id="de" type="submit" value="Редактировать"> <hr>
<form>
</body>
</html>