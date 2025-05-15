<?php
session_start();

include('components( header,...)\header.html');

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>EcorRide - Espace personnel</title>
</head>
<body>

<?php



$dsn = 'mysql:host=localhost;dbname=ecoride';
$username = 'user_ecoride';
$password = '$2y$12$p4hpWdhOec/2w626F1DDKOh8sZxCxssiExmxpkeEKLnaIInTbRQra';



try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $emailForm);
    $stmt->execute();

    if($stmt->rowCount() == 1){
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        echo $user['userId'];
    }else{
            echo "Erreur de connexion";
    }
    
}
catch (PDOException $e){
    echo "Erreur de connexion à la base de données : ". $e->getMessage();
}







?>

</body>
</html>

<?php
include('components( header,...)\footer.html');
?>