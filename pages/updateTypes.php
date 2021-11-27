<?php
    require_once('identifier.php');

    require_once('connexiondb.php');

    $idf=isset($_POST['idF'])?$_POST['idF']:0;

    $nomf=isset($_POST['libelleTyp'])?$_POST['libelleTyp']:0;
 
    $requete="update types set libelleTyp=? where idTyp=?";

    $params=array($nomf,$idf);

    $resultat=$pdo->prepare($requete);

    $resultat->execute($params);
    
    header('location:types.php');
?>
