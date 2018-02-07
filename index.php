<html>
 <title>Кадровое Агенство</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="https://www.bayernzone.com/images/smilies/th_homer_1_811_3912_thumb.png">

    <body>

        <div class=container>

            <div class="reg">
                <a href="registration.php">  <input type="button" class="button" value="Регистрация"></a>
                <a href="input.php">         <input type="button" class="button" value="Вход"></a>
            </div><br>

            <div class="cols col-12"> <h1>КАДРОВОЕ АГЕНСТВО</h1> </div>

            <div class="row">
                <div class="cols col-6"><h2>Вакансии</h2><hr>

                    <ul>
                        <li> Менеджер по продажам</li>
                        <li> Консультант</li>
                        <li> IT-специалист</li>
                        <li> Фотограф </li>
                        <li> Бухгалтер </li>
                        <li> Тех персонал </li>
                    </ul>

                </div>
                <div class="cols col-6"><h2> Что должно быть в резюме: </h2><hr>

                    <ul>
                        <li> Ф.И.О. </li>
                        <li> Специальность </li>
                        <li> Дата рождения </li>
                        <li> Место жительства </li>
                        <li> Прежнее место работы </li>
                        <li> Стаж работы </li>
                        <li> Номер телефона : сотовый / домашний </li>
                    </ul>

                </div>
            </div>

            <div class="cols col-2">
                <a href="index2.php">ЗАПОЛНИТЬ РЕЗЮМЕ</a>
            </div>

            <div class="row">
                <div class="cols col-7">

                        <h3>Поиск сотрудников</h3><hr>
                            <input type="text" name="name"     size="10" placeholder="Имя">
                            <input type="text" name="surename" size="10" placeholder="Фамилия">
                            <input type="text" name="position" size="15" placeholder="Должность">
                            <input type="text" name="provider" size="20" placeholder="Услуга">
                            <input class="button" type="submit" value="Найти">

                </div>
            </div>

        <div class="row">
            <div class="cols col-8">
                <h3>Внесение данных</h3><hr>
                <form action="index.php" method="post">
                    <input size="15" type="text" name="name" required placeholder="Имя">
                    <input size="15" type="text" name="surename" required placeholder="Фамилия">
                    <input size="15" type="text" name="position" required placeholder="Должность">
                    <input size="25" type="text" name="provider" required placeholder="Услуга">
                    <input class="button" type="submit" value="Добавить">
                </form>

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
                    if ($sql) {    echo "<p>Данные успешно добавлены.</p>";}
                    else {echo "<p>Произошла ошибка.</p>";}
                }
                ?>

            </div>
        </div>

        <div class="row">
            <div class="cols col-7">
                <h3>База данных</h3><hr>

                <table border="2px" bordercolor="red">

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
                while ($row = mysql_fetch_assoc($result))
                {
                    echo"<tr>";
                    foreach($row as $value)
                    {
                        echo "<td> $value </td>";
                    }
                }
                ?>

            </div>
        </div>

            <div class="row">
                <div class="cols col-1" align="center">
                    <form action="index.php" method="get">
                        <input type="text" name="del" size="5" required placeholder="Номер">
                        <input class="button" type="submit" value="Удалить">
                    <form>

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

                </div>
            </div>

        </div>

     </body>
</html>