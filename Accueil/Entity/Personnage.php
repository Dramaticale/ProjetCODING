<?php
require 'Ennemi.php';

class Personnage{
    public $id;
    public $nom;
    public $vie;
    public $atq;

    public function __construct(){
        
    }
    
    public function combat(Ennemi $ennemi){
        var_dump($ennemi);
        var_dump($this);
        $recap = [
            'text' => '',
            'winner' => null
        ];
        while($ennemi->vie > 0 && $this->vie > 0){
            $recap['text'] .= $this->nom . 'inflige'.$this->atq.'à'.$ennemi->nom.'<br>';
            $ennemi->vie -= $this->atq;
            $this->vie -= $ennemi->atq;
            $recap['text'] .= $ennemi->nom. 'vous a infligé' .$ennemi->atq.'<br>';
        }
        if($this->vie < 0){
            $recap['winner'] = false;
        }else{
            $recap['winner'] = $this;
        }
        return $recap;
    }
}