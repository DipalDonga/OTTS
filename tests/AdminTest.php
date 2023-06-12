<?php

require_once 'src/admin.php';

use PHPUnit\Framework\TestCase;

class AdminTest extends TestCase
{
    public function testGetUsername()
    {
        $admin = new Admin('admin123', 'password123');
        $this->assertEquals('admin123', $admin->getUsername());
    }

    public function testGetPassword()
    {
        $admin = new Admin('admin123', 'password123');
        $this->assertEquals('password123', $admin->getPassword());
    }

    public function testAuthenticateWithCorrectCredentials()
    {
        $admin = new Admin('admin123', 'password123');
        $this->assertTrue($admin->authenticate('admin123', 'password123'));
    }

    public function testAuthenticateWithIncorrectCredentials()
    {
        $admin = new Admin('admin123', 'password123');
        $this->assertFalse($admin->authenticate('admin456', 'wrongpassword'));
    }
}
