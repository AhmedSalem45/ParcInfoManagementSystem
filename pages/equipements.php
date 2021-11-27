<?php
    require_once('identifier.php'); 
    require_once("connexiondb.php");
  
    $reference=isset($_GET['reference'])?$_GET['reference']:"";
    $idtyp=isset($_GET['idtyp'])?$_GET['idtyp']:0;
    
    $size=isset($_GET['size'])?$_GET['size']:5;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;

    $requeteTyp="select * from types";
    if($idtyp==0){
        $requeteEqu="select idEqu,reference,marque,libelleTyp,photo
                from types as f,equipements as s
                where f.idTyp=s.idTyp
                and (reference like '%$reference%' )
                order by idEqu
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countS from equipements
                where reference like '%$reference%'" ;
    }else{
         $requeteEqu="select idEqu,reference,marque,libelleTyp,photo
                from types as f,equipements as s
                where f.idTyp=s.idTyp
                and reference like '%$reference%'
                and f.idTyp=$idtyp
                 order by idEqu
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countS from equipements
                where ( reference like'%$reference%' )
                and idTyp=$idtyp";
    }
      
    

$resultatTyp=$pdo->query($requeteTyp);
    $resultatEqu=$pdo->query($requeteEqu);
    $resultatCount=$pdo->query($requeteCount);

    $tabCount=$resultatCount->fetch();
    $nbrEqu=$tabCount['countS'];
    $reste=$nbrEqu % $size;   
    if($reste===0) 
        $nbrPage=$nbrEqu/$size;   
    else
        $nbrPage=floor($nbrEqu/$size)+1;  
?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Gestion des Equipements</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php require("menu.php"); ?>
        <br>  <br>  <br>  <br>
        <div class="container">
            <div class="panel panel-success margetop60">
            
				<div class="panel-heading">Rechercher des Equipements</div>
				
				<div class="panel-body">
					<form method="get" action="equipements.php" class="form-inline">
						<div class="form-group">
						
                            <input type="text" name="reference" 
                                   placeholder="Reference"
                                   class="form-control"
                                   value="<?php echo $reference ?>"/>
                        </div>
                            <label for="idtyp">Types:</label>
                            
				            <select name="idtyp" class="form-control" id="idtyp"
                                    onchange="this.form.submit()">
                                    
                                    <option value=0>Toutes les Types</option>
                                    
                                <?php while ($typ=$resultatTyp->fetch()) { ?>
                                
                                    <option value="<?php echo $typ['idTyp'] ?>"
                                    
                                        <?php if($typ['idTyp']===$idtyp) echo "selected" ?>>
                                        
                                        <?php echo $typ['libelleTyp'] ?> 
                                        
                                    </option>
                                    
                                <?php } ?>
                                
				            </select>
				            
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search"></span>
                            Chercher...
                        </button> 
                        
                        &nbsp;&nbsp;
                         <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                         
                            <a href="nouvelleEquipements2.php">
                            
                                <span class="glyphicon glyphicon-plus"></span>
                                Nouveau Equipement
                                
                            </a>
                            
                         <?php }?>
					</form>
				</div>
			</div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Liste des Equipements (<?php echo $nbrEqu ?> Equipements)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id Equipements</th> <th>Reference</th> <th>Marque</th> <th>Type</th> <th>Photo</th>  
                                 
                                <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                                	<th>Actions</th>
                                <?php }?>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($Equ=$resultatEqu->fetch()){ ?>
                                <tr>
                                    <td><?php echo $Equ['idEqu'] ?> </td>
                                    <td><?php echo $Equ['reference'] ?> </td>
                                    <td><?php echo $Equ['marque'] ?> </td>
                                    <td><?php echo $Equ['libelleTyp'] ?> </td>
                                 
                                     
                                    <td>
                                        <img src="../images/<?php echo $Equ['photo']?>"
                                        width="50px" height="50px" class="img-circle">
                                    </td> 
                                    
                                    <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                                        <td>
                                            <a href="editerEquipements.php?idS=<?php echo $Equ['idEqu'] ?>">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            &nbsp;
                                            <a onclick="return confirm('Etes vous sur de vouloir supprimer la equipement')"
                                                href="supprimerEquipements.php?idS=<?php echo $Equ['idEqu'] ?>">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </td>
                                    <?php }?>
                                    
                                 </tr>
                             <?php } ?>
                        </tbody>
                    </table>
                <div>
                    <ul class="pagination">
                        <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active' ?>"> 
            <a href="equipements.php?page=<?php echo $i;?>&reference=<?php echo $reference ?>&idyp=<?php echo $idtyp ?>">
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
