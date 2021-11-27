<?php
   require_once('identifier.php');
    require_once('connexiondb.php');
    $idf=isset($_GET['idF'])?$_GET['idF']:0;
    $requete="select * from categories where idCat=$idf";
    $resultat=$pdo->query($requete);
    $filiere=$resultat->fetch();
    $nomf=$filiere['libelleCat'];
   
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Edition d'une filière</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
                       
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Edition de la filière :</div>
                <div class="panel-body">
                    <form method="post" action="updateCategories.php" class="form">
						<div class="form-group">
                             <label for="niveau">id de la filière: <?php echo $idf ?></label>
                            <input type="hidden" name="idF" 
                                   class="form-control"
                                    value="<?php echo $idf ?>"/>
                        </div>
                        
                        <div class="form-group">
                             <label for="libelleCat">Nom de la filière:</label>
                            <input type="text" name="libelleCat" 
                                   placeholder="Nom de la filière"
                                   class="form-control"
                                   value="<?php echo $nomf ?>"/>
                        </div>
                        
                         
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-save"></span>
                            Enregistrer
                        </button> 
                      
					</form>
                </div>
            </div>   
        </div>      
    </body>
</HTML>