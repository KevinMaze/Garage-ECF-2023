<?php  

require_once ("../lib/session.php");
require_once ("../lib/config.php");
require_once ("../lib/pdo.php");
require_once ("../lib/user.php");
require_once ("../lib/hourly.php");
require_once ('template-admin/header-admin.php');

    // recupération des horaires
    $hourlys = getHourly($pdo);

    if()
?>

<section class="flux">
    <h2 class="title-h2">Horaires actuelles</h2>

    <div class="line-style"></div>

    <div class="section-admin__crud__description">
        <table class="table ">
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
                        <td>Modifier | Supprimer</td>
                    </tr>
                    
                <?php }  ?>

            </tbody>
        </table>
    </div>
	<form action="">
		<fieldset class="form-style">
			<legend class="form-legend">Changement des horaires</legend>
		
			<label for="lundi"><input type="text" id="lundi" name="name_day" placeholder="Lundi" class="form-input"></label>

			<label for="hourly_am"><input type="text" id="hourly_am" name="hourly_am" placeholder="Horaires matin" class="form-input"></label>

			<label for="hourly_pm"><input type="text" id="hourly_pm" name="hourly_pm" placeholder="Horaires après_midi" class="form-input"></label>

			<div class="form-button">
				<input type="submit" value="Envoyer" name="add-hourly" class="custom-button">
			</div>

		</fieldset>
	</form>

    <div class="line-style flux"></div>

	<form action="">
		<fieldset class="form-style">
		
			<label for="name_day"><input type="text" id="name_day" name="name_day" placeholder="Mardi" class="form-input"></label>

			<label for="hourly_am"><input type="text" id="hourly_am" name="hourly_am" placeholder="Horaires matin" class="form-input"></label>

			<label for="hourly_pm"><input type="text" id="hourly_pm" name="hourly_pm" placeholder="Horaires après_midi" class="form-input"></label>

			<div class="form-button">
				<input type="submit" value="Envoyer" name="add-hourly" class="custom-button">
			</div>

		</fieldset>
	</form>

    <div class="line-style flux"></div>

	<form action="">
		<fieldset class="form-style">

		
			<label for="name_day"><input type="text" id="name_day" name="name_day" placeholder="Mercredi" class="form-input"></label>

			<label for="hourly_am"><input type="text" id="hourly_am" name="hourly_am" placeholder="Horaires matin" class="form-input"></label>

			<label for="hourly_pm"><input type="text" id="hourly_pm" name="hourly_pm" placeholder="Horaires après_midi" class="form-input"></label>

			<div class="form-button">
				<input type="submit" value="Envoyer" name="add-hourly" class="custom-button">
			</div>

		</fieldset>
	</form>

    <div class="line-style flux"></div>

	<form action="">
		<fieldset class="form-style">
		
			<label for="name_day"><input type="text" id="name_day" name="name_day" placeholder="Jeudi" class="form-input"></label>

			<label for="hourly_am"><input type="text" id="hourly_am" name="hourly_am" placeholder="Horaires matin" class="form-input"></label>

			<label for="hourly_pm"><input type="text" id="hourly_pm" name="hourly_pm" placeholder="Horaires après_midi" class="form-input"></label>

			<div class="form-button">
				<input type="submit" value="Envoyer" name="add-hourly" class="custom-button">
			</div>

		</fieldset>
	</form>

    <div class="line-style flux"></div>

	<form action="">
		<fieldset class="form-style">
		
			<label for="name_day"><input type="text" id="name_day" name="name_day" placeholder="Vendredi" class="form-input"></label>

			<label for="hourly_am"><input type="text" id="hourly_am" name="hourly_am" placeholder="Horaires matin" class="form-input"></label>

			<label for="hourly_pm"><input type="text" id="hourly_pm" name="hourly_pm" placeholder="Horaires après_midi" class="form-input"></label>

			<div class="form-button">
				<input type="submit" value="Envoyer" name="add-hourly" class="custom-button">
			</div>

		</fieldset>
	</form>

    <div class="line-style flux"></div>

	<form action="">
		<fieldset class="form-style">
		
			<label for="name_day"><input type="text" id="name_day" name="name_day" placeholder="Samedi" class="form-input"></label>

			<label for="hourly_am"><input type="text" id="hourly_am" name="hourly_am" placeholder="Horaires matin" class="form-input"></label>

			<label for="hourly_pm"><input type="text" id="hourly_pm" name="hourly_pm" placeholder="Horaires après_midi" class="form-input"></label>

			<div class="form-button">
				<input type="submit" value="Envoyer" name="add-hourly" class="custom-button">
			</div>

		</fieldset>
	</form>

    <div class="line-style flux"></div>

	<form action="">
		<fieldset class="form-style">
		
			<label for="name_day"><input type="text" id="name_day" name="name_day" placeholder="Dimanche" class="form-input"></label>

			<label for="hourly_am"><input type="text" id="hourly_am" name="hourly_am" placeholder="Horaires matin" class="form-input"></label>

			<label for="hourly_pm"><input type="text" id="hourly_pm" name="hourly_pm" placeholder="Horaires après_midi" class="form-input"></label>

			<div class="form-button">
				<input type="submit" value="Envoyer" name="add-hourly" class="custom-button">
			</div>

		</fieldset>
	</form>

</section>

