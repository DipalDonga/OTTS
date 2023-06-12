<?php

class Movie
{
    private $title;
    private $duration;
    private $genre;

    public function __construct($title, $duration, $genre)
    {
        $this->title = $title;
        $this->duration = $duration;
        $this->genre = $genre;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    public function getGenre()
    {
        return $this->genre;
    }
}
?>
