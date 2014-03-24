<?php
    
class User
{
    private $name,$email, $mdp, $role;

    public function getName(){return $this->name;}
    public function getEmail(){return $this->email;}
    public function getMdp(){return $this->mdp;}
    public function getRole(){return $this->role;}

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setMdp($mdp) {
        $this->mdp = $mdp;
    }

    public function setRole($role) {
        $this->role = $role;
    }
}