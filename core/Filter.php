<?php

namespace core;

class Filter
{
    private $username;
    private $role;

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function setData($username, $role)
    {
        $this->username = $username;
        $this->role = $role;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getAccess($role)
    {
        if(!isset($this->role) || $this->role != $role) return false;
        else return true;
    }

    public function isGuest()
    {
        if(!isset($this->role)) return true;
        else return false;
    }
}