<?php

class Seat
{
    private $seatNumber;
    private $isReserved;

    public function __construct($seatNumber)
    {
        $this->seatNumber = $seatNumber;
        $this->isReserved = false;
    }

    public function reserve()
    {
        $this->isReserved = true;
    }

    public function unreserve()
    {
        $this->isReserved = false;
    }

    public function isReserved()
    {
        return $this->isReserved;
    }

    public function getSeatNumber()
    {
        return $this->seatNumber;
    }
}
