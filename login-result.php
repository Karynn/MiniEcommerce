<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login Result</title>
    <link rel="stylesheet" type="text/css" href="css/new-custommer.css">
  </head>
  <body>
    <header class="result-header">
      <h1 class="title">Mini Ecommerce</h1>
    </header>
    <?php

      if(isset($_GET['email'])){
        $email = $_GET['email'];
      } else{
        $email = null;
      }
      if(isset($_GET['password'])){
        $password = $_GET['password'];
      } else {
        $password = null;
      }

      $servername = "localhost";
      $username = "root";
      $db = "miniecommerce";
      // Create connection
      $conn = new mysqli($servername, $username,"mysql", $db);
      // Check connection
      if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT FROM cliente WHERE email =".$email."'AND password= '".$password."')";
      if(!empty($email) && !empty($password)){
  			  $result = $conn->query($sql);
      }
      if(isset($result) && $result){
        echo "<p class="."result-message"."> Login correct </p>";
      } else {
        echo "<p class="."result-message"."> Login incorrect</p>";
      }

      $conn->close();
    ?>
    <a href="index.php">
      <button class="continue">Continue</button>
    </a>
  </body>
</html>