<?php

require "public_functions.php";
usleep(mt_rand(100, 10000));
$mem = memory_get_usage();
if ($argc < 1) {
    echo "Você deve digitar o argumento numero de linhas que serão lidos. Ex: php execute_sorts.php [num1] ";
    exit();
}
$linhas = $argv[1];
define("PADRAO","\033[0m");
define("VERMELHO","\033[31m");
define("VERDE","\033[32m");
define("AMARELO","\033[33m");
define("AZUL","\033[34m");
define("MAGENTA","\033[35m"); 
define("CIANO","\033[36m");
define("BRANCO","\033[37m");

$results = array();

//Bubble Sort
echo "iniciando o Bubble Sort...\n";
$csvData1 = readCSV("metadados_APS.csv",$linhas);
$time_start1 = microtime(true);
bubblesort($csvData1,sizeof($csvData1)); 
$time_end1 = microtime(true);
$execution_time1 = number_format((double)($time_end1 - $time_start1), 4, '.', '');
array_push($results,array('name' => 'Bubble Sort','value' => $execution_time1,));
echo "Tempo total de execução de ".$linhas." linhas após o".VERDE." bubble sort".PADRAO." foi de : ".AZUL.$execution_time1.PADRAO." segundos \n";

//Selection Sort
echo "\niniciando o Selection Sort...\n";
$csvData2 = readCSV("metadados_APS.csv",$linhas);
$time_start2 = microtime(true);
selectionsort($csvData2,sizeof($csvData2));
$time_end2 = microtime(true);
$execution_time2 = number_format((double)($time_end2 - $time_start2), 4, '.', '');
array_push($results,array('name' => 'Selection Sort','value' => $execution_time2,));
echo "Tempo total de execução de ".$linhas." linhas após o".VERDE." Selection sort".PADRAO." foi de : ".AZUL.$execution_time2.PADRAO." segundos \n";

//Insertion Sort
echo "\niniciando o Insertion Sort...\n";
$csvData3 = readCSV("metadados_APS.csv",$linhas);
$time_start3 = microtime(true);
insertionsort($csvData3,sizeof($csvData3));
$time_end3 = microtime(true);
$execution_time3 = number_format((double)($time_end3 - $time_start3), 4, '.', '');
array_push($results,array('name' => 'Insertion Sort','value' => $execution_time3,));
echo "Tempo total de execução de ".$linhas." linhas após o".VERDE." Insertion sort".PADRAO." foi de : ".AZUL.$execution_time3.PADRAO." segundos \n";

//Quick Sort
echo "\niniciando o Quick Sort...\n";
$csvData4 = readCSV("metadados_APS.csv",$linhas);
$time_start4 = microtime(true);
quicksort($csvData4,0,sizeof($csvData4)-1);
$time_end4 = microtime(true);
$execution_time4 = number_format((double)($time_end4 - $time_start4), 4, '.', '');
array_push($results,array('name' => 'Quick Sort','value' => $execution_time4,));
echo "Tempo total de execução de ".$linhas." linhas após o".VERDE." Quick sort".PADRAO." foi de : ".AZUL.$execution_time4.PADRAO." segundos \n";

//Merge Sort
echo "\niniciando o Merge Sort...\n";
$csvData5 = readCSV("metadados_APS.csv",$linhas);
$time_start5 = microtime(true);
mergesort($csvData5,0,sizeof($csvData5)-1);
$time_end5 = microtime(true);
$execution_time5 = number_format((double)($time_end5 - $time_start5), 4, '.', '');
array_push($results,array('name' => 'Merge Sort','value' => $execution_time5,));
echo "Tempo total de execução de ".$linhas." linhas após o".VERDE." Merge sort".PADRAO." foi de : ".AZUL.$execution_time5.PADRAO." segundos \n";

//Heap Sort
echo "\niniciando o Heap Sort...\n";
$csvData6 = readCSV("metadados_APS.csv",$linhas);
$time_start6 = microtime(true);
heapsort($csvData6,sizeof($csvData6));
$time_end6 = microtime(true);
$execution_time6 = number_format((double)($time_end6 - $time_start6), 4, '.', '');
array_push($results,array('name' => 'Heap Sort','value' => $execution_time6,));
echo "Tempo total de execução de ".$linhas." linhas após o".VERDE." Heap sort".PADRAO." foi de : ".AZUL.$execution_time6.PADRAO." segundos \n";

foreach ($results as $key => $row) {
    $name[$key]  = $row['name'];
    $value[$key] = $row['value'];
}

array_multisort($value, SORT_ASC, $results);

echo "\n\nRanking das execuções: \n";
for ($i = 0; $i < sizeof($results); $i++) {
    echo ($i+1)."º : ".VERMELHO.$results[$i]['value']." segundos ".PADRAO."\t";
    echo " -\t".AZUL.$results[$i]['name'].PADRAO."\n";  
}
echo "\nMemória usada: ". number_format((memory_get_usage() - $mem) / (1024 * 1024),4)." MegaBytes";
echo "\n\n";
?>