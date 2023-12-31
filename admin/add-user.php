<?php
require_once ("../lib/session.php");
require_once ("../lib/config.php");
require_once ("../lib/pdo.php");
require_once ("../lib/user.php");
require_once ('template-admin/header-admin.php');

if (isset($_GET["page"])) {
    $page = (int)$_GET["page"];
}else {
    $page = 1;
}

// total pages user
$users = getUser($pdo, _ADMIN_CAR_PER_PAGE_, $page);
$totalUsers = getTotalPageUser($pdo);
$totalPageUsers = ceil($totalUsers / _ADMIN_CAR_PER_PAGE_);
//tableau des messages
$messages = [];
$errors = [];

// requete ajout
try {
    if(isset($_POST["add-user"])){
        $result = addUser($pdo, htmlspecialchars($_POST["lastname"], ENT_IGNORE, 'UTF-8'), htmlspecialchars($_POST["firstname"], ENT_IGNORE, 'UTF-8'), htmlspecialchars($_POST["email"], ENT_IGNORE, 'UTF-8'), htmlspecialchars($_POST["password"], ENT_IGNORE, 'UTF-8'), htmlspecialchars($_POST["role"], ENT_IGNORE, 'UTF-8'));
        if($result){
            $messages[] = "Enregistrement effectué";
        }else{
            $errors[] = "Un problème est survenue";
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<section class="flux">

    <h2 class="title-h2">Utilisateurs actuel</h2>

    <div class="line-style"></div>

    <div class="section-admin__crud__description">
        <table class="table-style">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Rôle</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($users as $key => $user) {?>

                    <tr>
                        <th scope="row"><?= htmlentities($user["user_id"]) ?></th>
                        <td><?= htmlentities($user["lastname"]) ?></td>
                        <td><?= htmlentities($user["firstname"]) ?></td>
                        <td><?= htmlentities($user["role"]) ?></td>
                        <td><a href="modification-user.php?id=<?= $user["user_id"] ?>">Modifier</a> | 
                        <button data-bs-toggle="modal" data-bs-target="#exampleModal<?= $user["user_id"] ?>" class="custom-button-admin">Supprimer</button>
                            <div class="modal fade" id="exampleModal<?= $user["user_id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="title-modal" id="exampleModalLabel">Suppression de l'employé <?= htmlentities($user["user_id"]) ?></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Attention, vous êtes sur le point de supprimer l'employé <?= htmlentities($user["lastname"]) ?> <?= htmlentities($user["firstname"]) ?>. La suppression est définitive.
                                            Etes-vous sûr ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <button type="button" class="btn btn-danger"><a href="delete-user.php?id=<?= $user["user_id"] ?>">Supprimer</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    
                <?php }  ?>

            </tbody>
        </table>
        <?php if ($totalPageUsers) {?>
            <nav>
                <ul class="navigation-page">
                    <?php for ($i = 1; $i <= $totalPageUsers; $i++) { ?>
                        <li class="navigation-page__item <?php if ($i === $page) echo "active-page" ?>"><a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a></li>
                    <?php }  ?>
                </ul>
            </nav>
            <?php }?>
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