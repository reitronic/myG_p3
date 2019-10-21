<?php session_start();

include 'classes/foliage.class.php';
$_SESSION['plantid'] = $plantid = $_POST['plantid'];

$plantdata = file_get_contents('anitaAllFoliage.json');
$plantdata = json_decode( $plantdata, true );

$plantdata[$plantid]['pnn'] = $_POST['pnn'];
$_SESSION['pnn'] = $pnn = $plantdata[$plantid]['pnn'];


// IMAGE
$tmp = $_FILES['photo']['tmp_name'];
mkdir ('yourplants/'.$plantid);
$img = 'yourplants/'.$plantid.'/mainpic.jpg';
move_uploaded_file( $tmp, $img );

$plantdata[$plantid]['img'] = $img;
$_SESSION['img'] = $plantdata[$plantid]['img'];

$plantdata = json_encode($plantdata);
file_put_contents('anitaAllFoliage.json', $plantdata);

if($_SESSION['plantid'] == $plantid){
    $_SESSION['pnn'] == $_POST['pnn'];
}

header('location:plantProfile.php?'.$_SESSION['plantid']);
?>