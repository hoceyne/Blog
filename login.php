<?php

function auth($email, $password)
{
    include 'conn.php';
    $sql = "SELECT * FROM users WHERE email='" . $email . "' AND password='" . $password . "' ;";
    $res = $bdd->query($sql);

    if ($res) {
        return true;
    }
    return false;
}
session_start();
if (isset($_POST['email']) && isset($_POST['password'])) {
    if (auth($_POST['email'], $_POST['password'])) {
        // auth okay, setup session
        $_SESSION['user'] = $_POST['email'];
        // redirect to required page
        header("Location: news.php");
    } else {
        // didn't auth go back to loginform
        header("Location: index.php");
    }
} else {
    // username and password not given so go back to login
    header("Location: index.php");
}
