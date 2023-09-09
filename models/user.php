<?php

class user {
    private int $id;
    private string $username;
    private string $pass ; 
    private string $roles ;

    public function __construct(string $username,string $pass,string $roles) {
        $this->username=$username;
        $this->pass=$pass;
        $this->roles=$roles;
    }

   

    
    public function getId() {
        return $this->id;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername(string $username) {
        $this->username = $username;
    }

    public function getPass()  {
        return $this->pass;
    }

    public function setPass(string $pass) {
        $this->pass = $pass;
    }

    public function getRoles() {
        return $this->roles;
    }

    public function setRoles(string $roles) {
        $this->roles = $roles;
    }
}
?>
