<?php 

class Client{
    const errmessage = "Une erreur s'est produite, signalez la à l'administrateur \n";
        
    public function db_inscription($nom="", $prenom="" , $tel="", $mail="", $nom_ent="", $login="", $codage=""){
        global $conn;
        $request = "INSERT INTO client(nomC, preC, telC, mailC, nom_ent)
                    VALUES (:nom, :pre, :tel, :mail, :nom_ent)";
        
        $request2 = "INSERT INTO connexion(login, mdp, type, ref_client)
                    VALUES (:login, :mdp, 'user', LAST_INSERT_ID() )";
        
        $sql = $conn->prepare($request);
        $sql->bindValue(':nom', $nom, PDO::PARAM_STR);
        $sql->bindValue(':pre', $prenom, PDO::PARAM_STR);
        $sql->bindValue(':tel', $tel, PDO::PARAM_STR);
        $sql->bindValue(':mail', $mail, PDO::PARAM_STR);
        $sql->bindValue(':nom_ent', $nom_ent, PDO::PARAM_STR);
        
        $sql2 = $conn->prepare($request2);
        $sql2->bindValue(':login', $login, PDO::PARAM_STR);
        $sql2->bindValue(':mdp', $codage, PDO::PARAM_STR);
        
        try{
            $sql->execute();
            $sql2->execute();
            return true;
        }catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }
    }
        
    public function db_get_by_id($id_cli=0){
	$id_cli = (int) $id_cli;
	if(!$id_cli){
		return false;
	}

	global $conn;

	$request = "SELECT * FROM ".DB_TABLE_CLIENT." WHERE id_cli = :id";
	$sql = $conn->prepare($request);
	$sql->bindValue(':id', $id_cli, PDO::PARAM_INT);
	try{
		$sql->execute();
		return $sql->fetch(PDO::FETCH_ASSOC);
	}catch(PDOException $e){
		return $this->errmessage.$e->getMessage();
	}
    }
    
}

?>