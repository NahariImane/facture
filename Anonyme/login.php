<?php
ob_start();
?>
<!doctype html>
<html >
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link href="../CSS/style.css" rel="stylesheet">
    <link href="../CSS/style1.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/fontawesome-all.css">
<style>
    body {
    font-family: 'Circular Std Book';
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    color: #71748d;
    background-image: url("../img/back2.jpg");
    -webkit-font-smoothing: antialiased;
    height: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
  
</head>


<body >    
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
        <section class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card  text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center bg-white">
                                <div class="mb-md-5 mt-md-4 pb-5">
                                    <h1 class="fw-bold mb-3 text-uppercase ">Bienvenue</h1>
                                    <h5 class="fw-thin text-white mb-5">Entrez vos informations!</h5>
                                    
                                    <form  id="connecter" class="inputs"  method="POST">

                                        <div class="form-outline form-white mb-4">
                                            <input id="username" type="text" placeholder="Nom d'utilisateur" name="email" autocomplete="off" class="form-control form-control-lg" style="border-radius:1rem" /> 
                                        </div>

                                        <div class="form-outline form-white mb-4">
                                            <input id="password" type="password" placeholder="Mot de passe" name="mot_de_passe" class="form-control form-control-lg" style="border-radius:1rem" />
                                        </div>

                                        <button class="btn btn-outline-light btn-lg px-5 my-2" type="submit" name="submit">Connexion</button>
                                   
                                    </form>

                                </div>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
</section>
             
             <?php
            include ('../Connexion_database.php');
            if (isset($_POST['submit']))
            {
              $Email=trim($_POST['email']);
              $Pass=trim($_POST['mot_de_passe']);
              $requete2="SELECT email, password FROM login ";
              $resultat2 = mysqli_query($connexion ,$requete2);
              $cpt2=0;
              while($ligne2 = mysqli_fetch_object($resultat2))
              {
                if(($ligne2->email==$Email)&&($ligne2->password==$Pass))
                {
                  $cpt2++;
                }
              }
              if($cpt2==0)
              {
                echo '<p class="R">Votre nom ou mot de passe est incorrect !</p>';
              }
              if($cpt2!=0)
              {
                session_start();
                $_SESSION['monlogin'] =$Email;
                header('location: ../user/journee.php');
              }
            }
            mysqli_close($connexion);
          ?> 
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
 

     <?php
     ob_end_flush();
   ?>
</body>
 
</html>