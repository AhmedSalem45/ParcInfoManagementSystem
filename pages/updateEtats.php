<?php
    require_once('identifier.php');

    require_once('connexiondb.php');

    $idf=isset($_POST['idF'])?$_POST['idF']:0;

    $nomf=isset($_POST['libelleEta'])?$_POST['libelleEta']:0;
 
    $requete="update etats set libelleEta=? where idEta=?";

    $params=array($nomf,$idf);

    $resultat=$pdo->prepare($requete);

    $resultat->execute($params);
    
    header('location:etats.php');
?>
