<!DOCTYPE html>
<html>
<head>
	<title>Balance Page</title>
	<meta name="viweport" content="width=device-width,initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" href="balance.css">
	<link href="https://fonts.googleapis.com/css2?family=Vollkorn:ital,wght@1,800&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@600&family=Vollkorn:ital,wght@1,800&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@900&display=swap" rel="stylesheet">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>

		<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand text-white" href="index.html">HOME</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link text-white" href="details.php">VIEW <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="transaction.php">TRANSFER</a>
      </li>
     
    </ul>
  </div>
</nav>
<div class="container">
	<h1 style="color:green;text-align:center;text-shadow:0px 0px 2px blue;">Check Balance</h1> 
	<form method="post" action="#">
		  <div class="col">
		    <div class="row">
		      Enter Account Number: <input type="text" class="form-control" pattern="^\d{9,18}$" name="acc_no">
		      <br><br>
		    </div>

		    <div class="row">
		     <input type="submit" class="btn btn-success" value="Check Balance">
		    </div>
		  </div>
		</form>
			
		</div>
		
	 <?php

	@include "connection.php";

	 $acc_no = $_POST['acc_no'];
		 $sql = "SELECT *from customers_table WHERE Account_no='$acc_no'";

		 $result = mysqli_query($conn, $sql);

		 if(mysqli_num_rows($result)>0)
		 {
		 	 while($row = mysqli_fetch_assoc($result))
		 	 {?>

		 	 	<script>swal("Your balance is <?php echo $row['Balance'];?>");</script>
		 <?php	 }
		 	}
		 	else{
		 		if($acc_no != NULL){
		 		?>
		 		<script>swal("Account does not exist!!");</script>
		<?php 	}
	}
		 	?>
		
</body>
</html>