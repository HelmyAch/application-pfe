<?php
    require '../config/config.php';
    if(empty($_SESSION['username']))
        header('Location: login.php');
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

<section class="wrapper" style="margin-left: 16%; margin-top: -11%;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>List of Services</h1>
                <div class="row">                        
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="equipment.php">
                                    <div class="card-counter primary">
                                        <i class="fa fa-paw"></i>
                                        <span class="count-numbers"></span>
                                        <span class="count-name">equipment</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="food.php">
                                    <div class="card-counter danger">
                                        <i class="fa fa-bone"></i>
                                        <span class="count-numbers"></span>
                                        <span class="count-name">pet food</span>
                                    </div>
                                </a>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    <?php if($_SESSION['role'] !== 'admin'): ?>
                        <a href="vaccin.php">
                            <div class="card-counter success">
                                <i class="fa fa-syringe"></i>
                                <span class="count-numbers"></span>
                                <span class="count-name">vaccination</span>
                            </div>
                        </a>
                        <?php endif; ?>
                        <?php if($_SESSION['role'] == 'admin'): ?>
                        <a href="vacaf.php">
                            <div class="card-counter success">
                                <i class="fa fa-syringe"></i>    
                                <span class="count-numbers"></span>
                                <span class="count-name">View Vaccination</span>
                            </div>
                        </a>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-4">
                        <?php if($_SESSION['role'] !== 'admin'): ?>
                        <a href="donate.php">
                            <div class="card-counter donation">
                                <i class="fa fa-donate"></i>        
                                <span class="count-numbers"></span>
                                <span class="count-name">Make a donation</span>
                            </div>
                        </a>
                        <?php endif; ?>
                        <?php if($_SESSION['role'] == 'admin'): ?>
                        <a href="affichdonate.php">
                            <div class="card-counter donationnn">
                                <i class="fa-solid fa-hand-holding-heart"></i>    
                                <span class="count-numbers"></span>
                                <span class="count-name">View donations</span>
                            </div>
                        </a>
                        <?php endif; ?>


                    </div>
                    
                </div>
            </div>
        </div>
    </div>  
</section>








	<style>
	.card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #121481;
    color: #FFF;
  }
  .card-counter.donation{
    background-color: #D20062;
    color: #FFF;
  }
  .card-counter.donationnn{
    background-color: #007F73;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #FF6500;
    color: #FFF;
  }  

  .card-counter.success{
    background-color: #49243E;
    color: #FFF;
  }  

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }  

  .card-counter i{
    font-size: 5em;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 65px;
    text-transform: capitalize;
    opacity: 0.8;
    display: block;
    font-size: 18px;
  }</style>
<?php include '../include/footer.php';?>


