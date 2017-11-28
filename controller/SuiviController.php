<?php

class SuiviController extends Controller {

    //Déclaration des modèles qui vont être utilisés
    private $modActivite = null;
    private $modContact = null;
    private $modEtude = null;
    private $modEtudiant = null;
    private $modPromotion = null;
    private $modJointureContact = null;
    private $modEtudCont = null;

    function listePromo() {
        /* Liste des élèves par promotion */
//MODELE PROMOTION
        if (is_null($this->modPromotion)) {
            $this->modPromotion = $this->loadModel('Promotion');
        }
        $d['promotions'] = $this->modPromotion->find(array('conditions' => 1));
        if (isset($_POST['submit'])) {
            $code = $_POST['code'];
//MODELE ETUDIANT
            if (is_null($this->modEtudiant)) {
                $this->modEtudiant = $this->loadModel('Etudiant');
            }
            $d['etudiants'] = $this->modEtudiant->find(array('conditions' => "p_code = '" . $code . "'"));
        }
        $this->set($d);
    }

    function formContact() {
        /* Formulaire de contact */
//MODELE ACTIVITE
        try {
            if (is_null($this->modActivite)) {
                $this->modActivite = $this->loadModel('Activite');
            }
            $d['activites'] = $this->modActivite->find(array('conditions' => 1));
        } catch (Exception $e) {
            print_r($e);
            echo $e->getMessage();
        }
//MODELE CONTACT
        if (is_null($this->modContact)) {
            $this->modContact = $this->loadModel('Contact');
        }
        $d['contacts'] = $this->modContact->find(array('conditions' => 1));

//MODELE ETUDE
        if (is_null($this->modEtude)) {
            $this->modEtude = $this->loadModel('Etude');
        }
        $d['etudes'] = $this->modEtude->find(array('conditions' => 1));

//MODELE ETUDIANT
        if (is_null($this->modEtudiant)) {
            $this->modEtudiant = $this->loadModel('Etudiant');
        }
        $d['etudiants'] = $this->modEtudiant->find(array('conditions' => 1));

//MODELE PROMOTION
        if (is_null($this->modPromotion)) {
            $this->modPromotion = $this->loadModel('Promotion');
        }
        $d['promotions'] = $this->modPromotion->find(array('conditions' => 1));
        $this->set($d);
    }

    function modifierContact() {
//        print_r($_POST);
        $modContact = $this->loadModel('Contact');
        $donnees = array();
        $donnees['e_code'] = $_POST['e_code'];
        $donnees['c_dateContact'] = $_POST['c_dateContact'];
        $donnees['a_code'] = $_POST['a_code'];
        $donnees['et_code'] = $_POST['et_code'];
        $donnees['c_precision'] = $_POST['c_precision'];
        $colonne = array("e_code", "c_dateContact", "a_code", "et_code", "c_precision");
//        print_r($colonne." ".$donnees);
        $modContact->insertAI($colonne, $donnees);

//        if (is_null($this->modContact)) {
//            $this->modContact = $this->loadModel('Contact');
//        }
//        $donnees = array();
//        $colonnes = array();
//        print_r("Avant la boucle !");
//        foreach ($_POST as $k => $v) {
//            if ($k != 'singlebutton') {
//                $donnees[] = $v;
//                $colonnes[] = $k;
//            }
//            print_r("Dans la boucle !");
//            print_r("données : " + $donnees + "\ncolonnes : " + $colonnes);
//            print_r("$v " + $v + ", $k : " + $k);
//        }
//        print_r("Après la boucle !");
//        $id = $this->modContact->insertAI($colonnes, $donnees);
        $this->set($donnees);
    }

