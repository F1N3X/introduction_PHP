<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

    <?php

        require_once 'connexion.php';

        if(!isSet($_GET['id'])){
            require "signin/inscription.php";
            ?>
            <br>
            <br>
            <br>
            <br>
            <?php
            require "login/connection.php";
        } else{

        ?>
        <div class="menu"> 
            <div class="recherche"><?php
                require_once 'search/search.php';
            ?></div><?php

            ?><div class="tweet"><?php
                require_once 'do_a_post/do_a_tweet.php';
            ?></div><?php

            ?><div class="disconnect"><?php
                require_once 'disconnect/deco.php';
            ?></div> </div><?php

            $requete = $database->prepare('SELECT * FROM tweets ORDER BY date DESC');

            $requete->execute();

            $posts = $requete->fetchAll(PDO::FETCH_ASSOC); //le résultat est stocké en format tableau avec un clé et une valeur

            $link = $database->prepare('SELECT * FROM tweets INNER JOIN users ON tweets.user_id = users.id');
            $link->execute();

            $linked_table = $link->fetchAll(PDO::FETCH_ASSOC); //le résultat est stocké en format tableau avec un clé et une valeur

            foreach($posts as $post) {

                foreach($linked_table as $ligne_table) {
                    if($ligne_table['id'] == $post['user_id']) { //permet de trouver l'utilisateur qui correspond au post
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
                            if($_GET['id'] == $post['user_id']){ //si le post appartient à l'utilisateur connecté
                            ?><a href="delet/supprimer.php?id=<?php echo $post['id'] ?>">Supprimer</a><?php
                            }?>

                    </div>
                    
                    <div class="personal_post">
                        <div class="img"><img src=<?php echo $image; ?> alt="image temporaire"></div>

                            <div class="text">
                            
                                <div class="content_post"><?php echo $post['content'];?></div>
                                
                                <div class="date_post"><?php echo $post['date'];?></div>
                                <a href=""></a>
                            
                            </div>
                        </div>

                    </div>
                </div>

                <?php

            }
        }
    ?>

</body>
</html>
