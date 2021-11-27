<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $idS=isset($_POST['idS'])?$_POST['idS']:0;
    $nom=isset($_POST['reference'])?$_POST['reference']:"";
    $prenom=isset($_POST['marque'])?$_POST['marque']:"";
    $idFiliere=isset($_POST['idEta'])?$_POST['idEta']:1;
    $idFiliere2=isset($_POST['idTyp'])?$_POST['idTyp']:1;
    $idFiliere3=isset($_POST['idCat'])?$_POST['idCat']:1;
    $idFiliere4=isset($_POST['idEmp'])?$_POST['idEmp']:1;
    $nomPhoto=isset($_FILES['photo']['name'])?$_FILES['photo']['name']:"";
    $imageTemp=$_FILES['photo']['tmp_name'];
    move_uploaded_file($imageTemp,"../images/".$nomPhoto);

    echo $nomPhoto ."<br>";
    echo $imageTemp;
     
        $requete="update equipements set reference=?,marque=?,photo=?,idEta=?,idTyp=?,idCat=?,idEmp=? where idEqu=?";
        $params=array($nom,$prenom, $nomPhoto,$idFiliere,$idFiliere2,$idFiliere3,$idFiliere4,$idS);
     

    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:equipements.php');

?>
