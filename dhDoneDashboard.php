<?php session_start();
$_SESSION['a'] = $a = "Anita";
include 'classes/foliage.class.php';
include 'classes/succulent.class.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    echo 'noooooooo';
} else { echo 'yayayaa!';
    };

$waterdata = $_POST;
print_r($waterdata);

/*
<input type="submit" name="Done" value= true class="odbtn btn btn-success text-dark">
<input type="hidden" name="uid" value="${uid}">
<input type="hidden" name="doneThisDate" value="todayWater">
*/

$_POST['uid'] = $uid;
$_POST['pnn'] = $pnn;
$_POST['doneThisDate'] = $ts;

echo $uid.'<br>';
echo $ts.'<br>';

var_dump($_POST);

$d = file_get_contents('anitaAllFoliage.json');
$d = json_decode( $d, true);

$af = count($d);
$af++;
var_dump($af);
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
var_dump($d);





// echo '<br>';
// var_dump($af);



//update lwd;
//update nwd (today + fq);/
/* when click, need to update json AJAX; 
        in AJAX find matching object update the
        lwd, 
        nwd, 
        mark it done/timestamp,
*/



//array_search

// $d = $json_encode( $d );
// file_put_contents('anitaAllPlants.json', $d );

?>