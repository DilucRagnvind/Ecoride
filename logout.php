<?php
include('components( header,...)\header.html');
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>EcorRide - Deconnexion</title>
</head>
<body>
    <form action="logout.php" method="post">
        <input value="Deconexion" name="logout" type="submit">
    </form>
    


</body>
</html>

<?php

if(isset($_POST['logout'])){
    session_destroy();
    header('location: index.php');
}
include('components( header,...)\footer.html');
?>