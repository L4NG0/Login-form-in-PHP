<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>logowanie</title>
  <style type="text/css">
    body {
      background-color: lightyellow;
    }

    fieldset {
      background-color: burlywood;
    }

    form {
      margin-left: 35vw;
    }

  </style>
</head>

<body>
  <fieldset>
    <form action="logowanie.php" method="POST">
      <input type="text" name="login" placeholder="login">
      <input type="password" name="pass" placeholder="hasło">
      <input type="submit" name="submit" value="zaloguj">
    </form>
    <?php
  if(isset($_SESSION['error'])){
    echo '<span style="color: red; bold; margin-left: 35vw">'.$_SESSION['error'].'</span>';
    unset($_SESSION['error']);
  }
  ?>
  </fieldset>
</body>

</html>
