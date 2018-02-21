<html>
 <title>Регистрация</title>
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
      <h1> РЕГИСТРАЦИЯ </h1><br>
      <form action="registration.php" method="post">
   <table>
    <tr> <td>Имя</td>               <td> <input name="regname"      type="text" size="30" required> </td> </tr>
    <tr> <td>Фамилия</td>           <td> <input name="regsurename"  type="text" size="30" required> </td> </tr>
    <tr> <td>E-mail</td>            <td> <input name="regmail"      type="text" size="30" required> </td> </tr>
    <tr> <td>Номер телефона </td>   <td> <input name="regnumber"    type="text" size="30" required placeholder="8-705-555-35-35"> </td> </tr>
    <tr> <td>Пароль </td>           <td> <input name="regpass"      type="password" size="30" required> </td> </tr>
   </table><br>
          <input type="submit" class="button" value="Зарегистрироваться">
      </form>

      <?php
      include("bd.php");

      if (isset($_POST["regname"]))
      {
          $sql = mysql_query("INSERT INTO reg (`name`,`surename`,`mail`,`number`,`password`)  
                                    VALUES ('".$_POST['regname']."',
                                            '".$_POST['regsurename']."',
                                            '".$_POST['regmail']."',
                                            '".$_POST['regnumber']."',
                                            '".$_POST['regpass']."')");
          if ($sql)   {    echo "<p>Данные успешно добавлены.</p>";}
          else        {echo "<p>Произошла ошибка.</p>";}
      }
      ?>

  </div>

 </div>
 </body>