<?php
    require '../config/config.php';

    // Vérifie si l'utilisateur est connecté
    if(empty($_SESSION['username'])) {
        header('Location: login.php');
        exit; 
    }
    $isAdmin = ($_SESSION['role'] == 'admin');
    try {
        // Sélectionne tous les feedbacks avec les informations de l'utilisateur associé
        $sqlQuery = "SELECT donation.*, users.username 
                     FROM donation 
                     INNER JOIN users ON donation.user_id = users.id";
        $stmt = $connect->prepare($sqlQuery);
        $stmt->execute();
        $donationData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        // En cas d'erreur, affiche un message d'erreur
        $errMsg = $e->getMessage();
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

<section class="wrapper" style="margin-left: 16%; margin-top: -17%;">
    <div class="container">
        <div class="row">
            <div class="col-md-11 col-xs-12 col-sm-12">
                <div class="alert alert-info" role="alert">
                    <?php
                    if(isset($errMsg)){
                        echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
                    }
                    ?>
                   
<h2>List of Donations</h2>

                    <?php 
                  
                        foreach ($donationData as $donation) {           
                            echo '<div class="card card-inverse card-info mb-3" style="padding:1%;">          
                                    <div class="card-block">';
                            echo '<div class="row">
                                        <div class="col-12">
                                            <h4 class="text-center"></h4>';
                            echo '<p><b>Name: </b>'.$donation['username'].'</p>';
                            //echo '<p><b>Donation: </b>'.$donation['donation'].'</p>';
                            echo '<p><b>Amount: </b>'.$donation['amount'].' DTN</p>'; // Ajout du montant
                            echo '<p><b>Date : </b>'.date('H:i:s /  d-m-Y  ', strtotime($donation['donation_date'])).'</p>';
                            if ($_SESSION['role'] == 'admin') {
                                echo '<a href="delete_donation.php?id='.$donation['id'].'" class="btn btn-danger">Delete</a>'; // Ajout du bouton Supprimer
                            }
                            echo '</div>
                                    </div>';
                            echo '</div>
                                    </div>';
                        }
                    
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>









<?php include '../include/footer.php'; ?>

