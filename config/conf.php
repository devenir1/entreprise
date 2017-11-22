<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Conf {
    static $debug=1;
    static $databases = array(
        'default' => array(
            /*SERVEUR DE DEPOT*/
//            'host' => 'localhost',
//            'database' => 'devenir1',
//            'login' => 'devenir1',
//            'password' => 'devenir1',
            
            /*EN LOCAL*/
            'host' => 'localhost',
            'database' => 'gestionent',
            'login' => 'root',
            'password' => ''
        )
    );

}
