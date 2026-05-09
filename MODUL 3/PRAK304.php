<?php
    $count = $_POST['num'] ?? 0;

    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'increment') {
            $count++;
        } elseif ($_POST['action'] == 'decrement' && $count > 0) {
            $count--;
        }
    }

    $isSubmitted = isset($_POST['action']);    
    $image = "star.png";
?>

<html>
<head>
    <style>
        #inputForm {
            display: <?php echo $isSubmitted ? 'none' : 'block'; ?>;
        }
    
        #displayForm {
            display: <?php echo $isSubmitted ? 'block' : 'none'; ?>;
        }
    </style>
</head>
<body>
    <div id="inputForm">
        <form method="post">
            <label for="num">Jumlah bintang </label>
            <input type="number" name="num" id="num"> <br>
            <input type="submit" name="action" value="Submit"> <br>
        </form>
    </div>

    <div id="displayForm">
        <form method="post">
            <?php
                echo "Jumlah bintang $count <br>";
                for ($i = 0; $i < $count; $i++) {
                echo "<img src='$image' width='80' height='80'> ";
                }
                echo "<br>";
            ?>
            <input type="hidden" name="num" value="<?php echo $count; ?>">
            <button type="submit" name="action" value="increment">Tambah</button>
            <button type="submit" name="action" value="decrement">Kurang</button>
        </form>
    </div>
</body>
</html>