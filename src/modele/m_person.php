<?php
class Person {
    private $_pseudo;
    private $_mdp;
    private $_role;
        
    public function __construct($pseudo, $mdp, $role)
  {
    $this->setPseudo($pseudo);
    $this->setMdp($mdp);
    $this->setRole($role);
  }
    
    function setPseudo($pseudo) {
        $this->_pseudo = $pseudo;
    }
    
    function setMdp($mdp) {
        $this->_mdp = $mdp;
    }
    
    function setRole($role) {
        $this->_role = $role;
    }
    
    function getPseudo() {
        return $this->_pseudo;
    }
    
    function getMdp() {
        return $this->_mdp;
    }
    
    function getRole() {
        return $this->_role;
    }
    
}