    function listeContact() {

//MODELE ACTIVITE
        if (is_null($this->modActivite)) {
            $this->modActivite = $this->loadModel('Activite');
        }
        $d['activites'] = $this->modActivite->find(array('conditions' => 1));
//        if (empty($d['activites'])) {
//            $this->e404('Page introuvable');
//        }
//MODELE CONTACT
        if (is_null($this->modContact)) {
            $this->modContact = $this->loadModel('Contact');
        }
        $d['contacts'] = $this->modContact->find(array('conditions' => 1));

//MODELE ETUDE
        if (is_null($this->modEtude)) {
            $this->modEtude = $this->loadModel('Etude');
        }
        $d['etudes'] = $this->modEtude->find(array('conditions' => 1));

//MODELE ETUDIANT
        if (is_null($this->modEtudiant)) {
            $this->modEtudiant = $this->loadModel('Etudiant');
        }
        $d['etudiants'] = $this->modEtudiant->find(array('conditions' => 1));

//MODELE PROMOTION
        if (is_null($this->modPromotion)) {
            $this->modPromotion = $this->loadModel('Promotion');
        }
        $d['promotions'] = $this->modPromotion->find(array('conditions' => 1));

//MODELE JOINTURE CONTACT
        if (is_null($this->modJointureContact)) {
            $this->modJointureContact = $this->loadModel("JointureContact");
        }
        $d['jointurecontacts'] = $this->modJointureContact->find(array('conditions' => 1));

        $this->set($d);
    }

    ///

    function devenirStat() {

        //promotion
        if (is_null($this->modPromotion)) {
            $this->modPromotion = $this->loadModel('Promotion');
        }
        $d ['promotions'] = $this->modPromotion->find(array('conditions' => 1));


        if (isset($_POST['submit'])) {
            $code = $_POST['code'];


            //etudiant
            if (is_null($this->modEtudiant)) {
                $this->modEtudiant = $this->loadModel('Etudiant');
            }
            $d ['etudiants'] = $this->modEtudiant->find(array('conditions' => 1));


            //nombre d'étudiants dans une promos ///compteur pour le nombre d'élèves de la promo
            $d ['eleves'] = $this->modEtudiant->find(array('conditions' => "etudiants.p_code = '" . $code . "'"));
            $compteur = 0;
            foreach ($d ['eleves'] as $El) {
                $compteur++;
            }
            $d ['Total'] = $compteur;

            //----------------------------------------------
            if (is_null($this->modEtudCont)) {
                $this->modEtudCont = $this->loadModel('EtudCont');
            }

            //nombre de chomeurs etc...  
            //compteur pour le nombre d'étudiants actuels de la promo
            $d ['Etudes'] = $this->modEtudCont->find(array('conditions' => array("etudiants.p_code" => "$code", "contacts.a_code" => 0))); //, "contacts.a_code = 0"));
            $Etude = 0;
            foreach ($d ['Etudes'] as $E) {
                $Etude = $Etude + 1;
            }
            $d ['Etude'] = $Etude;

            //compteur pour le nombre de travailleurs actuels de la promo
            $d ['Travails'] = $this->modEtudCont->find(array('conditions' => array("etudiants.p_code" => "$code", "contacts.a_code" => 1))); //(array('conditions' => "etudiants.p_code = '" . $code . "'" ));//AND contacts.a_code = 1"));
            $Travail = 0;
            foreach ($d ['Travails'] as $T) {
                $Travail = $Travail + 1;
            }
            $d ['Travail'] = $Travail;

            //compteur pour le nombre de chomeurs actuel de la promo
            $d ['Chomages'] = $this->modEtudCont->find(array('conditions' => array("etudiants.p_code" => "$code", "contacts.a_code" => 2))); //(array('conditions' => "etudiants.p_code = '" . $code . "'"));// contacts.a_code = 2"));
            $Chomage = 0;
            foreach ($d ['Chomages'] as $C) {
                $Chomage = $Chomage + 1;
            }
            $d ['Chomage'] = $Chomage;

            //Nom cummuniqués
            $NC = $d ['Total'] - ($Etude + $Travail + $Chomage);
            $d ['NC'] = $NC;

            //Nombres de contacts enregistrez
            $d ['ContactEnrs'] = $this->modEtudiant->find(array('conditions' => "etudiants.p_code= '" . $code . "'"));
            $ContactEnr = 0;
            foreach ($d ['ContactEnrs'] as $CE) {
                $ContactEnr = $ContactEnr + 1;
            }
            $d ['ContactEnr'] = $ContactEnr;
            //-----------------------------------------------------------
            //statistiques des élèves
            if ($Etude != 0) {
                $d ['pourcentE'] = ($Etude / $d ['Total']) * 100;
            } else {
                $d ['pourcentE'] = 0;
            }

            if ($Travail != 0) {
                $d ['pourcentT'] = ($Travail / $d ['Total']) * 100;
            } else {
                $d ['pourcentT'] = 0;
            }

            if ($Chomage != 0) {
                $d ['pourcentC'] = ($Chomage / $d ['Total']) * 100;
            } else {
                $d ['pourcentC'] = 0;
            }

            if ($NC != 0) {
                $d ['pourcentNC'] = ($NC / $d ['Total']) * 100;
            } else {
                $d ['pourcentNC'] = 0;
            }
        }
        $this->set($d);
    }

