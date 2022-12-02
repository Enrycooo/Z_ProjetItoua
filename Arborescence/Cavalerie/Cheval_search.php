<?php
include_once('../include/defines.inc.php');

$sql = "SELECT * FROM cheval
        WHERE nom_cheval = :nom
        Or race_cheval = :race";
$req = $conn->prepare($sql);
$req->bindValue(':nom',$_POST['nom'],PDO::PARAM_STR);
$req->bindValue(':race',$_POST['race'],PDO::PARAM_STR);
$res = $req->execute();
?>
<html>
    <head>
        <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col">
                    <table class='table table-hover'>
                    <thead>
                        <tr>
                        <th style='text-align :center'>ID</th>
                        <th style='text-align :center'>Nom</th>
                        <th style='text-align :center'>Date de naissance</th>
                        <th style='text-align :center'>Race </th>
                        <th style='text-align :center'>Sexe</th>
                        <th style='text-align :center'>Taille</th>
                        <th style='text-align :center'>N°Sire</th>
                        <th style='text-align :center'>Robe</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                    foreach ($data=$req->fetchAll() as $value) {
                        ?>
                        <tr data-value="<?php echo $value['nom'] ?>">
                            <td><center><?php echo $value['id_cheval'] ?></center></td>
                            <td><center><?php echo $value["nom_cheval"] ?></center></td>
                            <td><center><?php echo $value["DNA_cheval"] ?></center></td>
                            <td><center><?php echo $value["race_cheval"] ?></center></td>
                            <td><center><?php echo $value["sexe_cheval"] ?></center></td>
                            <td><center><?php echo $value["taille_cheval"] ?></center></td>
                            <td><center><?php echo $value["SIRE_cheval"] ?></center></td>
                            <td><center><?php echo $value["ref_robe"] ?></center></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                    </table>
                </div>
            </div>
            <center><a href='Cheval_Affiche.php' class='btn btn-primary'>Retour</a></center>
        </div>