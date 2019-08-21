<?php session_start();
$_SESSION['a'] = $a = 'Anita';
include 'classes/foliage.class.php';

$dfoliage = file_get_contents('anitaAllFoliage.json');
$dfoliage = json_decode( $dfoliage, true );

$dfoliage[$af] = $af = $_POST;
$af++;

$_SESSION['pnn'] = $pnn = $_POST['pnn']; //nickname
$_SESSION['pv'] = $pv = $_POST['plantvarietyF']; //plant variety
$_SESSION['wyn'] = $wyn = $_POST['wyn'];
$_SESSION['addedOn'] = $addedOn = date('D m/d/Y'); 
$lwd = $_POST['lwd'];
// IMAGE
$tmp = $_FILES['photo']['tmp_name']; // upload file capture
mkdir ('users/'.$a.'/'.$pnn);
$img = 'users/'.$a.'/'.$pnn.'/'.$pnn.'.jpg';
move_uploaded_file( $tmp, $img );
$_SESSION['img'] = $img;

function nextWaterDate( $lwd ){
    $fcon = substr( $lwd , -10);
    global $nwd;
    $nwd = date_create( $fcon );
    $nwd = date_add( $nwd, date_interval_create_from_date_string("7 days"));
    $nwd = date_format($nwd, 'D m/d/Y');
                // var_dump( $nwd );
    return $nwd;
};

function genUid( $pnn ){
    return 'af'.$pnn;
}; 

// if( $pt == 'Foliage'){
//     if( $_POST['wyn'] == "yes" ){
$wsd = $lwd;
$nwd = nextWaterDate( $lwd );
$_SESSION['nwd'] = $nwd;
$_SESSION['lwd'] = $lwd;

$_SESSION['uid'] = $uid = genUid( $pnn );
$af = new Foliage ($uid, $pnn, $pv, $wsd, $wyn, $addedOn, $nwd, $lwd, $img);


// var_dump( $af );

$dfoliage[] = $af;
$dfoliage = json_encode($dfoliage, JSON_FORCE_OBJECT);
file_put_contents('anitaAllFoliage.json', $dfoliage);

header('location:plantProfile.php?'.$uid);
?>