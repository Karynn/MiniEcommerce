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
		<form class = ".new-product-form" action="remove-product-result.php" method="post" enctype="multipart/form-data">
    <section class="products-section">
      <ul class="products-list">
        <?php
				include ("php/functions.php");
        if(isset($_GET['pagina']) && $_GET['pagina']!=1){
          $pagina = 0;
          for ($i=1; $i <$_GET['pagina'] ; $i++) {
            $pagina = $pagina + 9;
          }
        } else {
          $pagina = 1;
        }
        //$pagina = 3;//para los indices
        $sql = "SELECT NOMBRE, IMG, PRECIO FROM productos WHERE Activo=1 ";
        $result = fun_sql_query($sql);

        if ($result->num_rows > 0) {
             // output data of each row
						 $count = 0;
             while($row = $result->fetch_assoc()) {
               $name = ($row["NOMBRE"]);
               $img_path = $row["IMG"];
               $cost = $row["PRECIO"];
							 $real_name = urlencode($row["NOMBRE"]);
							 $pname = "product".$count;
							 echo fun_show_product_remove2($name,$img_path,$cost,$pname);
							 $count++;
             }
        } else {
             echo "0 results";
        }
        ?>
      </ul>
    </section >
		<input class="product-submit" type = "submit" value="Remove product">
		</form>
    </center>
	</body>
</html>
