<?php session_start();

$_SESSION['a'] = $a = "Anita";

include 'classes/foliage.class.php';
include 'classes/succulent.class.php';

$d = file_get_contents('anitaAllPlants.json');
$d = json_decode( $d, true);


$ap = count($d);
$ap++;

$_SESSION['pnn'] = $pnn = $_POST['pnn']; //nickname
$_SESSION['pt'] = $pt = $_POST['pt']; //plant type
$_SESSION['wyn'] = $wyn = $_POST['wyn']; //
// $sn = $_POST['sn'];
// var_dump($wsd);//string of sat m/d/y
$addedOn = date('D m/d/Y'); //date first added to system, string
// var_dump($addedOn);
$lwd = $_POST['lwd'];
$wsd = $_POST['wsd'];
$pv = $_POST['plantvarietyF']; //plant variety
$pvs = $_POST['plantvarietyS']; //plant variety

function nextWaterDateF( $lwd ){
    $fcon = substr( $lwd , -10);
    global $nwd;
    $nwd = date_create( $fcon );
    $nwd = date_add( $nwd, date_interval_create_from_date_string("7 days"));
    $nwd = date_format($nwd, 'D m/d/Y');
    return $nwd;
};

function nextWaterDateS( $lwd ){
    $fcon = substr( $lwd , -10);
    global $nwd;
    $nwd = date_create( $fcon );
    $nwd = date_add( $nwd, date_interval_create_from_date_string("21 days"));
    $nwd = date_format($nwd, 'D m/d/Y');
    return $nwd;
};

function genUid( $pnn ){
    return 'ap'.$pnn;
}; // uid value returned

// IMAGE
$tmp = $_FILES['photo']['tmp_name']; // upload file capture
mkdir ('users/'.$a.'/'.$pnn);
$img = 'users/'.$a.'/'.$pnn.'/'.$pnn.'.jpg';
move_uploaded_file( $tmp, $img );
$_SESSION['img'] = $img;

if( $pt == 'Foliage'){
    $_SESSION['pv'] = $pv = $_POST['plantvarietyF'];
    $_SESSION['nwd'] = $nwd;
    if( $_POST['wyn'] == "yes" ){
        $wsd = $lwd;
        nextWaterDateF( $lwd );
        $_SESSION['uid'] = $uid = genUid( $pnn );
        $ap = new Foliage ($uid, $pnn, $pv, $wsd, $wyn, $addedOn, $nwd, $lwd, $img);

    } else {
        $lwd = null;
        $wsd = $nwd;
        $_SESSION['nwd'] = $nwd;
        $_SESSION['uid'] = $uid = genUid( $pnn );
        $ap = new Foliage ($uid, $pnn, $pv, $wsd, $wyn, $addedOn, $nwd, $lwd, $img);
        return $_SESSION['ap'];
    };


} else{
    if( isset($_POST['plantvarietyS']) ){
        $pv = $_POST['plantvarietyS'];
        $pv = $_SESSION['pv'];
        $wsd = $lwd;
        nextWaterDateS( $lwd );
        $_SESSION['nwd'] = $nwd;
        $_SESSION['uid'] = $uid = genUid( $pnn );
        $ap = new Succulent ($uid, $pnn, $pv, $wsd, $wyn, $addedOn, $nwd, $lwd, $img);
        return $_SESSION['ap'];
    } else{
        $lwd = null;
        $wsd = $nwd;
        $_SESSION['nwd'] = $nwd;
        $_SESSION['uid'] = $uid = genUid( $pnn );
        $ap = new Succulent ($uid, $pnn, $pv, $wsd, $wyn, $addedOn, $nwd, $lwd, $img);
        return $_SESSION['ap'];
    }

};



var_dump( $_SESSION['ap']);



var_dump($ap);

$d[] = $ap; //puts object in arrays

$d = json_encode($d, JSON_FORCE_OBJECT);
file_put_contents('anitaAllPlants.json', $d );

// header("location:plantProfile.php?".$uid);
?>