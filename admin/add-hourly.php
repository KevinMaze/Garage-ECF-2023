<?php  

require_once ("../lib/session.php");
require_once ("../lib/config.php");
require_once ("../lib/pdo.php");
require_once ("../lib/user.php");
require_once ("../lib/hourly.php");
require_once ('template-admin/header-admin.php');

// recupération des horaires
$messages = [];
$errors = [];
$hourlys = getHourly($pdo);

// Récupération des données car pour modification (requête de récupération)
if(isset($_GET["id"])){
    $hourly = getHourlyById($pdo, $_GET["id"]);
    if($hourly === false){
        $errors[] = "L'article demandé n\'existe pas !";
    }
}

// Requète d'ajout
if(isset($_POST["add_hourly"])){
    $result = addHourly($pdo, $_POST["name_day"], $_POST["hourly_am"], $_POST["hourly_pm"]);
    if($result) {
        $messages[] = "Enregistrement réussi";
    }else{
        $errors[] = "Problème survenu !";
    }
};

?>

<section class="flux">
    
    <h2 class="title-h2">Horaires actuelles</h2>

    <div class="line-style"></div>

    <div class="section-admin__crud__description">
        <table class="table-style">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Matin</th>
                    <th scope="col">Après-midi</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($hourlys as $key => $hourly) {?>

                    <tr>
                    <th scope="row"><?= $hourly["hourly_id"] ?></th>
                        <td><?= $hourly["name_day"] ?></td>
                        <td><?= $hourly["hourly_am"] ?></td>
                        <td><?= $hourly["hourly_pm"] ?></td>
                        <td><a href="modification-hourly.php?id=<?= $hourly["hourly_id"] ?>">Modifier</a></td>
                    </tr>
                    
                <?php }  ?>

            </tbody>
        </table>
    </div>
    
    <div class="line-style"></div>

	<form method="POST" enctype="multipart/form-data">
        <fieldset class="form-style">
            <?php 
            foreach ($messages as $message) { ?>
                <div class="alert alert-sucess"><?php $message; ?></div>
                <?php }?>
            <?php 
            foreach ($errors as $error) { ?>
                <div class="alert alert-danger"><?php $error; ?></div>
                <?php }?>
			<legend class="form-legend">Formulaire d'ajout d'horaires</legend>

            <div class="line-style"></div>
		
			<label for="lundi"><input type="text" id="lundi" name="name_day" placeholder="Jour" class="form-input"></label>

			<label for="hourly_am"><input type="text" id="hourly_am" name="hourly_am" placeholder="Horaires matin" class="form-input"></label>

			<label for="hourly_pm"><input type="text" id="hourly_pm" name="hourly_pm" placeholder="Horaires après_midi" class="form-input"></label>

			<div class="form-button">
				<input type="submit" value="Envoyer" name="add_hourly" class="custom-button">
			</div>

		</fieldset>
	</form>

</section>

<?php require_once ("template-admin/footer-admin.php") ?>



