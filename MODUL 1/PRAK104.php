<?php
    $smartphone = [
        "Samsung Galaxy S22",
        "Samsung Galaxy S22+",
        "Samsung Galaxy A03",
        "Samsung Galaxy XCover 5"
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
        </style>
    </head>
    <body>
        <table>
            <tr>
                <th>Daftar Smartphone Samsung</th>
            </tr>
            <?php foreach ($smartphone as $phone) { 
                echo "<tr><td>$phone</td></tr>";
             } ?>
        </table>
    </body>
</html>