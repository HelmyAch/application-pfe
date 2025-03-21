<!-- <div class="row"> -->			
  <div class="col-md-11 col-xs-12 col-sm-12">
  	<div class="alert alert-info" role="alert">
  		<?php
			if(isset($errMsg)){
				echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
			}
		?>
  		<h2 class="text-center">EDIT</h2>
  		<form action="" method="POST">
		  	 <div class="row">
		  	 	<div class="col-md-4">
			  	  <div class="form-group">
				    <label for="fullname">Animal Name</label>
				    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data['id']; ?>">
				    <input type="text" class="form-control" id="fullname" placeholder="Full Name" name="fullname" value="<?php echo $data['fullname']?$data['fullname']:''; ?>" required>
				  </div>
				 </div>

				<div class="col-md-4">
				  <div class="form-group">
				    <label for="mobile">Owner Mobile</label>
				    <input type="text" class="form-control" id="mobile" placeholder="Mobile" name="mobile" value="<?php echo $data['mobile']?$data['mobile']:''; ?>" required>
				  </div>
				 </div>

				
			</div>

			<div class="row">
		  	 	<div class="col-md-4">
				  <div class="form-group">
				    <label for="email">Owner Email</label>
				    <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $data['email']?$data['email']:''; ?>" required>
				  </div>
				 </div>

				 <div class="col-md-4">
			  <div class="form-group">
			    <label for="city">City</label>
			    <input type="city" class="form-control" id="city" placeholder="City" name="city" value="<?php echo $data['city']?$data['city']:''; ?>" required>
			  </div>
			  </div>

				 
			</div>

			<div class="row">
				<div class="col-md-4">
			  <div class="form-group">
			    <label for="country">Country</label>
			    <input type="country" class="form-control" id="country" placeholder="Country" name="country" value="<?php echo $data['country']?$data['country']:''; ?>" required>
			  </div>
			  </div>

			  <div class="col-md-4">
			  <div class="form-group">
			    <label for="state">State</label>
			    <input type="state" class="form-control" id="state" placeholder="State" name="state" value="<?php echo $data['state']?$data['state']:''; ?>" required>
			  </div>
			  </div>
			 
			 </div>

			 <div class="row">
			 	<div class="col-md-2">
			 <div class="form-group">
			    <label for="rent">
weight</label>
			    <input type="rent" class="form-control" id="rent" placeholder="
weight" name="rent" value="<?php echo $data['rent']?$data['rent']:''; ?>" required>
			  </div>
			  </div>

			  
			  <div class="col-md-4">
			  <div class="form-group">
			    <label for="Type">Type</label>
			    <input type="type" class="form-control" id="type" placeholder="Type" name="type" value="<?php echo $data['type']?$data['type']:''; ?>" required>
			  </div>
			  </div>
			  <div class="col-md-4">
			  <div class="form-group">
			    <label for="categorie">Categorie</label>
				<select class="form-control" id="categorie" name="categorie" required>
    <option value="" disabled selected>Choose a category</option>
    <option value="Dog">Dog</option>
    <option value="Cat">Cat</option>
    <option value="Rabbit">Rabbit</option>
    <option value="Bird">Bird</option>
</select>
			  </div>
			  </div>

			  
		
			  </div>

			   <div class="row">
			 	<div class="col-md-4">
			  <div class="form-group">
			    <label for="description">Description</label>
			    <input type="description" class="form-control" id="description" placeholder="Description" name="description" value="<?php echo $data['description']?$data['description']:''; ?>" required>
			  </div>
			   </div>
			  
			  
			    </div>				  
			  
			   <div class="row">
			   	
			 			
			  <button type="submit" class="btn btn-primary" name='register_individuals' value="register_individuals">Submit</button>
			</form>	
			</div>			
  	</div>