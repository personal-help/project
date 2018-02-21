<html>
 <title>Резюме</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

   <link rel="stylesheet" href="style.css">
   <link rel="icon" href="https://www.bayernzone.com/images/smilies/th_homer_1_811_3912_thumb.png">

 <body>
  <div class="container">

      <div class="cols col-7">
        <h1><a href="index.php"> НА ГЛАВНУЮ</a></h1>
      </div>

      <div class="cols col-4">
        <h1>РЕЗЮМЕ</h1><br>
            <form action="index2.php" method="post">
                <table class="table">
                    <tr> <td>Имя</td>            <td> <input name="one"     type="text" size="30" required> </td> </tr>
                    <tr> <td>Фамилия</td>        <td> <input name="two"     type="text" size="30" required> </td> </tr>
                    <tr> <td>Отчество</td>       <td> <input name="three"   type="text" size="30" required> </td> </tr>
                    <tr> <td>Специальность</td>  <td> <input name="four"    type="text" size="30" required> </td> </tr>
                    <tr> <td>Стаж работы</td>    <td> <input name="five"    type="text" size="30" required> </td> </tr>
                    <tr> <td>Адрес</td>          <td> <input name="six"     type="text" size="30" required> </td> </tr>
                    <tr> <td>Прежняя работа</td> <td> <input name="seven"   type="text" size="30" required> </td> </tr>
                    <tr> <td>Сотовый номер</td>  <td> <input name="eight"   type="text" size="30" required> </td> </tr>
                    <tr> <td>Домашний номер</td> <td> <input name="nine"    type="text" size="30" required> </td> </tr>
                </table>
              <br><input class="button" type="submit" value="Отправить">
            </form>

          <?php
          include ("bd.php");

          if (isset($_POST["one"]))
          {
              $sql = mysql_query("INSERT INTO rezume (name,surename,patronymic,specialty,experience,adress,backwork,phonenumber,homenumber)  
                                    VALUES ('".$_POST['one']."',
                                            '".$_POST['two']."',
                                            '".$_POST['three']."',
                                            '".$_POST['four']."',
                                            '".$_POST['five']."',
                                            '".$_POST['six']."',
                                            '".$_POST['seven']."',
                                            '".$_POST['eight']."',
                                            '".$_POST['nine']."')");
              if ($sql)   {    echo "<p>Данные добавлены.</p>";}
              else        {echo "<p>Произошла ошибка.</p>";}
          }
          ?>

      </div>

  </div>
 </body>