<?php
	require '../config/config.php';
	if(empty($_SESSION['username']))
		header('Location: login.php');	
    

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

<?php include '../include/header.php'; ?>

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
                    <a class="nav-link" href="#"><?php echo $_SESSION['fullname']; ?></a>
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
    <?php include '../include/side-nav.php'; ?>
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
                    <h2>Your Infos</h2>
                    <div class="card card-inverse card-info mb-3" style="padding:1%;">          
                        <div class="card-block">
                           
                            <a class="btn btn-warning float-right" href="updateuser.php?id='.$value['id'].'&act=rent"><i class="fa-regular fa-pen-to-square"></i>Edit</a>

                            <p><b> Name: </b><?php echo $userData['fullname']; ?></p>
                            <p><b> User Name: </b><?php echo $userData['username']; ?></p>
                            <p><b>Phone Number: </b><?php echo $userData['mobile']; ?></p>
                            <p><b>Email: </b><?php echo $userData['email']; ?></p>
                            <!-- Afficher d'autres détails de l'utilisateur si nécessaire -->

                            

                   

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include '../include/footer.php'; ?>
