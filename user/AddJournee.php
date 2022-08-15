<?php
     session_start();  
    if(!isset($_SESSION['monlogin'])) header('location: ../Anonyme/login.php');
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
        <!--<link href="../CSS/style_index.css" rel="stylesheet" />-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/da4d3dfc16.js" crossorigin="anonymous"></script>

        <style>
        input[type=date]{
            width:100% !important;
        }
    </style>

    </head>
    <body class="sb-nav-fixed">
        <?php  include 'Menu.php'?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Journée</h1>
                
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                            
                            </div>
                            <div class="card-body">
                            <form method="POST" action="AddJournee.php" >

                            <div class="form-group">
                                <label for="dateJour" class="col-form-label">Date du jour*</label><br>
                                <input type="date" id="dateJour" name="dateJour" id="dtJour">
                            </div>
                             <div class="form-group">
                                <label for="montant" class="col-form-label">montant*</label>
                                <input id="montant"  name="montant" type="text" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <LABEL FOR="typeT" class="col-form-label"> Taxe*</LABEL>  
                                <select name="typeT" class="form-control" >
                                    <?php 
                                    include ('../Connexion_database.php');

                                    $sql2="SELECT * from taxe";
                                    $res2= mysqli_query($connexion,$sql2) ;
                                    while($ligne=mysqli_fetch_array($res2)) {
                                    echo'<option value="'.$ligne['id_taxe'].'">'.$ligne["nom"].'</option> ';
                                    }
                                    ?>
                                </select>
                       </div>
                            
                            
                            <div style="text-align: center;">
                                <button class="btn btn-outline-success" type="submit" name="submit">Ajouter</button>
                                <button class="btn btn-outline-danger" name="annuler">Annuler</button>
                                
                            </div>
                            
                            </form>
                                <?php
                                include ('../Connexion_database.php');
                                if(isset($_POST['submit']))
                                {
                                $dateJ=$_POST['dateJour'];
                                $montant=$_POST['montant'];
                                $typeT=$_POST['typeT'];
                               
                                if ($dateJ&&$montant&&$typeT)
                                { 
                                   $sql = "INSERT INTO journee(id_journee,dateJ,montant,id_taxe) values ('','$dateJ','$montant','$typeT')";
                                    // On envoie la requête
                                   if($res = $connexion->query($sql))
                                   {
                                      echo "<script>location.href='journee.php';</script>";
                                    }
                                }

                                }
                                else if(isset($_POST['annuler'])){
                                    echo "<script>location.href='journee.php';</script>";
                                }

                            ?>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Commune Berkane</div>
            
                    </div>
                </footer>
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