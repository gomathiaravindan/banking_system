<!DOCTYPE html>
<html>
<head>
	<title>Transaction Page</title>
	<meta name="viweport" content="width=device-width,initial-scale=1.0">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale =1.0">
	<link rel="stylesheet" href="transaction.css">
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
        <a class="nav-link text-white" href="balance.php">BALANCE</a>
      </li>
     
    </ul>
  </div>
</nav>
<h1 id="heading">Transaction Page</h1>
<div class="container-box">
	
<form method="post" action="#" id="form1">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">From</label>
      <input type="text" class="form-control" pattern="^\d{9,18}$" title="Please enter the valid account number!!" name="acc_no" id="f_acc_no" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">To</label>
      <input type="text" class="form-control" pattern="^\d{9,18}$" name="t_acc_no" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Amount to be transfered</label>
    <input type="text" class="form-control" name="amnt" required >
  </div>
<br>
  <input type="submit" value="Transfer" class="btn btn-primary" name="action">
</form>
</div>


<?php

@include "connection.php";

$f_acc_no = $_POST['acc_no'];

$to_acc_no = $_POST['t_acc_no'];

$date = date("Y-m-d");


$amnt= $_POST['amnt'];

	
if($_POST['action']== "Transfer"){

if($f_acc_no!=$to_acc_no){



 if($amnt>0){

	$sq = "SELECT Balance FROM customers_table WHERE Account_no = '$f_acc_no'";
 	$res = mysqli_query($conn, $sq);
 	if(mysqli_num_rows($res)>0)
 	{
 		while($row = mysqli_fetch_assoc($res))
 		{
 			if($amnt > $row['Balance'])
 			{?>
 				<script>alert("Insufficient Balance and Your balance is <?php echo $row['Balance']?>");</script>
 			<?php }

 			else{
 				$sql= "INSERT INTO transfer_table(`From_acc_no`,`To_acc_no`,`Amount`,`Date`) VALUES('$f_acc_no','$to_acc_no','$amnt','$date')";
 
			 if($result = mysqli_query($conn, $sql))
 	  {
			 	$sql1 = "SELECT Balance FROM customers_table WHERE Account_no = '$f_acc_no'";
			 	$result1 = mysqli_query($conn, $sql1);
			 	if(mysqli_num_rows($result1)>0)
			 	{
			 		while($row = mysqli_fetch_assoc($result1))
			 		{
			 			$bal = $row['Balance'] - $amnt;
			 			$sql3 = "UPDATE customers_table SET Balance = '$bal' WHERE Account_no='$f_acc_no'";
			 			if($result2 = mysqli_query($conn, $sql3)){?>
			 				<script> alert("Transaction is successfull!!");</script>
			 			<h1 id="php"><?php	echo "Your Balance is". $bal;?></h1>
			 		<?php 

            $q1 = "SELECT Balance FROM customers_table WHERE Account_no='$to_acc_no'";
            $result2 = mysqli_query($conn,$q1);
           if(mysqli_num_rows($result2)>0)
           {
            while($row = mysqli_fetch_assoc($result2))
          {
            $bal1 = $row['Balance'] + $amnt;
            $q2 = "UPDATE customers_table SET Balance = '$bal1' WHERE Account_no='$to_acc_no'";
            if($result3=mysqli_query($conn, $q2)){?>
              <script>swal("Balance updated is successfull!!");</script>
           <?php }

          	}
			 		}
			 	}
 	}
}
	
 }
}
}
}


else{?>
	<h1 id="php1"  style="color:green;text-shadow: 2px 2px 2px blue; text-align:center;"><?php echo "Account does not exists!!";?></h1>
<?php }
}else{
  if(($f_acc_no && $to_acc_no)!= NULL)
  {?>
      <script>alert("Amount not valid!!");</script>
 <?php }
}
}
else{
  if(($f_acc_no && $to_acc_no)!= NULL){?>
    <script>alert("Cannot transfer to the same account!!");</script>
 <?php }
}
}



 mysqli_close($conn);
 ?>

</body>
</html>
