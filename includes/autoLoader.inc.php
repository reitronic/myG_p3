<?php
$_SESSION['a'] = $a = 'Anita';
spl_autoload_register('al');

function al($className){
    $path = "classes/";
    $ext = ".class.php";
    $fpath = $path . $className . $ext;
    include_once $fpath;
};

?>