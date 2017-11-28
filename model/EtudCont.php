<?php
class EtudCont extends Model {
var $table='etudiants INNER JOIN contacts ON etudiants.e_code = contacts.e_code';
}
