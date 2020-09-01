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

        foreach($characters as $letter){
            return $letter."<br>";
        }


    }

}