
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/index.css">
	<title>
		Home
	</title>
</head>
<body>
	<header>
		<div class="right-side">
			  <a class="cart-link" href="index.php">
          <img width="30px" height="30px" src="images/cart.png" class="icono-carrito">
     		</a>
				<?php
				 	include ("php/add-login.php");
				?>
		</div>
		<h1 class="title">
				Mini e-commerce
		</h1>
	</header>
	<center>
		<?php
			include ("php/verify-roles.php");
		?>
	<section class="products-section">
		<ul class="products-list">

			<?php
			if(isset($_GET['pagina']) && $_GET['pagina']!=1){
  			$pagina = 0;
				for ($i=1; $i <$_GET['pagina'] ; $i++) {
					$pagina = $pagina + 9;
				}
			} else {
				$pagina = 1;
			}
			$servername = "localhost";
			$username = "root";
			$db = "miniecommerce";
			// Create connection
			$conn = new mysqli($servername, $username, "", $db);
			// Check connection
			if ($conn->connect_error) {
			     die("Connection failed: " . $conn->connect_error);
			}

			//$pagina = 3;//para los indices
			$sql = "SELECT NOMBRE, IMG, PRECIO FROM PRODUCTOS LIMIT 9 OFFSET $pagina";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			     // output data of each row
			     while($row = $result->fetch_assoc()) {

			       $nombre = ($row["NOMBRE"]);
			       $img_path = $row["IMG"];
			       $precio = $row["PRECIO"];
						 $nameImage = urlencode($row["NOMBRE"]);
			       echo "
						 				<li class="."product".">
							 				<a href="."product-detail.php?name=".$nameImage." class="."product-link".">
							 					<img width="."200px"." height="."200px"." src='".$img_path."' class="."product-img".">
													<div clas="."product-texts".">
													<p class="."product-name"." >
							 							"."$nombre"."
													</p>
													<p class="."product-price"." >
														Bs. ".  $precio."
													</p>
							 				</a>
													</div>
							 			</li>
									";
			     }
			} else {
			     echo "0 results";
			}

			$conn->close();
			?>

		</ul>
	</section >
  </center>
	<section class="index-section">
		<form class="index" action="index.php">
			<?php
				include("php/paginacion.php");
			 ?>
		</form>
	</section>

</body>
</html>
