<?php
    require '../config/config.php';
    if(empty($_SESSION['username'])) {
        header('Location: login.php');
        exit; 
    }

    // Vérifie si le formulaire de donation est soumis
    if(isset($_POST['submit_donation'])) {
        // Récupère les données du formulaire
        $amount = $_POST['amount'];
        $paymentmethod = $_POST['paymentmethod']; // Ajout de la récupération de la méthode de paiement

        // Récupère l'ID de l'utilisateur connecté
        $user_id = $_SESSION['id'];

        try {
            // Prépare la requête d'insertion
            $stmt = $connect->prepare("INSERT INTO donation (user_id, amount, paymentmethod, donation_date) VALUES (:user_id, :amount, :paymentmethod, NOW())");

            // Lie les paramètres
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':amount', $amount);
            $stmt->bindParam(':paymentmethod', $paymentmethod); // Lie la méthode de paiement

            // Exécute la requête
            $stmt->execute();

            // Redirige l'utilisateur vers une page de confirmation
            header('Location: donation_confirmation.php');
            exit;
        } catch(PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
?>

<?php include '../include/header.php'; ?>

<!-- Navigation -->
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

<section style="padding-left:0px; margin-top: -10%;">
    <?php include '../include/side-nav.php'; ?>
</section>

<section class="wrapper" style="margin-left: 16%; margin-top: -15%;">
    <div class="container">
        <div class="row">
            <div class="col-md-11 col-xs-12 col-sm-12">
                <div class="alert alert-info" role="alert">
                    <h2 class="text-center">Make a Donation</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="form-group">
                            <label for="amount">Donation Amount:</label>
                            <input type="number" class="form-control" id="amount" name="amount" step="0.01" min="0.01" required> 
                        </div>
                        <div class="form-group">
                            <label for="paymentmethod">Payment Method:</label>
                            <select class="form-control" id="paymentmethod" name="paymentmethod" required>
                                <option value="credit_card">Credit Card</option>
                                <option value="paypal">PayPal</option>
                                <option value="bank_transfer">Bank Transfer</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit_donation">Make Donation</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include '../include/footer.php'; ?>


