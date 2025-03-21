<?php
	require '../config/config.php';
	if(empty($_SESSION['username']))
		header('Location: login.php');	

		try {
			if($_SESSION['role'] == 'admin'){
				
				
				$sqlQuery="SELECT * FROM animals";
				$stmt = $connect->prepare($sqlQuery);
				$stmt->execute();
				$data1 = $stmt->fetchAll (PDO::FETCH_ASSOC);
$data=$data1;
				
			}

			if($_SESSION['role'] == 'user'){
				$userid=$_SESSION['id'];
				

				$sqlQuery="SELECT * FROM animals WHERE user_id = '$userid' ";
				$stmt = $connect->prepare($sqlQuery);
				$stmt->execute();
				$data1 = $stmt->fetchAll (PDO::FETCH_ASSOC);
$data=$data1;
				
			}
		}catch(PDOException $e) {
			$errMsg = $e->getMessage();
		}
		
		try {
			// Récupération des informations de l'utilisateur
			$userid = $_SESSION['id'];
			$sqlUserQuery = "SELECT * FROM users WHERE id = :userid";
			$stmtUser = $connect->prepare($sqlUserQuery);
			$stmtUser->bindParam(':userid', $userid);
			$stmtUser->execute();
			$userData = $stmtUser->fetch(PDO::FETCH_ASSOC);
	
			// Récupération des animaux associés à l'utilisateur
			$sqlAnimalsQuery = "SELECT * FROM animals WHERE user_id = :userid";
			$stmtAnimals = $connect->prepare($sqlAnimalsQuery);
			$stmtAnimals->bindParam(':userid', $userid);
			$stmtAnimals->execute();
			$animalData = $stmtAnimals->fetchAll(PDO::FETCH_ASSOC);
		} catch(PDOException $e) {
			$errMsg = $e->getMessage();
		}	
?>
<?php include '../include/header.php';?>

	<!-- Header nav -->	
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#212529;" id="mainNav">
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
	<section style="padding-left:0px;">
		<?php include '../include/side-nav.php';?>
	</section>

<section class="wrapper" style="margin-left: 16%;margin-top: -20%;">
<div class="container">
        <div class="row">
            <div class="col-md-11 col-xs-12 col-sm-12">
                <div class="alert alert-info" role="alert">
			<?php
				if(isset($errMsg)){
					echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
				}
			?>
			<h2>List of Animal Details</h2>
				<?php 
					
					 foreach ($data as $value) {           
						 echo '<div class="card card-inverse card-info mb-3" style="padding:1%;">          
								 <div class="card-block">';
									 echo '<a class="btn btn-warning float-right" href="update.php?id='.$value['id'].'&act=rent"><i class="fa-regular fa-pen-to-square"></i>Edit</a>';
									 echo '<a class="btn btn-danger float-right" href="delete_animal.php?id='.$value['id'].'"><i class="fa-solid fa-trash"></i>Delete</a>';
									 echo   '<div class="row">
									   <div class="col-4">
									   <h4 class="text-center">Owner Details</h4>';
										 
										 echo '<p><b>Owner Contact Number: </b>'.$value['mobile'].'</p>';
										 echo '<p><b>Email: </b>'.$value['email'].'</p>';
										 echo '<p><b>Country: </b>'.$value['country'].'</p><p><b> State: </b>'.$value['state'].'</p><p><b> City: </b>'.$value['city'].'</p>';
										 
					   
									 echo '</div>
									   <div class="col-5">
									   <h4 class="text-center">Animal Details</h4>';
										
									   echo '<p><b>Animal Name: </b>'.$value['fullname'].'</p>';
									   echo '<p><b>
									   weight: </b>'.$value['rent'].' KG</p> ';
					   
										 echo '<p><b>Type: </b>'.$value['type'].'</p><p><b> Categorie: </b>'.$value['categorie'].'</p>';
									   
										  
									   
										 
									 echo '</div>
									   <div class="col-3">
									   <h4>Other Details</h4>';
								   
										 echo '<p><b>Description: </b>'.$value['description'].'</p>';
										 
										 $imagePath = $value['image'];

										 echo '<img src="'.$imagePath.'" width="230" class="img-thumbnail">';
										 
										 echo '</div>
								   </div>              
								</div>
							 </div>';
					 }
					 ?>
					 
			</div>
		</div>
	</div>
	</div> 	
</section>
<?php include '../include/footer.php';?>


