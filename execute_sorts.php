<?php

require "public_functions.php";
usleep(mt_rand(100, 10000));
$linhas = 100000;

//Bubble Sort
echo "iniciando o Bubble Sort...\n";
$csvData1 = readCSV("metadados_APS.csv",$linhas);
$time_start1 = microtime(true);
bubblesort($csvData1,sizeof($csvData1)); 
$time_end1 = microtime(true);
$execution_time1 = ($time_end1 - $time_start1);
echo "Tempo total de execução de ".$linhas." linhas após o bubble sort foi de : ".$execution_time1." segundos\n";

//Selection Sort
echo "\niniciando o Selection Sort...\n";
$csvData2 = readCSV("metadados_APS.csv",$linhas);
$time_start2 = microtime(true);
selectionsort($csvData2,sizeof($csvData2));
$time_end2 = microtime(true);
$execution_time2 = ($time_end2 - $time_start2);
echo "Tempo total de execução de ".$linhas." linhas após o Selection sort foi de : ".$execution_time2." segundos\n";

//Insertion Sort
echo "\niniciando o Insertion Sort...\n";
$csvData3 = readCSV("metadados_APS.csv",$linhas);
$time_start3 = microtime(true);
insertionsort($csvData3,sizeof($csvData3));
$time_end3 = microtime(true);
$execution_time3 = ($time_end3 - $time_start3);
echo "Tempo total de execução de ".$linhas." linhas após o Insertion sort foi de : ".$execution_time3." segundos\n";

//Quick Sort
echo "\niniciando o Quick Sort...\n";
$csvData4 = readCSV("metadados_APS.csv",$linhas);
$time_start4 = microtime(true);
quicksort($csvData4,0,sizeof($csvData4)-1);
$time_end4 = microtime(true);
$execution_time4 = ($time_end4 - $time_start4);
echo "Tempo total de execução de ".$linhas." linhas após o Quick sort foi de : ".$execution_time4." segundos\n";

//Merge Sort
echo "\niniciando o Merge Sort...\n";
$csvData5 = readCSV("metadados_APS.csv",$linhas);
$time_start5 = microtime(true);
mergesort($csvData5,0,sizeof($csvData5)-1);
$time_end5 = microtime(true);
$execution_time5 = ($time_end5 - $time_start5);
echo "Tempo total de execução de ".$linhas." linhas após o Merge sort foi de : ".$execution_time5." segundos\n";

//Heap Sort
echo "\niniciando o Heap Sort...\n";
$csvData6 = readCSV("metadados_APS.csv",$linhas);
$time_start6 = microtime(true);
heapsort($csvData6,sizeof($csvData6));
$time_end6 = microtime(true);
$execution_time6 = ($time_end6 - $time_start6);


// for ($i = 0; $i < sizeof($csvData6); $i++) {
//     echo $csvData6[$i][0]."\n"; 
// }
// echo "\n\n";
// echo "Tempo total de execução de ".$linhas." linhas após o Heap sort foi de : ".$execution_time6." segundos\n";

$ranking = array($execution_time1,$execution_time2,$execution_time3,$execution_time4,$execution_time5,$execution_time6);
insertionsort($ranking,sizeof($ranking));
echo "Ranking das execuções: \n";
for ($i = 0; $i < sizeof($ranking); $i++) {
    echo ($i+1).".o : ".$ranking[$i]."\n"; 
}
echo "\n\n";
?>