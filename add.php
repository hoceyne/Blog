<?php
include 'conn.php';

$keys = ['title', 'date', 'content', 'summary'];
$sql = "INSERT INTO news (title, date, content, summary) VALUES (";
foreach ($keys as $key) {
    # code...
    $sql = $sql . " '" . $_POST[$key] . "' , ";
}
$sql = substr_replace($sql, "", -1);
$sql = substr_replace($sql, "", -1);
$sql = $sql . ") ;";
$stmt = $bdd->prepare($sql);
$stmt->execute();


header("Location: news.php");

