<?php
function DBinput($text1) {
  $text = mb_strtolower("$text1");
  $mtext = preg_split("/[\s[:punct:]]+/", $text, -1, PREG_SPLIT_NO_EMPTY);
  $arr = array_count_values($mtext);
    $mass = json_encode($arr, JSON_UNESCAPED_UNICODE);
    $mass = str_replace(',', ', ', $mass);
  $w = count($mtext);
  $today = date("d-m-Y");

  require 'DBconnect.php';

  $sql = 'INSERT INTO uploaded_text(content, date, words_count) VALUES(:text1, :date, :count)';
  $query = $pdo->prepare($sql);
  $query->execute(['text1' => $text1, 'date' => $today, 'count' => $w]);

  $id = $pdo->lastInsertId();

  $sql = 'INSERT INTO word(text_id, word, count) VALUES(:id, :mass, :count)';
  $query = $pdo->prepare($sql);
  $query->execute(['id' => $id, 'mass' => $mass, 'count' => $w]);
}















/*function WordCount($text){ //Формирует массив [Слово : кол-во повторений]
    $text = mb_strtolower("$text");
    $mtext = preg_split("/[\s[:punct:]]+/", $text, -1, PREG_SPLIT_NO_EMPTY);
    $arr = array_count_values($mtext);
    foreach ($arr as $key => $value) {
      $mass[] = ["$key", "$value"];
    }
    $w = count($mtext);
    $mass[] = ["Слов в тексте", "$w"];
    return $mass;
}
*/
?>
