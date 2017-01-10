<?php

function getSujets() {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');
    $sujets = $bdd->query('select * from sujet order by sujet_id desc');
    return $sujets;
}

/**function getPosts($id) {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');
    $sujets = $bdd->query('select * from post where sujet_id='$id' order by date desc');
    return $sujets;
}**/