<?php
    $celcius = 37.841;

    function convertToFahrenheit($c) {
        $fahrenheit = ($c * 9/5) + 32;
        return $fahrenheit;
    }

    function convertToReamur($c) {
        $reamur = $c * 4/5;
        return $reamur;
    }

    function convertToKelvin($c) {
        $kelvin = $c + 273.15;
        return $kelvin;
    }

    $fahrenheit = convertToFahrenheit($celcius);
    $reamur = convertToReamur($celcius);
    $kelvin = convertToKelvin($celcius);

    echo "Fahrenheit (F) = " . number_format($fahrenheit, 4) . "<br>";
    echo "Reamur (R) = " . number_format($reamur, 4) . "<br>";
    echo "Kelvin (K) = " . number_format($kelvin, 4) . "<br>";
?>