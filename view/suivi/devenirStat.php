<section class="col-sm-8 table_responsive">

    <!-- mettre le menu déroulant avec l'année + le tableau à deux cases du nombre d'élève total et du nobre de contacts -->


    <!-- initialisation des variables -->

    <!-- selectionner la promo dans un menu déroulant -->
    <form method="post" action="<?= BASE_URL ?>/suivi/devenirStat">
        <select name="code">
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

    <?php if (isset($Travail)): ?>



        <table class="table table-bordered table-condensed table-striped" id="devenir_stat">
            <thead>
                <tr>
                    <th>Activitée</th>
                    <th class="hidden-xs">% d'élève</th>
                    <th>nombre d'élèves</th>
                    <!--<th class="<//?= $role ?>">Supprimer</th>-->

                </tr>
            </thead>

            <!-- colonne travail -->
            <tr>
                <td>Travail</td>
                <td><?= $pourcentT ?></td>
                <td><?= $Travail ?></td>
            </tr>

            <!-- colonne etude -->
            <tr>
                <td>Etude</td>
                <td><?= $pourcentE ?></td>
                <td><?= $Etude ?></td>
            </tr>

            <!-- colonne chomage -->
            <tr>
                <td>Chômage</td>
                <td><?= $pourcentC ?></td>
                <td><?= $Chomage ?></td>
            </tr>

            <!-- colonne sans contacts -->
            <tr>
                <td>Non Communiqué</td>
                <td><?= $pourcentNC ?></td>
                <td><?= $NC ?></td>
            </tr>
        </table>
        <table class="table table-bordered table-condensed table-striped" id="devenir_stat">
            <thead>
                <tr>
                    <th>Total d'élèves</th>
                    <th>Nombre de contacts enregistrés</th>
                </tr>

                <tr>
                    <td><?= $Total ?></td>
                    <td><?= $ContactEnr ?></td>
                </tr>
            </thead>
        </table>

    <?php endif; ?>