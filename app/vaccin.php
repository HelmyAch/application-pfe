<?php
require '../config/config.php';

// Check if user is logged in
if (empty($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register_individuals'])) {
    // Get form data and sanitize it
    $nom = htmlspecialchars(trim($_POST['nom']));
    $categorie = htmlspecialchars(trim($_POST['categorie']));
    $dosage = (int) $_POST['dosage'];
    $location = htmlspecialchars(trim($_POST['location']));
    $date = htmlspecialchars(trim($_POST['date']));
    
    // Prepare SQL statement
    $sqlQuery = "INSERT INTO vaccin (nom, animalCategorie, date, dosage, location) VALUES (:nom, :categorie, :date, :dosage, :location)";
    $stmt = $connect->prepare($sqlQuery);
    
    // Bind parameters
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':categorie', $categorie);
    $stmt->bindParam(':dosage', $dosage, PDO::PARAM_INT);
    $stmt->bindParam(':location', $location);
    $stmt->bindParam(':date', $date);
    
    // Execute and check if the query was successful
    if ($stmt->execute()) {
        $successMsg = "Vaccination reservation added successfully!";
        header('Location: vaccin.php?action=reg');
        exit;
    } else {
        $errMsg = "Failed to add vaccination reservation. Please try again.";
    }
}
?>

	

<?php include '../include/header.php';?>	
	<!-- Header nav -->	
	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#212529;" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="../index.php">PetHub</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#"><?php echo $_SESSION['fullname']; ?> <?php if($_SESSION['role'] == 'admin'){ echo "(Admin)"; } ?></a>
            </li>
            <li class="nav-item">
              <a href="../auth/logout.php" class="nav-link">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
	<!-- end header nav -->	
<?php include '../include/side-nav.php';?>
<section class="wrapper" style="margin-left: 16%;margin-top: -11%;">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
	  <li class="nav-item">
	    <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Vaccin reservation</a>
	  </li>
	 
	</ul>

	<div class="tab-content">
	<!-- Single room -->
	  <div class="tab-pane active" id="home" role="tabpanel"><br>
	  		
	 

	<!-- Apartment -->
	  <div class="tab-pane" id="profile" role="tabpanel">
	  		
<div class="col-md-11 col-xs-12 col-sm-12">
  	<div class="alert alert-info" role="alert">
  		<?php
			if(isset($errMsg)){
				echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
			}
		?>
  		<h2 class="text-center">vaccination</h2>
  		<form action="" method="POST">
		  	 <div class="row">
               <div class="col-md-4">
			  	  <div class="form-group">
				    <label for="fullname">Vaccination Name</label>
				    <input type="nom" class="form-control" id="nom" placeholder="Vaccination Name" name="nom"  required>
				  </div>
				 </div>

				<div class="col-md-4">
				  <div class="form-group">
				    <label for="mobile">Animal categorie</label>
                    <select class="form-control" id="categorie" name="categorie" required>
    <option value="" disabled selected>Choose a category</option>
    <option value="Dog">Dog</option>
    <option value="Cat">Cat</option>
    <option value="Rabbit">Rabbit</option>
    <option value="Bird">Bird</option>
</select>   
                </div>
				 </div>

				
			</div>

			<div class="row">
            <div class="col-md-4">
			  	  <div class="form-group">
				    <label for="fullname">Dosage</label>
				    <input type="number" class="form-control" id="dosage" placeholder="0" name="dosage"  required>
				  </div>
				 </div>
                 <div class="col-md-4">
			  	  <div class="form-group">
				    <label for="fullname">Location</label>
				    <input type="text" class="form-control" id="Location" placeholder="Location" name="location"  required>
				  </div>
				 </div>

				 

				 
			</div>

			<div class="row">
				<div class="col-md-4">
			  <div class="form-group">
			    <label for="country">Date</label>
			    <input type="date" class="form-control" id="date" placeholder="Date" name="date" required>
			  </div>
			  </div>

        </div>
			  <button type="submit" class="btn btn-primary" name='register_individuals' value="register_individuals">Submit</button>
			</form>	
			</div>			
  	</div>
      </div>
	</div>
        </div>	
</section>
<?php include '../include/footer.php';?>
