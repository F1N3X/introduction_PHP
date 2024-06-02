<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>

<?php

require_once '../connexion.php';

$id = $_GET['id'];

if($_POST['recherche'] != ""){
    $data = [
        'recherche' => $_POST['recherche']
    ];

    $requete = $database->prepare("SELECT * FROM tweets WHERE content LIKE CONCAT('%', :recherche, '%') ORDER BY date DESC");
    $requete->execute($data);

    $articles = $requete->fetchAll(PDO::FETCH_ASSOC);

    $link = $database->prepare('SELECT * FROM tweets INNER JOIN users ON tweets.user_id = users.id');
    $link->execute();

    $linked_table = $link->fetchAll(PDO::FETCH_ASSOC); //le résultat est stocké en format tableau avec un clé et une valeur
    
    foreach($articles as $article){
        
        foreach($linked_table as $ligne_table) {
            if($ligne_table['id'] == $article['user_id']) {
                $pseudo = $ligne_table['pseudo'];
                $image = $ligne_table['picture'];
            }
        }?>

        <div class="post">
            <div class="user_info">
                <div>
                    <?php echo $pseudo; ?>
                </div>

                    <?php
                    if($_GET['id'] == $article['user_id']){
                    ?><a href="delet/supprimer.php?id=<?php echo $article['id'] ?>">Supprimer</a><?php
                    }?>
                <div>

                </div>
            </div>
            
            <div class="personal_post">
                <div class="img"><img src=<?php echo $image; ?> alt="image temporaire"></div>

                <div class="text">
                
                    <div class="content_post"><?php echo $article['content'];?></div>
                    
                    <div class="date_post"><?php echo $article['date'];?></div>
                    <a href=""></a>
                
                </div>
            </div>

        </div>
    <?php
    }
} else {
    echo 'Veuillez remplir le champ de recherche';
}

?>
    
</body>
</html>