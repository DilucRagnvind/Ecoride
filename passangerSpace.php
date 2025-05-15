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
echo "Bonjour" . $_SESSION['username'];
?>

</body>
</html>

<?php
include('components( header,...)\footer.html');
?>