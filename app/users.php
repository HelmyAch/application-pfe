<?php
    require '../config/config.php';
    if(empty($_SESSION['username']))
        header('Location: login.php');  

        try {
            $sqlQuery="SELECT * FROM users";
            $stmt = $connect->prepare($sqlQuery);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e) {
            $errMsg = $e->getMessage();
        }   
        // print_r($data);  
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
              <a class="nav-link" href="login.php"><?php echo $_SESSION['fullname']; ?> <?php if($_SESSION['role'] == 'admin'){ echo "(Admin)"; } ?></a>
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
<section class="wrapper" style="margin-left:16%;margin-top: -8%;">
<div class="container">
        <div class="row">
            <div class="col-md-11 col-xs-12 col-sm-12">
                <div class="alert alert-info" role="alert">
                <?php
                    if(isset($errMsg)){
                        echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
                    }
                ?>
                <h2>List Of Users</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>id</th>
                          <th>Full Name</th>
                          <th>Email</th>
                          <th>Username</th>
                          <th>Role</th>
                          <th>Action</th> <!-- Ajout de la colonne Action -->
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                            foreach ($data as $key) {
                                echo '<tr>';
                                    echo '<th scope="row">'.$key['id'].'</th>';
                                    echo '<td>'.$key['fullname'].'</td>';
                                    echo '<td>'.$key['email'].'</td>';
                                    echo '<td>'.$key['username'].'</td>';
                                    echo '<td>'.$key['role'].'</td>';
                                    echo '<td><a href="delete_user.php?id='.$key['id'].'" class="btn btn-danger">Delete</a></td>'; // Ajout du bouton Supprimer
                                echo '</tr>';
                            }
                        ?>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div> 
</section>
<?php include '../include/footer.php';?>
