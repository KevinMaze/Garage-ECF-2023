<div class="line-style"></div>

<div class="section-admin__crud__title">
    <h2 class="title-h2">Modération avis</h2>
    <div class="custom-button"><a href="#">Ajouter un avis</a></div>
</div>

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
            <?php foreach ($serviceArticles as $key => $serviceArticle) {?>

                <tr>
                <th scope="row"><?= $serviceArticle["service_id"] ?></th>
                    <td><?= $serviceArticle["name_service"] ?></td>
                    <td>Modifier | Supprimer</td>
                </tr>
                
            <?php }  ?>

        </tbody>
    </table>
</div>