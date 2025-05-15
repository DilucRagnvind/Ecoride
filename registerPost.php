<?php
include('components( header,...)\header.html');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>EcorRide - Inscription</title>
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

    //Récupérer les données du formulaire d’inscription 
    $nameForm = $_POST['name'];
    $surnameForm = $_POST['surname'];
    $pseudoForm = $_POST['pseudo'];
    $emailForm = $_POST['email'];
    $passwordForm = $_POST['password'];
    $telephoneForm = $_POST['telephone'];
    $adressForm = $_POST['adress'];
    $statusForm = $_POST['status'];

    
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $emailForm);
    $stmt->execute();

    if($stmt->rowCount() > 0){
        die("Cette adresse email est déjà utilisée");
    }

    // Hashage(encryptage)
    $hashedPassword = password_hash($passwordForm, PASSWORD_DEFAULT);

    //Insérer les données dans la base 
    $insertQuery = "INSERT INTO users (pseudo, name, surname, email, password, telephone, adress, status)
     VALUES (:pseudo, :name, :surname, :email, :password, :telephone, :adress, :status)";
    $stmt = $pdo->prepare($insertQuery);
    $stmt->bindParam(':pseudo', $pseudoForm);
    $stmt->bindParam(':name', $nameForm);
    $stmt->bindParam(':surname', $surnameForm);
    $stmt->bindParam(':email', $emailForm);
    $stmt->bindParam(':password', $hashedPassword);

    $stmt->bindParam(':telephone', $telephoneForm);
    $stmt->bindParam(':adress', $adressForm);
    $stmt->bindParam(':status', $statusForm);
    $stmt->execute();

    echo "Inscription réussie";
    header('location: driverSpace.php');

}
catch (PDOException $e){
    echo "Erreur lors de l’inscription : ". $e->getMessage();
}

?>

</main>
    
</html>
<?php
include('components( header,...)\footer.html');
?>
