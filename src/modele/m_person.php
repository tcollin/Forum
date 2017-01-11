<?php

function connexion($pseudo,$mdp) {
	
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');
	$req = $bdd->prepare("SELECT personne_pseudo FROM personne WHERE personne_pseudo = :pseudo AND personne_mdp = :mdp");
    $req->execute (array('pseudo'=>$pseudo, 'mdp'=>$mdp));
	$user = $req->fetch();
	return $user;
}

function inscription ($mail,$pseudo,$mdp){
	$bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');
    $res = $bdd->query("INSERT INTO personne VALUES (' ','".$mail."','".$pseudo."','".$mdp.",2);");
	return $res;
}

/**class Person {
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
    
}**/