<?php
	require '../config/config.php';
	if(empty($_SESSION['username']))
		header('Location: login.php');	
$total=0;
        $sqlQuery1="SELECT * FROM cart";
        $stmt1 = $connect->prepare($sqlQuery1);
        $stmt1->execute();
        $data2 = $stmt1->fetchAll (PDO::FETCH_ASSOC);



        if(isset($_GET['id'])) {
            $Iddd = $_GET['id'];
            try {
                $sqlQuery = "DELETE FROM cart WHERE id =$Iddd";
                $stmt = $connect->prepare($sqlQuery);
                $stmt->execute();
                header('Location: cart.php?success=true'); 
                exit(); 
            } catch(PDOException $e) {
                $errMsg = $e->getMessage();
                echo "Erreur : " . $errMsg;
            }   
        
        }
        if(isset($_GET['buy'])) {
           
            try {
                $sqlQuery = "DELETE FROM cart";
                $stmt = $connect->prepare($sqlQuery);
                $stmt->execute();
                header('Location: cart.php?success=true'); 
                exit(); 
            } catch(PDOException $e) {
                $errMsg = $e->getMessage();
                echo "Erreur : " . $errMsg;
            }   
        
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



<section class="wrapper" style="margin-left: 16%;margin-top: -0%;">
	<div class="container">
		<div class="row">
			<div class="col-12">



<table class="table bg-white rounded" id="tab">
<tr><th>shopping bag</th><th>description</th><th>category</th><th>price</th><th></th></tr>
<?php
foreach($data2 as $value){

    $idc=$value['serviceid'];
        $sqlQuery="SELECT * FROM services where id=$idc";
        $stmt = $connect->prepare($sqlQuery);
        $stmt->execute();
        $data1 = $stmt->fetchAll (PDO::FETCH_ASSOC);
        foreach ($data1 as $data){
            $total+=$data['price'];
   echo' <tr><td>'.$data['id'].'</td><td>'.$data['description'].'</td><td>'.$data['categorie'].'</td><td>'.$data['price'].'DT</td><th><a href="cart.php?id='.$value['id'].'" class="btn btn-danger">Delete</a></td></th></tr>';
}}
echo "<tr><th></th><th></th><th></th><th>Total:$total DT</th><th></th></tr>";
?>

</table>
<form class="bg-white">
  <div class="mb-3 offset-md-1">
    <label for="exampleInputEmail1" class="form-label">CARD NUMBER</label>
    <input type="email" class="form-control col-md-5" placeholder="4545454545454545" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3 offset-md-1">
    <label for="exampleInputPassword1" class="form-label">OWNER NAME</label>
    <input type="text" class="form-control col-md-5" id="exampleInputPassword1">
  </div>
  <div class="row ml-1">
  <div class="mb-4 offset-md-1">
    <label for="exampleInputPassword1" class="form-label">EXPIRE DATE</label>
    <input type="text" class="form-control col-md-12" placeholder="mm/yyyy" id="exampleInputPassword1">
  </div>
  <div class="mb-4 offset-md-1">
    <label for="exampleInputPassword1" class="form-label">CVV:</label>
    <input type="text" class="form-control col-md-12" placeholder="cvv" id="exampleInputPassword1">
  </div>  


  </div>
  <a class='buy' style='font-size:40px;'href='export.php'>pay<?php echo''.$total.'' ?> DT</a>
</form>


</div></div></div></section>






            <?php include '../include/footer.php';?>