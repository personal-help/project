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
                <a href="index.php">         <input type="button" class="button" value="Выход"></a>
            </div><br>

                <a href="aftorization.php">
                    <div class="cols col-12"> <h1>КАДРОВОЕ АГЕНСТВО</h1> </div>
                </a>

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
                <a href="rezumecheck.php">ПРОСМОТРЕТЬ РЕЗЮМЕ</a>
            </div>

        <div class="row">
            <div class="cols col-7">
                <h3>Поиск сотрудников</h3><hr>
                     <form action="aftorization.php" method="get">
                         <input class="in" type="search" name="name"     placeholder="Имя">
                         <input class="button" type="submit" value="Найти">
                     </form>

                        <table border="2px">

                           <?php
                          include ("bd.php");

                           $name =  $_GET['name'];

                           echo "<td colspan='5'> Результат </td>";

                           if (isset($name))
                           {
                               $search_name= mysql_query("SELECT * FROM `agency` WHERE (name) LIKE '%$name%' ");
                               if (mysql_num_rows($search_name) != 0)
                               {
                                   while ($row = mysql_fetch_assoc($search_name))
                                    {echo " <tr> <td> $row[id]       </td> 
                                                 <td> $row[name]     </td> 
                                                 <td> $row[surename] </td> 
                                                 <td> $row[position] </td> 
                                                 <td> $row[provider] </td> </tr> ";}
                               }
                                    else {echo "<td> Ничего не найдено </td>";}
                           }

                           ?>

                        </table>

                </div>
            </div>

        <div class="row">
            <div class="cols col-8">
                <h3>Внесение данных</h3><hr>
                     <form action="aftorization.php" method="post">
                         <input size="15" type="text" name="name" required placeholder="Имя">
                         <input size="15" type="text" name="surename" required placeholder="Фамилия">
                         <input size="15" type="text" name="position" required placeholder="Должность">
                         <input size="25" type="text" name="provider" required placeholder="Услуга">
                         <input class="button" type="submit" value="Добавить">
                     </form>

                <?php
                include ("bd.php");

                if (isset($_POST["name"]))
                {
                    $sql = mysql_query("INSERT INTO agency (name,surename,position,provider)  
                                    VALUES ('".$_POST['name']."',
                                            '".$_POST['surename']."',
                                            '".$_POST['position']."',
                                            '".$_POST['provider']."')");
                    if ($sql)   {    echo "<p>Данные успешно добавлены.</p>";}
                    else        {echo "<p>Произошла ошибка.</p>";}
                }
                ?>

            </div>
        </div>

        <div class="row">
            <div class="cols col-7">
                <h3>База данных</h3><hr>

                <table border="2px" bordercolor="red">

                <?php
                include ("bd.php");

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
            <div class="cols col-1">
                <form action="aftorization.php" method="get">
                    <input type="text" name="del" size="5" required placeholder="Номер">
                    <input class="button" type="submit" value="Удалить">
                </form>

                        <?php
                        include ("bd.php");

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