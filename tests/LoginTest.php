<?php

use App\Product;
require 'src\login.php';
use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    public function testAuthentication()
    {
        $login = new login('username', 'password');
        $this->assertTrue($login->authenticate());
    }
    
    public function testAuthenticationFailure()
    {
        $login = new login('123@gmail.com', '123');
        $this->assertFalse($login->authenticate());
    }
}
?>