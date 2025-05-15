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

  <h2>Inscription</h2>
  <form action="registerPost.php" method="POST" enctype="multipart/form-data">
      <label for="name">Prenom :</label>
      <input type="text" name="name" required><br><br>
      <label for="surname">Nom de famille :</label>
      <input type="text" name="surname" required><br><br>
      <label for="pseudo">Pseudo :</label>
      <input type="text" name="pseudo" required><br><br>
      <label for="email">Adresse email :</label>
      <input type="email" name="email" required><br><br>
      <label for="password">Mot de passe :</label>
      <input type="password" name="password" required><br><br>
    

      <label for="adress">Adresse :</label>
      <input type="text" name="adress" ><br><br>
      <label for="telephone">Telephone :</label>
      <input type="text" name="telephone" ><br><br>
      <label for="passanger">Statut :</label>
      <input type="text" name="status" placeholder="Conducteur ou passager"><br><br>

      <input type="submit" value="S’inscrire">
  </form>

</main>
    
</body>
</html>

<?php
include('components( header,...)\footer.html');

?>