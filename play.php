<?php

session_start();



require 'inc/Game.php';
require 'inc/Phrase.php';

$_SESSION['phrase'] = 'start small';


if($_SERVER['REQUEST_METHOD']== 'POST'){

   $_SESSION['selected'] = $_POST['name'];
   
   //session_destroy();

}

var_dump($_SESSION);


$phrase = new Phrase();

$game = new Game($phrase);

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




