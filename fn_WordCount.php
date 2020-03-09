<?php
function WordCount($text){ //Формирует массив [Слово : кол-во повторений]
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
?>
