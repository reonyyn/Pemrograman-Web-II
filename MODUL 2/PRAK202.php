<html>
    <head>
        <style>
            .error {
                color: red;
            }
        </style>
    </head>
    <body>
        <form method="post" action="">
            Nama: <input type="text" name="nama">
            <span class="error">*</span>
            <span class="error">
                <?php 
                $nama = $_POST['nama'] ?? null;
                echo isset($_POST['submit']) && $nama == null ? "Nama tidak boleh kosong" : "" 
                ?>
            </span>
            <br>
            
            Nim: <input type="text" name="nim">
            <span class="error">*</span>
            <span class="error">
                <?php 
                $nim = $_POST['nim'] ?? null;
                echo isset($_POST['submit']) && $nim == null ? "Nim tidak boleh kosong" : "" 
                ?>
            </span>
            <br>
            
            Jenis Kelamin: 
            <span class="error">*</span>
            <span class="error">
                <?php 
                $lk = $_POST['lk'] ?? null;
                $pr = $_POST['pr'] ?? null;
                echo isset($_POST['submit']) && !$lk && !$pr ? "Jenis kelamin harus dipilih" : "" 
                ?>
            </span>
            <br>

            <input type="radio" name="lk" value="lk"> Laki-laki<br>
            <input type="radio" name="pr" value="pr"> Perempuan<br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </body>
</html>

<?php
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'] ?? null;
    $nim = $_POST['nim'] ?? null;
    $jenis_kelamin = isset($_POST['lk']) ? "Laki-laki" : (isset($_POST['pr']) ? "Perempuan" : null);

    if ($nama && $nim && $jenis_kelamin) {
        echo "Nama: " . $nama . "<br>";
        echo "Nim: " . $nim . "<br>";
        echo "Jenis Kelamin: " . $jenis_kelamin . "<br>";
    }
}
?>