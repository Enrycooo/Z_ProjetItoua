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

if (isset($_POST['login'])){
	$login = stripslashes($_REQUEST['login']);
	$_SESSION['login'] = $login;
	$password = stripslashes($_REQUEST['mdp']);
        $codage = hash('SHA512', $password);
        
        $request = "SELECT ref_client FROM `connexion` WHERE login='$login' 
                    and mdp='$codage'";
        $sql = $conn->prepare($request);
        $sql->bindValue(':name', $login, PDO::PARAM_STR);
        $sql->bindValue(':pwd', $codage, PDO::PARAM_STR);
        $res = $conn->query($request);
        $ligne = $res->fetch(PDO::FETCH_ASSOC);
        $id_cli = $ligne['ref_client'];
	
	if ($res->rowCount() == 1) {
		$user = $res->fetch(PDO::FETCH_ASSOC);
		// vérifier si l'utilisateur est un administrateur ou un utilisateur
		if ($user['type'] == 'admin') {
			header('location: http://localhost/z_ProjetItoua/Arborescence/Dashboard/Dashboard.php');		  
		}else{
			header('location: http://localhost/z_ProjetItoua/Arborescence/Dashboard/Dashboard.php?nav=capteur&id_cli='.$id_cli.'');
		}
	}else{
		$message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
	}
}
            ?>
            <center><h1>Formulaire de connexion</h1></center>
            <form class="box" action="" method="post" name="username">
            <div class="container">
                <div class="col-9 float-end center-align">
                    <div class="container">
                        <div class="row">
                            <div class="col-5">
                                <label for="nom" class="form-label">Nom d'utilisateur</label>
                                <input type="text" class="box-input" name="login" placeholder="Nom d'utilisateur">
                            </div>
                            <div class="col-5">
                                <label for="prenom" class="form-label">Mot de passe</label>
                                    <input type="password" class="box-input" name="mdp" placeholder="Mot de passe">
                            </div>
                            <div class="">
                                <input type="submit" value="connexion " name="submit" class="box-button">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <?php
        }elseif($_GET["nav"] === "capteur"){
            $data = $oClient->db_get_all_cap($_GET["id_cli"]);
            ?>
            <div class="row">
            <div class="col">
                <table class='table table-hover'>
                    <thead>
                        <th style='text-align :center'>ID</th>
                        <th style='text-align :center'>Nom capteur</th>
                        <th style='text-align :center'>Ref client</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $key) {
                            $id_cap = $key["id_cap"];
                            echo " <tr data-value=" . $id_cap . ">
                            <td><center>" . $key["id_cap"] . "</center></td>
                            <td><center>" . $key["nom_cap"] . "</center></td>
                            <td><center>" . $key["ref_cli"] . "</center></td>
                            <td style='display:flex; justify-content: space-evenly;'>
                                <a type='button' class='btn btn-primary' href='Dashboard.php?nav=don_cap&id_personne=" . $id_cap . "'>
                                    Afficher
                                </a>
                                <form action='Client_trait.php' method='post'>
                                    <input type='hidden' name='id_cap' value=" . $id_cap . ">
                                    <button type='submit' name='delete' class='delete-btn btn btn-danger'>Supprimer</button>
                                </form>
                            </td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            </div>
            <?php
        }elseif($_GET["nav"] === "don_cap"){
            ?>
            <p>COUCOU</p>
            <?php
        }
    ?>
</body>
</html>