<?php
     session_start();  
    if(!isset($_SESSION['monlogin'])) header('location: ../Anonyme/Login.php');
?>
<!DOCTYPE html>
<html>
    <head>
         <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/bootstrap-select.css">
    <link href="../CSS/font.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/tempusdominus-bootstrap-4.css" />
    <script src="https://kit.fontawesome.com/da4d3dfc16.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../CSS/styles.css" rel="stylesheet" />
        <link href="../CSS/style_index1.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/da4d3dfc16.js" crossorigin="anonymous"></script>

        <style>
        input[type=date]{
            width:100% !important;
        }

        .tt{
            font-size:19px !important;
        }
    </style>

    </head>
    <body class="sb-nav-fixed">
        
    
    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Journée</h1>
                
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                            </div>
                           <!-- <div><a href="AddJournee.php" id="btn" class="btnAgt" title="ajouter journee"><i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i></a></div> -->
                            <div class="card-body">
                            <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                            <th class="tt">Designation de la recette </th>
                                                <th class="tt"> 
                                                    <?php 
                                                        include ('../Connexion_database.php');
                                                        $req = mysqli_query($connexion ,"SELECT distinct (dateJ) FROM journee ");
                                                        if($ligne = mysqli_fetch_object($req)) {
                                                        echo $ligne->dateJ
                                                             
                                                     ;}
                                                    ?>
                                                </th>
                                                <th class="tt">ant mois</th>
                                                <th class="tt">mois</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php   
                                            include ('../Connexion_database.php');
                                            $resultat1 = mysqli_query($connexion ,"SELECT j.id_journee, j.dateJ, j.montant, t.id_taxe ,t.nom FROM taxe t LEFT JOIN journee j ON t.id_taxe=j.id_taxe ");
                                                while($ligne = mysqli_fetch_object($resultat1)) {
                                                echo '<tr align="center"><td class="class3">'. $ligne->nom.'</td><td class="class3">'. $ligne->montant.'</td> <td></td><td class="class3">'. $ligne->montant.'</td>
                                                     
                                             </tr>';}
                                             ?>
                                            
                                            <tr align="center">
                                                <th><b>total tickets et vignettes</b></th>
                                                <?php   
                                            include ('../Connexion_database.php');
                                            $resultat1 = mysqli_query($connexion ,"SELECT SUM(j.montant) total, tT.typeTaxe FROM journee j , taxe T, typetaxe tT WHERE j.id_taxe=T.id_taxe AND tT.id_type=T.id_type GROUP BY T.id_type,j.dateJ HAVING T.id_type=1");
                                                while($ligne = mysqli_fetch_object($resultat1)) {
                                                echo '<td class="class3">'. $ligne->total.'</td> <td></td> <td class="class3">'. $ligne->total.'</td>';}
                                             ?>
                                                
                                            </tr>

                                            
                                            

                                            <?php   
                                            include ('../Connexion_database.php');
                                            $resultat1 = mysqli_query($connexion ,"SELECT j.id_journee, j.dateJ, j.montant, t.id_taxe ,t.nom FROM journee j , taxe t where j.id_taxe=t.id_taxe and id_type=2 ");
                                                while($ligne = mysqli_fetch_object($resultat1)) {
                                                echo '<tr align="center"><td class="class3">'. $ligne->nom.'</td><td class="class3">'. $ligne->montant.'</td> <td></td><td class="class3">'. $ligne->montant.'</td>
                                                     
                                             </tr>';}
                                             ?>


                                            <tr align="center">
                                                <th ><b>total quittances</b></th>
                                                <?php   
                                            include ('../Connexion_database.php');
                                            $resultat1 = mysqli_query($connexion ,"SELECT SUM(j.montant) total, tT.typeTaxe FROM journee j , taxe T, typetaxe tT WHERE j.id_taxe=T.id_taxe AND tT.id_type=T.id_type GROUP BY T.id_type,j.dateJ HAVING T.id_type=2");
                                                while($ligne = mysqli_fetch_object($resultat1)) {
                                                echo '<td class="class3">'. $ligne->total.'</td> <td></td> <td class="class3">'. $ligne->total.'</td>';}
                                             ?>
                                                
                                            </tr>
                                        </tbody>
                                        
                                        
                                    </table>
                                </div>
                           
                    </div> 
                </main>
                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>

         
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/moment.js"></script>
    <script src="js/main-js.js"></script>
    <script src="js/datepicker.js"></script>
    <script src="js/tempusdominus-bootstrap-4.js"></script>
    


    <script>
    
        function Submit(){
            document.getElementById("frm").style.display="block";
            document.getElementById("disabled").setAttribute("disabled","disabled");
            return false;
        }
    </script>
    </body>
</html>