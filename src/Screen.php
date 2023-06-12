<?php

class Screen
{
    private $screenNumber;
    private $capacity;

    public function __construct($screenNumber, $capacity)
    {
        $this->screenNumber = $screenNumber;
        $this->capacity = $capacity;
    }

    public function getScreenNumber()
    {
        return $this->screenNumber;
    }

    public function getCapacity()
    {
        return $this->capacity;
    }
}
?>
