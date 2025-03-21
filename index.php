<?php
  require 'config/config.php';
  $data = [];
  
  if(isset($_POST['search'])) {
    // Get data from FORM
    $keywords = $_POST['keywords'];
    $location = $_POST['location'];

    //keywords based search
    $keyword = explode(',', $keywords);
    $concats = "(";
    $numItems = count($keyword);
    $i = 0;
    foreach ($keyword as $value) {
      # code...
      if(++$i === $numItems){
         $concats .= "'".$value."'";
      }else{
        $concats .= "'".$value."',";
      }
    }
    $concats .= ")";
  //end of keywords based search
  
  //location based search
    $locations = explode(',', $location);
    $loc = "(";
    $numItems = count($locations);
    $i = 0;
    foreach ($locations as $value) {
      # code...
      if(++$i === $numItems){
         $loc .= "'".$value."'";
      }else{
        $loc .= "'".$value."',";
      }
    }
    $loc .= ")";

  //end of location based search
    
    try {
      //foreach ($keyword as $key => $value) {
        # code...
       
        
        $sqlQuery="SELECT * FROM animals WHERE fullname IN $concats OR country IN $loc OR state IN $concats OR state IN $loc OR city IN $concats OR city IN $loc OR categorie IN $concats OR type IN $concats ";
        $stmt = $connect->prepare($sqlQuery);
        $stmt->execute();
        $data8 = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $data = $data8;

    }catch(PDOException $e) {
      $errMsg = $e->getMessage();
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>PetHub</title> 

   

    <!-- Bootstrap core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="assets/css/rent.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
  </head>

  <body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">PetHub</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
           
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#search">Search</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about-us">About Us</a>
            </li>
            
            <?php 
              if(empty($_SESSION['username'])){
                echo '<li class="nav-item">';
                  echo '<a class="nav-link" href="./auth/login.php">Login</a>';
                echo '</li>';
              }else{
                echo '<li class="nav-item">';
                 echo '<a class="nav-link" href="./auth/dashboard.php">Home</a>';
               echo '</li>';
              }
           
            ?>
            
 
            <li class="nav-item">
              <a class="nav-link" href="./auth/register.php">Register</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>

   <!-- Header -->
    <header class="masthead" style="background-image: url('https://images.unsplash.com/photo-1576201836106-db1758fd1c97?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxleHBsb3JlLWZlZWR8MTN8fHxlbnwwfHx8fHw%3D')">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">Welcome To PetHub</div>
          <div class="intro-heading text-uppercase">Find Pet Together!<br></div>
        </div>
      </div>
    </header>

 
     <!-- Search -->
    <section id="search">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Search</h2>
            <h3 class="section-subheading text-muted">Make a quick search at our number of services!</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <form action="" method="POST" class="center" novalidate>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="keywords" name="keywords" type="text" placeholder="Find Pet Together" required data-validation-required-message="Please enter keywords">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <input class="form-control" id="location" type="text" name="location" placeholder="Location" required data-validation-required-message="Please enter location.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>         

                <div class="col-md-2">
                  <div class="form-group">
                    <button id="" class="btn btn-success btn-md text-uppercase" name="search" value="search" type="submit">Search</button>
                  </div>
                </div>
              </div>
            </form>

            <?php
              if(isset($errMsg)){
                echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
              }
              if(count($data) !== 0){
                echo "<h2 class='text-center'>Available Results:</h2>";
              }else{
                //echo "<h2 class='text-center' style='color:red;'>Try Some other keywords</h2>";
              }
            ?>        
            <?php 
                foreach ($data as $value) {           
                  echo '<div class="card card-inverse card-info mb-3" style="padding:1%;">          
                      <div class="card-block">';
                      // echo '<a class="btn btn-warning float-right" href="update.php?id='.$value['id'].'&act=';if(isset($value['ap_number_of_plats'])){ echo "ap"; }else{ echo "indi"; } echo '">Edit</a>';
                  
                      echo   '<div class="row">
                        <div class="col-4">
                        <h4 class="text-center">Owner Details</h4>';
                        
                        echo '<p><b>Owner Contact Number: </b>'.$value['mobile'].'</p>';
                        echo '<p><b>Email: </b>'.$value['email'].'</p>';
                        echo '<p><b>Country: </b>'.$value['country'].'</p>
                        <p><b> State: </b>'.$value['state'].'</p>
                        <p><b> City: </b>'.$value['city'].'</p>';
                        
          
                      echo '</div>
                        <div class="col-5">
                        <h4 class="text-center">Animal Details</h4>';
                        // echo '<p><b>Country: </b>'.$value['country'].'<b> State: </b>'.$value['state'].'<b> City: </b>'.$value['city'].'</p>';
                         
          
                        echo '<p><b>Animal Name: </b>'.$value['fullname'].'</p>';
                         
                        echo '<p><b>
                        weight: </b>'.$value['rent'].' KG</p> ';
          
                          echo '<p><b>Type: </b>'.$value['type'].'</p><p><b> Categorie: </b>'.$value['categorie'].'</p>';
                        
                         
          
                        
                      echo '</div>
                        <div class="col-3">
                        <h4>Other Details</h4>';
                    
                        echo '<p><b>Description: </b>'.$value['description'].'</p>';
                        if ($value['image'] !== 'uploads/') {
                        # code...
                        echo '<p><b></b></p> </br> <img src="app/'.$value['image'].'" width="230" class="img-thumbnail">';
                        }
                        echo '</div>
                      </div>              
                       </div>
                    </div>';
                  }
              ?>              
          </div>
        </div>
      </div>
      <br><br><br><br><br><br>
      </section>    
   <!-- aboutus -->
  <style>
        /* Styles pour la section About Us */
        .section-search {
            background-color: #f8f9fa;
            padding: 50px 0;
            margin-top: 5%;
        }

        /* Effets d'animation pour la section About Us */
        .section-search h2,
        .section-search h3,
        .section-search p {
            opacity: 0;
            transform: translateY(50px);
            animation: fadeInUp 1s ease forwards;
        }

        /* Définition des animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    </head>
     <body>
    <section id="about-us" class="section-search">
    <div class="col-lg-12 text-center">
    <h2 class="section-heading text-uppercase">
        <i class="fas fa-cat"></i> <!-- Icône de chat -->
        <i class="fas fa-dog"></i> <!-- Icône de chien -->
        About Us
        <i class="fas fa-dove"></i> <!-- Icône d'oiseau -->
        <i class="fa fa-bunny" aria-hidden="true"></i>
    </h2>
    <h3 class="section-subheading text-muted">Welcome to our website!</h3>
             </div>


            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>We are a team passionate about animals and committed to providing the best services to help animals in need.<br>
                       Feel free to contact us if you have any questions or concerns.</p>
                </div>
            </div>
        </div>
    </section>
 <!-- Footer -->
    <footer style="background-color: #ccc;">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">&copy;  PetHub - <?php echo date("Y"); ?></span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
            <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-whatsapp"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-instagram"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
   
    <!-- Bootstrap core JavaScript -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="assets/plugins/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="assets/js/jqBootstrapValidation.js"></script>
    <script src="assets/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="assets/js/rent.js"></script>
  </body>
</html>
