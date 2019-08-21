<?php session_start();
$_SESSION['a'] = $a = "Anita";

class Foliage {
    
    public $uid;
    public $pnn;
    public $pv;
    public $lwd;
    public $fq = 7;
    public $wsd;
    public $wyn;
    public $addedOn;
    public $pt = Foliage;
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
    
    public function setLwd($lwd){
        $this->lwd = $lwd;
    }

    public function getLwd(){
        echo $this->lwd = $lwd;
    }

    public function setNwd($nwd){
        $this->nwd = $nwd;
    }

    public function getNwd(){
        echo $this->nwd = $nwd;
    }

    public function setFq($fq){
        $this->fq = $fq;
    }
    public function getFq(){
        echo $this->fq;
    }
}


?>