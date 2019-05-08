<?php

date_default_timezone_set("Asia/Calcutta");

function convert12($str) 
{ 
    // Get Hours 
    $h1 = $str[0] - '0'; 
    $h2 = $str[1] - '0'; 
  
    $hh = $h1 * 10 + $h2; 
  
    // Finding out the Meridien  
    // of time ie. AM or PM 
    $Meridien; 
    if ($hh < 12)  
    { 
        $Meridien = "AM"; 
    } 
    else
        $Meridien = "PM"; 
  
    $hh %= 12; 
  
    // Handle 00 and 12  
    // case separately 
    if ($hh == 0)  
    { 
        echo "12"; 
  
        // Printing minutes and seconds 
        for ($i = 2; $i < 8; ++$i) 
        { 
            echo $str[$i]; 
        } 
    } 
    else
    { 
        echo $hh; 
          
        // Printing minutes and seconds 
        for ($i = 2; $i < 8; ++$i)  
        { 
            echo $str[$i]; 
        } 
    } 
  
    // After time is printed 
    // cout Meridien 
    echo " " , $Meridien; 
} 
  
// Driver code 
  
// 24 hour format 
$str = "17:35:20"; 
  
convert12(date("H:i:s")); 
  
// This code is contributed  
// by ajit 
?> 