<section class="col-sm-8 table_responsive">

    <!-- mettre le menu déroulant avec l'année + le tableau à deux cases du nombre d'élève total et du nobre de contacts -->


    <!-- initialisation des variables -->

    <!-- selectionner la promo dans un menu déroulant -->
    <form method="post" action="<?= BASE_URL ?>/suivi/promoStat">
        <select name="code">
            <?php foreach ($activite as $a): ?>

                <!--               < ?php
                        if ($p === $p->p_code) {    
                            $selected = "selected";
                        }
                        ?> -->
                <?php if (isset($_POST['code'])): ?>
                    <?php if ($_POST['code'] == $a->a_code): ?>
                        <option value="<?= $a->a_code ?>" selected="selected" ><?= $a->a_nom ?></option><!-- ?= $a->a_nom ?></option> -->
                    <?php else: ?>
                        <option value="<?= $a->a_code ?>" ><?= $a->a_nom ?></option><!-- ?= $a->a_nom ?></option> -->
                    <?php endif; ?>
                <?php else: ?>
                    <option value="<?= $a->a_code ?>" ><?= $a->a_nom ?></option><!-- ?= $a->a_nom ?></option> -->
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <input type="submit" name="submit" value ="selection"> 
    </form>      

    <?php if (isset($Total)): ?>

        <table class="table table-bordered table-condensed table-striped" id="devenir_stat">
            <thead>
                <tr>
                    <th>Total d'élèves</th>
                    <th>total d'élèves < ?= $activite ?></th>
                    <th>Nombre de contacts enregistrés</th>
                </tr>

                <tr>
                    <td><?= $Total ?></td>
                    <td><?= $TotalDevenir ?></td>
                    <td><?= $nbContact ?></td>
                </tr>
            </thead>
        </table>

        <table class="table table-bordered table-condensed table-striped" id="devenir_stat">
            <thead>
                <tr>
                    <th>Promos</th>
                    <th class="hidden-xs">% d'élève</th>
                    <th>nombre < ?= $activite ?> </th>
                    <th>nombre d'élèves de la promo </th>
                    <th>nombre de contacts</th>

                </tr>
            </thead>
            
            <!-- colonne travail -->
            <?php foreach ($promos as $p): ?>
                <tr>
                    <td><?= $p->p_code ?></td>
                    <td>< ?= $Valeur ?></td>
                    <td>< ?= $Valeur ?></td>
                    <!-- <td>< ?= $test->COUNT(e_code) ?></td> -->
                    <td><?= $test2 ?><!-- ->totals ?> --></td>
                    <td>< ?= $Valeur ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        

    <?php endif; ?>