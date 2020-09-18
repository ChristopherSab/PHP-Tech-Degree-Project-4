<?php

class Game
{

    private $phrase;
    private $lives = 5;

    public function __construct(Phrase $phrase){
        $this->phrase = $phrase;
    }


    function displayKeyboard(){

        $firstRow = ['q', 'w', 'e','r','t','y','u','i','o','p'];
        $secondRow = ['a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l'];
        $thirdRow = ['z', 'x', 'c', 'v', 'b', 'n', 'm'];

        //HTML Form Begins here   
        $html = '<form action="play.php" method="POST">';
        $html.= '<input class="text" type=text id=key name="key" value="" hidden/>';
        $html.= '<div id="qwerty" class="section">';

        //FIRST Row Keyboard Letters//
        $html.= '<div class="keyrow">';

        foreach($firstRow as $letter){

            //$html.= '<button class="key" name="key" value="'.$letter.'">'.$letter.'</button>';
            $html.= $this->letterHandler($letter);
        }

        $html.= '</div>';

        //SECOND Row Keyboard Letters//
        $html.= '<div class="keyrow">';

        foreach($secondRow as $letter){

            //$html.= '<button class="key" name="key" value="'.$letter.'">'.$letter.'</button>';
            $html.= $this->letterHandler($letter);
        }

        $html.= '</div>';

        //THIRD Row Keyboard Letters//
        $html.= '<div class="keyrow">';

        foreach($thirdRow as $letter){

            //$html.= '<button class="key" name="key" value="'.$letter.'">'.$letter.'</button>';

            $html.= $this->letterHandler($letter);
        }

        $html.= '</div>';

        $html.= '</div>';

        $html.= '</form>';

        return $html;
         
    }

    function displayScore(){

        $html = '<div id="scoreboard" class="section">
                <ol>';

        for($i=1; $i<=$this->livesLeft(); $i++){

            $html.= '<li class="tries"><img src="images/liveHeart.png" height="35px" widght="30px"></li>';
        }

        $html.= '</ol>
                </div>';

        return $html;

    }


    function letterHandler($letter){


        if(!in_array($letter, $this->phrase->selected)){

            return '<button class="key" type="submit" name="key" value="'.$letter.'">'.$letter.'</button>';

        }else{

            if($this->phrase->checkLetter($letter)){

                return '<button disabled class="key correct" type="submit" name="key" value="'.$letter.'">'.$letter.'</button>';

            }else{

                return '<button disabled class="key incorrect" type="submit" name="key" value="'.$letter.'">'.$letter.'</button>';

            }

        }

    }

    function wrongGuesses(){

        $result = array_diff($this->phrase->selected, $this->phrase->uniqueLetterArray());
        return count($result);

    }

 

    function livesLeft(){

        return $this->lives - $this->wrongGuesses();

    }


    function checkForLose(){

        return $this->livesLeft() < 1;

    }

    function gameOver(){

        if($this->checkForLose()){
   
            $html = '<h1 id="game-over-message">The phrase was: "'.$this->phrase->currentPhrase.'". Better luck next time!</h1>';
            $html.= '<script> document.body.style.backgroundColor = "#f5785f"; </script>';


            return $html;

        }elseif($this->checkForWin()){

            $html = '<h1 id="game-over-message">Congratulations on guessing: "'.$this->phrase->currentPhrase.'"</h1>';
            $html.= '<script> document.body.style.backgroundColor = "#78CF82"; </script>';

            return $html;
        }
        
        else {
            return false;
        }
    }

    function checkForWin(){

        $matches = array_intersect($this->phrase->selected, $this->phrase->uniqueLetterArray());

        if(count($matches) == count($this->phrase->uniqueLetterArray())){
            return true;
        }else{
            return false;
        }
    
    }

    function restartGame(){

        $html = '<form action="play.php" method="post">';
        $html.= '<input  id="btn__reset" type="submit" name="start" value="Play Again" />';
        $html.= '</form>';

        return $html;
    }
    
}