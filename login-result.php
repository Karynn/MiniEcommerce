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
      if(isset($_POST['login'])){
        $login = $_POST['login'];
      } else{
        $login = null;
      }
      if(isset($_POST['password'])){
        $password = $_POST['password'];
      } else {
        $password = null;
      }
      $servername = "localhost";
      $username = "root";
      $db = "miniecommerce";
      $conn = new mysqli($servername, $username, "", $db);
      if ($conn->connect_error) {
         echo "Connection failed: " . $conn->connect_error;
       }
      if(!empty($login) && !empty($password)){
        $sql = "SELECT * FROM usuario WHERE LOGIN='".$login."' AND PASSWD ='$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          session_start();
          if( isset($_SESSION["is_open"])){
            echo  " <center>There is already a session!!!!<br></center>";
          }else{

            $row = $result->fetch_assoc();
            $login = $row["LOGIN"];
            $name = $row["LOGIN"];
            $timeInit = date("Y-m-d H:i:s");
            $active = 1;
            $sql = "INSERT into sesion (LOGIN,FECHA_INI,ACTIVO) values ('".$login."','".$timeInit."','".$active."')";
            $result = $conn->query($sql);

            $_SESSION["login"] = $login;
            $_SESSION["user"]= $name;
            $_SESSION["timeInit"] = $timeInit;
            $_SESSION["is_open"] = true;
            echo $login."<br>";
            echo "<p class="."result-message".">Login Successful </p>";
          }
        } else {

          echo "<p class="."result-message".">Incorrect Login </p>";
        }
      } else {
        echo "<p class="."result-message".">Enter Login and Password </p>";
      }
      $conn->close();
    ?>
    <br>
    <center>
    <a href="index.php">
      <button class="continue">Continue</button>
    </a>
  </center>
  </body>
</html>
