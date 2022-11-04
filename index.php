<?php
include("dbQuery.php");
$obj=new dbQuery();



?>
<html>
<head>
<title>Asset Form</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body class="bg-info">
<div class="container">
<div class="row">
<div class="col-md-8">


</div>
<div class="col-md-4">
<br>

</div>
</div>
<div class="card mt-5">

        <div class="card-header"><h3>List of all Assets</h3></div>
	
        <div class="card-body">
		<button class="btn btn-info" data-toggle="modal" data-target="#AddAsset">
			</h2><b>ADD ASSET<b></h2>
		</button>
            <table class="table table-bordered	mt-5">
                <tr>
					<th scope="col">Id</th>
					<th>Asset</th>
					<th>Description</th>
					<th>Quantity</th>
					<th>Unity Price</th>
					<th>Total Price</th>
                    <th colspan="2" scope="col">ACTION</th>
                </tr>
				<?php
					$query=$obj->ViewAllRecord("Asset");
					$i=1;
					while($row=$query->fetch()){
			    ?>
               <tbody>
			<tr>
				<td><?php echo $row['ID'];?></td>
				<td><?php echo $row['Asset'];?></td>
				<td><?php echo $row['Description'];?></td>
				<td><?php echo $row['Quantity'];?></td>
				<td><?php echo $row['Unity_price'];?></td>
				<td>
					<?php 
						$totalprice=$row['Quantity']*$row['Unity_price'];
				    	echo number_format($totalprice,2);
					?>
				</td>

				<td>
					<a onclick="return confirm('are you sure you want to delete this person')" href="delete.php?ID=<?php echo $row['ID']; ?>" class="btn btn-danger">
					<i class="fa fa-trash">DELETE</i>	</a>
				</td>
				<td>
					<a onclick="return confirm('are you sure you want to update this person')" href="update.php?ID=<?php echo $row['ID']; ?>" class="btn btn-info">
					<i class="fa fa-trash">UPDATE</i>	</a>
				</td>
				
			</tr>
	
			</tbody>
			<?php
			$i++;
			}
			?>
		</table>
        </div>
    </div>




 <!--   START OF MODEL -->
	<div class="modal fade" id="AddAsset">
	   <div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-info">
					<h2 class="modal-title text-white">Add Asset Form</h2>	
				</div>

				<div class="modal-body">
					<form class="form" method="post">
						<div class="form-group">
							<label> Asset:</label>
							<input type="text" class="form-control" name="asset" required>
						</div>
						<div class="form-group">
							<label> Description:</label>
							<textarea class="form-control" name="description" rows="5" cols="3"></textarea>
						</div>

						<div class="form-group">
							<label> Quantity:</label>
							<input type="number" class="form-control" name="qty" required>
						</div>

						<div class="form-group">
							<label> Unity Price:</label>
							<input type="number" class="form-control" name="uprice" required>
						</div>

						<div class="form-group">
							<input type="submit" value="Add Asset"  class="btn btn-primary" name="Save">
							
						</div>
					</form>
					<?php
					if(isset($_POST['Save'])){
						$Save=$obj->AddNewRecord("Asset",$_POST['asset'],$_POST['description'],$_POST['qty'],$_POST['uprice']);
						if($Save==1){
							header("location:index.php");
						}
						else{
							echo"<sript>alert('fail to record');</script>";
						}
					}

					?>
			   </div>
			</div>
		</div>
	</div>


	<!--   START OF EDIT MODEL -->
	<div class="modal fade" id="AddAsset">
	   <div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-info">
					<h2 class="modal-title text-white">Add Asset Form</h2>	
				</div>

				<div class="modal-body">
					<form class="form" method="post">
						<div class="form-group">
							<label> Asset:</label>
							<input type="text" class="form-control" name="asset" required>
						</div>
						<div class="form-group">
							<label> Description:</label>
							<textarea class="form-control" name="description" rows="5" cols="3"></textarea>
						</div>

						<div class="form-group">
							<label> Quantity:</label>
							<input type="number" class="form-control" name="qty" required>
						</div>

						<div class="form-group">
							<label> Unity Price:</label>
							<input type="number" class="form-control" name="uprice" required>
						</div>

						<div class="form-group">
							<input type="submit" value="ADD ASSET" class="btn btn-primary" name="Save">
							<button type="submit" class="btn btn-secondary" data-dismiss="model">Close</button>
						</div>
					</form>
					<?php
					if(isset($_POST['Save'])){
						$Save=$obj->AddNewRecord("Asset",$_POST['asset'],$_POST['description'],$_POST['qty'],$_POST['uprice']);
						if($Save==1){
							echo"<script>alert('Record is successfuly Added');</srcipt>";
						}
						else{
							echo"<sript>alert('fail to record');</script>";
						}
					}

					?>
			   </div>
			</div>
		</div>
	</div>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="assets/js/fontawesome.js"></script>
</body>
</html>
