<?php
function readCSV($file,$limit=-1)
{
  $row      = 0;
  $csvArray = array();
  if( ( $handle = fopen($file, "r") ) !== FALSE ) {
    while( ( $data = fgetcsv($handle, 0, ";") ) !== FALSE ) {
      $num = count($data);
      for( $c = 0; $c < $num; $c++ ) {
        $csvArray[$row][] = $data[$c];
      }
      if ($row==$limit){break;}
      $row++;
    }
  }
  if( !empty( $csvArray ) ) {
    return array_splice($csvArray, 1);
  } else {
    return false;
  }
}

function bubblesort(&$Array, $n) {
    $temp;
    for($i=0; $i<$n; $i++) {
      for($j=0; $j<$n-$i-1; $j++) {
        if($Array[$j]>$Array[$j+1]) {
          $temp = $Array[$j];
          $Array[$j] = $Array[$j+1];
          $Array[$j+1] = $temp;
        }
      }
    }
  }

  function selectionsort(&$Array, $n) {
    for($i=0; $i<$n; $i++) {
      $min_idx = $i;
  
      for($j=$i+1; $j<$n; $j++) {
        if($Array[$j] < $Array[$min_idx])
        {$min_idx = $j;}
      }
  
      $temp = $Array[$min_idx];
      $Array[$min_idx] = $Array[$i];
      $Array[$i] = $temp;
    }
  }

  function insertionsort(&$Array, $n) {
    for($i=0; $i<$n; $i++) {
      $curr = $Array[$i];
      $j = $i - 1;
      while($j >= 0 && $curr < $Array[$j]) {
        $Array[$j + 1] = $Array[$j];
        $Array[$j] = $curr;
        $j = $j - 1;
      }
    }
  }

  function quicksort(&$Array, $left, $right) {
    if ($left < $right) { 
      $pivot = partition($Array, $left, $right);
      quicksort($Array, $left, $pivot-1);
      quicksort($Array, $pivot+1, $right);
    }
  }
  
  function partition(&$Array, $left, $right) {
    $i = $left;
    $pivot = $Array[$right];
    for($j = $left; $j <=$right; $j++) {
      if($Array[$j] < $pivot) {
        $temp = $Array[$i];
        $Array[$i] = $Array[$j];
        $Array[$j] = $temp;
        $i++;
      }
    }
  
    $temp = $Array[$right];
    $Array[$right] = $Array[$i];
    $Array[$i] = $temp;
    return $i;
  }

function mergesort(&$Array, $left, $right) {
    if ($left < $right) { 
      $mid = $left + (int)(($right - $left)/2);
      mergesort($Array, $left, $mid);
      mergesort($Array, $mid+1, $right);
      merge($Array, $left, $mid, $right);
    }
  }
  
  
  function merge(&$Array, $left, $mid, $right) {
    $n1 = $mid - $left + 1; 
    $n2 = $right - $mid;       
    $LeftArray = array_fill(0, $n1, 0); 
    $RightArray = array_fill(0, $n2, 0);
    for($i=0; $i < $n1; $i++) { 
      $LeftArray[$i] = $Array[$left + $i];
    }
    for($i=0; $i < $n2; $i++) { 
      $RightArray[$i] = $Array[$mid + $i + 1];
    }
  
    $x=0; $y=0; $z=$left;
    while($x < $n1 && $y < $n2) {
      if($LeftArray[$x] < $RightArray[$y]) { 
        $Array[$z] = $LeftArray[$x]; 
        $x++; 
      }
      else { 
        $Array[$z] = $RightArray[$y];  
        $y++; 
      }
      $z++;
    }
  
    while($x < $n1) { 
       $Array[$z] = $LeftArray[$x];  
       $x++;  
       $z++;
    }
  
    while($y < $n2) { 
      $Array[$z] = $RightArray[$y]; 
      $y++;  
      $z++; 
    }
  }

function heapsort(&$Array, $n) {
    for($i = (int)($n/2); $i >= 0; $i--) {
      heapify($Array, $n-1, $i);
    }
    
    for($i = $n - 1; $i >= 0; $i--) {
      $temp = $Array[$i];
      $Array[$i] = $Array[0];
      $Array[0] = $temp;
      heapify($Array, $i-1, 0);
    }
  }
  
  function heapify(&$Array, $n, $i) {
    $max = $i;
    $left = 2*$i + 1;
    $right = 2*$i + 2;
  
    if($left <= $n && $Array[$left] > $Array[$max]) {
      $max = $left;
    }

    if($right <= $n && $Array[$right] > $Array[$max]) {
      $max = $right;
    }

    if($max != $i) {
      $temp = $Array[$i];
      $Array[$i] = $Array[$max];
      $Array[$max] = $temp;
      heapify($Array, $n, $max); 
    }
  }
  

?>