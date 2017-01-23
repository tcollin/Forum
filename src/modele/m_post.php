<?php
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


