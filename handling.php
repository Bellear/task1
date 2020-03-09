<?php
require_once 'fn_DBinput.php';

if (empty($_POST['story']) && empty($_FILES['file']['name'])) {
  exit("Поделитесь Вашим текстом");
}
if (!empty($_POST['story'])) {
  $text = $_POST['story'];
  DBinput($text);
  header('Location: /');
}
if (!empty($_FILES['file']['name'])) {
  $current_path = $_FILES['file']['tmp_name'];
  $text2 = file_get_contents($current_path);
  DBinput($text2);
  header('Location: /');
}
?>
