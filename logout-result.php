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
		 <?php
		 		session_start();
				$servername = "localhost";
        $username = "root";
        $db = "miniecommerce";
        $conn = new mysqli($servername, $username, "", $db);
        if ($conn->connect_error) {
           echo "Connection failed: " . $conn->connect_error;
         }
				$login = $_SESSION["login"];
				$timeInit = $_SESSION["timeInit"];
				$sql = "SELECT * FROM sesion WHERE LOGIN='".$login."' AND FECHA_INI ='".$timeInit."'";
        $result = $conn->query($sql);

				if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					$timeEnd = date("Y-m-d H:i:s");
					$dateStart = new DateTime($_SESSION["timeInit"]);
				  $dateEnd   = new DateTime($timeEnd);
					$dateDiff  = $dateStart->diff($dateEnd);
				  $date = $dateDiff->format("%Y-%M-%D %H:%I:%S");
					$active = 0;
					$sql = "UPDATE sesion SET fecha_fin='".$timeEnd."',ACTIVO='".$active."',TIEMPO = '".$date."' WHERE LOGIN='".$login."' AND fecha_ini='".$timeInit."'";
					$result = $conn->query($sql);
				}
				$conn->close();
		 		session_destroy();
		   	include ("php/add-login.php");
		 ?>
		<h1 class="title">
				Minie-commerce
		</h1>
	</header>
	<center>
		<div>
		<div class="botom-logout">
    	<p>
        SESSION FINISHED!!!
      </p>
		</div>
		<div class="botom-logout">
			<a href= "index.php">
			<button class = "button1">
        	GO HOMEPAGE.
      </button>
			</a>
	</div>
	</div>
  </center>

</body>
</html>
