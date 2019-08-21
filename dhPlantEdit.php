<?php session_start();
$_SESSION['a'] = $a = "Anita";
include 'classes/foliage.class.php';
include 'classes/succulent.class.php';


$_SESSION['uid'] = $_POST['uid'] = $uid;
$_SESSION['pnn'] = $pnn = $_POST['pnn'];

$_SESSION['ts'] = $ts = date('D m/d/Y');
echo $ts;

$d = file_get_contents('anitaAllFoliage.json');
$d = json_decode($d, true);



// $uid;
// $pnn;
// $pv;
// $sn;
// $lwd;
// $fq = 7;
// $wsd;
// $wyn;
// $addedOn;
// $pt = "Foliage";
// $img;

// $d = file_get_contents("anitaAllPlants.json");
// $d = json_decode( $d, true );


header("location:allPlants.php?");
?>