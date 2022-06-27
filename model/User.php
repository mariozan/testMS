<?php

Class User{

    private $username;
    private $email;
    private $phone;
    private $password;

    public function __construct($username, $email, $phone, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
    }

    protected function getUsername()
    {
        return $this->username;
    }

    protected function setUsername($username)
    {
        $this->username = $username;
    }

    protected function getEmail()
    {
        return $this->email;
    }

    protected function setEmail($email)
    {
        $this->email = $email;
    }

    protected function getPhone()
    {
        return $this->phone;
    }

    protected function setPhone($phone)
    {
        $this->phone = $phone;
    }

    protected function getPassword()
    {
        return $this->password;
    }

    protected function setPassword($password)
    {
        $this->password = $password;
    }
}