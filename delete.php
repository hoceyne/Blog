<?php
include 'conn.php';

$sql = "DELETE FROM news WHERE id=" . $_GET["id"] . ";";
$stmt = $bdd->prepare($sql);
$stmt->execute();

header("Location: news.php");
