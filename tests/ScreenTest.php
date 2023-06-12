<?php

use PHPUnit\Framework\TestCase;

require_once('src/Screen.php');

class ScreenTest extends TestCase
{
    public function testGetScreenNumber()
    {
        $screen = new Screen(1, 100);
        $this->assertEquals(1, $screen->getScreenNumber());
    }

    public function testGetCapacity()
    {
        $screen = new Screen(1, 100);
        $this->assertEquals(100, $screen->getCapacity());
    }
}
?>
