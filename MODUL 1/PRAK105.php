<?php
    $smartphone = [
        "Galaxy S22" => "Samsung",
        "Galaxy S22+" => "Samsung",
        "Galaxy A03" => "Samsung",
        "Galaxy XCover 5" => "Samsung"
    ]
?>

<html>
    <head>
        <style>
            table {
                border: 1px double black;
            }
            th, td {
                border: 1px double black;
                text-align: left;
            }
            th {
                background-color: red;
                padding-top: 10px;
                padding-bottom: 10px;
                font-size: 25px;
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <th>Daftar Smartphone Samsung</th>
            </tr>
            <?php foreach ($smartphone as $key => $value) { 
                echo "<tr><td>$value $key</td></tr>";
            } ?>
        </table>
    </body>
</html>