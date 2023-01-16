<?php
include 'conn.php';

$keys = [ 'title', 'date', 'content', 'summary'];
$sql = "UPDATE news SET ";
foreach ($keys as $key) {
    # code...
    $sql = $sql . $key . "='" . $_POST[$key] . "' , ";
}
$sql = substr_replace($sql, "", -1);
$sql = substr_replace($sql, "", -1);
$sql = $sql . "WHERE id = '" . $_POST["id"] . "';";
$stmt = $bdd->prepare($sql);
$stmt->execute();



header("Location: news.php");

