<?php  
require_once ('template/header.php');

	$opinions = [
		["name" => "Vincent", "description" => "Très bon garage, personnes professionnelles", "note" => "5"],
		["name" => "John", "description" => "Personnel au top, à l'écoute des clients", "note" => "4"],
		["name" => "Jeanne", "description" => "Ma voiture est ressortie comme neuf, un plaisir, je recommande", "note" => "5"]
]
?>

<div class="line-style flux"></div>

<section class="flux">
	<form action="">
		<fieldset class="form-style">
			<legend class="form-legend">Formulaire de contact</legend>
		
			<label for="name"><input type="text" id="name" placeholder="Nom" required class="form-input"></label>
			<label for="firstName"><input type="text" id="firstName" placeholder="Prénom" required class="form-input"></label>
			<label for="email"><input type="email" id="email" placeholder="exemple@exemple.com" required class="form-input"></label>
			<label for="telephone"><input type="tel" id="telephone" placeholder="Téléphone" class="form-input"></label>
			<textarea type="textarea" id="ask" placeholder="Demande" class="form-textarea"></textarea>
			<label for="ref"><input type="text" id="ref" placeholder="Référence annonce" required class="form-input"></label>
			<div class="form-button">
				<input type="submit" value="Envoyer" class="custom-button">
			</div>

		</fieldset>
	</form>
</section>

<div class="line-style flux"></div>


<section class="flux">
    <form action="">
        <fieldset class="form-opinion">
            <legend class="form-legend">Donnez vôtre avis</legend>
            
            <label for="name"><input type="text" id="name" placeholder="Nom" class="form-input"></label>
            <textarea type="textarea" id="ask" placeholder="Avis" class="form-textarea"></textarea>
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
                <input type="submit" value="Envoyer" class="custom-button">
            </div>
        </fieldset>
    </form>
</section>

<div class="line-style flux"></div>

<section class="opinion flux">
    <h2 class="title-h2">Dernier avis</h2>
    <?php foreach ($opinions as $key => $opinion) { ?>

        <div class="section__last-opinion border-shadow">
            <h3><?= $opinion["name"]?></h3>
            <p><?= $opinion["description"] ?></p>
            <p class="section__opinion__note">Note : <?= $opinion["note"] ?>/5</p>
        </div>
        
    <?php } ?>

</section>

<div class="line-style flux"></div>

<?php  
require_once ('template/footer.php')
?>