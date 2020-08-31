<?php

class Game 
{

    private $phrase;
    private $lives = 5;

    public function __construct(Phrase $phrase){
        $this->phrase = $phrase;
    }

    
}