<?php
require 'DBconnect.php';
?>

<html>
  <head>
    <meta http-equiv="content-type"
    comtent="text/html; charset=utf-8">
    <title>Таблица</title>
  </head>
  <body>
    <p><b>Список текстов</b></p>
    <table border ="1" cellpadding="5" width="1170px"
    style="border-collapse: collapse"; border: 1px solid black;>
      <tbody>
        <tr style="background-color: silver">
          <th width="20px">id</th>
          <th width="1000px">content</th>
          <th width="100px">date</th>
          <th width="50px">words_count</th>
          <th width="50px">upload</th>
        </tr>
        <?php
        $query = $pdo->query('SELECT * FROM uploaded_text');
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          $content = mb_strimwidth("$row[content]", 0, 100, "...");
          echo "<tr><td>$row[id]</td><td>$content</td><td>$row[date]</td><td>$row[words_count]</td>
          <td><a href='Details.php?id=$row[id]'>Подробнее</a></td></tr>";
        }
        ?>
      </tbody>
    </table>
    <a href ="Upload_text.php">Загрузить новый текст</a>
  </body>
</html>
