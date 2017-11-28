<section class="col-sm-8 table_responsive">
    <h2>Liste des contacts</h2><br>
    <table class="table table-bordered table-condensed table-striped" id="liste_contact">
        <thead>
            <!--Titre colonne du tableau-->
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date du contact</th>
                <th>Activité</th>
                <th>Etude</th>
                <th>Précisions</th>
            </tr>
        </thead>
        <!--Boucle d'affichage des données de la table contact-->
        <?php foreach ($jointurecontacts as $j): ?>
            <tr>
                <!--<td>< ?= $j->e_nom ?></td>-->
                <td><?php echo $j->e_nom ?></td>
                <td><?= $j->e_prenom ?></td>
                <td><?= $j->c_dateContact ?></td>
                <td><?= $j->a_nom ?></td>
                <td><?= $j->et_nom ?></td>
                <td><?= $j->c_precision ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>

