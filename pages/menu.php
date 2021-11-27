 
<?php
    //require_once('identifier.php');
?>
<html>
<head>
  
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>

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
                    <span>Categories</span></a>
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

         

    </div>

</html>