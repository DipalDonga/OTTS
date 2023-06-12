<?php

require_once 'src/Movie.php';

use PHPUnit\Framework\TestCase;

class MovieTest extends TestCase
{
    public function testGetTitle()
    {
        $movie = new Movie("The Shawshank Redemption", 142, "Drama");
        $this->assertEquals("The Shawshank Redemption", $movie->getTitle());
    }

    public function testGetDuration()
    {
        $movie = new Movie("The Shawshank Redemption", 142, "Drama");
        $this->assertEquals(142, $movie->getDuration());
    }

    public function testGetGenre()
    {
        $movie = new Movie("The Shawshank Redemption", 142, "Drama");
        $this->assertEquals("Drama", $movie->getGenre());
    }
}
?>
