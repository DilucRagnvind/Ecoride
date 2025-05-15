
<?php
include('components( header,...)\header.html');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>EcorRide - espace personnel</title>
</head>
<body>


<main>
      
<?php
$dsn = 'mysql:host=localhost;dbname=ecoride';
$username = 'user_ecoride';
$password = '$2y$12$p4hpWdhOec/2w626F1DDKOh8sZxCxssiExmxpkeEKLnaIInTbRQra';

try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// selection des avis en cours de validation (=1) 
    $query = "SELECT * FROM reviews WHERE validationstatus = 1 ";


    $stmt = $pdo->prepare($query);
    $stmt->execute();

    if($stmt->rowCount() != 0){
        $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($reviews as $review){
        echo
         "<div class='formDiv1'> Id : " . $review['reviewId'] ."<br>". 
         "Id utilisateur : " . $review['idUser'] . "<br>". 
         "Id du voyage : " . $review['idTrip'] ."<br><br>". 
         "commentaire : " . $review['comment'] ."<br>". 
        " <form action='personalSpace.php' method='post'>
        <input class='btn' value='Valider' name='validate' type='submit'>
        </form>" ."</div>" . "<br><br><br>";
    //changer le statut a "avis validé" (=0)
        if(isset($_post['validate'])){
            $updateQuery= "UPDATE 'reviews' SET 'validationStatus' = '0' WHERE 'reviews'.'reviewId' = 1";
            $stmt = $pdo->prepare($updateQuery);
            $stmt->execute();
            echo 'hello';
        }
    
    }
        
    }
    else{
        echo 'Pas d\'avis en attente de validation!';}
}


catch (PDOException $e){
    echo "Erreur de connexion à la base de données : ". $e->getMessage();
}
?>

</main>
    
</body>
</html>
<?php
include('components( header,...)\footer.html');

?>