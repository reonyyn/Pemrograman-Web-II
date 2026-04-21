<html>
<body>
    <form method="post" action="">
        Nilai: <input type="text" name="val"><br>
        <input type="submit" name="submit" value="Konversi">
    </form>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['val'])) {
        $val = $_POST['val'];
        $number = "";
        if ($val >= 1000) $number = "Anda Menginput Melebihi Limit Bilangan";
        elseif ($val >= 100 && $val < 1000) $number = "Ratusan";
        elseif ($val == 10 || ($val >= 20 && $val < 100)) $number = "Puluhan";
        elseif ($val >= 11 && $val < 20) $number = "Belasan";
        elseif ($val >= 1 && $val < 10) $number = "Satuan";
        elseif ($val >= 0) $number = "Nol";
        else $number = "Input tidak valid";

        echo "<b>Hasil : $number</b>";
    }
}
?>