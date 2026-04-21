<html>
    <body>
        <form method="post" action="">
        Nilai: <input type="text" name="val"><br>
        Dari : <br>
        <input type="radio" name="from" value="c"> Celcius<br>
        <input type="radio" name="from" value="f"> Fahrenheit<br>
        <input type="radio" name="from" value="r"> Reamur<br>
        <input type="radio" name="from" value="k"> Kelvin<br>
        Ke : <br>
        <input type="radio" name="to" value="c"> Celcius<br>
        <input type="radio" name="to" value="f"> Fahrenheit<br>
        <input type="radio" name="to" value="r"> Reamur<br>
        <input type="radio" name="to" value="k"> Kelvin<br>
        <input type="submit" name="submit" value="Konversi">
        </form>
    </body>
</html>

<?php
    if (isset($_POST['submit'])) {
        $val = $_POST['val'];
        $from = $_POST['from'];
        $to = $_POST['to'];

        if ($from == 'c') {
            if ($to == 'f') {
                $result = ($val * 9/5) + 32;
                echo "<b>Hasil Konversi: $result °F</b>";
            } elseif ($to == 'r') {
                $result = $val * 4/5;
                echo "<b>Hasil Konversi: $result °R</b>";
            } elseif ($to == 'k') {
                $result = $val + 273.15;
                echo "<b>Hasil Konversi: $result K</b>";
            }
        } elseif ($from == 'f') {
            if ($to == 'c') {
                $result = ($val - 32) * 5/9;
                echo "<b>Hasil Konversi: $result °C</b>";
            } elseif ($to == 'r') {
                $result = ($val - 32) * 4/9;
                echo "<b>Hasil Konversi: $result °R</b>";
            } elseif ($to == 'k') {
                $result = ($val - 32) * 5/9 + 273.15;
                echo "<b>Hasil Konversi: $result K</b>";
            }
        } elseif ($from == 'r') {
            if ($to == 'c') {
                $result = $val * 5/4;
                echo "<b>Hasil Konversi: $result °C</b>";
            } elseif ($to == 'f') {
                $result = ($val * 9/4) + 32;
                echo "<b>Hasil Konversi: $result °F</b>";
            } elseif ($to == 'k') {
                $result = ($val * 5/4) + 273.15;
                echo "<b>Hasil Konversi: $result K</b>";
            }
        } elseif ($from == 'k') {
            if ($to == 'c') {
                $result = $val - 273.15;
                echo "<b>Hasil Konversi: $result °C</b>";
            } elseif ($to == 'f') {
                $result = ($val - 273.15) * 9/5 + 32;
                echo "<b>Hasil Konversi: $result °F</b>";
            } elseif ($to == 'r') {
                $result = ($val - 273.15) * 4/5;
                echo "<b>Hasil Konversi: $result °R</b>";
            }
        }
    }
?>