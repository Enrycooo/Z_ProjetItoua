<?php
include('../include/defines.inc.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <title>Dashboard</title>
</head>
<body>
    <script>
        const url = "Client_trait.php";
    </script>
    <?php
        if(!isset($_GET["nav"]) || $_GET["nav"] === "read"){
            ?>
            <a type='button' class='btn btn-primary' href='Dashboard.php?nav=inscription'>S'inscrire</a>
            <a type='button' class='btn btn-primary' href='Dashboard.php?nav=connexion'>Se connecter</a>
            <?php
        }elseif($_GET["nav"] === "inscription"){
            ?>
            <center><h1>Formulaire d'inscription</h1></center>
            <form action="Client_trait.php" method="post">
            <div class="container">
                <div class="col-9 float-end bg-warning center-align">
                    <div class="container">
                        <div class="row">
                            <div class="col-5">
                                <label for="nom" class="form-label">Nom </label>
                                <input placeholder="Nom" class="form-control" id="nom" type="text" name="nom">
                            </div>
                            
                            <div class="col-5">
                                <label for="prenom" class="form-label">Prénom</label>
                                <input placeholder="Prénom" class="form-control" id="prenom" type="text" name="prenom">
                            </div>
                            
                            <div class="col-5">
                                <label for="entreprise" class="form-label">Nom d'utilisateur</label>
                                <input placeholder="Pseudo" class="form-control" id="login" type="text" name="login">
                            </div>
                            
                            <div class="col-5">
                                <label for="entreprise" class="form-label">Mot de passe</label>
                                <input placeholder="Mot de passe" class="form-control" id="mdp" type="text" name="mdp">
                            </div>
                            
                            <div class="col-5">
                                <label for="mail" class="form-label">Mail</label>
                                <input placeholder="Mail" class="form-control" id="mail" type="text" name="mail">
                            </div>

                            <div class="col-5">
                                <label for="telephone" class="form-label">Téléphone</label>
                                <input placeholder="Téléphone" class="form-control" id="tel" type="text" name="tel">
                            </div>                
                            
                            <div class="col-5">
                                <label for="entreprise" class="form-label">Nom entreprise</label>
                                <input placeholder="Nom entreprise" class="form-control" id="nom_ent" type="text" name="nom_ent">
                            </div>
                            <div class="">
                                <button name="inscription" type="submit" class="btn btn-primary" id="inscription">Confirmer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <?php
        }elseif($_GET["nav"] === "connexion"){
            session_start();

if (isset($_POST['username'])){
	$username = stripslashes($_REQUEST['username']);
	$_SESSION['username'] = $username;
	$password = stripslashes($_REQUEST['password']);
        $codage = hash('SHA256', $password);
        
        $request = "SELECT * FROM `users` WHERE username='$username' 
                    and password='$codage'";
        $sql = $conn->prepare($request);
        $sql->bindValue(':name', $username, PDO::PARAM_STR);
        $sql->bindValue(':pwd', $codage, PDO::PARAM_STR);
        $res = $conn->query($request);
	
	if ($res->rowCount() == 1) {
		$user = $res->fetch(PDO::FETCH_ASSOC);
		// vérifier si l'utilisateur est un administrateur ou un utilisateur
		if ($user['type'] == 'admin') {
			header('location: http://localhost/Z_Cavalier/dashboard/index.php');		  
		}else{
			header('location: http://localhost/Z_Cavalier/front/index.html');
		}
	}else{
		$message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
	}
}
            ?>
            <center><h1>Formulaire de connexion</h1></center>
            <form action="Client_trait.php" method="post">
            <div class="container">
                <div class="col-9 float-end center-align">
                    <div class="container">
                        <div class="row">
                            <div class="col-5">
                                <label for="nom" class="form-label">Nom d'utilisateur</label>
                                <input placeholder="Nom d'utilisateur" class="form-control" id="login" type="text" name="login">
                            </div>
                            <div class="col-5">
                                <label for="prenom" class="form-label">Mot de passe</label>
                                    <input type="password" placeholder="Mot de passe" class="form-control" id="mdp" type="text" name="mdp">
                            </div>
                            <div class="">
                                <a type="button" class="btn btn-primary" href=''>Confirmer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <?php
        }elseif($_GET["nav"] === "affichage"){
            $data = $oClient->db_get_by_id($_GET["id_cli"]);
            ?>
            
            <?php
        }
    ?>
</body>
</html>