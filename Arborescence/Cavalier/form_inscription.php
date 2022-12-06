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
    <title>Formulaire d'inscription</title>    
    </head>
    
    <body>
        <center><h1>Formulaire d'inscription</h1></center>
        <form action="Cavalier_trait.php" method="post">
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
                                <label for="mail" class="form-label">Mail</label>
                                <input placeholder="Mail" class="form-control" id="mail" type="text" name="mail">
                            </div>

                            <div class="col-5">
                                <label for="telephone" class="form-label">Téléphone</label>
                                <input placeholder="Téléphone" class="form-control" id="telephone" type="text" name="telephone">
                            </div>                
                            
                            <div class="col-5">
                                <label for="entreprise" class="form-label">Nom entreprise</label>
                                <input placeholder="Nom entreprise" class="form-control" id="entreprise" type="text" name="entreprise">
                            </div>
                            <div class="">
                                <a type="button" class="btn btn-primary" href="Cavalier_Affiche.php">Confirmer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>

