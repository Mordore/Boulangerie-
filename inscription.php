<?php  
  $bdd = new PDO("mysql:host=mysql-nagrom.alwaysdata.net;dbname=nagrom_boulangerie","nagrom","Morgan.levetti13");
// $bdd = new PDO("mysql:host=localhost;dbname=boulangerie","root","");
  $erreur= "";




if (isset($_POST["submit"])){
      
            $email = htmlspecialchars($_POST['email']);
            $mdp = htmlspecialchars($_POST['mdp']);
            $mdp2 = htmlspecialchars($_POST['mdp2']);
    //Variables
                
                @$email = $_POST["email"];
                @$mdp = ($_POST["mdp"]);
                @$mdp2 = ($_POST["mdp2"]);
              

//we check if the fields are empty
        if(empty($mdp) && empty($mdp2) && empty($email)){
             $erreur= "<p>Veuillez remplir les champs obligatoires !</p>";
                    
            }else{
                    // we check email with filtre
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){ 
                        // we check passwords are identical
                        if($mdp == $mdp2 && !empty($mdp)){ 
                            $options = [
                                         'cost' => 12,
                                       ];
                              //  password_hash for more secu
                              $hashpass = password_hash($mdp, PASSWORD_BCRYPT);  
                               
                                    //  Registration in the database
                                    $query = $bdd->prepare("INSERT INTO boulangerie_user(email, mdp) VALUES(?, ?)");
                                    $query->execute([$email, $hashpass]);
                                    
                          

                              $erreur=  " <p>Bienvenue !</p> ";
                                //  header("location: ../pageConnexion/connexion.php");      
              
                          }else{
                            $erreur=  "<p>Les mots de passe ne sont pas identiques !</p>";
                          }
                    }else{
                        $erreur=  "<p>l'Email est incorrect ! !</p>";
                    }
                }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="./css/inscription.css">
    <title>Inscription</title>
</head>
<body>
            <header>
                <h2>Boulangerie+</h2>
                <!-- <img src="../assets/fleur4.png" alt="logo" style="
                position: absolute;
                top: 6%;
                left: 27%;">
    </img> -->
            </header>

    <h1>Inscription</h1>

<div class="main">
                <form action="" method="POST">
                       
                                <div class="inputbox"><!-- Email -->
                                    <input type="email" name="email" placeholder="Email" />
                                </div>
                        <div class="inputbox"><!-- Password -->
                            <input type="password" name="mdp" placeholder="Password" />
                        </div>
                    <div class="inputbox">     <!-- Password 2 -->
                        <input type="password" name="mdp2" placeholder="Password Vérify" />
                    </div>
                <!-- Log In -->
                <input type="submit" name="submit"value="Créer mon compte" />

                    <a href="../pageConnexion/connexion.php">Déja un compte ?</a>

                            <?php echo $erreur ?>
                </form>

</div>
    
</body>
</html>