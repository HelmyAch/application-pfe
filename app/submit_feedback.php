<?php
    require '../config/config.php';

    // Vérifie si l'utilisateur est connecté
    if(empty($_SESSION['username'])) {
        header('Location: login.php');
        exit; 
    }

    // Vérifie si le formulaire a été soumis
    if(isset($_POST['submit'])) {
        // Récupère les données du formulaire
        $userId = $_SESSION['id']; // ID de l'utilisateur connecté
        $feedback = $_POST['feedback'];
       

        // Prépare et exécute la requête pour insérer le feedback dans la base de données
        try {
            $sqlQuery = "INSERT INTO feedback (user_id, feedback, datefeedback) VALUES (:userId, :feedback ,NOW())";
            $stmt = $connect->prepare($sqlQuery);
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt->bindParam(':feedback', $feedback, PDO::PARAM_STR);
            $stmt->execute();

            // Redirige vers la page de feedback avec un message de succès
            header('Location: feedback.php?success=true');
            exit;
        } catch(PDOException $e) {
            // En cas d'erreur, affiche un message d'erreur
            $errMsg = "Error: " . $e->getMessage();
        } 
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

<section style="padding-left:0px;margin-top: -1% ">
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
                <h2>write your Feedback</h2>
                <form method="post" action="submit_feedback.php">
                    <div class="form-group">
                        <label for="feedback">Feedback:</label>
                        <textarea class="form-control" id="feedback" name="feedback" rows="5" required></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>  
</section>

<?php include '../include/footer.php';?>

