<?php

require "public_functions.php";
usleep(mt_rand(100, 10000));
$linhas = 100000;
$csvData = readCSV("metadados_APS.csv",$linhas);

//Insertion Sort
echo "\niniciando o Insertion Sort...\n";
$time_start = microtime(true);
insertionsort($csvData,sizeof($csvData));
$time_end = microtime(true);
$execution_time = ($time_end - $time_start);


// for ($i = 0; $i < sizeof($csvData); $i++) {
//     echo $csvData[$i][0]."\n"; 
// }
// echo "\n\n";
echo "Tempo total de execução de ".$linhas." linhas após o Insertion sort foi de : ".$execution_time." segundos\n\n\n";