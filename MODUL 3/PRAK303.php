<html>
<body>
    <form method="post">
        <label for="min">Batas Bawah :</label> 
        <input type="number" name="min" id="min"> <br>
        <label for="max">Batas Atas :</label> 
        <input type="number" name="max" id="max"> <br>
        <input type="submit" name="submit" value="Cetak"> <br>
    </form>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $min = $_POST['min'];
            $max = $_POST['max'];
            $image = "star.png";

            do {
                if (($min+7) % 5 == 0) {
                    echo " <img src='$image' width='20' height='20'> ";
                }
                else {
                    echo " $min ";
                }
                $min++;
            } while ($min <= $max);
        }
    ?>
</body>
</html>