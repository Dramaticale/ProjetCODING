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
            if($this->vie > 0){
            $recap['text'] .= '<br>'.$this->nom . 'inflige'.$this->atq.'à'.$ennemi->nom;
            $ennemi->vie -= $this->atq;
            }
            if($ennemi->vie > 0){
                $this->vie -= $ennemi->atq;
                $recap['text'] .= '<br>'.$ennemi->nom. 'vous a infligé' .$ennemi->atq;
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