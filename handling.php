<?php
require_once 'schet.php';
if (empty($_POST['story']) && empty($_FILES['file']['name'])) {
 exit("Поделитесь Вашим текстом");
}
if (empty($_POST['slog'])) {
 exit("Введите слово для поиска в тексте");
 } else {
  $slog = $_POST['slog'];
}
if (!empty($_POST['story'])) {
  $text = $_POST['story'];
  schet($text, $slog, 1);
}
if (!empty($_FILES['file']['name'])) {
  $current_path = $_FILES['file']['tmp_name'];
  $filename = $_FILES['file']['name'];
  $new_path = __DIR__ . DIRECTORY_SEPARATOR . $filename;
  move_uploaded_file($current_path, $new_path);
  $text2 = file_get_contents($new_path);
  schet($text2, $slog, 2);
  unlink($new_path);
}
?>
