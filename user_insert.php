<?php
include_once "db.php";

$firts_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$pass2 = $_POST['pass2'];
$city_id = $_POST['city_id'];

//preverjam vnešene podatke
if (!empty($firts_name) && !empty($last_name) && !empty($email) && !empty($pass) && ($pass == $pass2) && !empty($city_id)){
    // vse ok
    $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (first_name, last_name, email, pass, city_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$firts_name, $last_name, $email, $pass_hash, $city_id]);

    header("Location: login.php");
}

else {
    // preusmeritev
    header("Location: user_add.php");
}

?>
