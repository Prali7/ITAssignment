<?php
for ($num = 2; $num <= 50; $num++) {
    $isPrime = true;
    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i == 0) {
            $isPrime = false;
            break;
        }
    }
    if ($isPrime) {
        echo $num . " ";
    }
}
?>