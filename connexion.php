<?php session_start();
 $bdd = new PDO("mysql:host=mysql-nagrom.alwaysdata.net;dbname=nagrom_boulangerie","nagrom","Morgan.levetti13");
//  $bdd = new PDO("mysql:host=localhost;dbname=boulangerie","root","");
 $erreur= "";
   if (isset($_POST["submit"])){
         
   
   $email = htmlspecialchars($_POST['email']);
   $mdp = htmlspecialchars($_POST['mdp']);
  
  
    //  mes Variables
                @$email = $_POST["email"];
                @$mdp = $_POST["mdp"];
                     
// on verifie si les champs sont vides ou pas
      if(empty($email) && empty($mdp)){
             $erreur = "<p> Veuillez remplir les champs obligatoires !</p>";
              
               }else{
                      //   on verifie si l'email est correct
                      if(filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($mdp)){
                         //  on récupère les inscrits 
                          $requser = $bdd->prepare("SELECT * FROM boulangerie_user WHERE email = ? ");
                          $requser->execute(array($email));
                          $utilisateur_co = $requser->fetch();
                          $userexist = $requser->rowCount();
                          
                          // on vérifie si il existe bien un compte
                     if($userexist == 1){   

                    //  les Admins avec id_role 10
                  if($utilisateur_co['id_role'] == '10'){
                        
                      $hash = $utilisateur_co ["mdp"];
                    //  If mdp hash = mdp
                       if(password_verify($mdp, $hash)){   
                            //  we create the sessions
                                $_SESSION['autoriser']="oui";
                                $_SESSION['nom']= $utilisateur_co ["nom"];
                                $_SESSION['prenom'] = $utilisateur_co ["prenom"];
                                $_SESSION['num'] = $utilisateur_co ["num"];
                                $erreur= "<p> Bienvenue !</p>";
                                header("location: ./home.php"); 
                                
                                }else{
                                      $erreur= "<p> Le mots de passe ne correspond pas !</p>";
                                     }
                      //  if user id role NULL
                       }elseif($utilisateur_co['id_role'] == NULL){

                                          $hash = $utilisateur_co ["mdp"];
                                            //  if mdp hash = mdp
                                                if(password_verify($mdp, $hash)){   
                                                  // we start user Session
                                                        
                                                        header("location: ./connexion.php");
                                                         $erreur= 
                                                        "<p> Vous n'avez pas les permissions!</p>";
                          
                                       }else{
                                          $erreur= "<p> Le mots de passe ne correspond pas !</p>";
                                            }
                                }
                                            } else{
                                                $erreur = "<p> Veuillez remplir les champs obligatoires !</p>";
                                                  }
                                      }else{  
                                        $erreur = "<p> Mail ou Mot de passe non reconnus !</p>";  
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
     <link rel="stylesheet" href="./css/connexion.css">
    <title>Connexion</title>
</head>
<body>
    <!-- <header>
          <h2>Boulangerie +</h2>
   
    </header>  -->

          <h1>Connexion</h1>
    
          <div class="main">
          
                      <form action="" method="POST">

                              <div class="inputbox">
                                  <input type="email" name="email" placeholder="Email" style=" height: 35px;" />
                              </div>

                              <div class="inputbox">
                                  <input type="password" name="mdp" placeholder="Password" style=" height: 35px;" />
                              </div>

                              <input type="submit" name="submit"value="Connexion" style="     height: 48px;
                                          width: 169px;
                                          margin: 2%;                
                                          margin-top: 12%;
                                          margin-left: 4%;" />

                              

                             
                              
                              <?php echo $erreur ?>

                      </form>
          </div>
    
</body>
</html>