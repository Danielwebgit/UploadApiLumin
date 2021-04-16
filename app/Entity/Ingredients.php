<?php

namespace App\Entity;

class Ingredients
{
    protected $title;
    protected $best_before;
    protected $useByDate;

    public function __construct($title, $best_before, $useByDate)
    {
        $this->title=$title;
        $this->best_before=$best_before;
        $this->useByDate=$useByDate;
    }


    public function getName(){
        return $this->title;
    }

}
