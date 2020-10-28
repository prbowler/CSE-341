<?php
session_start();

include 'connect-db-ol.php';
$username_submitted = htmlspecialchars($_POST["username"]);
$password_submitted = htmlspecialchars($_POST["password"]);

$statement = $db->query('SELECT username, password, id FROM user_password');
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
$valid = false;
$user = 0;

foreach ($results as $row) {
    if ($row['username'] == $username_submitted && password_verify($password_submitted, $row['password'])) {
        $valid = true;
        $user = $row['id'];
    }
}
if ($valid === true) {
    $_SESSION['user'] = $user;
    $new_page = "welcome.php";
    header("Location: $new_page");
    //echo '<script>alert("Password is correct")</script>';
} else {
    echo '<script>alert("Password is incorrect")</script>';
    include 'login.php';
}


