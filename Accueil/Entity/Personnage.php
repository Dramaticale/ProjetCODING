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
        $recap = [
            'text' => '',
            'winner' => null
        ];
        while($ennemi->vie > 0 && $this->vie > 0){
            if($this->vie > 0){
            $recap['text'] .= '<br>'.$this->nom . ' inflige '.$this->atq.' points de dégats à '.$ennemi->nom.'.';
            $ennemi->vie -= $this->atq;
            }
            if($ennemi->vie > 0){
                $this->vie -= $ennemi->atq;
                $recap['text'] .= '<br>'.$ennemi->nom. ' vous a infligé ' .$ennemi->atq. ' points de dégats.';
            }
        }
        if($this->vie < 0){
            $recap['winner'] = false;
        }else{
            $recap['winner'] = $this;
        }
        return $recap;
    }
}