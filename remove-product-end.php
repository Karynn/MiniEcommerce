<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/remove-product.css">
	<title>
		Home
	</title>
	</head>

	<body>
		<header>
			<h1 class="title">Mini Ecommerce</h1>

		</header>
    <center>
		<h3 class = "form-title" >REMOVE  PRODUCT</h3>

    <section class="products-section">
      <ul class="products-list">


		<?php
			$products = count($_POST);
			$array = array_keys($_POST); // obtiene los nombres de las varibles
			$array_values = array_values($_POST);// obtiene los valores de las varibles
			$servername = "localhost";
			$username = "root";
			$db = "miniecommerce";
			$conn = new mysqli($servername, $username, "", $db);
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			if($products>=1){
				for($i=0;$i<$products;$i++){
					$array[$i]=urldecode($array_values[$i]);
					$sql = "SELECT * FROM PRODUCTOS WHERE ACTIVO=1 AND NOMBRE='".$array[$i]."'";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
								 $row = $result->fetch_assoc();
								 $name = ($row["NOMBRE"]);
								 $img_path = $row["IMG"];
								 $cost = $row["PRECIO"];
								 $real_name = urlencode($row["NOMBRE"]);
								 echo "
								 <li class="."product".">
										 <img width="."100px"." height="."100px"." src='".$img_path."' class="."product-img".">
											 <div clas="."product-texts".">
												 <p class="."product-name"." >
													 "."$name"."
												 </p><br>
												 <p class="."product-price"." >
													 Bs. ".$cost."
												 </p>
											 </div>
								 </li>";
								 $sql = "UPDATE  PRODUCTOS SET ACTIVO=0 WHERE NOMBRE = '".$name."'";
								 $result = $conn->query($sql);
						 }
				}
			}
			$conn->close();
    ?>
	</ul>
	</section>
					<a href= "remove-product.php">
						<button class=button1>
								TRY AGAIN.
						</button>
					</a>
					<br>
					<a href= index.php>
						<button class="button1">
							GO HOMEPAGE.
						</button>
					</a>
	</center>
	</body>
</html>