<?php
	require '../config/config.php';
	if(empty($_SESSION['username']))
		header('Location: login.php');	

    // Récupération des informations de l'utilisateur
    try {
        $userid = $_SESSION['id'];
        $sqlUserQuery = "SELECT * FROM users WHERE id = :userid";
        $stmtUser = $connect->prepare($sqlUserQuery);
        $stmtUser->bindParam(':userid', $userid);
        $stmtUser->execute();
        $userData = $stmtUser->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        $errMsg = $e->getMessage();
    }
    try {
        $sqlAnimalsQuery = "SELECT * FROM animals WHERE user_id = :userid";
        $stmtAnimals = $connect->prepare($sqlAnimalsQuery);
        $stmtAnimals->bindParam(':userid', $userid);
        $stmtAnimals->execute();
        $animalData = $stmtAnimals->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        $errMsg = $e->getMessage();
    }

    // Traitement de la mise à jour des informations de l'utilisateur
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $_SESSION['fullname']=$fullname;

        try {
            $sqlUpdateQuery = "UPDATE users SET fullname = :fullname, email = :email, mobile = :mobile, username=:username WHERE id = :userid";
            $stmtUpdate = $connect->prepare($sqlUpdateQuery);
            $stmtUpdate->bindParam(':fullname', $fullname);
            $stmtUpdate->bindParam(':email', $email);
            $stmtUpdate->bindParam(':mobile', $mobile);
            $stmtUpdate->bindParam(':userid', $userid);
            $stmtUpdate->bindParam(':username', $username);
            $stmtUpdate->execute();

            $animalId=

            // Redirection vers la page d'information de l'utilisateur après la mise à jour
            header('Location: updateuser.php?action=success');
            exit;
        } catch(PDOException $e) {
            $errMsg = $e->getMessage();
        }
        
        
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
                    <?php if(isset($errMsg)): ?>
                        <div style="color:#FF0000;text-align:center;font-size:17px;"><?php echo $errMsg; ?></div>
                    <?php endif; ?>
                    <?php if(isset($_GET['action']) && $_GET['action'] == 'success'): ?>
                        <div style="color:#008000;text-align:center;font-size:17px;">Update successful. Thank you</div>
                    <?php endif; ?>
                    <h2>Update Your Infos</h2>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="form-group">
                            <label for="fullname">Full Name:</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $userData['fullname']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $userData['username']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $userData['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile:</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $userData['mobile']; ?>">
                        </div>
              
                    
                        
                        <!-- Ajoutez d'autres champs d'information de l'utilisateur si nécessaire -->
                        <button type="submit" class="btn btn-primary"name="updateuser" value="updateuser">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include '../include/footer.php'; ?>
