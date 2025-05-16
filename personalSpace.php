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
    <title>EcorRide - Espace personel</title>
</head>
<body>
    

espace perso

<main>
      <div class="loginDiv"><a href='login.php'><button>Se connecter</button></a> 
      <a href='register.php'><button>S'inscrire</button></a>  </div>

</main>

</body>
</html>
<?php
$dsn = 'mysql:host=localhost;dbname=ecoride';
$username = 'user_ecoride';
$password = '$2y$12$p4hpWdhOec/2w626F1DDKOh8sZxCxssiExmxpkeEKLnaIInTbRQra';

if (isset($_SESSION['email'])){
    try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $_SESSION['email']);
    $stmt->execute();

    if($stmt->rowCount() == 1){
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        switch($user['status']){
            case "passanger":
                header('location: passangerSpace.php');
                break;
            case "driver":
                header('location: driverSpace.php');
                break;
            case "employee":
                header('location: employeeSpace.php');
                break;
            default:
                echo "Connectez vous pour reserver votre prochaîn covoiturage!";
                break;
            }
    }
    else{echo "Connectez vous pour reserver votre prochaîn covoiturage!"; 
    } 
    }
catch (PDOException $e){
    echo "Erreur de connexion à la base de données : ". $e->getMessage();
}
   
}
else{echo "Connectez vous pour reserver votre prochaîn covoiturage!"; 
    }



include('components( header,...)\footer.html');
?>