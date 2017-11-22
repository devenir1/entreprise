<?php
class EtudPromo extends Model {
var $table='Promotion INNER JOIN Etudiant ON Promotion.p_code = Etudiant.p_code INNER'
        . ' JOIN Contacts ON Etudiant.e_code = Contacts.e_code;';
}
