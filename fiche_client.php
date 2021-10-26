<?php 
 $bdd = new PDO("mysql:host=mysql-nagrom.alwaysdata.net;dbname=nagrom_boulangerie","nagrom","Morgan.levetti13");
// $bdd = new PDO("mysql:host=localhost;dbname=boulangerie","root","");
$_SESSION['autoriser'] = "oui";

//  I select name, first name and email from my database
$insert = $bdd->prepare("SELECT * FROM clients ORDER BY nom "); 
$insert->execute();
// I get the results
 $infos = $insert->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/fiche_client.css">
    <title>Fiche client</title>
</head>
<body>
<button> <a href="./home.php">Retour</a></button><br><br><br>
    <?php foreach ($infos as $info): ?>
    <table>
		<thead>
            
            <strong> Nom : </strong><?= $info['nom']?><br><br>

            <strong> Prénom : </strong><?=$info['prenom'] ?> <br><br>
            
            <strong> Adresse : </strong> <?= $info['adresse']?><br><br>

            <strong>  Commande : </strong> <?=$info['description_commande'] ?> <br><br>
            
            <strong>  Téléphone : </strong><?=$info['num'] ?> <br>
        
		</thead>
        
	</table><br><br>

         <a href="delete.php?id=<?= $info['id'] ?>">Supprimer</a><br><br>
         <a href="update.php?id=<?= $info['id'] ?>">Modifier</a><br><br><br>
         <hr>

    <?php endforeach; ?>  
 
         
    
</body>
</html>