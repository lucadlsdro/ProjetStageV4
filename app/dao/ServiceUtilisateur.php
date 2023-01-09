<?php

namespace App\dao;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use DB;
use App\metier\TPersTest;
use App\Exceptions\MonException;

class ServiceUtilisateur
{
    public function login($login, $pwd)
    {
        $connected = false;
        try {
            $Utilisateur = DB::table('TPersTest')
                ->select('Login', 'Pwd', DB::raw('password("'.$pwd.'") as PwdTest'))
                ->where('Login', '=', $login)
                //->where("Pwd", "=", 'password($pwd)')
                ->first();
            var_dump($Utilisateur);
        if ($Utilisateur->PwdTest == $Utilisateur->Pwd) {
            Session::put('id', $Utilisateur->Login);
            $connected = true;
        }
        } catch (QueryException $e) {
            throw new MonException ($e->getMessage());
        }
        return $connected;
        }

    public function getListeUtilisateur() {
        try {
            $mesSejours = DB::table('TPersTest')
                ->Select('NomPersonne', 'PrenomPersonne', 'Login', 'Pwd')
                ->get();
            return $mesSejours;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }
}
