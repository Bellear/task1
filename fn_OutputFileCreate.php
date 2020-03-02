<?php
function OutputFileCreate ($mass, $name) { //Формирует .csv файл с из массива
  date_default_timezone_set('Europe/Ulyanovsk');
  $t = date('H-i-s');
  $filename = __DIR__ .DIRECTORY_SEPARATOR .'output' .DIRECTORY_SEPARATOR ."$t " ."$name " .'assay.csv';
  $fp = fopen($filename, 'w');
  foreach ($mass as $fields) {
    fputcsv($fp, $fields, ":");
  }
  fclose($fp);
}
?>
