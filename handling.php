<?php
require_once 'fn_WordCount.php';
require_once 'fn_OutputFileCreate.php';

if (empty($_POST['story']) && empty($_FILES['file']['name'])) {
  exit("Поделитесь Вашим текстом");
}
if (!empty($_POST['story'])) {
  $text = $_POST['story'];
  OutputFileCreate(WordCount($text), 'Text');
}
if (!empty($_FILES['file']['name'])) {
  $current_path = $_FILES['file']['tmp_name'];
  $text2 = file_get_contents($current_path);
  OutputFileCreate(WordCount($text), 'FromFile');
}
?>
