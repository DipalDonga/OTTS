<?php

require_once 'src/seat.php';

use PHPUnit\Framework\TestCase;

class SeatTest extends TestCase
{
    public function testSeatReservation()
    {
        $seat = new Seat('A1');
        $this->assertFalse($seat->isReserved());

        $seat->reserve();
        $this->assertTrue($seat->isReserved());
    }

    public function testSeatUnreservation()
    {
        $seat = new Seat('B2');
        $seat->reserve();
        $this->assertTrue($seat->isReserved());

        $seat->unreserve();
        $this->assertFalse($seat->isReserved());
    }

    public function testGetSeatNumber()
    {
        $seat = new Seat('C3');
        $this->assertEquals('C3', $seat->getSeatNumber());
    }
}
