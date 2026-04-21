<html>
    <body>
        <form method="post" action="">
        Nama: 1 <input type="text" name="nama1"><br>
        Nama: 2 <input type="text" name="nama2"><br>
        Nama: 3 <input type="text" name="nama3"><br>
        <input type="submit" name="submit" value="Urutkan">
        </form>        
    </body>
</html>

<?php
if (isset($_POST['submit'])) {
    $nama1 = $_POST['nama1'];
    $nama2 = $_POST['nama2'];
    $nama3 = $_POST['nama3'];

    $names = [$nama1, $nama2, $nama3];
    sort($names);

    foreach ($names as $name) {
        echo $name . "<br>";
    }
}
?>