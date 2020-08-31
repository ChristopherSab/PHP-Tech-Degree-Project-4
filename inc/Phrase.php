<?php

class Phrase 
{
    private $currentPhrase;
    private $selected = [];

    function __constructor($phrase = null, $selected = null)
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

}