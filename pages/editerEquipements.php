<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $idS=isset($_GET['idS'])?$_GET['idS']:0;
    $requeteE="select * from equipements where idEqu=$idS";
    $resultatE=$pdo->query($requeteE);
    $equ=$resultatE->fetch();
    $reference=$equ['reference'];
    $marque=$equ['marque'];
    $photo=$equ['photo'];
    $idEta=$equ['idEta'];
    $idTyp=$equ['idTyp'];
    $idCat=$equ['idCat'];
    $idemp=$equ['idEmp'];
        

    $requeteF="select * from etats";
    $resultatF=$pdo->query($requeteF);
    $requeteF2="select * from types";
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
        <title>Edition d'un Equipements</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        <br><br><br>
        <div class="container">
                       
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Edition du Equipements :</div>
                <div class="panel-body">
                    <form method="post" action="updateEquipements.php" class="form"  enctype="multipart/form-data">
						<div class="form-group">
                             <label for="idS">id d'Equipementsiaire: <?php echo $idS ?></label>
                            <input type="hidden" name="idS" class="form-control" value="<?php echo $idS ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="reference">Reference :</label>
                            <input type="text" name="reference" placeholder="Reference" class="form-control" value="<?php echo $reference ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="marque">Marque :</label>
                            <input type="text" name="marque" placeholder="Marque" class="form-control"
                                   value="<?php echo $marque ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="photo">Photo :</label>
                            <input type="file" name="photo" />
                        </div>

                        <div class="form-group">
                            <label for="idEta">Id Etats:</label>
				            <select name="idEta" class="form-control" id="idEta">
                              <?php while($Eta=$resultatF->fetch()) { ?>
                                <option value="<?php echo $Eta['idEta'] ?>"
                                         <?php if($Eta===$Eta['idEta']) echo "selected" ?>> 
                                    <?php echo $Eta['idEta'] ?>
                                </option>
                              <?php }?>
				            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="idTyp">Id types:</label>
				            <select name="idTyp" class="form-control" id="idTyp">
                              <?php while($Typ=$resultatF2->fetch()) { ?>
                                <option value="<?php echo $Typ['idTyp'] ?>"
                                         <?php if($Typ===$Typ['idTyp']) echo "selected" ?>> 
                                    <?php echo $Typ['idTyp'] ?>
                                </option>
                              <?php }?>
				            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="idCat">Id Categories:</label>
				            <select name="idCat" class="form-control" id="idCat">
                              <?php while($Cat=$resultatF3->fetch()) { ?>
                                <option value="<?php echo $Cat['idCat'] ?>"
                                         <?php if($Cat===$Cat['idCat']) echo "selected" ?>> 
                                    <?php echo $Cat['idCat'] ?>
                                </option>
                              <?php }?>
				            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="idEmp">Id Emplacements:</label>
				            <select name="idEmp" class="form-control" id="idEmp">
                              <?php while($Emp=$resultatF4->fetch()) { ?>
                                <option value="<?php echo $Emp['idEmp'] ?>"
                                         <?php if($Emp===$Emp['idEmp']) echo "selected" ?>> 
                                    <?php echo $Emp['idEmp'] ?>
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