<?php
   require_once('identifier.php');
    require_once('connexiondb.php');
    $ide=isset($_GET['idF'])?$_GET['idF']:0;
    $requete="select * from emplacements where idEmp=$ide";
    $resultat=$pdo->query($requete);
    $emp=$resultat->fetch();
    $libel=$emp['libelleEmp'];
   
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
        <br>  <br>  <br>
        <div class="container">
                       
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Edition de l'emplacements :</div>
                <div class="panel-body">
                    <form method="post" action="updateEmplacements.php" class="form">
						<div class="form-group">
                             <label for="niveau">Id de l'emplacements: <?php echo $ide ?></label>
                            <input type="hidden" name="idF" 
                                   class="form-control"
                                    value="<?php echo $ide ?>"/>
                        </div>
                        
                        <div class="form-group">
                             <label for="libelleEmp">Nom de l'emplacements:</label>
                            <input type="text" name="libelleEmp" 
                                   placeholder="Libelle "
                                   class="form-control"
                                   value="<?php echo $libel ?>"/>
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