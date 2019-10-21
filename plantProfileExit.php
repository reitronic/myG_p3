<?php session_start();

// echo $_SERVER['HTTP_REFERER'];

// var_dump($_SERVER['HTTP_REFERER']);
session_destroy();

header('location:allFoliage.php');
?>