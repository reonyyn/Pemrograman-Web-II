<form method="post">
    <input type="text" name="text" id="text">
    <input type="submit" name="submit" value="Submit"> <br>
</form>

<?php
    if (isset($_POST['submit'])) {
        $text = $_POST['text'];
        $length = strlen($text);

        echo "<h2>Input</h2>";
        echo "$text <br>";

        echo "<h2>Output</h2>";
        for ($i = 0; $i < $length; $i++) {
            $char = strtolower($text[$i]);
            $repeat = str_repeat($char, $length);
            echo ucfirst($repeat);
        }
    }
?>