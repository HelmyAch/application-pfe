<?php
	require '../config/config.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>export reciep</title>
</head>
<style>
  
</style>
  <?php  $total=0;
        $sqlQuery1="SELECT * FROM cart";
        $stmt1 = $connect->prepare($sqlQuery1);
        $stmt1->execute();
        $data2 = $stmt1->fetchAll (PDO::FETCH_ASSOC);

      

    ?>
<body id="reciep" onload="topdf()">    
    <h2 style="margin-left:160px;margin-top:30px">PetHub</h2>
    <table class="table" style="width:400px;margin-left:80px;margin-top:80px">    
        <tr><th>description</th><th>category</th><th>price</th></tr>

    <?php

foreach($data2 as $value){

    $idc=$value['serviceid'];
        $sqlQuery="SELECT * FROM services where id=$idc";
        $stmt = $connect->prepare($sqlQuery);
        $stmt->execute();
        $data1 = $stmt->fetchAll (PDO::FETCH_ASSOC);
        foreach ($data1 as $data){
            $total+=$data['price'];
   echo' <tr><td>'.$data['description'].'</td><td>'.$data['categorie'].'</td><td>'.$data['price'].'DT</td></tr>';
}}


echo "<tr><th></th><th></th><th>Total:$total DT</th><th></tr>";

?>
</table>
 <span style="margin-left: 90px">Thank You <?php echo $_SESSION['fullname']?> for shopping :) </span>
</body>
<?php
if (isset($_SESSION['username'])) {
    echo "<script>
    function topdf(){
        var exp = document.getElementById('reciep');
        html2pdf(exp);
        window.setTimeout(redirect,200);
    }
    function redirect(){
            window.location.replace('cart.php?buy=true');
    }
    
</script>";
}else {
    echo "<script>window.location.replace('login.php');</script>";
}

?>