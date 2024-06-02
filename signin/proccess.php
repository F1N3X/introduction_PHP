<?php

    require_once '../connexion.php';

    if($_POST['name'] != '' && $_POST['pseudo'] != '' && $_POST['mail'] != '' && $_POST['password'] != '' && $_POST['profile_picture'] != ''){
        $data = [
            'name' => $_POST['name'],
            'pseudo' => $_POST['pseudo'],
            'mail' => $_POST['mail'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'profile_picture' => $_POST['profile_picture']
        ];

        $requete = $database->prepare('INSERT INTO users (name, pseudo, mail, password, picture) VALUES (:name, :pseudo, :mail, :password, :profile_picture)');
        $requete->execute($data);

        $recherche = $database->prepare('SELECT * FROM users ORDER BY id DESC');
        $recherche->execute();

        $result = $recherche->fetchAll(PDO::FETCH_ASSOC); //le résultat est stocké en format tableau avec un clé et une valeur

        if($requete) {
            //redirection vers la page principale après l'insertion en base de donnée
            header('Location: ../index.php?id='.$result[0]['id']);
            //var_dump($result);
        } else {
            echo 'Une erreur est survenue';
        }

    } else {
        echo 'Veuillez remplir le champ';
    }

?>