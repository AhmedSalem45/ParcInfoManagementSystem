<?php
    require_once('identifier.php');

    require_once('connexiondb.php');

    $idf=isset($_POST['idF'])?$_POST['idF']:0;

    $nomf=isset($_POST['libelleCat'])?$_POST['libelleCat']:0;
 
    $requete="update categories set libelleCat=? where idCat=?";

    $params=array($nomf,$idf);

    $resultat=$pdo->prepare($requete);

    $resultat->execute($params);
    
    header('location:Categories.php');
?>
