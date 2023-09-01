<?php  
require_once ('lib/main_menu.php');
require_once ('lib/config.php');
require_once ('lib/pdo.php');
require_once ('lib/opinion.php');
require_once ('lib/form-contact.php');
require_once ('template/header.php');

$messages = [];
$errors = [];

if (isset($_GET["page"])) {
    $page = (int)$_GET["page"];
}else {
    $page = 1;
}

$opinions = getOpinions($pdo);

if(isset($_POST["add-contact"])){
    $result = addContact($pdo, $_POST["lastname"], $_POST["firstname"], $_POST["email"], $_POST["phone"], $_POST["text"], $_POST["car_id"]);
    if($result){
        $messages[] = "Votre message a bien été envoyé";
    }else{
        $errors[] = "Une erreur est survenue, veuillez rééssayer ultérieurement";
    }
}

if(isset($_POST["add_opinion"])){
    $opinionResult = addOpinion($pdo, $_POST["name"], $_POST["text"], $_POST["note"]);
    if($opinionResult){
        $messages[] = "Votre note a bien été enregistré, merci de votre avis";
    }else{
        $errors[]= "Un problème est survenue, veuillez rééssayer ultérieurement";
    }
}

$opinions = getOpinions($pdo, _LIMIT_OPINION_PER_PAGE_, $page);
$totalOpinion = getTotalOpinion($pdo);
$totalPageOpinion = ceil($totalOpinion / _LIMIT_OPINION_PER_PAGE_);

?>

<div class="line-style flux"></div>

<section class="flux">
	<form method="POST">
		<fieldset class="form-style">
            <legend class="form-legend">Formulaire de contact</legend>
            
            <?php foreach ($messages as $message) { ?>
                <div class="alert alert-success"><?= $message ?></div>
                <?php }?>
            <?php foreach ($errors as $error) { ?>
                <div class="alert alert-danger"><?= $error ?></div>
                <?php }?>
            <div class="line-style flux"></div>
		
			<label for="lastname"><input name="lastname" type="text" id="lastname" placeholder="Nom" required class="form-input"></label>

			<label for="firstname"><input name="firstname" type="text" id="firstname" placeholder="Prénom" required class="form-input"></label>

			<label for="email"><input name="email" type="email" id="email" placeholder="exemple@exemple.com" required class="form-input"></label>

			<label for="phone"><input name="phone" type="tel" id="phone" placeholder="Téléphone" class="form-input"></label>

			<textarea name="text" type="textarea" id="ask" placeholder="Demande" class="form-textarea"></textarea>

			<label for="car_id"><input name="car_id" type="text" id="ref" placeholder="Référence annonce" required class="form-input"></label>

			<div class="form-button">
				<input name="add-contact" type="submit" value="Envoyer" class="custom-button">
			</div>

		</fieldset>
	</form>
</section>

<div class="line-style flux"></div>


<section class="flux">
    <form method="POST">
        <fieldset class="form-opinion">

            <legend class="form-legend">Donnez vôtre avis</legend>

            <div class="line-style flux"></div>
            
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

<div class="line-style flux"></div>

<section class="opinion flux">
    <h2 class="title-h2">Dernier avis</h2>
    <div class="line-style flux"></div>
    <?php foreach ($opinions as $key => $opinion) { 
            if($opinion["verify"] == "yes"){?>

                <div class="section__last-opinion border-shadow">
                    <h3><?= $opinion["name"]?></h3>
                    <div class="line-inside-div-style flux"></div>
                    <p><?= $opinion["opinion_text"] ?></p>
                    <p class="section__opinion__note">Note : <?= $opinion["note"] ?>/5</p>
                </div>
        <?php } ?>
    <?php } ?>
    <?php if ($totalPageOpinion) {?>
                <nav>
                    <ul class="navigation-page">
                        <?php for ($i = 1; $i <= $totalPageOpinion; $i++) { ?>
                            <li class="navigation-page__item <?php if ($i === $page) echo "active-page" ?>"><a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php }  ?>
                    </ul>
                </nav>
        <?php }?>

</section>

<div class="line-style flux"></div>

<?php  
require_once ('template/footer.php')
?>