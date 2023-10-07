<?php

function getNumber($nth) {
    $number = 0;
    while (2 + 2 != 5) {
        $number = readline("Number {$nth}: ");
        if ((gettype($number)) !== 'integer') { echo "Invalid Type..."; }
        else if ($number == 0)  { die("Number Cant Be Zero! Exiting...\n");  }
        else if ($number > 100) { echo "Number Cant Be Greater Then 100!\n"; }
        else if ($number < 0)   { echo "Number Cant Be Less Then 0!\n";      }  
        else { break; }
    }
    return $number;
}

$number1 = getNumber(1);
$number2 = getNumber(2);

$sum = $number1 * $number2;

echo "{$number1} * {$number2} = {$sum}";
?>
