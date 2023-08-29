<?php
    require_once ("../lib/session.php");
    require_once ("../lib/config.php");
    require_once ("../lib/pdo.php");
    require_once ("../lib/user.php");
    require_once ('template-admin/header-admin.php');

    $messages = [];
    $errors = [];

    if(isset($_POST["add-user"])){
        $result = addUser($pdo, $_POST["lastname"], $_POST["firstname"], $_POST["email"], $_POST["password"], $_POST["role"]);
        if($result){
            $messages[] = "Enregistrement effectué";
        }else{
            $errors[] = "Un problème est survenue";
        }
    }
?>

<section class="flux">
	<form method="POST">
        <?php foreach ($messages as $message) { ?>
                <div class="alert alert-success"><?= $message ?></div>
            <?php }?>
        <?php foreach ($errors as $error) { ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php }?>
		<fieldset class="form-style">
			<legend class="form-legend">Formulaire création de compte</legend>

            <div class="line-style flux"></div>
		
			<label for="lastname"><input type="text" id="lastname" placeholder="Nom" required class="form-input" name="lastname"></label>

			<label for="firstname"><input type="text" id="firstname" placeholder="Prénom" required class="form-input" name="firstname"></label>

			<label for="email"><input type="email" id="email" placeholder="exemple@exemple.com" class="form-input" name="email" required></label>

			<label for="password"><input type="password" id="password" placeholder="Téléphone" class="form-input" name="password" required></label>

            <label for="role" id="role" class="form-select__add-user__label">
            <select id="role" class="form-select__add-user" name="role" require>
                <option value="0" selected>Fonction</option>
                <option value="admin">Administrateur</option>
                <option value="employe">Employé</option>
            </select>
            </label>

			<div class="form-button">
				<input type="submit" name="add-user" value="Envoyer" class="custom-button">
			</div>

		</fieldset>
	</form>
</section>

<?php require_once ("../admin/template-admin/footer-admin.php") ?>