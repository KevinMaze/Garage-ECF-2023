<?php
require_once ("../lib/session.php");
require_once ("../lib/config.php");
require_once ("../lib/pdo.php");
require_once ("../lib/user.php");
require_once ('template-admin/header-admin.php');

//tableau des messages
$error = false;
$messages = [];
$errors = [];

// recuperation d'un user avec id
try {
    if(isset($_GET["id"])){
        $user = getUserById($pdo, (int)$_GET["id"]);
        if($user === false){
            $errors[] = "L'utilisateur n'existe pas";
        }
        if (!$user){
            $error = true;
            }
        }else {
        $error = true;
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

// requete de modification
try {
    if(isset($_POST["add-user"])){
        $result = changeUser($pdo, htmlspecialchars($_POST["lastname"], ENT_IGNORE, 'UTF-8'), htmlspecialchars($_POST["firstname"], ENT_IGNORE, 'UTF-8'), htmlspecialchars($_POST["email"], ENT_IGNORE, 'UTF-8'), $_POST["password"], htmlspecialchars($_POST["role"], ENT_IGNORE, 'UTF-8'), $_GET["id"]);
        if($result){
            $messages[] = "Modifications effectuées";
        }else{
            $errors[] = "Un problème est survenue";
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<?php  if (!$error) {?>

    <section class="flux">

        <h2 class="title-h2">Utilisateurs actuel</h2>

        <div class="line-style"></div>

        <div class="section-admin__crud__description">
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Rôle</th>
                    </tr>
                </thead>

                <tbody>
                        <tr>
                        <th scope="row"><?= htmlentities($user["user_id"]) ?></th>
                            <td><?= htmlentities($user["lastname"]) ?></td>
                            <td><?= htmlentities($user["firstname"]) ?></td>
                            <td><?= htmlentities($user["email"]) ?></td>
                            <td><?= htmlentities($user["role"]) ?></td>
                        </tr>
                </tbody>
            </table>
        </div>

        <div class="line-style flux"></div>

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
            
                <label for="lastname"><input type="text" id="lastname" placeholder="Nom" class="form-input" name="lastname" value=<?= htmlentities($user["lastname"]) ?>></label>

                <label for="firstname"><input type="text" id="firstname" placeholder="Prénom" class="form-input" name="firstname" value=<?= htmlentities($user["firstname"]) ?>></label>

                <label for="email"><input type="email" id="email" placeholder="exemple@exemple.com" class="form-input" name="email" value=<?= htmlentities($user["email"]) ?>></label>

                <label for="password"><input type="password" id="password" placeholder="Téléphone" class="form-input" name="password" value=<?= htmlentities($user["password"]) ?>></label>

                <label for="role" id="role" class="form-select__add-user__label">
                <select id="role" class="form-select__add-user" name="role">
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

<?php }else {?>
    <h1 class="title-h2"><?= _ERROR_MESSAGE_ ?></h1>
<?php }?>
<?php require_once ("../admin/template-admin/footer-admin.php") ?>