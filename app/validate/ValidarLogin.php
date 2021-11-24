<?php


namespace App\validate;


class ValidarLogin{
    
    public static function verificaSessao()
    {
        return session()->has('funcionario');
    }

}