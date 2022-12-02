<?php
include_once('../include/defines.inc.php');
if(isset($_POST["create"])){
    $sql = $conn->prepare("SELECT id_cheval FROM cheval WHERE nom_cheval = :nom");
    $sql->bindValue(':nom', $_POST["nom"],PDO::PARAM_STR);
    $sql->execute();
    $req = $oCheval->db_create($_POST["nom"], $_POST["dna"], $_POST["race"],$_POST['sexe'], $_POST['taille'], $_POST['sire'], $_POST["robe"]);
    if($req){
        ?>
            <script>
                alert("Cela a fonctionné")
                window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalerie/Cheval_Affiche.php");
            </script>
        <?php
    }else{
        ?>
            <script>
                alert("La création n'a pas fonctionné")
                window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalerie/Cheval_Affiche.php");
            </script>
        <?php
    }
}elseif(isset($_POST["update"])){
    $req = $oCheval->db_update_one($_POST["nom"], $_POST["dna"], $_POST["race"],$_POST['sexe'], $_POST['taille'], $_POST['sire'], $_POST["robe"]);
    if($req){
        ?>
            <script>
                alert("Cela a fonctionné")
                window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalerie/Cheval_Affiche.php");
            </script>
        <?php
    }else{
    ?>
        <script>
                alert("La modification n'a pas fonctionné")
        </script>
        <?php
    }
}elseif(isset($_POST["delete"])){
    $req = $oCheval->db_soft_delete_one();
    if($req){
        ?>
            <script>
                alert("Cela a fonctionné")
                window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalerie/Cheval_Affiche.php");
            </script>
        <?php
    }else{
    ?>
        <script>
                alert("La suppression n'a pas fonctionné")
        </script>
        <?php
    }
}