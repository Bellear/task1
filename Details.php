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
    <p><b>Информация о тексте</b></p>
    <table border ="1" cellpadding="5" width="1170px"
    style="border-collapse: collapse"; border: 1px solid black;>
      <tbody>
        <tr style="background-color: silver">
          <th width="20px">id</th>
          <th width="1000px">content</th>
          <th width="100px">date</th>
          <th width="50px">words</th>
          <th width="50px">words count</th>
        </tr>
        <?php
        $id = $_GET['id'];

        $query = $pdo->query("SELECT * FROM uploaded_text WHERE id = '$id'");
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $query2 = $pdo->query("SELECT word FROM word WHERE text_id = '$id'");
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
          echo "<tr><td>$row[id]</td><td>$row[content]</td><td>$row[date]</td><td>$row[words_count]</td>
          <td>$row2[word]</td></tr>";
        ?>
      </tbody>
    </table>
  </body>
</html>
