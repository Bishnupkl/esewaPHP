<?php include 'dbconfig.php'; 
$sql="SELECT * FROM products";
$result=mysqli_query($conn,$sql);
// var_dump($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title>ESEWA Payment Gateway</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="pt-md-5">
			<div class="row">	
				<div class="product-wrapper">
					<?php while ($products=mysqli_fetch_assoc($result)){ 
						?>
						<div class="col-md-4">
							<div class="card" style="width: 18rem;">
								<img src="image/<?php echo $products['image'] ?>" class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title">Card title</h5>
									<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
									<a href="#" class="btn btn-primary">Go somewhere</a>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>