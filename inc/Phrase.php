<?php


class Phrase 
{
    public $currentPhrase;
    public $selected = [];

    function __construct($phrase = null, $selected = null)
    {
        if(!empty($phrase)){
            $this->currentPhrase = $phrase;
        }else{
            $this->currentPhrase = 'Dream Big';
        }

        if(!empty($selected)){
            $this->selected = $selected;
        }
    }

    function addPhraseToDisplay(){
        
        $characters = str_split(strtolower($this->currentPhrase));

        $html = '<div id="phrase" class="section">';
        $html.= '<ul>';

        foreach($characters as $char){

            if(ctype_space($char)){
                $html.= '<li class="hide space"></li>';
            }
            else{
                $html.= '<li class="hide letter '.$char.'">'.$char.'</li>';
            }
        }

        $html.= '</ul>';
        $html.= '</div>';

        return $html;

    }

    function checkLetter($letter){

        $characters = array_unique(str_split(str_replace( ' ', '', strtolower($this->currentPhrase))));

        if(in_array($letter, $characters)){

            return true;

        }else{
            
            return false;
        }

    }

}