<?php

require 'inc/Game.php';
require 'inc/Phrase.php';

session_start();


if (isset($_POST['start'])) {
    unset($_SESSION['selected']);
    unset($_SESSION['phrase']);
  }


if (!isset($_SESSION["selected"])) {

    $_SESSION["selected"] = [];
    
}

if($_SERVER['REQUEST_METHOD']== 'POST'){

    if(isset($_POST["key"])){

    array_push($_SESSION['selected'], $_POST["key"]);

    $phrase = new Phrase($_SESSION['phrase'], $_SESSION['selected']);

    }  
    
 }


 if(!isset($_SESSION['phrase'])){

    $phrase = new Phrase();
}

$game = new Game($phrase);

$_SESSION['phrase'] = $phrase->currentPhrase;


var_dump($game->checkForLose());





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
            ?>
            
		</div>

	</body>
</html>




