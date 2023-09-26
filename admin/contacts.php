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
                        <td><?= $contact["lastname"] ?></td>
                        <td><?= $contact["firstname"] ?></td>
                        <td><?= $contact["email"] ?></td>
                        <td><?= $contact["phone"] ?></td>
                        <td><?= $contact["text"] ?></td>
                        <td ><?= $contact["car_id"] ?></td>
                        <td><a href="mailto : <?= $contact["contact_id"]?>">Répondre</a> | 
                        <button data-bs-toggle="modal" data-bs-target="#exampleModal<?= $contact["contact_id"] ?>" class="custom-button-admin">Supprimer</button>
                            <div class="modal fade" id="exampleModal<?= $contact["contact_id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="title-modal" id="exampleModalLabel">Suppression de l'avis de <?= $contact["lastname"]." ".$contact["firstname"] ?></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Attention, vous êtes sur le point de supprimer l'avis de <?= $contact["lastname"]." ".$contact["firstname"] ?>. La suppression est définitive.
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
        <!-- <?php if ($totalPageOpinion) {?>
                <nav>
                    <ul class="navigation-page">
                        <?php for ($i = 1; $i <= $totalPageOpinion; $i++) { ?>
                            <li class="navigation-page__item <?php if ($i === $page) echo "active-page" ?>"><a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php }  ?>
                    </ul>
                </nav>
        <?php }?> -->
    </div>

    <div class="line-style"></div>

</section>

<?php require_once ("template-admin/footer-admin.php")?>