<?php
class User
{
    public $id;
    public $fullname;
    public $email;
    public $phone;
    public $password;
    public $level;


    public function __construct($id, $fullname, $email, $phoneNo, $password, $level)
    {
        $this->$id = $id;
        $this->$fullname = $fullname;
        $this->$email = $email;
        $this->$phoneNo = $phoneNo;
        $this->$password = $password;
        $this->$level = $level;
    }

    public function get_id()
    {
        return $this->id;
    }

    public function set_id($id)
    {
        $this->id = $id;
    }

    public function getFullname()
    {
        return $this->fullname;
    }

    public function setFullname($fullname)
    {
        $this->fullname = $fullname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPhone()
    {
        return $this->phone;
    }


    public function setPhone($phone)
    {
        $this->phone = $phone;
    }


    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getLevel()
    {
        return $this->level;
    }


    public function setLevel($level)
    {
        $this->level = $level;
    }
}
