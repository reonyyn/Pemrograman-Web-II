<html>
<head>
    <style>
        .odd {
            color: red;
        }
        .even {
            color: green;
        }
    </style>
</head>

<body>
    <form method="post">
        <label for="num">Jumlah Peserta:</label> 
        <input type="number" name="num" id="num"> <br>
        <input type="submit" name="submit" value="Cetak"> <br>
    </form>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $jumlahPeserta = $_POST['num'];
            $i = 1;
            while ($i <= $jumlahPeserta) {
                if ($i % 2 == 0) {
                    echo "<h2 class='even'>Peserta ke-$i</h2>";
                } else {
                    echo "<h2 class='odd'>Peserta ke-$i</h2>";
                }
                $i++;
            }
        }
    ?>
</body>
</html>