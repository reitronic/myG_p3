<?php session_start();
$_SESSION['a'] = $a = 'Anita';
include 'classes/foliage.class.php';

$_SESSION['uid'] = $uid = $_POST['uid'];
$plantdata = file_get_contents('anitaAllFoliage.json');
$plantdata = json_decode( $plantdata, true );

$index = array_search($uid, array_column($plantdata, 'uid'));

$plantdata[$index]['pnn'] = $pnn = $_POST['pnn'];
$_SESSION['pnn'] = $pnn;

function genUid( $pnn ){
    $nospace = str_replace(' ', '', $pnn);
    return 'af'.$nospace;
};

$plantdata[$index]['uid'] = $uid = genUid( $pnn );
$_SESSION['uid'] = $uid;

// IMAGE
$tmp = $_FILES['photo']['tmp_name']; // upload file capture
$filename = str_replace(' ', '', $_POST['pnn']);
mkdir ('users/'.$a.'/'.$filename);
$img = 'users/'.$a.'/'.$filename.'/'.$_POST['pnn'].'.jpg';
move_uploaded_file( $tmp, $img );
$plantdata[$index]['img'] = $img;

$plantdata = json_encode($plantdata, JSON_FORCE_OBJECT);
file_put_contents('anitaAllFoliage.json', $plantdata);

if( $_SESSION['uid'] == $uid ){
    $_SESSION['pnn'] == $_POST['pnn'];
}
// var_dump($as);
header('location:allFoliage.php');
?>