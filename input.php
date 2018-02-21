<html>
 <title>Вход</title>
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

     <div class="cols col-4" align="center">
         <h1> АВТОРИЗАЦИЯ</h1><br>
             <form action="input.php" method="get">
                 <table>
                     <tr> <td>E-mail</td>  <td> <input name="inmail" type="text" size="30" required>     </td> </tr>
                     <tr> <td>Пароль</td>  <td> <input name="inpass" type="password" size="30" required> </td> </tr>
                 </table><br>
               <input type="submit" class="button" value="Проверка">
             </form>

            <?php
      include ("bd.php");

      $inmail =  $_GET['inmail'];
      $inpass =  $_GET['inpass'];

      if (isset($inmail))
      {
          $search_name = mysql_query("SELECT * FROM `reg` WHERE (`mail`) LIKE '%$inmail%' ");
          if (mysql_num_rows($search_name) != 0)
          {
              while ($row = mysql_fetch_assoc($search_name))
                 if (($row[mail] == $inmail) && ($row[password] == $inpass))
                 {
                     echo "<a href='aftorization.php'><input type=\"submit\" class=\"button\" value=\"Войти\"></a>";
                 }
                 else{ echo "Неверно введён логин или пароль!";}
          }
      }
      ?>

        </div>

  </div>
 </body>
</html>