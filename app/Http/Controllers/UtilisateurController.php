<?php

namespace App\Http\Controllers;

use Request;
use App\Exceptions\MonException;
use App\DAO\ServiceUtilisateur;


class UtilisateurController extends Controller
{

    public static $modelepwd = "[^!@#$%&()]";

    public function signIn()
    {
        try {
            $login = Request::input('login');
                $pwd = Request::input('pwd');
                if(!(UtilisateurController::verifMotPasse($pwd))) {
                    $unUtilisateur = new ServiceUtilisateur();
                    $connected = $unUtilisateur->login($login, $pwd);
                    if ($connected) {
                        return view('home');
                    } else {
                        $erreur = "Login ou mot de passe inconnu !";
                        return view('Error', compact('erreur'));
                    }
                }


        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('Error', compact('erreur'));
        }
    }


    public static function verifMotPasse($pwd){
        if(preg_match(self::$modelepwd, $pwd))
            return true;
        else
            return false;
    }

    public function listeUtilisateur() {
        try {
            $unSejour = new ServiceUtilisateur();
            $mesSejours = $unSejour->getListeUtilisateur();
            return view('vues/listerSejours', compact('mesSejours'));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('Error', compact('erreur'));
        } catch (Exception $ex) {
            $erreur = $ex->getMessage();
            return view('Error', compact('erreur'));
        }
    }

}
