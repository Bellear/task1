<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Upload</title>
</head>
<body>
  <form action="handling.php" method="post" enctype="multipart/form-data">
    <p><b>Введите Ваш текст</b></p>
    <p><textarea rows="10" cols="100" name="story"></textarea></p>
    <p><input type="file" name="file"></p>
    <p><input type="submit" value="Отправить"></p>
  </form>
</body>
