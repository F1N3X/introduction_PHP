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
        $id = $_GET['id']
    ?>

    <form action="search/proccess.php?id=<?php echo $id?>" method="POST">

        <label for="recherche">Recherche :</label>

        <input type="text" name="recherche" placeholder="Search">

        <input type="submit" value="Rechercher">

    </form>

</body>
</html>