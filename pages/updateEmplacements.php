<?php
    require_once('identifier.php');

    require_once('connexiondb.php');

    $idf=isset($_POST['idF'])?$_POST['idF']:0;

    $nomf=isset($_POST['libelleEmp'])?$_POST['libelleEmp']:0;
 
    $requete="update emplacements set libelleEmp=? where idEmp=?";

    $params=array($nomf,$idf);

    $resultat=$pdo->prepare($requete);

    $resultat->execute($params);
    
    header('location:emplacements.php');
?>
