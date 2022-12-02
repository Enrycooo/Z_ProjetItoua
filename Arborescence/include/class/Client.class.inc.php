<?php 

class Cavalier{
	const errmessage = "Une erreur s'est produite, signalez la à l'administrateur \n";

	public function db_get_all(){
		global $conn;

		$request = "SELECT * FROM ".DB_TABLE_PERSONNE." WHERE actif = 1;";
		try{
			$sql = $conn->query($request);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return $this->errmessage.$e->getMessage();
		}
	}
        
        public function db_get_by_id($id_personne=0){
		$id_personne = (int) $id_personne;
		if(!$id_personne){
			return false;
		}

		global $conn;

		$request = "SELECT * FROM ".DB_TABLE_PERSONNE." WHERE id_personne = :id";
		$sql = $conn->prepare($request);
		$sql->bindValue(':id', $id_personne, PDO::PARAM_INT);
		try{
			$sql->execute();
			return $sql->fetch(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return $this->errmessage.$e->getMessage();
		}
	}


	public function db_create($nom="", $prenom="" , $dna="", $rue="", $cp="", $ville="", $mail="", $tel ="", $galop = "", $nl=""){

        global $conn;
        $request = "INSERT INTO personne(nom, prenom, DNA, rue, code_postal, ville, mail, actif, telephone, photo, gal_cav, num_lic)
                    VALUES (:nom, :pre, :dna, :rue, :cp, :ville, :mail, 1, :tel, 1, :gal_cav, :num_lic)";
        $sql = $conn->prepare($request);
        $sql->bindValue(':nom', $nom, PDO::PARAM_STR);
        $sql->bindValue(':pre', $prenom, PDO::PARAM_STR);
        $sql->bindValue(':dna', $dna, PDO::PARAM_STR);
        $sql->bindValue(':rue', $rue, PDO::PARAM_STR);
        $sql->bindValue(':cp', $cp, PDO::PARAM_STR);
        $sql->bindValue(':ville', $ville, PDO::PARAM_STR);
        $sql->bindValue(':mail', $mail, PDO::PARAM_STR);
        $sql->bindValue(':tel', $tel, PDO::PARAM_STR);
        $sql->bindValue(':gal_cav', $galop, PDO::PARAM_INT);
        $sql->bindValue(':num_lic', $nl, PDO::PARAM_STR);

        try{
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }
    }

    public function db_update_one($nom="", $prenom="" , $dna="", $rue="", $cp="", $ville="", $mail="", $tel ="", $galop = 0, $nl=""){
       $id_personne = $_POST['id_personne'];
        if(!$id_personne){
            return false;
        }

        global $conn;

        $request = "UPDATE ".DB_TABLE_PERSONNE."
                  SET nom = :nom, prenom = :pre, DNA = :dna, rue = :rue, code_postal = :cp, ville = :ville, mail= :mail, telephone = :tel, gal_cav= :gal_cav, num_lic = :num_lic  
                  WHERE id_personne = :id_personne";
        $sql = $conn->prepare($request);
        $sql->bindValue(':id_personne', $id_personne, PDO::PARAM_INT);
        $sql->bindValue(':nom', $nom, PDO::PARAM_STR);
        $sql->bindValue(':pre', $prenom, PDO::PARAM_STR);
        $sql->bindValue(':dna', $dna, PDO::PARAM_STR);
        $sql->bindValue(':rue', $rue, PDO::PARAM_STR);
        $sql->bindValue(':cp', $cp, PDO::PARAM_STR);
        $sql->bindValue(':ville', $ville, PDO::PARAM_STR);
        $sql->bindValue(':mail', $mail, PDO::PARAM_STR);
        $sql->bindValue(':tel', $tel, PDO::PARAM_STR);
        $sql->bindValue(':gal_cav', $galop, PDO::PARAM_INT);
        $sql->bindValue(':num_lic', $nl, PDO::PARAM_STR);
        try{
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }
    }

    public function db_soft_delete_one($id_personne=0){
        $id_personne = (int) $_POST['id_personne'];

        if(!$id_personne) {
            return false;
        }

        global $conn;

        $request = "UPDATE ".DB_TABLE_PERSONNE." SET actif = 0 WHERE id_personne = :id_personne;";
        $sql = $conn->prepare($request);
        $sql->bindValue(':id_personne', $id_personne, PDO::PARAM_INT);
        try{
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }
    }

}

?>