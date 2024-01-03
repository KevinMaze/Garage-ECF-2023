<?php 
require_once ("../lib/session.php");
require_once  ("../lib/config.php");
require_once  ("../lib/pdo.php");
require_once  ("../lib/form-contact.php");
require_once ("template-admin/header-admin.php");

$contacts = getContact($pdo);
?>

<section class="flux">

    <div class="line-style"></div>

    <h2 class="title-h2">Derniers contacts</h2>

    <div class="line-style"></div>
    
    <div class="section-admin__crud__description" id="moderation">
        <table class="table-style">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Texte</th>
                    <th scope="col">Annonce N°</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
    
            <tbody>
                <?php foreach ($contacts as $key => $contact) {?>
                    <tr>
                        <td><?= htmlentities($contact["lastname"]) ?></td>
                        <td><?= htmlentities($contact["firstname"]) ?></td>
                        <td><?= htmlentities($contact["email"]) ?></td>
                        <td>0<?= htmlentities($contact["phone"]) ?></td>
                        <td><?= htmlentities($contact["text"]) ?></td>
                        <td ><a href="../occasion-page.php?id=<?=$contact["car_id"]?>"><?= htmlentities($contact["car_id"]) ?></a></td>
                        <td><a href="mailto : <?= $contact["contact_id"]?>">Répondre</a> | 
                        <button data-bs-toggle="modal" data-bs-target="#exampleModal<?= $contact["contact_id"] ?>" class="custom-button-admin">Supprimer</button>
                            <div class="modal fade" id="exampleModal<?= $contact["contact_id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="title-modal" id="exampleModalLabel">Suppression de l'avis de <?= htmlentities($contact["lastname"])." ".htmlentities($contact["firstname"]) ?></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Attention, vous êtes sur le point de supprimer l'avis de <?= htmlentities($contact["lastname"])." ".htmlentities($contact["firstname"]) ?>. La suppression est définitive.
                                            Etes-vous sûr ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <button type="button" class="btn btn-danger"><a href="delete-contact.php?id=<?= $contact["contact_id"] ?>">Supprimer</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>

    <div class="line-style"></div>

</section>

<?php require_once ("template-admin/footer-admin.php")?>