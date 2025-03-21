<?php
    // Vérification de la session utilisateur
    session_start();
    if(empty($_SESSION['username'])) {
        header('Location: login.php');
        exit; 
    }

    // Vérification des données de paiement
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $paymentMethod = $_POST['paymentmethod']; // Méthode de paiement sélectionnée par l'utilisateur
        // Vous pouvez traiter les données de paiement ici, telles que les sauvegarder dans la base de données
        // ou les envoyer à un service de traitement de paiement tiers
    }
?>

<?php include '../include/header.php';?>

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

<section style="padding-left:0px; margin-top: -3%;">
    <?php include '../include/side-nav.php';?>
</section>

<section class="wrapper" style="margin-left: 16%;margin-top: -15%;">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                <i class="fa-regular fa-handshake"><h2 class="text-center">Thank <?php echo strtoupper($_SESSION['fullname']); ?> You for Your Donation!</h2></i>
                    
                    <p class="text-center">We greatly appreciate your generous contribution. Your support helps us continue our mission to provide care and assistance to pets in need.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include '../include/footer.php';?>


