<?php 
    require_once('identifier.php');
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <tit>Nouvelle filière</tit>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
        <br> <br> <br> <br>       
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Veuillez saisir les données de la nouvelle emplacement</div>
                <div class="panel-body">
                    <form method="post" action="insertEmplacements.php" class="form">
						
                        <div class="form-group">
                             <label for="libelleEmp">Libelle :</label>
                            <input type="text" name="libelleEmp" 
                                   placeholder="Libelle "
                                   class="form-control"/>
                        </div>
                         
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-save"></span>
                            Enregistrer
                        </button> 
                        <button type="reset" class="btn btn-success">
                            <span class="glyphicon glyphicon-delete"></span>
                            Effacer
                        </button> 
                      
					</form>
                </div>
            </div>
            
        </div>      
    </body>
</HTML>