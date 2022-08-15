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
        <!--<link href="../CSS/style_index.css" rel="stylesheet" />-->
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
        <?php  include 'Menu.php'?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Taxe</h1>
                
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                            </div>
                           <!-- <div><a href="AddJournee.php" id="btn" class="btnAgt" title="ajouter journee"><i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i></a></div> -->
                            <div class="card-body">
                            <?php
                        include('../Connexion_database.php');
                        

                            $result1 = mysqli_query($connexion ,"SELECT T.id_taxe , T.nom  , T.id_type FROM  taxe T, typeTaxe tT where  tT.id_type=T.id_type and T.id_taxe=".$_GET['id'] );
                               while($ligne = mysqli_fetch_object($result1)){
                               
                                  $ID=$ligne->id_taxe;
                                  

                                   echo '
                                            <form method="POST" action="ModifierTaxe.php?id='.$_GET['id'].'">
                                                <div class="form-group">
                                                    <label for="nomT" class="col-form-label">taxe *</label>
                                                    <input id="nomT" name="nomT" type="text" value="'.$ligne->nom.'" class="form-control" Required>
                                                </div>

                                                
                                                <div class="form-group">
                                                    <label for="taxeType" class="col-form-label"> Type taxe *</label>
                                                    <select name="taxeType" class="form-control">';?> 
                                                    <?php 
                                                            include ('../Connexion_database.php');

                                                            $sql2="SELECT id_type, typeTaxe from typetaxe";
                                                            $res2= mysqli_query($connexion,$sql2) ;
                                                            while($ligne=mysqli_fetch_array($res2)) {
                                                            echo'<option value="'.$ligne['id_type'].'">'.$ligne["typeTaxe"].' </option> ';}
                                                    
                                                    ?>     
                                                    </select><br> 
                                                </div>
                                                <div style="text-align: center;">
                                                    <button class="btn btn-outline-success" type="submit" name="submit">Modifier</button>
                                                    <button class="btn btn-outline-danger" type="submit" name="annuler">Annuler</button>   
                                                </div>
                                                
                                            </form>
                                            <?php
                                                if(isset($_POST['submit']))
                                                    {
                                                    $id=$_GET['id'];
                                                    //$journee=$_POST['dateJ'];
                                                    $taxe=$_POST['nomT'];
                                                    $typeTaxe=$_POST['taxeType'];
                                                    $result = mysqli_query($connexion ,"UPDATE taxe SET nom='$taxe', id_type='$typeTaxe'   where id_taxe=$id");
                                                    {
                                                        echo '<script>alert(\'Modification avec succes.\');</script>';
                                                        
                                                        echo "<script>location.href='taxe.php';</script>";
                                                        
                                                    }
                                                        
                                                    } 
                                                    else if(isset($_POST['annuler']))
                                                    {
                                                    echo "<script>location.href='taxe.php';</script>";
                                                    }          
                                                
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