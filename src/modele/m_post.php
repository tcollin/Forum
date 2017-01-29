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

function deletePost($datePost ,$idSujet) {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');
    $req = $bdd->prepare('DELETE FROM post WHERE post_date = :datePost AND sujet_id = :idSujet');
    $req->execute (array('datePost'=>$datePost, 'idSujet'=>$idSujet));
}

function updatePost($datePost, $idSujet, $content) {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');
    $req = $bdd->prepare('UPDATE post SET post_texte = :content WHERE post_date = :datePost AND sujet_id = :idSujet');
    $req->execute (array('content'=>$content ,'datePost'=>$datePost, 'idSujet'=>$idSujet));
}
