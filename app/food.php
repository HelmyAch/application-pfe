<?php
	require '../config/config.php';
	if(empty($_SESSION['username']))
		header('Location: login.php');

    $sqlQuery="SELECT * FROM services where categorie='Food'";
    $stmt = $connect->prepare($sqlQuery);
    $stmt->execute();
    $data1 = $stmt->fetchAll (PDO::FETCH_ASSOC);
   
    if(isset($_GET['idp'])) {
      try {
        $id=$_GET['idp'];
				$sqlQuery="INSERT INTO cart (serviceid) VALUES ('$id')";
				$stmt = $connect->prepare($sqlQuery);
				$stmt->execute();
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
    }
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="statics/bootstrap/css/bootstrap.min.css">
    <script src="statics/jquery/jquery-3.6.0.min.js"></script>
    <script src="statics/bootstrap/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/x-icon" href="layouts/icons/shopping-cart.png">
    <link rel="stylesheet" href="statics/Css/style.css">
   
</head>
<body>
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
            <li class="nav-item"><a href='cart.php' class='nav-link mr-5'> <i class="fa fa-shopping-cart"></i> 
                     </a></li>
            <li class="nav-item">
              <a class="nav-link" href="#"><?php echo $_SESSION['fullname']; ?> <?php if($_SESSION['role'] == 'admin'){ echo "(Admin)"; } ?></a>
            </li>
            <li class="nav-item">
              <a href="../auth/logout.php" class="nav-link">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav><?php include '../include/side-nav.php';?>
	<!-- end header nav -->	

  <section class="wrapper" style="margin-left: 16%; margin-top: -11%;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Categories</h1>
                
                <div class="row">                   
<div class="col-md-3">                      
  <a type="button" data-toggle="modal" data-target="#exampleModalScrollable" style="cursor:pointer;">
                              
                                    <div class="card-counter primary" style="margin-right:-125%;">
                                        <i class="fa fa-dog"></i>
                                        <span class="count-numbers"></span>
                                        <span class="count-name">Dogs equipments</span>
                                   </div>
                                </a>
                            </div> 
                    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true"> 
                        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document"> 
                            <div class="modal-content"> 
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalScrollableTitle">Category : Dogs</h5> 
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                                        <span aria-hidden="true"></span> 
                                    </button> 
                                </div> 
                                <div class="modal-body pr-4 pl-4">
                                    <div id="pop" class="row">
                                        <?php
                                        $sql="SELECT * FROM services WHERE categorie='Food' AND target_species='Dog'";
                                        $stmt=$connect->query($sql);
                                        $stmt->execute();
                                        while ($value=$stmt->fetch()) {
                                            
                                         $id=$value['id'];?>
            
            <div class="mr-auto ml-auto  mt-4">
            <div class="card bg-dark mb-3 text-light">
                <img src="<?php echo $value['image']?>" class="img pb-2" alt="">
               <?php
               echo' <h5>'.$value['name'].'</h5>';
                echo'<span id="price" style="color:yellow;font-size:30px">'.$value['price'].'DT</span>';?>
            <form method="GET" action="equipment.php?id=<?php echo $id?>#added">
                <input type="submit" value="Add To Cart" name="addcart"><a name="added">
                    <input type="hidden" value="<?php echo $id?>" name="idp">
            </form> 
            </div>
            </div>
                                        <?php
                                        }?>
                                        
                                    </div>
                                </div> 
                                <div class="modal-footer"> 
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                                </div> 
                            </div> 
                        </div>
                    </div>

  <!--lmfao --><div class="col-md-3">
  <a type="button" data-toggle="modal" data-target="#exampleModalScrollable2" style="cursor:pointer;">
                            
                                    <div class="card-counter danger"style="margin-right:-125%;">
                                        <i class="fa fa-cat"></i>
                                        <span class="count-numbers"></span>
                                        <span class="count-name">Cats equipments</span>
                                    </div>
                                </a>
                            </div>
                            <div class="modal fade" id="exampleModalScrollable2" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true"> 
                        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document"> 
                            <div class="modal-content"> 
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalScrollableTitle">Category : Cats</h5> 
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                                        <span aria-hidden="true"></span> 
                                    </button> 
                                </div> 
                                <div class="modal-body pr-4 pl-4">
                                    <div id="pop" class="row">
                                        <?php
                                        $sql="SELECT * FROM services WHERE categorie='Food' AND target_species='Cat'";
                                        $stmt=$connect->query($sql);
                                        $stmt->execute();
                                        while ($value=$stmt->fetch()) {
                                            
                                         $id=$value['id'];?>
            
            <div class="mr-auto ml-auto  mt-4">
            <div class="card bg-dark mb-3 text-light">
                <img src="<?php echo $value['image']?>" class="img pb-2" alt="">
               <?php
               echo' <h5>'.$value['name'].'</h5>';
                echo'<span id="price" style="color:yellow;font-size:30px">'.$value['price'].'DT</span>';?>
           <form method="GET" action="equipment.php?id=<?php echo $id?>#added">
                <input type="submit" value="Add To Cart" name="addcart"><a name="added">
                    <input type="hidden" value="<?php echo $id?>" name="idp">
                </form> 
                </div>
        </div>
      
                                        <?php
                                        }?>
                                        
                                    </div>
                                </div> 
                                <div class="modal-footer"> 
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                                </div> 
                            </div> 
                        </div>
                    </div>

<!--lmfao-->
<div class="col-md-3">
<a type="button" data-toggle="modal" data-target="#exampleModalScrollable3" style="cursor:pointer;">
                              
                                    <div class="card-counter success" style="margin-right:-125%;">
                                        <i class="fa fa-frog"></i>
                                        <span class="count-numbers"></span>
                                        <span class="count-name">Rabbits equipments</span>
                                   </div>
                                </a>
                            </div> 
                    <div class="modal fade" id="exampleModalScrollable3" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true"> 
                        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document"> 
                            <div class="modal-content"> 
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalScrollableTitle">Category : Rabbits</h5> 
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                                        <span aria-hidden="true"></span> 
                                    </button> 
                                </div> 
                                <div class="modal-body pr-4 pl-4">
                                    <div id="pop" class="row">
                                        <?php
                                        $sql="SELECT * FROM services WHERE categorie='Food' AND target_species='Rabbit'";
                                        $stmt=$connect->query($sql);
                                        $stmt->execute();
                                        while ($value=$stmt->fetch()) {
                                            
                                         $id=$value['id'];?>
            
            <div class="mr-auto ml-auto  mt-4">
            <div class="card bg-dark mb-3 text-light">
                <img src="<?php echo $value['image']?>" class="img pb-2" alt="">
               <?php
               echo' <h5>'.$value['name'].'</h5>';
                echo'<span id="price" style="color:yellow;font-size:30px">'.$value['price'].'DT</span>';?>
           <form method="GET" action="equipment.php?id=<?php echo $id?>#added">
                <input type="submit" value="Add To Cart" name="addcart"><a name="added">
                    <input type="hidden" value="<?php echo $id?>" name="idp">
                </form> 
                </div>
        </div>
      
                                        <?php
                                        }?>
                                        
                                    </div>
                                </div> 
                                <div class="modal-footer"> 
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                                </div> 
                            </div> 
                        </div>
                    </div>
<!--lmfao-->
<div class="col-md-3">
<a type="button" data-toggle="modal" data-target="#exampleModalScrollable4" style="cursor:pointer;">
                              
                                    <div class="card-counter donation" style="margin-right:-125%;">
                                        <i class="fa fa-crow"></i>
                                        <span class="count-numbers"></span>
                                        <span class="count-name">Birds equipments</span>
                                   </div>
                                </a>
                            </div> 
                    <div class="modal fade" id="exampleModalScrollable4" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true"> 
                        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document"> 
                            <div class="modal-content"> 
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalScrollableTitle">Category : Birds</h5> 
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                                        <span aria-hidden="true"></span> 
                                    </button> 
                                </div> 
                                <div class="modal-body pr-4 pl-4">
                                    <div id="pop" class="row">
                                        <?php
                                        $sql="SELECT * FROM services WHERE categorie='Food' AND target_species='Bird'";
                                        $stmt=$connect->query($sql);
                                        $stmt->execute();
                                        while ($value=$stmt->fetch()) {
                                            
                                         $id=$value['id'];?>
            
            <div class="mr-auto ml-auto  mt-4">
            <div class="card bg-dark mb-3 text-light">
                <img src="<?php echo $value['image']?>" class="img pb-2" alt="">
               <?php
               echo' <h5>'.$value['name'].'</h5>';
                echo'<span id="price" style="color:yellow;font-size:30px">'.$value['price'].'DT</span>';?>
           <form method="GET" action="equipment.php?id=<?php echo $id?>#added">
                <input type="submit" value="Add To Cart" name="addcart"><a name="added">
                    <input type="hidden" value="<?php echo $id?>" name="idp">
                </form> 
                </div>
        </div>
      
                                        <?php
                                        }?>
                                        
                                    </div>
                                </div> 
                                <div class="modal-footer"> 
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                                </div> 
                            </div> 
                        </div>
                    </div>


<!--lmfao -->
  
                                                 
                </div>
            </div>
        </div>
    </div>
            <section class="collection col-md-11 ml-auto mr-auto mt-3 mb-5">
        <div class="container-fluid">
            <h2>List of Pet Food</h2>
            <div class="row py-3"><?php
					 foreach ($data1 as $value) {  
            $id=$value['id'];?>
            
            <div class="mr-auto ml-auto  mt-4">
            <div class="card bg-dark mb-3 text-light">
                <img src="<?php echo $value['image']?>" class="img pb-2" alt="">
               <?php
               echo' <h5>'.$value['name'].'</h5>';
                echo'<span id="price" style="color:yellow;font-size:30px">'.$value['price'].'DT</span>';?>
           <form method="GET" action="equipment.php?id=<?php echo $id?>#added">
                <input type="submit" value="Add To Cart" name="addcart"><a name="added">
                    <!-- <input type="submit" value="Add To Cart" name="addcart"> -->
                    <input type="hidden" value="<?php echo $id?>" name="idp">
                </form> 
                </div>
        </div>
      
       
        
    
 
					 <?php }
             
				?>				</div> 
				
           </section>
</section>

<?php include '../include/footer.php';?>


	<style>
    
    .card:hover input[type="submit"] {
        display: block;
    }
        img{width:300px;
        height:200px;}
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
