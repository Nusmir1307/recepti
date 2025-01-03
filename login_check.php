<?php
include_once "db.php";

$email = $_POST['email'];
$password = $_POST['pass'];

if (!empty($email) && !empty($password)) {
    //vse ok
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    //preverim če uporabnik obstaja in je pravilno geslo

    if ($user && password_verify($password, $user['pass'])) {
        //vse ok

        session_start();
        $_SESSION['user_id'] = $user['id'];
        header("Location: index.php");
    }
    else {
        // nepravilen email ali geslo
        header("Location: login.php");
    }
}
else {
    header("Location: login.php");
}