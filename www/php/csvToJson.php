<?php

$file = "../pages/Professions.csv";

$csv= file_get_contents($file);
$array = array_map("str_getcsv", explode(";", $csv));
$json = json_encode($array);
echo ($json);


 ?>
