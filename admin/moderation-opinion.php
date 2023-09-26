<?php 
require_once ("../lib/session.php");
require_once  ("../lib/config.php");
require_once  ("../lib/pdo.php");
require_once  ("../lib/opinion.php");
require_once ("template-admin/header-admin.php");

if (isset($_GET["page"])) {
    $page = (int)$_GET["page"];
}else {
    $page = 1;
}

$opinions = getOpinions($pdo, _LIMIT_OPINION_PER_PAGE_, $page);
$totalOpinion = getTotalOpinion($pdo);
$totalPageOpinion = ceil($totalOpinion / _LIMIT_OPINION_PER_PAGE_);

$messages = [];
$errors = [];

if(isset($_POST["add_opinion"])){
    $opinionResult = addOpinion($pdo, $_POST["name"], $_POST["text"], $_POST["note"]);
    if($opinionResult){
        $messages[] = "Votre note a bien été enregistré, merci de votre avis";
    }else{
        $errors[]= "Un problème est survenue, veuillez rééssayer ultérieurement";
    }
}

?>

<section class="flux">

    <div class="line-style"></div>

    <h2 class="title-h2">Modération avis</h2>

    <div class="line-style"></div>
    
    <div class="section-admin__crud__description" id="moderation">
        <table class="table-style">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Text</th>
                    <th scope="col">Note</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
    
            <tbody>
                <?php foreach ($opinions as $key => $opinion) {
                    if($opinion["verify"] == null){?>
                    <tr>
                    <th scope="row"><?= $opinion["opinion_id"] ?></th>
                        <td><?= $opinion["name"] ?></td>
                        <td><?= $opinion["opinion_text"] ?></td>
                        <td><?= $opinion["note"] ?></td>
                        <td><a href="./modification-opinion.php?id=<?= $opinion["opinion_id"]?>">Modifier</a> | 
                        <button data-bs-toggle="modal" data-bs-target="#exampleModal<?= $opinion["opinion_id"] ?>" class="custom-button-admin">Supprimer</button>
                            <div class="modal fade" id="exampleModal<?= $opinion["opinion_id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="title-modal" id="exampleModalLabel">Suppression de l'avis <?= $opinion["opinion_id"] ?></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Attention, vous êtes sur le point de supprimer l'avis <?= $opinion["opinion_id"] ?>. La suppression est définitive.
                                            Etes-vous sûr ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <button type="button" class="btn btn-danger"><a href="delete-opinion.php?id=<?= $opinion["opinion_id"] ?>">Supprimer</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="line-style"></div>

    <h2 class="title-h2">Avis vérifiés</h2>

    <div class="line-style"></div>

    <div class="section-admin__crud__description" id="moderation">
        <table class="table-style">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Text</th>
                    <th scope="col">Note</th>
                    <th scope="col">Vérifié</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($opinions as $key => $opinion) {
                    if($opinion["verify"] == "yes"){?>
                    <tr>
                    <th scope="row"><?= $opinion["opinion_id"] ?></th>
                        <td><?= $opinion["name"] ?></td>
                        <td><?= $opinion["opinion_text"] ?></td>
                        <td><?= $opinion["note"] ?></td>
                        <td><?= $opinion["verify"] ?></td>
                        <td>
                            <button data-bs-toggle="modal" data-bs-target="#exampleModal<?= $opinion["opinion_id"] ?>" class="custom-button-admin">Supprimer</button>
                            <div class="modal fade" id="exampleModal<?= $opinion["opinion_id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="title-modal" id="exampleModalLabel">Suppression de l'avis <?= $opinion["opinion_id"] ?></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Attention, vous êtes sur le point de supprimer l'avis <?= $opinion["opinion_id"] ?>. La suppression est définitive.
                                            Etes-vous sûr ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <button type="button" class="btn btn-danger"><a href="delete-opinion.php?id=<?= $opinion["opinion_id"] ?>">Supprimer</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php }?>
                <?php }  ?>

            </tbody>
        </table>
        <?php if ($totalPageOpinion) {?>
                <nav>
                    <ul class="navigation-page">
                        <?php for ($i = 1; $i <= $totalPageOpinion; $i++) { ?>
                            <li class="navigation-page__item <?php if ($i === $page) echo "active-page" ?>"><a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php }  ?>
                    </ul>
                </nav>
        <?php }?>
    </div>

    <div class="line-style"></div>

    <div class="section-admin__crud__title">
        <h2 class="title-h2">Poster un avis</h2>
    </div>

    <div class="line-style"></div>

    <form method="POST">
        <?php foreach ($messages as $message) { ?>
                <div class="alert alert-success"><?= $message ?></div>
        <?php }?>
        <?php foreach ($errors as $error) { ?>
                <div class="alert alert-danger"><?= $error ?></div>
        <?php }?>
        <fieldset class="form-opinion">
        
            <label for="name"><input name="name" type="text" id="name" placeholder="Nom" class="form-input"></label>
            <textarea name="text" type="textarea" id="ask" placeholder="Avis" class="form-textarea"></textarea>

            <label for="note" id="note">
            <select name="note" id="note-select" class="form-input">
                <option value="0" selected>Note</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select></label>

            <div class="form-button">
                <input name="add_opinion" type="submit" value="Envoyer" class="custom-button">
            </div>
        </fieldset>
    </form>

</section>

<?php require_once ("../admin/template-admin/footer-admin.php")?>

