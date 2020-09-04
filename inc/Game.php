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


        $html = '<form action="play.php" method="POST">';
        $html.= '<input class="text" type=text id=key name=key  value="" hidden/>';
        $html.= '<div id="qwerty" class="section">';

        //FIRST Row Keyboard Letters//
        $html.= '<div class="keyrow">';

        foreach($firstRow as $letter){

            $html.= '<button class="key" value='.$letter.'>'.$letter.'</button>';
        }

        $html.= '</div>';

        //SECOND Row Keyboard Letters//
        $html.= '<div class="keyrow">';

        foreach($secondRow as $letter){

            $html.= '<button class="key" value='.$letter.'>'.$letter.'</button>';
        }

        $html.= '</div>';

        //THIRD Row Keyboard Letters//
        $html.= '<div class="keyrow">';

        foreach($thirdRow as $letter){

            $html.= '<button class="key" value='.$letter.'>'.$letter.'</button>';
        }

        $html.= '</div>';

        $html.= '</div>';

        $html.= '</form>';

        return $html;
         
    }

    
}