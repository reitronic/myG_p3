<?php session_start();
$_SESSION['a'] = $a = "Anita";

class Foliage {
    
    public $uid;
    public $pnn;
    public $pv;
    public $fq = '7 days';
    public $nwd;
    public $lwd;
    public $wsd;
    public $addedOn;
    public $pt = Foliage;
    public $img;


    public function __construct($uid, $pnn, $pv, $nwd, $lwd, $wsd, $addedOn, $img){
        $this->uid = $uid;
        $this->pnn = $pnn;
        $this->pv = $pv;
        $this->nwd = $nwd;
        $this->lwd = $lwd;
        $this->wsd = $wsd;
        $this->addedOn = $addedOn;
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