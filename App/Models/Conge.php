<?php

namespace App\Models;

class Conge extends Methods
{
    public $columns = ['user_id','status','justificatif','date_de_depart','date_de_retour','commentaire'];
    public $table = "conges";

    public function getAllPersonalRequest($userId){
        $sql = $sql = "SELECT `status`, `justificatif`, `date_de_depart`, `date_de_retour`, `commentaire` FROM `conges` WHERE user_id = \"$userId\";";
        return $this->selectAll($sql);

    }
}