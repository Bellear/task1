<?php
function schet($text, $word, $p){
$text = mb_strtolower("$text");
$mtext = preg_split("/[\s[:punct:]]+/", $text, -1, PREG_SPLIT_NO_EMPTY);
$arr = array_count_values($mtext);
if (!mkdir(__DIR__.DIRECTORY_SEPARATOR."output", 0700, true) && !is_dir(__DIR__.DIRECTORY_SEPARATOR."output")){
  echo "Не удалось создать директорию output";
}
  foreach ($arr as $key => $value) {
  $mass[] = ["$key", "$value"];
}
if (array_key_exists("$word", $arr)) {
  $mass[] = ["Повторений \"$word\" в тексте", "$arr[$word]"];}
else {
  $mass[] = ["Повторений \"$word\" в тексте", " 0"];
}
$w = count($mtext);
$mass[] = ["Слов в тексте", "$w"];
if ($p==1) {
  $filename1 = __DIR__.DIRECTORY_SEPARATOR.'output'.DIRECTORY_SEPARATOR.'schtext.csv';
  unlink($filename1);
  $fp = fopen($filename1, 'w');
  foreach ($mass as $fields) {
    fputcsv($fp, $fields, ":");
  }
  fclose($fp);
  echo "Успешно обработана форма <br>";
}
if ($p==2) {
  $filename2 = __DIR__.DIRECTORY_SEPARATOR.'output'.DIRECTORY_SEPARATOR.'schfile.csv';
  unlink($filename2);
  $fp1 = fopen($filename2, 'w');
  foreach ($mass as $fields) {
    fputcsv($fp1, $fields, ":");
  }
  fclose($fp1);
  echo "Успешно обработан файл<br>";
}}
?>
