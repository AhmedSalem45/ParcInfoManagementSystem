<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    
    $libel=isset($_POST['libelleEmp'])?$_POST['libelleEmp']:"";
    
    
    $requete="insert into emplacements(libelleEmp) values(?)";
    $params=array($libel);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:emplacements.php');
?>