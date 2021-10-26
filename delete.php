<?php 
 $bdd = new PDO("mysql:host=mysql-nagrom.alwaysdata.net;dbname=nagrom_boulangerie","nagrom","Morgan.levetti13");
// $bdd = new PDO("mysql:host=localhost;dbname=boulangerie","root","");

//Tu recuperes l'id du contact
$id = $_GET["id"];
//Requete SQL pour supprimer le contact dans la base
$insert = $bdd->prepare("DELETE FROM clients WHERE id = ".$id );
$insert->execute();
//Et la tu rediriges vers ta page contacts.php pour rafraichir la liste
header('Location: fiche_client.php');
exit();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D</title>
</head>
<body>


    
</body>
</html>