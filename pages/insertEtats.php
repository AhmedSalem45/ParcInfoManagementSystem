<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    
    $nomf=isset($_POST['libelleEta'])?$_POST['libelleEta']:"";
    
    $requete="insert into Etats(libelleEta) values(?)";
    $params=array($nomf);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
 
    header('location:Etats.php');
?>