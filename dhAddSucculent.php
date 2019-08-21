<?php session_start();
$_SESSION['a'] = $a = 'Anita';
include 'classes/succulent.class.php';

$d = file_get_contents('anitaAllSucculents.json');
$d = json_decode( $d, true );

$d[$as] = $as = $_POST;
$as++;

$_SESSION['pnn'] = $pnn = $_POST['pnn']; //nickname
$_SESSION['pv'] = $pv = $_POST['plantvarietyS']; //plant variety
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
    $nwd = date_add( $nwd, date_interval_create_from_date_string("21 days"));
    $nwd = date_format($nwd, 'D m/d/Y');
                // var_dump( $nwd );
    return $nwd;
};

function genUid( $pnn ){
    return 'as'.$pnn;
};

$wsd = $lwd;
$nwd = nextWaterDate( $lwd );
$_SESSION['nwd'] = $nwd;
$_SESSION['lwd'] = $lwd;

$_SESSION['uid'] = $uid = genUid( $pnn );
$as = new Succulent ($uid, $pnn, $pv, $wsd, $wyn, $addedOn, $nwd, $lwd, $img);

$_SESSION['as'] = $as;


// var_dump($as);

$d[] = $as;
$d = json_encode($d, JSON_FORCE_OBJECT);
file_put_contents('anitaAllSucculents.json', $d );

header('location:plantProfileS.php?'.$uid);
?>