<?php
    require_once('identifier.php'); 
    require_once("connexiondb.php");
   
     

     
        
        $requeteCount="select count(*) countS from utilisateurs ";
        $requeteCount2="select count(*) countS from equipements ";
        $requeteCount3="select count(*) countS from emplacements ";
        $requeteCount4="select count(*) countS from etats ";
        $requeteCount5="select count(*) countS from types ";
        $requeteCount6="select count(*) countS from categories ";
     
     
    $resultatCount=$pdo->query($requeteCount);
    $resultatCount2=$pdo->query($requeteCount2);
    $resultatCount3=$pdo->query($requeteCount3);
    $resultatCount4=$pdo->query($requeteCount4);
    $resultatCount5=$pdo->query($requeteCount5);
    $resultatCount6=$pdo->query($requeteCount6);
    $tabCount=$resultatCount->fetch();
    $nbrStagiaire=$tabCount['countS'];

    
    $tabCount2=$resultatCount2->fetch();
    $nbrStagiaire2=$tabCount2['countS'];

    
    $tabCount3=$resultatCount3->fetch();
    $nbrStagiaire3=$tabCount3['countS'];

    
    $tabCount4=$resultatCount4->fetch();
    $nbrStagiaire4=$tabCount4['countS'];
    
    $tabCount5=$resultatCount5->fetch();
    $nbrStagiaire5=$tabCount5['countS'];

    $tabCount6=$resultatCount6->fetch();
    $nbrStagiaire6=$tabCount6['countS'];
      
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="css2/style.css">
</head>

<body>
 
<input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="las la-laptop"></span> <span>Parc Info</span></h2>
        </div>
        <!--Secciones-del-tablero-->
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="indexhome.php" class="active"><span class="las la-home"></span>
                    <span>Home</span></a>
                </li>
                 
                <li>
                    <a href="equipements.php"><span class="las la-laptop"></span>
                    <span>Equipements</span></a>
                </li>
                <li>
                    <a href="emplacements.php"><span class="las la-map-marker-alt"></span>
                    <span>Emplacements</span></a>
                </li>

                <li>
                    <a href="etats.php"><span class="las la-history"></span>
                    <span>Etats</span></a>
                </li>
                <li>
                    <a href="types.php"><span class="las la-laptop"></span>
                    <span>Types</span></a>
                </li>
                <li>
                    <a href="categories.php"><span class="las la-search"></span>
                    <span>categories</span></a>
                </li>
                <li>
                    <a href="utilisateurs2.php"><span class="las la-users"></span>
                    <span>Utilisateurs

                    </span></a>
                </li>
                <li>
                    <a href="seDeconnecter.php"><span class="las la-sign-out-alt"></span>
                    <span>Deconnecter

                    </span></a>
                </li>
            </ul>
        </div>
    </div>



    
    <div class="main-content">
                    <header>
                        <h2>
                            <label for="nav-toggle">
                                <span class="las la-bars"></span>
                            </label> Liste
                        </h2>

                        
                    </header>

          
                    <main>
                        <div class="cards">

                            

                            <div class="card-single">
                                <div>
                                    <h1><?php echo $nbrStagiaire2 ?></h1>
                                    <span>Equipememts</span>
                                </div>
                                <div>
                                    <span class="las la-laptop"></span>
                                </div>
                            </div>

                            <div class="card-single">
                                <div>
                                    <h1><?php echo $nbrStagiaire3 ?></h1>
                                    <span>Emplacements</span>
                                </div>
                                <div>
                                    <span class="las la-map-marker-alt"></span>
                                </div>
                            </div>

                            <div class="card-single">
                                <div>
                                    <h1><?php echo $nbrStagiaire4 ?></h1>
                                    <span>Etats</span>
                                </div>
                                <div>
                                    <span class="las la-history"></span>
                                </div>
                            </div>
                            <div class="card-single">
                                <div>
                                    <h1><?php echo $nbrStagiaire5 ?></h1>
                                    <span>Types</span>
                                </div>
                                <div>
                                    <span class="las la-laptop"></span>
                                </div>
                            </div>
                            <div class="card-single">
                                <div>
                                    <h1><?php echo $nbrStagiaire6 ?></h1>
                                    <span>Categories</span>
                                </div>
                                <div>
                                    <span class="las la-search"></span>
                                </div>
                            </div>
                            <div class="card-single">
                                <div>
                                    <h1><?php echo $nbrStagiaire ?></h1>
                                    <span>Utilisateurs</span>
                                </div>
                                <div>
                                    <span class="las la-users"></span>
                                </div>
                            </div>
                            
                        </div>
                        
                    </main>

    </div>


   

</body>

</html>