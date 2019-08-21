<?php session_start();
$_SESSION['a'] = $a = "Anita";

class Succulent {

    public $uid;
    public $pnn;
    public $pv;
    public $lwd;
    public $fq = 21;
    public $wsd;
    public $wyn;
    public $addedOn;
    public $pt = Succulent;
    public $img;


    public function __construct($uid, $pnn, $pv, $wsd, $wyn, $addedOn, $nwd, $lwd, $img){
        $this->uid = $uid;
        $this->pnn = $pnn;
        $this->pv = $pv;
        $this->wsd = $wsd;
        $this->wyn = $wyn;
        $this->addedOn = $addedOn;
        $this->nwd = $nwd;
        $this->lwd = $lwd;
        $this->img = $img;
    }

}


?>