    function promoStat() {

        //promotion----------------------------------------------
        if (is_null($this->modActivite)) {
            $this->modActivite = $this->loadModel('Activite');
        }
        $d ['activite'] = $this->modActivite->find(array('conditions' => 1));



        //si le bouton submit est envoyer //si un devenir est sélectionner
        if (isset($_POST['submit'])) {
            $code = $_POST['code'];
            //print_r("test-controller : le code est bien réceptionner, l'érreur ne vient pas d'ici ^^");
            //etudiant----------------------------------------------
            if (is_null($this->modEtudiant)) {
                $this->modEtudiant = $this->loadModel('Etudiant');
            }

            //promo----------------------------------------------
            if (is_null($this->modPromotion)) {
                $this->modPromotion = $this->loadModel('Promotion');
            }
            $d ['promos'] = $this->modPromotion->find(array('conditions' => 1));

            //contact----------------------------------------------
            if (is_null($this->modContact)) {
                $this->modContact = $this->loadModel('Contact');
            }

            //etudCont----------------------------------------------
            if (is_null($this->modEtudCont)) {
                $this->modEtudCont = $this->loadModel('EtudCont');
            }

            //JointureContact----------------------------------------------
            if (is_null($this->modJointureContact)) {
                $this->modJointureContact = $this->loadModel('JointureContact');
            }




            //nombre d'élèves du devenir ayant le devenir
            $d ['eleveDevenir'] = $this->modEtudCont->find(array('conditions' => "contacts.a_code = " . $code));
            $compteur = 0;
            foreach ($d ['eleveDevenir'] as $El) {
                $compteur++;
            }
            $d ['TotalDevenir'] = $compteur;

            //nombre de contacts enregistrez
            $d ['toutContact'] = $this->modContact->find(array('conditions' => 1));
            $compteur = 0;
            foreach ($d ['toutContact'] as $El) {
                $compteur++;
            }
            $d ['nbContact'] = $compteur;

            //nombre d'étudiants en tout
            $d ['eleves'] = $this->modEtudiant->find(array('conditions' => 1));
            $compteur = 0;
            foreach ($d ['eleves'] as $El) {
                $compteur++;
            }
            $d ['Total'] = $compteur;


            //nombre d'élèves par promos
            $compteur = 0;
//            foreach ($d ['promos'] as $promo) {
//
//                $d ['test'] = $this->modJointureContact->selectCOUNT("etudiants.e_code", "totals", " activites.a_code = " . $code . " AND etudiants.p_code = " . "'" . $promo->p_code . "'");
//                //$d ['test'] = $this->modEtudCont->selectCOUNT("e_code","etudiants.p_code = '".$promo -> p_code."'");
//                $tableau = $d ['test'];
//                $compteur++;
//                print_r($d ['test']);
//                $d ['test2'] = $tableau[$compteur];
//            }
//            $d ['Totals'] = $compteur;
        }
        $this->set($d);
    }

    function render($view) {
        if ($view === 'listePromo') {
            parent:: render('listePromo');
        } elseif ($view == 'formContact' || $view == 'modifierContact') {
            parent:: render('formContact');
        } else {
            parent:: render($view);
        }
    }

}
