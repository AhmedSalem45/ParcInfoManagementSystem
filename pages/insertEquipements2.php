<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $reference=isset($_POST['reference'])?$_POST['reference']:"";
    $marque=isset($_POST['marque'])?$_POST['marque']:"";
    $photo=isset($_POST['photo'])?$_POST['photo']:"";
    $idEta=isset($_POST['idEta'])?$_POST['idEta']:1;
    $idTyp=isset($_POST['idTyp'])?$_POST['idTyp']:1;
    $idCat=isset($_POST['idCat'])?$_POST['idCat']:1;
    $idEmp=isset($_POST['idEmp'])?$_POST['idEmp']:1;
    
 
    $requete="insert into equipements(reference,marque,photo,idEta,idTyp,idCat,idEmp) values(?,?,?,?,?,?,?)";
    $params=array($reference,$marque,$photo,$idEta,$idTyp,$idCat,$idEmp);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:equipements.php');

?>