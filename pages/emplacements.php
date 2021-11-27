<?php
    require_once('identifier.php');
    require_once("connexiondb.php");
    
    /*
    if(isset($_GET['nomF']))
        $nomf=$_GET['nomF'];
    else
        $nomf="";
    */
  
    $idEmp=isset($_GET['idEmp'])?$_GET['idEmp']:"";
    $libel=isset($_GET['libelleEmp'])?$_GET['libelleEmp']:"";
    
    $size=isset($_GET['size'])?$_GET['size']:6;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    
     
         $requete="select * from emplacements
                where libelleEmp like '%$libel%'
                 
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countF from emplacements
                where libelleEmp like '%$libel%'";
               

    $resultatF=$pdo->query($requete);

    $resultatCount=$pdo->query($requeteCount);
    $tabCount=$resultatCount->fetch();
    $nbrEmp=$tabCount['countF'];
    $reste=$nbrEmp % $size;   // % operateur modulo: le reste de la division 
                                 //euclidienne de $nbrFiliere par $size
    if($reste===0) //$nbrFiliere est un multiple de $size
        $nbrPage=$nbrEmp/$size;   
    else
        $nbrPage=floor($nbrEmp/$size)+1;  // floor : la partie entière d'un nombre décimal
?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Gestion des Departements</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        <br> <br> <br> <br>
        <div class="container">
            
        
        <div class="panel panel-success margetop60">
          
				<div class="panel-heading">Rechercher des Emplacements</div>
				<div class="panel-body">
					
					<form method="get" action="emplacements.php" class="form-inline">
					
						<div class="form-group">
                            
                            <input type="text" name="libelleEmp" 
                                   placeholder="Libelle"
                                   class="form-control"
                                   value="<?php echo $libel ?>"/>
                                   
                        </div>
                        
                         
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search"></span>
                            Chercher...
                        </button> 
                        
                        &nbsp;&nbsp;
                        
                       	<?php if ($_SESSION['user']['role']=='ADMIN') {?>
                       	
                            <a href="nouvelleEmplacements.php">
                            
                                <span class="glyphicon glyphicon-plus"></span>
                                
                                Nouvelle Emplacement
                                
                            </a>
                            
                        <?php } ?>                 
                         
					</form>
				</div>
			</div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Liste des Emplacements (<?php echo $nbrEmp ?> Emplacements)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id Emplacement</th><th>Libelle </th> 
                                <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                                	<th>Actions</th>
                                <?php }?>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($emp=$resultatF->fetch()){ ?>
                                <tr>
                                    <td><?php echo $emp['idEmp'] ?> </td>
                                    <td><?php echo $emp['libelleEmp'] ?> </td>
                               
                                    
                                     <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                                        <td>
                                            <a href="editerEmplacements.php?idF=<?php echo $emp['idEmp'] ?>">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            &nbsp;
                                            <a onclick="return confirm('Etes vous sur de vouloir supprimer le emplacement')"
                                                href="supprimerEmplacements.php?idF=<?php echo $emp['idEmp'] ?>">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </td>
                                    <?php }?>
                                    
                                </tr>
                            <?PHP } ?>
                       </tbody>
                    </table>
                <div>
                    <ul class="pagination">
                        <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active' ?>"> 
            <a href="emplacements.php?page=<?php echo $i;?>&idEmp=<?php echo $idEmp ?>&libel=<?php echo $libel ?>">
                                    <?php echo $i; ?>
                                </a> 
                             </li>
                        <?php } ?>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </body>
</HTML>
