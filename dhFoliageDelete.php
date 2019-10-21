<?php session_start();
include 'classes/foliage.class.php';

$plantid = $_SERVER['QUERY_STRING'];

$plantdata = file_get_contents('anitaAllFoliage.json');
$plantdata = json_decode($plantdata , true);

unset($plantdata[$plantid]);

// $plantdata = array_values($plantdata);

// var_dump($plantdata);
// var_dump(array_keys($plantdata));
// var_dump(array_values($plantdata));

$plantdata = json_encode($plantdata);
file_put_contents('anitaAllFoliage.json', $plantdata);


if($_SESSION['plantid'] == $plantid){
    session_destroy();
    header('location:allFoliage.php');
} else {
    header('location:allFoliage.php');
};
?>