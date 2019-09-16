<?php session_start();
$_SESSION['a'] = $a = 'Anita';
include 'classes/foliage.class.php';

$uid = $_SERVER['QUERY_STRING'];

$plantdata = file_get_contents('anitaAllFoliage.json');
$plantdata = json_decode($plantdata , true);

$index = array_search($uid, array_column($plantdata, 'uid'));

unset($plantdata[$index]);

$plantdata = array_values($plantdata);

$plantdata = json_encode($plantdata, JSON_FORCE_OBJECT);
file_put_contents('anitaAllFoliage.json', $plantdata);

if($_SESSION['uid'] == $uid){
    session_destroy();
    header('location:allFoliage.php');
} else {
    header('location:allFoliage.php');
};
?>