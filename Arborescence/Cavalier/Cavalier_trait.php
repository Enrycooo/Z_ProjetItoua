<?php
include_once('../include/defines.inc.php');
if(isset($_POST["create"])){
    if(isset($_POST["gal_cav"])){
        if($_POST['nom'] != "" && $_POST['prenom'] != "" && $_POST['DNA'] != "" && $_POST['mail'] != "" && $_POST['telephone'] != "" && $_POST['gal_cav'] != "" && $_POST['num_lic'] != ""){
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $dna = $_POST['DNA'];
            $mail = $_POST['mail'];
            $tel = $_POST['telephone'];
            $gal = $_POST['gal_cav'];
            $lic = $_POST['num_lic'];
            $sql = $conn->prepare("SELECT id_personne FROM personne WHERE nom = :nom");
            $sql->bindValue(':nom', $_POST["nom"],PDO::PARAM_STR);
            $sql->execute();
            $req = $oCavalier->db_create($nom, $prenom, $dna,'', '', '', $mail, $tel, $gal, $lic);
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
    }else{
        if($_POST['nom'] != "" && $_POST['prenom'] != "" && $_POST['DNA'] != "" && $_POST['rue'] != "" && $_POST['cp'] != "" && $_POST['ville'] != "" && $_POST['mail'] != "" && $_POST['telephone'] != ""){
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $dna = $_POST['DNA'];
            $rue = $_POST['rue'];
            $cp = $_POST['cp'];
            $ville = $_POST['ville'];
            $mail = $_POST['mail'];
            $tel = $_POST['telephone'];
    $sql = $conn->prepare("SELECT id_personne FROM personne WHERE nom = :nom");
    $sql->bindValue(':nom', $_POST["nom"],PDO::PARAM_STR);
    $sql->execute();
    $req = $oCavalier->db_create($nom, $prenom, $dna, $rue, $cp, $ville, $mail, $tel, '', '');
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
    }
}elseif(isset($_POST["update"])){
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
    }
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