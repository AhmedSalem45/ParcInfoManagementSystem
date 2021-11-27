<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    
    $libelt=isset($_POST['libelleTyp'])?$_POST['libelleTyp']:"";
    
    
    $requete="insert into Types(libelleTyp) values(?)";
    $params=array($libelt);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:Types.php');
?>