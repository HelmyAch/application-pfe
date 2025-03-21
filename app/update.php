<?php
	require '../config/config.php';
	if(empty($_SESSION['username']))
		header('Location: login.php');

		
$act=$_GET['act'];
			$idd=$_GET['id'];
				try{
					
					$sqlQuery="SELECT * FROM animals where id='$idd'";
					$stmt = $connect->prepare($sqlQuery);
					$stmt->execute();
					$data = $stmt->fetch(PDO::FETCH_ASSOC);
				}catch(PDOException $e) {
					echo $e->getMessage();
				}	
				if(isset($_POST['register_individuals'])){		
				$fullname = $_POST['fullname'];
				$email = $_POST['email'];
				$mobile = $_POST['mobile'];
				
			
				$country = $_POST['country'];
				$state = $_POST['state'];
				$city = $_POST['city'];
				$type = $_POST['type'];
				$categorie = $_POST['categorie'];
				$rent = $_POST['rent'];
				
				$description = $_POST['description'];
				//$open_for_sharing = $_POST['open_for_sharing'];
				$user_id = $_SESSION['id'];
			
				$image = $_POST['image']?$_POST['image']:NULL;
				$target_file = "";
			if (isset($_FILES["image"]["name"])) {
				$target_file = basename($_FILES["image"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				// Check if image file is a actual image or fake image
			    $check = getimagesize($_FILES["image"]["tmp_name"]);			
			    if($check !== false) {
			    	move_uploaded_file($_FILES["image"]["tmp_name"],  $_FILES["image"]["name"]);
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}
				try {
					$sqlQuery="UPDATE animals SET fullname = '$fullname',  email = '$email', mobile = '$mobile', country = '$country', state = '$state', city = '$city', type = '$type', categorie = '$categorie', rent = '$rent',  description = '$description', user_id = '$user_id'  WHERE id = '$idd'";
					$stmt = $connect->prepare($sqlQuery);
					$stmt->execute();
	
					header('Location: update.php?id='.$idd.'&act='.$act.'&action=reg');
					exit;
				}catch(PDOException $e) {
					echo $e->getMessage();
				}
			}
		
			$errMsg = '';
			
			
	


	
	

	if(isset($_GET['action']) && $_GET['action'] == 'reg') {
		$errMsg = 'Update successful. Thank you';
	}
			
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
<section class="wrapper" style="margin-left: 16%;margin-top: -11%;">
	<?php
		
			
	

	  		if ($_GET['act'] === 'rent') {
	  			include 'partials/edit/individaul.php';
	  		}
		  		
  	?>
</section>
<?php include '../include/footer.php';?>
<script type="text/javascript">
	var rowCount = 1;
	function addMoreRows(frm) {
		rowCount ++;
		var recRow = '<div id="rowCount'+rowCount+'"><tr><td><input name="ap_number_of_plats[]" type="text" size="16%" placeholder="  Plat Number" maxlength="120"/></td><td><input name="rooms[]" type="text"  maxlength="120" placeholder="  2BHK/3BHK/1RK" style="margin: 4px 5px 0 5px;"/></td><td><input name="" type="hidden" maxlength="120" style="margin: 4px 10px 0 0px;"/></td></tr><a href="javascript:void(0);" onclick="removeRow('+rowCount+');" class="btn btn-danger btn-sm">Delete</a></div>';
		$('#addedRows').append(recRow);
	}
	function removeRow(removeNum) {
		console.log("hhh");
		console.log(removeNum);
		$('#rowCount'+removeNum).remove();
	}
</script>


