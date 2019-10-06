<?php session_start();
include 'classes/foliage.class.php';

$plantdata = file_get_contents('anitaAllFoliage.json');
$plantdata = json_decode($plantdata , true);


// change each plants uuid to new index 


$plantdata[$index] = count($plantdata);


foreach ( $plantdata as $k => $v ){
    echo $k;
    echo $v;
} 


//change each plants img path with new uuid


// $plantdata = array_values($plantdata);

var_dump($plantdata);
var_dump(array_keys($plantdata));
var_dump(count($plantdata));




// $plantdata = json_encode($plantdata, JSON_FORCE_OBJECT);
// file_put_contents('anitaAllFoliage.json', $plantdata);

// if($_SESSION['uid'] == $uid){
//     session_destroy();
//     header('location:allFoliage.php');
// } else {
//     header('location:allFoliage.php');
// };
?>