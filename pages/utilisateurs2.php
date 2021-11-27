  
  <?php
    require_once('role.php');
    require_once("connexiondb.php");
    
    $login=isset($_GET['login'])?$_GET['login']:"";
    $role=isset($_GET['role'])?$_GET['role']:"all";

    $size=isset($_GET['size'])?$_GET['size']:3;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    

    if($role=="all"){
        $requete="select * from utilisateurs
                where login like '%$login%'
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countF from utilisateurs
                where login like '%$login%'";
    }else{
         $requete="select * from utilisateurs
                where   role='$role'
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countF from utilisateurs
                where   role='$role'";
    }
    
    $resultatUti=$pdo->query($requete);

    $resultatCount=$pdo->query($requeteCount);
    $tabCount=$resultatCount->fetch();
    $nbrUti=$tabCount['countF'];
    $reste=$nbrUti % $size;   // % operateur modulo: le reste de la division 
                                 //euclidienne de $nbrUti par $size
    if($reste===0) //$nbrUti est un multiple de $size
        $nbrPage=$nbrUti/$size;   
    else
        $nbrPage=floor($nbrUti/$size)+1;  
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Gestion des utilisateurs</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        <br>  <br>  <br>  <br>
        <div class="container">
            <div class="panel panel-success margetop60">
				<div class="panel-heading">Rechercher des utilisateurs</div>
				<div class="panel-body">
                <form method="get" action="utilisateurs2.php" class="form-inline">
					
                    <div class="form-group">
                        
                        <input type="text" name="login" 
                               placeholder=" username"
                               class="form-control"
                               value="<?php echo $login ?>"/>
                               
                    </div>
                    
                    <label for="role">Role:</label>
                    <select name="role" class="form-control" id="role"
                            onchange="this.form.submit()">
                        <option value="all" <?php if($role==="all") echo "selected" ?>>Tous les utilisateurs</option>
                        <option value="ADMIN"   <?php if($role==="ADMIN")   echo "selected" ?>>Admin</option>
                        <option value="VISITEUR"   <?php if($role==="VISITEURS")   echo "selected" ?>>visteurs</option>
                        
                    </select>
                    
                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-search"></span>
                        Chercher...
                    </button> 
                    
                                   
                     
                </form>
				</div>
			</div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Liste des utilisateurs (<?php echo $nbrUti ?> utilisateurs)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Username</th> <th>Email</th> <th>Role</th> <th>Actions</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php while($uti=$resultatUti->fetch()){ ?>
                                <tr class="<?php echo $uti['etat']==1?'success':'danger'?>">
                                    <td><?php echo $uti['login'] ?> </td>
                                    <td><?php echo $uti['email'] ?> </td>
                                    <td><?php echo $uti['role'] ?> </td>  
                                   <td>
                                        <a href="editerUtilisateur.php?idUser=<?php echo $uti['iduser'] ?>">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        &nbsp;&nbsp;
                                        <a onclick="return confirm('Etes vous sur de vouloir supprimer cet utilisateur')"
                                            href="supprimerUtilisateur.php?idUser=<?php echo $uti['iduser'] ?>">
                                                <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                        &nbsp;&nbsp;
                <a href="activerUtilisateur.php?idUser=<?php echo $uti['iduser'] ?>&etat=<?php echo $uti['etat']  ?>">  
                                                <?php  
                                                    if($uti['etat']==1)
                                                        echo '<span class="glyphicon glyphicon-remove"></span>';
                                                    else 
                                                        echo '<span class="glyphicon glyphicon-ok"></span>';
                                                ?>
                                            </a>
                                        </td>       
                                </tr>
                             <?php } ?>
                        </tbody>
                    </table>
                <div>
                    <ul class="pagination">
                        <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active' ?>"> 
            <a href="utilisateurs2.php?page=<?php echo $i;?>&login=<?php echo $login ?>">
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
