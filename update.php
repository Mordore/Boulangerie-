<?php  
//  $bdd = new PDO("mysql:host=mysql-nagrom.alwaysdata.net;dbname=nagrom_boulangerie","nagrom","Morgan.levetti13");
 $bdd = new PDO("mysql:host=localhost;dbname=boulangerie","root","");
 $erreur= "";

//  I select name, first name and email from my database

$insert = $bdd->prepare("SELECT * FROM clients "); 
$insert->execute();
// I get the results
$infos = $insert->fetchAll();
 //Tu recuperes l'id du contact

 $insert = $bdd->prepare("UPDATE nom, prenom, adresse, num, description_commande FROM clients "); 
$insert->execute();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/update.css">
    <title>Modifier</title>
</head>
<body>
<button> <a href="./home.php">Retour</a></button>



<?php foreach ($infos as $info): ?><br>
<form action="update.php?id=<?= $info['id']; ?>" method="POST">


    <input type="text" name="nom" value='<?= $info['nom']; ?>'  style=" height: 35px;" />
    <input type="text" name="prenom" value='<?= $info['prenom']; ?>' style=" height: 35px;" />
    <input type="text" name="adresse" value='<?= $info['adresse']; ?>' style=" height: 35px;" />
    <input type="text" name="num" value='<?= $info['num']; ?>' style=" height: 35px;" />
    <input type="text" name="description_commande" value='<?= $info['description_commande']; ?>' style=" height: 35px;" />

<input type="submit" name="submit"value="Modifier" style="     height: 48px;
            width: 169px;
            margin: 2%;                
            margin-top: 12%;
            margin-left: 4%;" />



</form>
<?php endforeach; ?>   




<?php echo $erreur ?>
    
</body>
</html>