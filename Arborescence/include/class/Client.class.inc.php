<?php 

class Cavalier{
    const errmessage = "Une erreur s'est produite, signalez la à l'administrateur \n";
        
    public function inscription($nom="", $prenom="" , $tel="", $mail="", $nom_ent="", $login="", $mdp="", $ref_client=""){
        global $conn;
        $request = "INSERT INTO personne(nomC, preC, telC, mailC, nom_ent)
                    VALUES (:nom, :pre, :tel, :mail, :nom_ent)";
        $request2 = "INSERT INTO connexion(login, mdp, ref_client
                    VALUES (:login, :mdp, :ref_client)";
        $sql = $conn->prepare($request);
        $sql->bindValue(':nom', $nom, PDO::PARAM_STR);
        $sql->bindValue(':pre', $prenom, PDO::PARAM_STR);
        $sql->bindValue(':tel', $tel, PDO::PARAM_STR);
        $sql->bindValue(':mail', $mail, PDO::PARAM_STR);
        $sql->bindValue(':nom_ent', $nom_ent, PDO::PARAM_STR);
        
        $sql2 = $conn->prepare($request2);
        $sql2->bindValue(':login', $login, PDO::PARAM_STR);
        $sql2->bindValue(':mdp', $mdp, PDO::PARAM_STR);
        $sql2->bindValue(':ref_client', $ref_client, PDO::PARAM_STR);
        
        try{
            $sql->execute();
            $sql2->execute();
            return true;
        }catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }
        }

}

?>