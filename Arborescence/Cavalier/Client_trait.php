<?php
include_once('../include/defines.inc.php');
if(isset($_POST["create"])){
        if($_POST['nom'] != "" && $_POST['prenom'] != "" && $_POST['tel'] != "" && $_POST['mail'] != "" && $_POST['nom_ent'] != ""){
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $dna = $_POST['tel'];
            $mail = $_POST['mail'];
            $tel = $_POST['nom_ent'];
            $sql = $conn->prepare("SELECT id_cli FROM client WHERE nomC = :nom");
            $sql->bindValue(':nom', $_POST["nom"],PDO::PARAM_STR);
            $sql->execute();
            $req = $oClient->db_inscr($nom, $prenom, $tel, $mail, $nom_ent);
            if($req){
            ?>
                <script>
                    alert("Cela a fonctionné")
                    window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalier/Cavalier_Affiche.php");
                </script>
            <?php
        }else{
            ?>
                <script>
                    alert("La création n'a pas fonctionné")
                    window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalier/Cavalier_Affiche.php");
                </script>
            <?php
            }
        }else{
            ?>
                <script>
                    alert("Veuillez remplir tout les champs !")
                    window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalier/Cavalier_Affiche.php?nav=create");
                </script>
            <?php
        }
/*}elseif(isset($_POST["update"])){
    $req = $oCavalier->db_update_one($_POST["nom"], $_POST["prenom"], $_POST["dna"],$_POST['rue'], $_POST['cp'], $_POST['ville'], $_POST["mail"], $_POST["telephone"], $_POST['gal_cav'], $_POST['num_lic']);
    if($req){
        ?>
            <script>
                alert("Cela a fonctionné")
                window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalier/Cavalier_Affiche.php");
            </script>
        <?php
    }else{
    ?>
        <script>
                alert("La modification n'a pas fonctionné")
                window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalier/Cavalier_Affiche.php");
        </script>
        <?php
    }*/
}elseif(isset($_POST["delete"])){
    $req = $oCavalier->db_soft_delete_one();
    if($req){
        ?>
            <script>
                alert("Cela a fonctionné")
                window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalier/Cavalier_Affiche.php");
            </script>
        <?php
    }else{
    ?>
        <script>
                alert("La suppression n'a pas fonctionné")
                window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalier/Cavalier_Affiche.php");
        </script>
        <?php
    }
}