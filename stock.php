<?php
 $bdd = new PDO("mysql:host=mysql-nagrom.alwaysdata.net;dbname=nagrom_boulangerie","nagrom","Morgan.levetti13");
//   $bdd = new PDO("mysql:host=localhost;dbname=boulangerie","root","");

  $insert = $bdd->prepare("SELECT * FROM stock "); 
  $insert->execute();
  $infos = $insert->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stock.css">
    <title>Document</title>
</head>
<body>
    <button> <a href="./home.php">Retour</a></button><br><br><br>
    <?php foreach ($infos as $info): ?>
    <table>
		<thead>
			<tr><th><strong> Nom</strong> &ensp;</th><th>|  <strong>Qts/Total</strong>  | </th><th> <strong>Qts/rest</strong> </th></tr><br>
		</thead>
		<tbody><br>
			<tr><td><br><?= $info['nom_gateau']?> : &ensp;&ensp;  </td><td><br><?=$info['qts_total'] ?></td><td><br><?=$info['qts_restant'] ?></td></tr>
			
		</tbody>
		
		
	</table>
    <?php endforeach; ?>  
    
    
</body>
</html>