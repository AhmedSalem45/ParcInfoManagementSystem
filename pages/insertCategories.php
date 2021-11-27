<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    
    $nomf=isset($_POST['libelleCat'])?$_POST['libelleCat']:"";
    
    
    $requete="insert into categories(libelleCat) values(?)";
    $params=array($nomf);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:Categories.php');
?>