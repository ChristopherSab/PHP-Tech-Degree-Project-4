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

            $html.= '<button class="key" name="key" value="'.$letter.'">'.$letter.'</button>';
        }

        $html.= '</div>';

        //SECOND Row Keyboard Letters//
        $html.= '<div class="keyrow">';

        foreach($secondRow as $letter){

            $html.= '<button class="key" name="key" value="'.$letter.'">'.$letter.'</button>';
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

        for($i=1; $i<=$this->lives; $i++){

            $html.= '<li class="tries"><img src="images/liveHeart.png" height="35px" widght="30px"></li>';
        }

        $html.= '</ol>
                </div>';

        return $html;

    }


    function letterHandler($letter){

        if(!in_array($letter, $this->phrase->selected)){

            return '<button class="key" name="key" value="'.$letter.'">'.$letter.'</button>';

        }else{

            if($this->phrase->checkLetter($letter)){

                return '<button class="key correct" name="key" value="'.$letter.'">'.$letter.'</button>';

            }else{

                return '<button class="key incorrect" name="key" value="'.$letter.'">'.$letter.'</button>';

            }

        }

    }
    
}