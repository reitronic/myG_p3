<?php session_start();
$_SESSION['a'] = $a = 'Anita';
include 'classes/foliage.class.php';

$plantdata = file_get_contents('anitaAllFoliage.json');
$plantdata = json_decode( $plantdata, true );



$plantdata[$tp] = $tp = $_POST;
$tp++;


$_SESSION['wyn'] = $wyn = $_POST['wyn'];
$_SESSION['pnn'] = $pnn = $_POST['pnn']; //nickname
$_SESSION['pv'] = $pv = $_POST['plantvarietyF']; //plant variety
$_SESSION['addedOn'] = $addedOn = date('D m/d/Y');

// IMAGE
$tmp = $_FILES['photo']['tmp_name']; // upload file capture
$filename = str_replace(' ', '', $pnn);
mkdir ('users/'.$a.'/'.$filename);
$img = 'users/'.$a.'/'.$filename.'/'.$pnn.'.jpg';
move_uploaded_file( $tmp, $img );
$_SESSION['img'] = $img;

function nextWaterDate( $lwd ){
    $fcon = substr( $lwd , -10);
    // global $nwd;
    $nwd = date_create( $fcon );
    $nwd = date_add( $nwd, date_interval_create_from_date_string("7 days"));
    $nwd = date_format($nwd, 'D m/d/Y');
                // var_dump( $nwd );
    return $nwd;
};

if ($wyn == 'yes' && isset($_POST['lwd'])){
    $_SESSION['lwd'] = $lwd = $_POST['lwd'];
    $_SESSION['wsd'] = $wsd = $lwd;
    $nwd = nextWaterDate( $lwd );
    $_SESSION['nwd'] = $nwd;
    } else {
    $_SESSION['wsd'] = $wsd = $_POST['wsd'];
    $_SESSION['nwd'] = $nwd = $wsd;
    $_SESSION['lwd'] = $lwd = '';
}

function genUid( $pnn ){
    $nospace = str_replace(' ', '', $pnn);
    return 'af'.$nospace;
};

$_SESSION['uid'] = $uid = genUid( $pnn );
$tp = new Foliage ($uid, $pnn, $pv, $nwd, $lwd, $wsd, $addedOn, $img);

$_SESSION['af'] = $tp;
// var_dump( $tp );

$plantdata[] = $tp;
$plantdata = json_encode($plantdata, JSON_FORCE_OBJECT);
file_put_contents('anitaAllFoliage.json', $plantdata);

// var_dump($as);
header('location:plantProfile.php?'.$uid);
?>