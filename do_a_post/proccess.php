<?php

    require_once '../connexion.php';

    if($_POST['content'] != ''){
        $data = [
            'content' => $_POST['content'],
            'date' => date('Y-m-d H:i:s'),
            'id' => $_GET['id']
        ];

        $requete = $database->prepare('INSERT INTO tweets (content, date, user_id) VALUES (:content, :date, :id)');
        $requete->execute($data);

        if($requete) {
            //redirection vers la page principale après l'insertion en base de donnée
            header('Location: ../index.php?id='.$data['id']);
        } else {
            echo 'Une erreur est survenue';
        }

    } else {
        echo 'Veuillez remplir le champ';
    }

    

?>