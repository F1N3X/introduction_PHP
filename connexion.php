<?php

    try{

    $database = new PDO('mysql:host=localhost;dbname=twitter', 'root', '');

    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

?>