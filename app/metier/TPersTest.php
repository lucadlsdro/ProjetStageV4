<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\metier;

use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use DB;

class TPersTest extends Model {

    //On déclare la table Sejour
    protected $table = 'TPersTest';
    public $timestamps = false;
    protected $fillable = [
        'Login',
        'NomPersonne',
        'PrenomPersonne',
        'Pwd'
    ];
    public $timetamps = true;

}
