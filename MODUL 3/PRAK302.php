<html>
<head>
    <style>
        img {
            display: inline-block;
            margin: 0;
            padding: 0;
            vertical-align: top;
        }
    </style>
</head>

<body>
    <form method="post">
        <label for="height">Tinggi :</label>
        <input type="number" name="height" id="height" required> <br>
        <label for="image">Alamat Gambar :</label>
        <input type="text" name="image" id="image" required> <br>
        <input type="submit" name="submit" value="Cetak"> <br>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $height = (int)$_POST['height'];
        $image = $_POST['image'];

        $i = 1;
        while ($i <= $height) {
            $j = 1;
            while ($j < $i) {
                echo "<img src='$image' width='30' height='30' style='opacity:0;'>";
                $j++;
            }

            $k = 1;
            $jumlahGambar = $height - $i + 1;
            while ($k <= $jumlahGambar) {
                echo "<img src='$image' width='30' height='30'>";
                $k++;
            }

            echo "<br>";
            $i++;
        }
    }
    ?>
</body>
</html