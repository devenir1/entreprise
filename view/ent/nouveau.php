
<?php $title_for_layout = 'Nouvelle Entreprise' ?>
<form class="form-horizontal" method="post" action="/entreprises/ent/creer" >
    <fieldset>

        <!-- Form Name -->
        <legend>Entreprise</legend>
        <?php include 'formEntreprise.php' ?>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-2 control-label" for="singlebutton"></label>
            <div class="col-md-4">
                <button id="singlebutton" name="singlebutton" class="btn btn-info">Créer</button>
            </div>
        </div>
    </fieldset>
</form>
