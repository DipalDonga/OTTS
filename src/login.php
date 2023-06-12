<?php

class login
{
    private $username;
    private $password;
    
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }
    
    public function authenticate()
    {
        if ($this->username == 'admin' && $this->password == 'password') {
            return true;
        } else {
            return false;
        }
    }
}

