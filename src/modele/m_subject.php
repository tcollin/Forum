<?php

    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');

function getSujets() {
    $sujets = $bdd->query('select * from sujet order by sujet_id desc');
    return $sujets;
}