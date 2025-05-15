
<?php
include('components( header,...)\header.html');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>EcorRide - Covoiturages</title>
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

  
    $startingLocationForm = $_POST['startingLocation'];
    $startDateForm = $_POST['startDate'];
    $timeStartForm = $_POST['timeStart'];
    
    $endingLocationForm = $_POST['endingLocation'];
    $endDateForm = $_POST['endDate'];
    $timeEndForm = $_POST['timeEnd'];


//afficher les voyages
    $query = "SELECT * FROM trips WHERE startingLocation = :startingLocation 
    and endingLocation = :endingLocation 
    and startDate = :startDate
    and endDate = :endDate";


    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':startingLocation', $startingLocationForm);
    $stmt->bindParam(':endingLocation', $endingLocationForm);
    $stmt->bindParam(':startDate', $startDateForm);
    $stmt->bindParam(':endDate', $endDateForm);
    $stmt->execute();

    
    
    if($stmt->rowCount() != 0){
        $trips = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($trips as $trip){
            
           
           /* $detailsQuery = "SELECT * FROM users WHERE userId = $driverId";
    $stmt = $pdo->prepare($query);
    $stmt->execute(); */
        echo
         "Départ : " . $trip['startingLocation'] ."<br>". 
         "Jour du départ : " . $trip['startDate'] . "<br>". 
         "Heure du départ : " . $trip['timeStart'] ."<br><br>". 
         "Arrivée : " . $trip['endingLocation'] ."<br>". 
         "Jour de l'arrivée : " . $trip['endDate'] . "<br>". 
         "Heure de l'arrivée : " . $trip['timeEnd'] . "<br><br>" . "<hr>";
          
         /* "<div id='detailsdiv'>
          Conducteur : " . $trip['idDriver'] . "
          </div> " . "<br><br>"
         . "<button id='detailsbtn' > Details </button>". "<br><br><br>";
          $driverId = $trip['idDriver']; */
        }
    }
    else{
        echo 'Aucun covoiturage disponible...';}
    
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