<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.html');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head