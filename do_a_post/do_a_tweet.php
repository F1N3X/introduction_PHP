<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $id = $_GET['id'];
    ?>
    <form action="do_a_post/proccess.php?id=<?php echo $id ?>" method="POST">

        <label for="post">Créez votre post :</label>

        <input type="text" name="content">

        <input type="submit" value="Envoyer">

    </form>

</body>
</html>