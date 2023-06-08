<?php
session_start();
if(isset($_POST['submit'])){
  require_once("connect.php");
  
  try{
    $connection = new mysqli($host, $user, $password, $name);
    if($connection->connect_errno != 0){
      throw new Exception(mysqli_connect_errno());
    }
    else{
      $login = $_POST['login'];
      $pass = $_POST['pass'];
      
      $login = htmlentities($login, ENT_QUOTES, "UTF-8");
      
      if($rezultat = $connection->query(sprintf("SELECT * FROM users WHERE login='%s'", mysqli_real_escape_string($connection, $login)))){
        $num = $rezultat->num_rows;
        if($num){
          $hash = $rezultat->fetch_assoc();
          
          if(password_verify($pass, $hash['pass'])){
            header('Location: win.php');
          }
          else{
            $_SESSION['error'] = "Niepoprawny login lub hasło!";
            header('Location: index.php');
          }
        }
        else{
          $_SESSION['error'] = "Niepoprawny login lub hasło";
          header('Location: index.php');
        }
      }
    }
  }
  catch(Exception $exc){
    echo "Błąd serwera!";
  }
}
?>
