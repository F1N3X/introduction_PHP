<?php

    require_once '../connexion.php';

    $data = [
        'id' => $_GET['id']
    ];

    $requete = $database->prepare('DELETE FROM tweets WHERE id = :id');

    $requete->execute($data);

    header('Location: ../index.php?id='.$_GET['id']);

?>