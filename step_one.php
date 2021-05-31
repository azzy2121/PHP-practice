<?php $page_title = "Superhero Sidekick Selection System | The League of Heroes" ?>
<?php $page_header="Superhero Sidekick Selection System"?>
<?php require_once "temp/header.php"?>


	<main>
		<div class="container-fixed">
		<p>The League of Heroes is a band of Earth's mightiest costumed superheroes, who use their superpowers for good, fighting evil in all its forms. The League was founded in Toronto, Canada, by Dr. Goliath and his belief that he could make a better world, and that the law abiding public deserve more.</p>
		<p>Now we have a fun part added to our website, you can try superhero sidekick Selection system here.It's cool,right...?</p>
		<p>Let have some fun!</p>
		
		
		<?php if (isset($_GET['form']) && ($_GET['form'] == 'error')) { ?>
			<div class="input-row">
				<div class="alert alert-danger">
					<p class="alert-text">You need to enter your info!:(</p>
				</div>
			</div>
		<?php } ?>
		<?php if (isset($_GET['form']) && ($_GET['form'] == 'warning_name')) { ?>
			<div class="input-row">
				<div class="alert alert-warning">
					<p class="alert-text">Did you forget to fill up your name? I think you did...</p>
				</div>
			</div>
		<?php } ?>
		<?php if (isset($_GET['form']) && ($_GET['form'] == 'warning_bio')) { ?>
			<div class="input-row">
				<div class="alert alert-warning">
					<p class="alert-text">This time you forgot your bio, we need to know about you!</p>
				</div>
			</div>
		<?php } ?>
		
		

			<form action="step_two.php" method="post">
				<div class="input-row">
					<label for="first_name">Sidekick Name:</label>
					<input type="text" name="user_name" id="first_name" placeholder="Enter your first name">
				</div>
				<div class="input-row">
					<label for="first_name">Favourite Hero:</label>
					<select class="input-selection" name="user_hero" id="user_hero">
						<option value="brainio">Brainio</option>
						<option value="clamp">Clamp</option>
						<option value="dr_goliath">Dr Goliath</option>
						<option value="ellen">Ellen QWERTY</option>
						<option value="tricolops">Tricolops</option>
						<option value="shriek">Wonder Woman</option>
					</select>
				<div class="input-row">
					<label for="bio">Sidekick Bio:</label>
					<textarea name="user_bio" id="bio" maxlength="140" placeholder="Enter your bio"></textarea>
				</div>
				<div class="input-row">
					<input type="submit" value="Select Sidekick">
					<input type="reset" value="Reset">
				</div>
			</div>	
		</form>
	</div>	
</main>

	<?php require_once "temp/footer.php" ?>


