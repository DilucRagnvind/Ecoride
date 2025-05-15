<?php
include('components( header,...)\header.html');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>EcorRide - Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <form action="loginPost.php" method="POST">
        <!-- EMAIL -->
        <label for="email">Adresse email :</label>
        <input type="email" name="email" required /> <br><br>

        <!-- PASSWORD -->
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" required /> <br><br>

        <!-- BUTTON -->
        <input type="submit" value="Se connecter"/>
    </form>
</body>
</html>
<?php
include('components( header,...)\footer.html');

?>