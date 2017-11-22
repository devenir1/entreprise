<section class="col-sm-8 table_responsive">
    <h2>Liste d'une promo</h2><br>
    <form method="post" action="<?= BASE_URL ?>/suivi/listePromo">
        <select name="code" id="code">
            <?php foreach ($promotions as $p): ?>

                <!--               < ?php
                        if ($p === $p->p_code) {    
                            $selected = "selected";
                        }
                        ?> -->
                <?php if (isset($_POST['code'])): ?>
                    <?php if($_POST['code'] == $p->p_code): ?>
                <option value="<?= $p->p_code ?>" selected="selected" ><?= $p->p_code ?></option>
                    <?php else: ?>
                <option value="<?= $p->p_code ?>" ><?= $p->p_code ?></option>
                    <?php endif; ?>
                <?php else: ?>
                    <option value="<?= $p->p_code ?>" ><?= $p->p_code ?></option>
                <?php endif; ?>
                    
            <?php endforeach; ?>
        </select>
        <input type="submit" name="submit" value ="selection"> 
    </form>      
    
    <?php if (isset($etudiants)): ?>
    <table class="table table-bordered table-condensed table-striped" id="liste_promo">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Naissance</th>
                <th>Mail</th>
                <th>Portable</th>
                <th>Téléphone</th>
                <!--<th class="<//?= $role ?>">Supprimer</th>-->
            </tr>
        </thead>
        <?php foreach($etudiants as $e): ?>
        <tr>
                <td><a href="<?php echo BASE_URL . '/suivi/detail/' . $e->e_code; ?>" 
                       title="Cliquez pour modifier"><?php echo $e->e_nom ?></a></td>
                <td><?= $e->e_prenom ?></td>
                <td><?= $e->e_datedenaissance ?></td>
                <td><?= $e->e_mail ?></td>
                <td><?= $e->e_portable ?></td>
                <td><?= $e->e_fixe ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
</section>
