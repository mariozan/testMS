<?php

Class Movie{
    
    private $Title;
    private $Year;
    private $imdbID;
    private $Poster;

    public function __construct($Title, $Year, $imdbID, $Poster)
    {
        $this->Title = $Title;
        $this->Year = $Year;
        $this->imdbID = $imdbID;
        $this->Poster = $Poster;
    }

    protected function getTitle()
    {
        return $this->Title;
    }

    protected function setTitle($Title)
    {
        $this->Title = $Title;
    }

    protected function getYear()
    {
        return $this->Year;
    }

    protected function setYear($Year)
    {
        $this->Year = $Year;
    }

    protected function getImdbID()
    {
        return $this->imdbID;
    }

    protected function setImdbID($imdbID)
    {
        $this->imdbID = $imdbID;
    }

    protected function getPoster()
    {
        return $this->Poster;
    }

    protected function setPoster($Poster)
    {
        $this->Poster = $Poster;
    }
}