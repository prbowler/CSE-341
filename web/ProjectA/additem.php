<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Item</title>
    <link rel="stylesheet" type="text/css" href="card.css">
</head>
<body>

<?php
    require "connect-db-ol.php";
    require "get_cart.php";
    include "banner.php";
    $user = 0;
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    } else {
        $new_page = "login.php";
        header("Location: $new_page");
    }
    $cart = getCart($db, $user);
    if (is_null($cart) || $cart === 0) {
        echo "<script>alert('No cart')";
        $query = 'INSERT INTO cart(shopperid) VALUES (:shopperid)';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':shopperid', $user, PDO::PARAM_INT);
        $stmt->execute();
        $cart = getCart($db, $user);
    }
    echo $cart;
    $id = htmlspecialchars($_GET['item_id']);
    $query = 'SELECT * FROM items WHERE id = ' . $id .'';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($items);
    $item = $items[0];
    $image = 'img/' . $item['image'] . '.jpg';
    $name = $item['name'];
    $price = $item['price'];
     error_log("echo",0);
     echo
        '<div class="card">
                <img src="' . $image .'"alt="'. $image .'" style="width:100%">
                <h3>' . $name . '</h3>
                <p class="price">$' . $price . '</p>
            </div>';
     echo
        "<form action='additems.php' method='post' >
              <input type='hidden' name='item_id' value='$id'>
              <input type='hidden' name='cart_id' value='$cart'>
              <input type='hidden' name='user_id' value='$user'>
              <label for='quantity'>Quantity</label>
              <input type='number' name='quantity'>
              <input type='submit'>  
        </form>";

?>
</body>
</html>


