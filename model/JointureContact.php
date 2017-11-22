<?php

class JointureContact extends Model{
    var $table = 'etudiants INNER JOIN contacts ON etudiants.e_code = contacts.e_code INNER JOIN activites ON activites.a_code = contacts.a_code'
            . ' INNER JOIN etudes ON etudes.et_code = contacts.et_code';
}
