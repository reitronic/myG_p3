<?php session_start();
$_SESSION['a'] = $a = 'Anita';
include 'classes/foliage.class.php';
include 'classes/succulent.class.php';

$uid = $_SERVER['QUERY_STRING'];




$d = json_encode($d);
file_put_contents('anitaAllFoliage.json', $d);

if($_SESSION['uid'] == $uid){
    session_destroy();
    header('location:allFoliage.php');
} else {
    header('location:index.php');
};
?>