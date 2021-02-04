<!DOCTYPE html>
<html>
<head>
	<title>Customer Page</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta charset="utf-8">

	<link rel="stylesheet" href="customer.css">
	<link href="https://fonts.googleapis.com/css2?family=Vollkorn:ital,wght@1,800&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@600&family=Vollkorn:ital,wght@1,800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@900&display=swap" rel="stylesheet">
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
       <li class="nav-item">
        <a class="nav-link text-white" href="balance.php">BALANCE</a>
      </li>
     
    </ul>
  </div>
</nav>

	<?php

		 @include "connection.php";

		 $acc_no = $_POST['acc_no'];
		 $sql = "SELECT *from customers_table WHERE Account_no='$acc_no'";

		 $result = mysqli_query($conn, $sql);

		 
		 if(mysqli_num_rows($result)>0)
		 {
		 	 while($row = mysqli_fetch_assoc($result))
		 	 {

		 ?>
		 <div class="table-responsive">
		 <table class="table table-dark">
		 	<thead>
		<tr>
			<th>Customer_id</th>
			<th>Customer_name</th>
			<th>Customer_dob</th>
			<th>Customer_phone</th>
			<th>Account_number</th>
			<th>Email</th>
			<th>Balance</th>
		</tr>
</thead>
<tbody>
		<tr>
	  	<td><?php echo $row['Cus_id'].'<br/>';?></td>
	  	<td><?php echo $row['Cus_name'].'<br/>';?></td>
	  	<td><?php echo $row['Cus_dob'].'<br/>';?></td>
	  	<td><?php echo $row['Cus_pho'].'<br/>';?></td>
	  	<td><?php echo $row['Account_no'].'<br/>';?></td>
	  	<td><?php echo $row['Email'].'<br>';?></td>
	  	<td><?php echo $row['Balance'].'<br/>';?></td>
	 	<?php }	
	 }else{
	 	if($acc_no!= NULL)?>
	 	<h1 id="account" style="color:darkblue;text-align:center;"> <?php	echo "Account does not exists!!";?></h1>
	<?php }
	


	 
 mysqli_close($conn);
 ?>  
	</tr>
</tbody>
</table>
<h2 class="text-white"><i class="fa fa-history text-white" aria-hidden="true"></i><u>Transaction History</u></h2>
<div class="table-responsive">
	<table class="table table-dark">

		 <thead>
			    <tr>
			     <th>Transaction_id</th>
						<th>From_acc_no</th>
						<th>To_acc_no</th>
						<th>Amount</th>
						<th>Date</th>
						
						
			    </tr>
			  </thead>
			   <?php 
  @include "connection.php";

   $acc_number = $_POST['acc_no'];
		 $sql1 = "SELECT *from transfer_table WHERE From_acc_no='$acc_number'";

		 $result1 = mysqli_query($conn, $sql1);

		
		 if(mysqli_num_rows($result1)>0)
		 {?>
		 	

		 	<?php while($row = mysqli_fetch_assoc($result1))
		 	 {?>
		 	
			  <tbody>
			  	<tr>
  	<td><?php echo $row['Transaction_id'].'<br/>';?></td>
			  	<td><?php echo $row['From_acc_no'].'<br/>';?></td>
			  	<td><?php echo $row['To_acc_no'].'<br/>';?></td>
			  	<td><?php echo $row['Amount'].'<br/>';?></td>
			  	<td><?php echo $row['Date'].'<br/>';?></td>
			  	
			 	<?php }	
	 }else{
	 	if($acc_number!= NULL)?>
	 		<h1 id="php" style="color:green;text-align:center;"><?php echo "No transaction made!!";?></h1>
	<?php }
	 mysqli_close($conn);

		 
  ?>
</tr>
</tbody>
</table>
	</div>
</body>

</html>