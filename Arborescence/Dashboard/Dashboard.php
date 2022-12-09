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
        //const url = "Cavalier_trait.php";
    </script>
    <?php
        if(!isset($_GET["nav"]) || $_GET["nav"] === "read"){
            ?>
            <a type='button' class='btn btn-primary' href='Dashboard.php?nav=inscription'>S'inscrire</a>
            <a type='button' class='btn btn-primary' href='Dashboard.php?nav=connexion'>Se connecter</a>
            <?php
        }elseif($_GET["nav"] === "inscription"){
            ?>
            
            <?php
        }elseif($_GET["nav"] === "connexion"){
            ?>
            <center><h1>Formulaire de connexion</h1></center>
            <form action="Cavalier_trait.php" method="post">
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
                                <a type="button" class="btn btn-primary" href='Dashboard.php?nav=affichage&id_cli=<?php echo $id_cli?>'>Confirmer</a>
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