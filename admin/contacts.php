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
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">Annonce</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Téléphon</th>
                    <th scope="col">Texte</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
    
            <tbody>
                <?php foreach ($contacts as $key => $contact) {?>
                    <tr>
                    <th scope="row"><?= $contact["car_id"] ?></th>
                        <td><?= $contact["lastname"] ?></td>
                        <td><?= $contact["firstname"] ?></td>
                        <td><?= $contact["email"] ?></td>
                        <td><?= $contact["phone"] ?></td>
                        <td><?= $contact["text"] ?></td>
                        <td><a href="./modification-opinion.php?id=<?= $contact["contact_id"]?>">Répondre</a> | <a href="./delete-page.php?id=<?=$contact["contact_id"]?>">Supprimer</a></td>
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