<?php

session_start();

require 'inc/Game.php';
require 'inc/Phrase.php';


$_SESSION['phrase'] = 'start small';

if (!isset($_SESSION["selected"])) {

    $_SESSION["selected"] = [];
    
}

if($_SERVER['REQUEST_METHOD']== 'POST'){

    array_push($_SESSION['selected'], $_POST["key"]);
    //session_destroy();
    
 }


$phrase = new Phrase(null, $_SESSION['selected']);

$game = new Game($phrase);

var_dump($phrase->checkLetter('z'));
 

var_dump($_SESSION);


?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Phrase Hunter</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/styles.css?ts=<?=time()?>" rel="stylesheet">
		<link href="css/animate.css?ts=<?=time()?>" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	</head>

	<body>
		<div class="main-container">
            <h2 class="header">Phrase Hunter</h2>
            <?php
                echo $phrase->addPhraseToDisplay(); 
                echo $game->displayKeyboard();
                echo $game->displayScore();
                var_dump($_POST);
            ?>
        
            
		</div>

	</body>
</html>




