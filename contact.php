<?php  
require_once ('lib/main_menu.php');
require_once ('lib/config.php');
require_once ('lib/pdo.php');
require_once ('lib/opinion.php');
require_once ('lib/form-contact.php');
require_once ('template/header.php');

$messages = [];
$errors = [];

try {
    if(isset($_POST["add-contact"])){
        //htmlspecialchars() sécurise ce que l'utilisateur envoie (remplace touts les caractères spéciaux)
        $result = addContact($pdo, htmlspecialchars($_POST["lastname"], ENT_IGNORE, 'UTF-8'), htmlspecialchars($_POST["firstname"], ENT_IGNORE, 'UTF-8'), htmlspecialchars($_POST["email"], ENT_IGNORE, 'UTF-8'), htmlspecialchars($_POST["phone"], ENT_IGNORE, 'UTF-8'), htmlspecialchars($_POST["text"], ENT_IGNORE, 'UTF-8'), null);
        if($result){
            $messages[] = "Votre message a bien été envoyé";
        }else{
            $errors[] = "Une erreur est survenue, veuillez rééssayer ultérieurement";
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
try {
    if(isset($_POST["add_opinion"])){
        $opinionResult = addOpinion($pdo, htmlspecialchars($_POST["name"], ENT_IGNORE, 'UTF-8'), htmlspecialchars($_POST["text"], ENT_IGNORE, 'UTF-8'), $_POST["note"]);
        if($opinionResult){
            $messages[] = "Votre note a bien été enregistré, merci de votre avis";
        }else{
            $errors[]= "Un problème est survenue, veuillez rééssayer ultérieurement";
        }
    }
}catch (Exception $e) {
    echo $e->getMessage();
}

$opinions = getOpinions($pdo);

?>

<div class="line-style flux"></div>

<section class="flux" id="contact">
	<form method="POST" id="form-contact" class="needs-validation"> 
		<fieldset class="form-style">
            <h2 class="title-h2">Formulaire de contact</h2>
            
            <?php foreach ($messages as $message) { ?>
                <div class="alert alert-success"><?= $message ?></div>
                <?php }?>
            <?php foreach ($errors as $error) { ?>
                <div class="alert alert-danger"><?= $error ?></div>
                <?php }?>
            <div class="line-style flux"></div>
            
            <div class="form-style">
                <label for="lastname" class="form-style__label">Nom :</label>
                <input name="lastname" type="text" id="lastname" required class="form-input">
                <div class="invalid-feedback">Veuillez saisir votre Nom</div>
            </div>

            <div class="form-style">
                <label for="firstname" class="form-style__label">Prénom :</label>
                <input name="firstname" type="text" id="firstname" required class="form-input">
                <div class="invalid-feedback">Veuillez saisir votre Prénom</div>
            </div>

            <div class="form-style">
                <label for="email" class="form-style__label">Email :</label>
                <input name="email" type="email" id="email" required class="form-input">
                <div class="invalid-feedback">Veuillez saisir votre Email</div>
            </div>

            <div class="form-style">
                <label for="phone" class="form-style__label">Téléphone :</label>
                <input name="phone" type="tel" id="phone" required class="form-input">
                <div class="invalid-feedback">Veuillez saisir votre Téléphone</div>
            </div>

            <label for="textarea" class="form-style__label">Demande :</label>
			<textarea name="text" type="textarea" id="ask" class="form-textarea"></textarea>

			<div class="form-button">
				<input name="add-contact" type="submit" value="Envoyer" class="custom-button" id="submit"></input>
			</div>

		</fieldset>
	</form>
</section>

<div class="line-style flux"></div>


<section class="flux" id="opinions">
    <form method="POST" id="form-opinion">
        <fieldset class="form-opinion">

            <h2 class="title-h2">Donnez vôtre avis</h2>

            <div class="line-style flux"></div>
            
            <div class="form-style">
                <label for="name" class="form-style__label">Nom : </label>
                <input name="name" type="text" id="name" required class="form-input">
                <div class="invalid-feedback">Veuillez saisir votre Nom</div>
            </div>
            
            <label for="textarea" class="form-style__label">Avis : </label>
            <textarea name="text" type="textarea" id="ask" class="form-textarea"></textarea>

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

<div class="line-style flux"></div>

<section class="opinion flux">

    <h2 class="title-h2">Derniers avis</h2>

    <div class="line-style flux"></div>


    <div id="carouselExampleAutoplaying" class="carousel slide border-shadow section__last-opinion flux" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($opinions as $key => $opinion) { 
                if($opinion["verify"] === "yes"){?>
                    <div class="carousel-item <?php if($key === 0){ echo "active"; }else{echo "";}?>">
                        <h3><?= $opinion["name"]?></h3>
                        <div class="line-inside-div-style flux"></div>
                        <p><?= $opinion["opinion_text"] ?></p>
                        <p class="section__opinion__note">Note : <?= $opinion["note"] ?>/5</p>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="carousel-item active">

</section>

<div class="line-style flux"></div>

<script src="js/form.js"></script>

<?php require_once ('template/footer.php') ?>