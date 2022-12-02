<?php
include('../include/defines.inc.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    <title>Cheval</title>
</head>
<body>
    <script> 
        const url = "Cheval_trait.php";
    </script>
<?php
        if(!isset($_GET["nav"]) || $_GET["nav"] === "read"){
        $data = $oCheval->db_get_all();
  ?>
    <div class="container">
        <div class="d-flex justify-content-center">
        <a href="/Z_Cavalier/dashboard/index.html"><img src ="/Z_Cavalier/dashboard/assets/img/home_icon.png"/></a> &nbsp;
        <a class="btn btn-primary" href="Cheval_Affiche.php?nav=create">Ajouter un Cheval </a> &nbsp; 
            <form action="Cheval_search.php" method='post'>
            <input placeholder="Nom" type="text" name="nom" title="Veuillez renseigner le nom du cheval concerné par votre recherche">
            <input placeholder="Race" type="text" name="race" title="Veuillez renseigner le prenom de la personne concernée par votre recherche">
            <button name="search" type="submit id="submit" class="btn btn-primary">Rechercher</button>
            </form>
        </div>
    </div>
 
            <div class="row">
                <div class="col">
                    <table class='table table-hover'>
            <thead>
            <th style='text-align :center'>ID</th>
                <th style='text-align :center'>Nom</th>
                <th style='text-align :center'>Date de naissance</th>
                <th style='text-align :center'>Race </th>
                <th style='text-align :center'>Sexe</th>
                <th style='text-align :center'>Taille</th>
                <th style='text-align :center'>N°Sire</th>
                <th style='text-align :center'>Robe</th>
            </thead>
            <tbody>
                <?php 
                    foreach ($data as $key) {
                        $id_cheval = $key["id_cheval"]; 
                        echo " <tr data-value=".$id_cheval.">
                        <td><center>".$key["id_cheval"]."</center></td>
                        <td><center>".$key["nom_cheval"]."</center></td>
                        <td><center>".$key["DNA_cheval"]."</center></td>
                        <td><center>".$key["race_cheval"]."</center></td>
                        <td><center>".$key["sexe_cheval"]."</center></td>
                        <td><center>".$key["taille_cheval"]."</center></td>
                        <td><center>".$key["SIRE_cheval"]."</center></td>
                        <td><center>".$key["ref_robe"]."</center></td>
                        <td style='display:flex; justify-content: space-evenly;'>
                            <a type='button' class='btn btn-primary' href='Cheval_Affiche.php?nav=update&id_cheval=".$id_cheval."'>
                                Modifier
                            </a>
                            <form action='Cheval_trait.php' method='post'>
                                <input type='hidden' name='id_cheval' value=".$id_cheval.">
                                <button type='submit' name='delete' class='delete-btn btn btn-danger'>Supprimer</button>
                            </form>
                        </td>
                        </tr>";
                    }
                ?>
            </tbody>
        </table>
        <?php
        }

        elseif($_GET["nav"] === "update"){
        $data = $oCheval->db_get_by_id($_GET["id_cheval"]);
        ?>               
            <div class="">
                <form action="Cheval_trait.php" method="post">
                    <div class="modal-body form-group">
                        <label>Nom :</label>
                        <input class="col-8 form-control" style="margin: 0 auto" type="text" name="nom" value="<?php echo $data["nom_cheval"]; ?>">
                        <label>Date de naissance :</label>
                        <input type ="date" class="col-8 form-control" style="margin: 0 auto" type="text" name="dna" value="<?php echo $data["DNA_cheval"]; ?>">
                        <label>Race :</label>
                        <input class="col-8 form-control" style="margin: 0 auto" type="text" name="race" value="<?php echo $data["race_cheval"]; ?>">
                        <label>Sexe : (0 = mâle / 1 = femmelle)</label>
                        <input class="col-8 form-control" style="margin: 0 auto" type="text" name="sexe" value="<?php echo $data["sexe_cheval"]; ?>">
                        <label>Taille :</label>
                        <input type="number" class="col-8 form-control" style="margin: 0 auto" name="taille" value="<?php echo $data["taille_cheval"]; ?>">
                        <label>N°Sire du Cheval :</label>
                        <input class="col-8 form-control" style="margin: 0 auto" type="text" name="sire" value="<?php echo $data["SIRE_cheval"]; ?>">
                        <label>Référence de la robe :</label>
                        <input type="number" class="col-8 form-control" style="margin: 0 auto" type="text" name="robe" value="<?php echo $data["ref_robe"]; ?>">
                        <input type="hidden" name="id_cheval" value="<?php echo $_GET["id_cheval"]; ?>">
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary" href="Cheval_Affiche.php">Retour</a>
                        <button type="submit" name="update" class="btn btn-primary">Modifier</button>
                    </div>
                </form>
        </div>
        </div>
        </div>
        <?php
        }
        elseif($_GET['nav'] === 'create'){
        ?>
            
        <h5 class="modal-title">Insertion d'un Cheval</h5>
            <form action="Cheval_trait.php" method="post">
            <div class="form-group">
                <label>Nom :</label>
                    <input placeholder="Nom" class="form-control" type="text" name="nom">
                    <label>Date de naissance :</label>
                    <input type="date" placeholder="Date de naissance" class="form-control" type="text" name="dna">
                    <label>Race du cheval :</label>
                    <input placeholder="Race" class="form-control" type="text" name="race">
                    <label>Sexe du cheval : (0 = mâle / 1 = femmelle)</label>
                    <input placeholder="Sexe" class="form-control" type="text" name="sexe">
                    <label>Taille du cheval :</label>
                    <input type="number" placeholder="Taille" class="form-control" type="text" name="taille">
                    <label>N°Sire du cheval :</label>
                    <input placeholder="N°Sire" class="form-control" type="text" name="sire">
                    <label>Référence de la robe du cheval :</label>
                    <input type="number" placeholder="Référence de la robe" class="form-control" type="text" name="robe">
                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary" href="Cheval_Affiche.php">Retour</a>
                        <button name="create" type="submit" class ="btn btn-primary">Enregistrer</button>
                    </div>
            </div>
            </form>
            </html>
            <?php
            }
        ?>
            </body>
            </html>