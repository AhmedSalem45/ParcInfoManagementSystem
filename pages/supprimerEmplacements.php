<?php
    session_start();
        if(isset($_SESSION['user'])){
            
            require_once('connexiondb.php');
            $idf=isset($_GET['idF'])?$_GET['idF']:0;

            $requeteStag="select count(*) countStag from equipements where idEmp=$idf";
            $resultatStag=$pdo->query($requeteStag);
            $tabCountStag=$resultatStag->fetch();
            $nbrStag=$tabCountStag['countStag'];
            
            if($nbrStag==0){
                $requete="delete from emplacements where idEmp=?";
                $params=array($idf);
                $resultat=$pdo->prepare($requete);
                $resultat->execute($params);
                header('location:emplacements.php');
            }else{
                $msg="Suppression impossible: Vous devez supprimer tous les  utilisateurs et equipements inscris dans cet emolacement";
                header("location:alerte.php?message=$msg");
            }
            
         }else {
                header('location:login.php');
        }
    
    
    
    
?>