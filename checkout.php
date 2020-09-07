<?php 
include 'dbconfig.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
	$product_id=$_POST['product_id'];

	$sql="SELECT * FROM products WHERE id='$product_id'";
	$result=mysqli_query($conn,$sql);
	if($result){
		if(mysqli_num_rows($result)==1){
			$products=mysqli_fetch_assoc($result);
			$invoice_no=$products['id'].time();
			$total=$products['amount'];
			$created_at=date('Y-m-d H:i:s');
			$query="INSERT INTO orders(product_id,invoice_no,total,status,created_at) VALUES('$product_id','$invoice_no','$total',0,$created_at)";

			if(!mysqli_query($conn,$query)){
				// die('Error!');
			}else{

			}
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Order Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="pt-md-5">
			<div class="col-md-12">
				<div class="row">			
					<div class="col-md-4">
						<div class="card" style="width: 18rem;">
							<div class="imagecontainer" style="height: 400px">
								<img src="image/<?php echo $products['image'] ?>" class="card-img-top" alt="..." style="width: 100%; height: 100%;">
							</div>
							<div class="card-body">
								<h5 class="card-title"><?php echo $products['title'];?></h5>
								<p class="card-text">Rs. <?php echo  $products['amount'];?></p>
								<p class="card-text"><?php echo $products['description'];?></p>
								<!-- <form action="checkout.php" method="post">
									<input type="hidden" name="product_id" value="<?php $products['id']?>">
									<input type="submit" name="submit" value="Buy Now" class="btn btn-success">
								</form> -->
							</div>

						</div>
					</div>
					<div class="col-md-6">
						<h3>Pay With</h3> 
						<ul class="list-group">
							<li class="list-group-item">
								<form action="https://uat.esewa.com.np/epay/main" method="POST">
									<input value="<?php echo $total;?>" name="tAmt" type="hidden">
									<input value="<?php echo $total;?>" name="amt" type="hidden">
									<input value="0" name="txAmt" type="hidden">
									<input value="0" name="psc" type="hidden">
									<input value="0" name="pdc" type="hidden">
									<input value="epay_payment" name="scd" type="hidden">
									<input value="<?php echo $invoice_no;?>" name="pid" type="hidden">
									<input value="http://localhost/esewa/esewa_payment_success.php?q=su" type="hidden" name="su">
									<input value="http://localhost/esewa/esewa_payment_failed.php?q=fu" type="hidden" name="fu">
									<input type="image" src="image/esewa.png" name=""></li>
								</form>
								<li class="list-group-item"><input type="image" src="image/fonepay.png" name=""></li>
								<li class="list-group-item"><input type="image" src="image/khalti.png" name=""></li>
								<li class="list-group-item"><input type="image" src="image/hbl.jpeg" name=""></li>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>
