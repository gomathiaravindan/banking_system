<?php @include "connection.php";?>

<!DOCTYPE html>
<html>
<head>
	<title>Details Page</title>
	<meta charset= "utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="details.css">
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
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-white" href="transaction.php">TRANSFER <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="balance.php">BALANCE</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="customer.php" method="post">
      <input class="form-control mr-sm-2" type="search"  pattern="^\d{9,18}$" placeholder="Search" name = "acc_no" aria-label="Search">
      <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Search" action="customer.php">
    </form>
  </div>
</nav>
	<div class="container-fluid">
		<div class="table-responsive">
		<table class="table">
  <thead class="text-white">
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
		
			
		
	<?php

		 $query = "SELECT *FROM customers_table";

		 $result = mysqli_query($conn, $query);
		 if(mysqli_num_rows($result)>0)
		 {
		  while($row = mysqli_fetch_assoc($result))
		  {?>


		<tr>
	  	<td class="text-white"><?php echo $row['Cus_id'].'<br/>';?></td>
	  	<td class="text-white"><?php echo $row['Cus_name'].'<br/>';?></td>
	  	<td class="text-white"><?php echo $row['Cus_dob'].'<br/>';?></td>
	  	<td class="text-white"><?php echo $row['Cus_pho'].'<br/>';?></td>
	  	<td class="text-white"><?php echo $row['Account_no'].'<br/>';?></td>
	  	<td class="text-white"><?php echo $row['Email'].'<br>';?></td>
	  	<td class="text-white"><?php echo $row['Balance'].'<br/>';?></td>
	 	<?php }	
	 }
 mysqli_close($conn);
 ?> 
 </tr>
 </tbody>
 </table>
 </div>
 <br><br>
 <h2 class="text-white text-center"><i class="fa fa-history text-white" aria-hidden="true"></i><u>Transaction History</u></h2>
 <br>

 <div class="table-responsive">
		<table class="table">
  <thead class="text-white">
    <tr>
     <th>Transaction_id</th>
			<th>From_acc_no</th>
			<th>To_acc_no</th>
			<th>Amount</th>
			<th>Date</th>
			
			
    </tr>
  </thead>
  <tbody>
  	<?php
  	 @include "connection.php";
		 $q = "SELECT *FROM transfer_table";

		 $re = mysqli_query($conn, $q);
		 if(mysqli_num_rows($re)>0)
		 {
		  while($row1 = mysqli_fetch_assoc($re))
		  {?>


		<tr>
	  	<td class="text-white"><?php echo $row1['Transaction_id'].'<br/>';?></td>
	  	<td class="text-white"><?php echo $row1['From_acc_no'].'<br/>';?></td>
	  	<td class="text-white"><?php echo $row1['To_acc_no'].'<br/>';?></td>
	  	<td class="text-white"><?php echo $row1['Amount'].'<br/>';?></td>
	  	<td class="text-white"><?php echo $row1['Date'].'<br/>';?></td>
	  	
	 	<?php }	
	 }
 mysqli_close($conn);
 ?> 
</tr>
</tbody>

</div>
</body>
</html>



