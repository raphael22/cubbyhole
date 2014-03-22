<?php
    
class User
{
    private $email, $mdp, $role;

    public function getEmail(){return $this->email;}
    public function getMdp(){return $this->mdp;}
    public function getRole(){return $this->role;}

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