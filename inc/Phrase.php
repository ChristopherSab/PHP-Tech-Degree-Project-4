<?php


class Phrase 
{
    public $currentPhrase;
    public $selected = [];

    public $phrases = [
        "Love Is Blind",
        "Brave As A Lion",
        "Opposites Attract",
        "Jack Of All Trades",
        "Time Flies",
        "Only Time Will Tell",
        "Add Insult To Injury",
        "Against All Odds",
        "Benefit Of The Doubt",
        "Beat Around The Bush",
        "Better Late Than Never",
        "Bend Over Backwards",
        "Can Of Worms",
        "Come Hell Or High Water",
        "Dog Eat Dog",
        "Eye For An Eye",
        "If The Shoe Fits"
    ];

    function __construct($phrase = null, $selected = [])
    {
        if(!empty($phrase)){
            $this->currentPhrase = $phrase;
        }else{

            $index = array_rand($this->phrases);
            $this->currentPhrase = $this->phrases[$index];
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
                if(in_array($char, $this->selected)){

                    $html.= '<li class="show letter '.$char.'">'.$char.'</li>';

                }else{
                    $html.= '<li class="hide letter '.$char.'">'.$char.'</li>';
                }
            }
        }

        $html.= '</ul>';
        $html.= '</div>';

        return $html;

    }
    

    function checkLetter($letter){

        return in_array($letter, $this->uniqueLetterArray());
    }


    //This function returns an Array of non-duplicate letters from the Current Hidden Phrase
    function uniqueLetterArray(){
  
        return array_unique(str_split(str_replace( ' ', '', strtolower($this->currentPhrase))));
    }

}