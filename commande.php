<?php   
$bdd = new PDO("mysql:host=mysql-nagrom.alwaysdata.net;dbname=nagrom_boulangerie","nagrom","Morgan.levetti13");
// $bdd = new PDO("mysql:host=localhost;dbname=boulangerie","root","");
$erreur = "";
if (isset($_POST["submit"])){
         
   
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $num = htmlspecialchars($_POST['num']);

    $description_commande = htmlspecialchars($_POST['description_commande']);
   
   
     //  mes Variables
                 @$nom = $_POST["nom"];
                 @$prenom = $_POST["prenom"];
                 @$adresse = $_POST["adresse"];
                 @$num = $_POST["num"];
                 
                 @$description_commande = $_POST["description_commande"];
                 
       
        // on verifie si les champs sont vides ou pas
      if(empty($nom) && empty($prenom) && empty($num)){
        $erreur = "<p> Veuillez remplir tout les champs !</p>";
         
          }else{
              //  Registration in the database
              
            $query = $bdd->prepare("INSERT INTO clients (nom, prenom, adresse, num, description_commande) VALUES(?, ?, ?, ?, ?)");
            $query->execute([$nom, $prenom, $adresse, $num, $description_commande]);
            $erreur = "<h1> <strong>Commande Validé</strong></h1>";

            $query = $bdd->prepare("INSERT INTO archive (nom, prenom, adresse, num, description_commande) VALUES(?, ?, ?, ?, ?)");
            $query->execute([$nom, $prenom, $adresse, $num, $description_commande]);
            $erreur = "<h1> <strong>Commande Validé</strong></h1>";

          }

        }





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/commande.css">
    <title>Commandes</title>
</head>
<body>
    
    <div class="container">
        <button> <a href="./home.php">Retour</a></button>
        <h1>Commandes</h1>
        <?php echo $erreur ?>
<form method="POST" action="">
  <input type="text" placeholder="Nom" name="nom">
  <input type="text" placeholder="Prénom" name="prenom">
  <input type="text" placeholder="Adresse" name="adresse">
  <input type="text" placeholder="Numéro de téléphone" name="num">
  <textarea name="description_commande" id="" cols="30" rows="10" placeholder="Description Commande"></textarea>
  <input type="submit" name="submit"value="Envoyer" />
</form><br><br><br>
    </div>
    <hr>
    <div class="produc_list">
        <!-- Gateaux -->
        <h3>Buches Chocolat</h3>
        <div class="gateau_1">
            <a href="#">+1</a>
            <a href="#"><img src="./img/gateau-d'anniversaire.png" alt="logo">
           </img>
            </a><br><br>
            <a href="#">-1</a>
        </div>
        <h3>Gateaux 2</h3>
        <div class="gateau_1">
            <a href="#">+1</a>
            <a href="#"><img src="./img/gateau-d'anniversaire.png" alt="logo">
           </img>
            </a><br><br>
            <a href="#">-1</a>
        </div>
        <h3>Gateaux 2 <strong>"8 pers."</strong></h3>
        <div class="gateau_1">
            <a href="#">+1</a>
            <a href="#"><img src="./img/gateau-d'anniversaire.png" alt="logo">
           </img>
            </a><br><br>
            <a href="#">-1</a>
        </div>
        <h3>Buches Chocolat <strong>"6 pers."</strong></h3>
        <div class="gateau_1">
            <a href="#">+1</a>
            <a href="#"><img src="./img/gateau-d'anniversaire.png" alt="logo">
           </img>
            </a><br><br>
            <a href="#">-1</a>
        </div>
    


    </div>

    
</body>
</html>