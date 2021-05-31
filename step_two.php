 <?php

$special_chars_1 = "/[^a-z0-9\-,.]/i";

function clean($data, $special_chars) {
    $data = strip_tags($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    $data = preg_replace($special_chars, " ", $data);
    return $data;
}
// htmlspecialchars doesn't work properly in this function, I tried to fix the issue but the only solution that I could find online is having  "ENT_QUOTES" there that I already have. Basically, when I enter any html characters in bio for sideKicks, either show up as nothing(for html tag), or 039 for (single quatation). If you could figure it out, please let me know in your feedback.

if ((!empty($_POST['user_name'])) && (!empty($_POST['user_hero'])) && (!empty($_POST['user_bio']))) {
    $name = clean($_POST['user_name'],$special_chars_1);
    $hero = $_POST['user_hero'];
    $bio = clean($_POST['user_bio'],$special_chars_1);
    
} elseif ((empty($_POST['user_name'])) && (empty($_POST['user_bio']))) {
    header('Location: step_one.php?form=error');
    exit;

} elseif (empty($_POST['user_name'])) {
    header('Location: step_one.php?form=warning_name');
    exit;

} elseif (empty($_POST['user_bio'])) {
    header('Location: step_one.php?form=warning_bio');
    exit;
}

?> 

<?php $page_title = "result"?>
<?php $page_header="Let see the result..."?>
<?php require_once "temp/header.php" ?>

<div class="msg">
  <p>Hi <span class="h5-s"><?php echo $name ?></span>,</p>
  <p>Thank you for choosing the League of Heroes - we are excited to have you here with us!</p>
  <p>Our very very VERY fancy system has processed your information and we are pleased to announce you are paired with <span class="h5-s"><?php echo $hero ?></span></p>
  <p>Take a look below to see which nemesis you will try to defeat.</p>
</div>

<?php

switch ($hero) {
        case 'dr_goliath':
            $h_name = "Dr. Goliath";
			$h_img = "dr-goliath.png";
            $h_bio = "Although he had been a part time hero for more than 25 years, it was only during the early 2000s that Dr. Goliath began to seriously consider going full-time.";
            break;
        case 'brainio':
            $h_name = "Brainio";
            $h_img = "brainio.png";
            $h_bio = "Brainio, the English super-genius was hired to develop the Fortress of Justice - a large building capable of housing the team, and making it the de-facto source for world justice.";
        break;
        case 'ellen':
            $h_name = "Ellen QWERTY";
            $h_img = "ellen-qwerty.png";
            $h_bio = "Ellen QWERTY, a biologist who trained as a beer brewmaster, worked tirelessly with Dr. Goliath and Brainio to establish the League's reputation for justice.";
        break;
        case 'clamp':
            $h_name = "C.L.A.M.P.";
            $h_img = "clamp.png";
            $h_bio = "Keep watching the skies this summer - The League will be introducing our latest hero C.L.A.M.P.So come back soon!";
        break;
        case 'tricolops':
            $h_name = "Tricolops";
            $h_img = "tricolops.png";
            $h_bio = "The Leagues seventh member, Tricolops, joined last year and boasts 3 laser projecting eye cannons. His distinctive costume and loud war cry set him apart from other heroes, gaining him an instant following";
        break;
        case 'shriek':
            $h_name = "Wonder Woman";
            $h_img = "shriek.png";
            $h_bio = "Wonder Woman was given superhuman powers by Zeus, the king of the Gods, to battle against evil in all its forms. Her powers include superhuman strength, speed, flight and near invulnerability.";
            break;
			
}

    $nemesis = [
		[
			"name" => "Donald Trump",
			"img" => "donald-trump.png",
			"bio" => " \"My IQ is one of the highest — and you all know it! Please don’t feel so stupid or insecure; it’s not your fault.\"
            This is what he said about himself but you can use it as Tinder Bio as well! I think you are better than him no matter what, so don't worry!"
			
		],
		[
			"name" => "Cookie Monster",
			"img" => "cookie-monster.png",
			"bio" => "This nemenis has so many layers! How can someone be a monster and cookie as well? You better watch out! he can do so much that you don't know!"
			
		],
		[
			"name" => "Unikitty",
			"img" => "unikitty.png",
			"bio" => "Princess Unikitty – The princess of the Unikingdom who is a cat/unicorn hybrid. Imagine what she can do if she is as magical as unicorn and as perky as a kitten"
			
        ]
    ];

   $random = rand(0,2);
   $nemesis_name = $nemesis[$random]["name"];
   $nemesis_img = $nemesis[$random]["img"];
   $nemesis_bio = $nemesis[$random]["bio"];

?>

<div class="container">
    <div class="row">
        <div class="col col-side">
            <img src="img/character-headshots/tom-from-accounting.png" alt="sidekick">
            <h3 class="h3">SideKick: <span class="h3-s"><?php echo $name ?></span></h3> 
            <p class="h4">Bio: <span class="h4-s"><?php echo $bio ?></span></p>
        </div> 
        
        <div class="col col-super">
            <img src="img/character-headshots/<?php echo $h_img; ?>" alt="<?php echo $h_name ?>">
            <h3 class="h3">Superhero: <span class="h3-s"><?php echo $h_name ?></span></h3>
            <p class="h4">Bio: <span class="h4-s"><?php echo $h_bio ?></span></p>
        </div> 

        <div class="col col-nem">.
            <img src="img/character-headshots/<?php echo  $nemesis_img ?>" alt="nemesis">
            <h3 class="h3" >Nemesis: <span class="h3-s"><?php echo  $nemesis_name ?></span></h3>
            <p class="h4"> Bio: <span class="h4-s"><?php echo  $nemesis_bio ?></span></p>
        </div> 
  </div> 

  <a class="btn" href="step_one.php"> Wanna play again? Click here</a>
</div>  

<?php require_once "temp/footer.php" ?>



















