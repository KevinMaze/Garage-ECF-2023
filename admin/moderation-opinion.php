<?php 
require_once ("../lib/session.php");
require_once  ("../lib/config.php");
require_once  ("../lib/pdo.php");
require_once  ("../lib/opinion.php");
require_once ("template-admin/header-admin.php");

$opinions = getOpinions($pdo);
?>

<section class="flux">

    <div class="line-style"></div>

    <h2 class="title-h2">Modération avis</h2>

    <div class="line-style"></div>
    
    <div class="section-admin__crud__description" id="moderation">
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
    
            <tbody>
                <?php foreach ($opinions as $key => $opinion) {?>
    
                    <tr>
                    <th scope="row"><?= $opinion["name"] ?></th>
                        <td><?= $opinion["opinion_text"] ?></td>
                        <td><a href="./modification-opinion.php?id=<?= $opinion["opinion_id"]?>">Modifier</a> | <a href="./delete-opinion.php?id=<?=$opinion["opinion_id"]?>">Supprimer</a></td>
                    </tr>
                    
                <?php }  ?>
    
            </tbody>
        </table>
    </div>

    <div class="line-style"></div>

    <h2 class="title-h2">Avis vérifiés</h2>

    <div class="line-style"></div>

    <div class="section-admin__crud__description" id="moderation">
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($opinions as $key => $opinion) {?>

                    <tr>
                    <th scope="row"><?= $opinion["name"] ?></th>
                        <td><?= $opinion["opinion_text"] ?></td>
                        <td>Modifier | Supprimer</td>
                    </tr>
                    
                <?php }  ?>

            </tbody>
        </table>
    </div>

    <div class="line-style"></div>

    <div class="section-admin__crud__title">
        <h2 class="title-h2">Poster un avis</h2>
    </div>

    <div class="line-style"></div>

    <form method="POST">
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

