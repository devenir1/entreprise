<form class="form-horizontal" method="post" action="/entreprises/suivi/modifierContact">
    <!-- Faire fonction insert ou créer dans suivi_controller.php-->
    <fieldset>

        <!-- Form Name -->
        <legend>Contact</legend>

        <!--ETUDIANT NOM+PRENOM-SELECT-OPTION-->
        <div class="form-group">
            <label class="col-md- control-label" for="e_code">Nom de l'étudiant</label><br>
            <div class="col-md-4">
                <select id="e_code" name="e_code" placeholder="Etudiant" class='form-control input-md' type="text">
                    <?php foreach ($etudiants as $e): ?>
                        <?php
                        $selected = "";
                        if ($etudiants->e_code === $e->e_code) {
                            $selected = "selected";
                        }
                        ?>
                        <option value="<?= $e->e_code ?>" <?= $selected ?>><?= $e->e_nom ?> <?= $e->e_prenom ?></option>
                    <?php endforeach; ?>
                </select>
            </div><br>

            <!--DATE DE CONTACT-DATE-TYPE TEXTE-->
            <br><div class="form-group">
                <label class="col-md- control-label" for="c_dateContact">Date du contact</label><br>
                <div class="col-md-4">
                    <input id="c_dateContact" name="c_dateContact" placeholder="AAAA-MM-JJ" class="form-control input-md" type="date" value="<?= (isset($contacts->c_dateContact) ? $contacts->c_dateContact : ''); ?>">             
                </div>
            </div>

            <!--SITUATION DE L'ETUDIANT-SELECT-OPTION-->
            <!--Activité-->
            <br><div class="form-group">
                <label class="col-md- control-label" for="a_code">Activité</label><br>
                <div class="col-md-4">
                    <select id="a_code" name="a_code" placeholder="Activité" class='form-control input-md' type="text">
                        <?php foreach ($activites as $a) : ?>
                            <?php
                            $selected = "";
                            if ($activites->a_code === $a->a_code) {
                                $selected = "selected";
                            }
                            ?>
                            <option value="<?= $a->a_code ?>" <?= $selected ?>><?= $a->a_nom ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <p>ou</p>

            <!--Etude-->
            <div class="form-group">
                <label class="col-md- control-label" for="et_code">Etude</label><br>
                <div class="col-md-4">
                    <select id="et_code" name="et_code" placeholder="Etude" class='form-control input-md' type="text">
                        <?php foreach ($etudes as $et) : ?>
                            <?php
                            $selected = "";
                            if ($etudes->et_code === $et->et_code) {
                                $selected = "selected";
                            }
                            ?>
                            <option value="<?= $et->et_code ?>" <?= $selected ?>><?= $et->et_nom ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div><br>

        <!--PRECISION-TYPE TEXTE-->
        <div class="form-group">
            <label class="col-md- control-label" for="c_precision">Précisions</label><br>
            <div class="col-md-4">
                <textarea id="c_precision" name="c_precision" placeholder="Précisions" class="form-control input-md" value="<?= (isset($contacts->c_precision) ? $contacts->c_precision : ''); ?>"></textarea>
            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-2 control-label" for="singlebutton"></label>
            <div class="col-md-4">
                <button id="singlebutton" name="singlebutton" class="btn btn-info" onclick="envoyer">Créer</button>
            </div>
        </div>
    </fieldset>
</form>
<script type="text/javascript">
    var envoyer = document.getElementById('singlebutton');

    envoyer.onclick = function() {
        alert("L'enregistrement est envoyé !");
    };
</script>