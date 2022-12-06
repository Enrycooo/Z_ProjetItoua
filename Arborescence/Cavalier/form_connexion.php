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
        <form action="Cavalier_trait.php" method="post">
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
        </form>
    </body>
</html>