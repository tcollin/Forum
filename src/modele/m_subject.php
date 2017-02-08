<?php

function addSujet($titre, $idCategorie) {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');
    $req = $bdd->prepare('INSERT INTO sujet (sujet_titre, rang_id, categorie_id, statut_id) VALUES (:titre, 2, :idCategorie, 0)');
    $req->execute (array('titre'=>$titre, 'idCategorie'=>$idCategorie));
}

function addCategorie($categorie) {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');
    $req = $bdd->prepare('INSERT INTO categorie (categorie_nom) VALUES (:cat)');
    $req->execute (array('cat'=>$categorie));
}

function deleteSujet($idSujet) {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');
    $req = $bdd->prepare('DELETE FROM post WHERE sujet_id = :idsujet');
    $req->execute (array('idsujet'=>$idSujet));
    $req = $bdd->prepare('DELETE FROM sujet WHERE sujet_id = :idsujet');
    $req->execute (array('idsujet'=>$idSujet));
}

function resolveSujet($idSujet) {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');
    $req = $bdd->prepare('UPDATE sujet SET statut_id = :idStatut WHERE sujet_id = :idSujet');
    $req->execute (array('idStatut'=> '2', 'idSujet'=>$idSujet));
}

function unresolveSujet($idSujet) {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');
    $req = $bdd->prepare('UPDATE sujet SET statut_id = :idStatut WHERE sujet_id = :idSujet');
    $req->execute (array('idStatut'=> '0', 'idSujet'=>$idSujet));
}

function getSujets() {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');
    $res = $bdd->query('SELECT * FROM sujet INNER JOIN categorie ON sujet.categorie_id=categorie.categorie_id INNER JOIN statut ON statut.statut_id=sujet.statut_id ORDER BY sujet_id DESC');
    return $res;
}

function getSujetById($id) {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');
    $req = $bdd->prepare('SELECT * FROM sujet WHERE sujet_id = :id');
    $req->execute (array('id'=>$id));
    $res = $req->fetchAll();
    return $res;
}

function getSujetByTitle($titre) {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');
    $req = $bdd->prepare('SELECT * FROM sujet WHERE sujet_titre = :titre');
    $req->execute (array('titre'=>$titre));
    $res = $req->fetchAll();
    return $res;
}

function getSujetsByCategories($id) {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');
    $req = $bdd->prepare('SELECT * FROM sujet INNER JOIN statut ON statut.statut_id=sujet.statut_id INNER JOIN categorie ON sujet.categorie_id=categorie.categorie_id WHERE sujet.categorie_id = :id ORDER BY sujet_id DESC');
    $req->execute (array('id'=>$id));
    $res = $req->fetchAll();
    return $res;
}


function getCategories() {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');
    $res = $bdd->query('SELECT * FROM categorie');
    return $res;
}
