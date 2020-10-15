<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Canning Supplies</title>
    <link rel="stylesheet" type="text/css" href="card.css">
</head>
<body>

<?php
    include "banner.html";
    include "connect-db-ol.php";

    foreach ($db->query('SELECT * FROM items as i WHERE categoryid = 4') as $row) {
        $image = 'img/' . $row['image'] . '.jpg';
        echo
            '<div class="card">
                <img src="' . $image .'"alt="'. $image .'" style="width:100%">
                <h3>' . $row["name"] . '</h3>
                <p class="price">$' . $row["price"] . '</p>
                <p><button>Add to Cart</button></p>
            </div>';
    }
?>
</body>

