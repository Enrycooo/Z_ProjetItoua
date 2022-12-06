<?php
include('../include/defines.inc.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <title>Dashboard</title>
</head>
<body>
    <script>
        //const url = "Cavalier_trait.php";
    </script>
    <?php
        if(!isset($_GET["nav"]) || $_GET["nav"] === "read"){
            ?>
    
            <?php
        }elseif($_GET["nav"] === "inscription"){
            ?>
    
            <?php
        }elseif($_GET["nav"] === "connexion"){
            ?>
    
            <?php
        }elseif($_GET["nav"] === "affichage"){
            ?>
    
            <?php
        }
    ?>
</body>
</html>