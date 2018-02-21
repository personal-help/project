<html>
 <title>Резюме просмотр</title>
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
        <h1><a href="aftorization.php"> НА ГЛАВНУЮ</a></h1>
      </div>

      <div class="cols col-4">
        <h1>РЕЗЮМЕ</h1><hr>

          <div class="row">
              <div class="row">
              <div class="cols col-1">
                  <form action="aftorization.php" method="get">
                      <input type="text" name="del" size="5" required placeholder="Номер">
                      <input class="button" type="submit" value="Удалить">
              </div>

                          <?php
                          include ("bd.php");

                          if (isset($_GET['del'])) {
                              $sql = mysql_query('DELETE FROM `rezume` WHERE `ID` = "'.$_GET['del'].'"');
                              if ($sql)   {   echo "<p>Строка удалена.</p>";}
                              else {echo "<p>Произошла ошибка.</p>";}
                          }
                          ?>

              </div>
          </div>

             <table border="2px">
                <?php
                    include ("bd.php");

                    $sql ="SELECT * FROM rezume";
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
             </table>
      </div>

  </div>
 </body>