<?php
    $radius = 4.2;
    $height = 5.4;

   function calculateVolume($r, $h) {
        $volume = 3.14 * pow($r, 2) * $h;
        return $volume;
    }
    
    $volume = calculateVolume($radius, $height);
    echo number_format($volume, 3) . " m3";
?>