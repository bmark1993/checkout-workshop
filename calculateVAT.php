<?php


function calculateVAT($amount, $rate = 18) {
    $vat = $amount * $rate / 100;
    return $vat;
}




?>
