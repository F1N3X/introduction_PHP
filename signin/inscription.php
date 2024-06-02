<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="signin/proccess.php" method="POST" style="display : flex; flex-direction : column;">

    <label for="infos">Entrez vos informations :</label>

    <br>
        <label for="name">Prénom</label>

        <input type="text" name="name">

<br>

        <label for="pseudo">Pseudo</label>

        <input type="text" name="pseudo">

<br>

        <label for="mail">Adresse mail</label>

        <input type="text" name="mail">

        <br>

        <label for="password">Mot de passe</label>

        <input type="password" name="password">

<br>

        <label for="profile_picture">Lien d'une photo de profile</label>

        <input type="text" name="profile_picture">

<br>

        <input type="submit" value="Envoyer">

    </form>

</body>
</html>