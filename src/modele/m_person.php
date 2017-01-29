<?php
/*
* Vérifie la connexion
*/
function connexion($pseudo,$mdp) {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');
    $req = $bdd->prepare("SELECT personne_pseudo, role_id FROM personne WHERE personne_pseudo = :pseudo AND personne_mdp = :mdp");
    $req->execute (array('pseudo'=>$pseudo, 'mdp'=>$mdp));
    $user = $req->fetch();
    return $user;
}

function inscription ($pseudo,$mdp,$mail){
    $res = false; //user pas encore crée

    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');
    $req1 = $bdd->prepare ("SELECT personne_mail FROM personne WHERE personne_mail =:mail");
    $req1->execute(array('mail'=>$mail));
    $user = $req1->fetch();

    if ($user) {
        $res = true; //user existe déjà
    }
    else {
        $req2 = $bdd->prepare("INSERT INTO personne (personne_pseudo,personne_mdp,personne_mail,role_id) VALUES (:pseudo,:mdp,:mail,2)"); 
        $req2->execute (array('pseudo'=>$pseudo, 'mdp'=>$mdp, 'mail'=>$mail));
    }
    return $res;
}

function getPersonneByPseudo($pseudo) {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');
    $req = $bdd->prepare ("SELECT personne_id FROM personne WHERE personne_pseudo =:pseudo");
    $req->execute(array('pseudo'=>$pseudo));
    $res = $req->fetch();
    return $res;
}

function getRole ($pseudo){
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');
    $req = $bdd->prepare ("SELECT role_id FROM personne WHERE personne_pseudo =:pseudo");
    $req->execute(array('pseudo'=>$pseudo));
    $role = $req->fetch();
    return $role;
}

function setRoleBan($pseudo) {

    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');
    $req = $bdd->prepare("UPDATE personne SET role_id = 0 WHERE personne_pseudo =:pseudo");
    $req->execute (array('pseudo'=>$pseudo));
    $role = $req->fetch();
    return $role;
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