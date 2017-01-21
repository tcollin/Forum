<?php

function addSujet($titre, $idCategorie) {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');
    $req = $bdd->prepare('INSERT INTO sujet (sujet_titre, sujet_rang, categorie_id) VALUES (:titre, 2, :idCategorie)');
    $req->execute (array('titre'=>$titre, 'idCategorie'=>$idCategorie));
}

function getSujets() {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');
    $res = $bdd->query('SELECT * FROM sujet INNER JOIN categorie ON sujet.categorie_id=categorie.categorie_id ORDER BY sujet_id DESC');
    return $res;
}

function getSujetByTitle($titre) {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');
    $req = $bdd->prepare('SELECT * FROM sujet WHERE sujet.sujet_titre = :titre');
    $req->execute (array('titre'=>$titre));
    $res = $req->fetchAll();
    return $res;
}

function getSujetsByCategories($id) {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');
    $req = $bdd->prepare('SELECT * FROM sujet INNER JOIN categorie ON sujet.categorie_id=categorie.categorie_id WHERE sujet.categorie_id = :id ORDER BY sujet_id DESC');
    $req->execute (array('id'=>$id));
    $res = $req->fetchAll();
    return $res;
}


function getCategories() {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');
    $res = $bdd->query('SELECT * FROM categorie');
    return $res;
}

function getPosts($id) {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');
    $req = $bdd->prepare('SELECT * FROM post INNER JOIN personne ON personne.personne_id=post.personne_id INNER JOIN sujet ON sujet.sujet_id=post.sujet_id WHERE post.sujet_id = :id ORDER BY post_date');
    $req->execute (array('id'=>$id));
    $res = $req->fetchAll();
    return $res;
}

function addPost($idPersonne, $idSujet, $content) {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');
    $req = $bdd->prepare('INSERT INTO post VALUES (:idSujet, NOW(), :idPersonne, :content)');
    $req->execute (array('idSujet'=>$idSujet, 'idPersonne'=>$idPersonne, 'content'=>$content));
}