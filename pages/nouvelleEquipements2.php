<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
   
    $requeteF="select * from types";
    $resultatF=$pdo->query($requeteF);

    $requeteF2="select * from etats";
    $resultatF2=$pdo->query($requeteF2);

    $requeteF3="select * from categories";
    $resultatF3=$pdo->query($requeteF3);

    $requeteF4="select * from emplacements";
    $resultatF4=$pdo->query($requeteF4);

?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Nouveau stagiaire</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        <br> <br> <br>
        <div class="container">
                       
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Les infos du nouveau stagiaire :</div>
                <div class="panel-body">
                    <form method="post" action="insertEquipements2.php" class="form"  enctype="multipart/form-data">
						
                        <div class="form-group">
                             <label for="reference">Reference :</label>
                            <input type="text" name="reference" placeholder="Reference" class="form-control"/>
                        </div>
                        <div class="form-group">
                             <label for="marque">Marque :</label>
                            <input type="text" name="marque" placeholder="marque" class="form-control"/>
                        </div>

                        
                        <div class="form-group">
                             <label for="photo">Photo :</label>
                            <input type="text" name="photo" placeholder="Photo" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label for="idEta">id Etat:</label>
				            <select name="idEta" class="form-control" id="idEta">
                              <?php while($eta=$resultatF2->fetch()) { ?>
                                <option value="<?php echo $eta['idEta'] ?>"> 
                                    <?php echo $eta['idEta'] ?>
                                </option>
                              <?php }?>
				            </select>
                        </div>
                        <div class="form-group">
                            <label for="idTyp">Id Types:</label>
				            <select name="idtyp" class="form-control" id="idTyp">
                              <?php while($typ=$resultatF->fetch()) { ?>
                                <option value="<?php echo $typ['idTyp'] ?>"> 
                                    <?php echo $typ['idTyp'] ?>
                                </option>
                              <?php }?>
				            </select>
                        </div>

                        <div class="form-group">
                            <label for="idCat">Id Categories:</label>
				            <select name="idCat" class="form-control" id="idCat">
                              <?php while($cat=$resultatF3->fetch()) { ?>
                                <option value="<?php echo $cat['idCat'] ?>"> 
                                    <?php echo $cat['idCat'] ?>
                                </option>
                              <?php }?>
				            </select>
                        </div>
                        <div class="form-group">
                            <label for="idEmp">Id Emplacements:</label>
				            <select name="idEmp" class="form-control" id="idEmp">
                              <?php while($emp=$resultatF4->fetch()) { ?>
                                <option value="<?php echo $emp['idEmp'] ?>"> 
                                    <?php echo $emp['idEmp'] ?>
                                </option>
                              <?php }?>
				            </select>
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