<!DOCTYPE html>
<html lang='fr'>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <title>Formulaire de connexion</title>
    
    </head>
    <body>
    <center><h1>Formulaire de connexion</h1></center>
        <form class="box" action="" method="post" name="login">
            <div class="container">
                <div class="col-9 float-end bg-warning center-align">
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
                                <a type="button" class="btn btn-primary" href="#">Confirmer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>
<?php
require('../include/defines.inc.php');
session_start();

if (isset($_POST['login'])){
	$login = stripslashes($_REQUEST['login']);
	$_SESSION['login'] = $login;
	$mdp = stripslashes($_REQUEST['mdp']);
        $codage = hash('SHA256', $mdp);
        
        $request = "SELECT * FROM connexion WHERE login=:name 
                    and mdp=:mdp";
        $sql = $conn->prepare($request);
        $sql->bindValue(':name', $login, PDO::PARAM_STR);
        $sql->bindValue(':mdp', $codage, PDO::PARAM_STR);
        $res = $conn->query($request);
	
	if ($res->rowCount() == 1) {
		$user = $res->fetch(PDO::FETCH_ASSOC);
		// vérifier si l'utilisateur est un administrateur ou un utilisateur
		if ($user['type'] == 'admin') {
			header('location: http://localhost/z_ProjetItoua/Arborescence/Dashboard/Dashboard.php?nav=affichage&id_cli=');		  
		}else{
			header('location: http://localhost/z_ProjetItoua/Arborescence/Dashboard/Dashboard.php');
		}
	}else{
		$message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
	}
}
?>