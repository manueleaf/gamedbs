<?php
session_start();
?>

<!DOCTYPE html>
<html dir="ltr">
    <head>
        <meta charset="utf-8">
    </head>
    <body>

        <nav>
            <div class="wrapper">
              <a href="index.php"><img src="img/logo.png"  alt="Games Info"></
              <ul>
                  <li><a href="index.php">Home</a></li>
                  <li><a href="info.php">Informacion</a></li>
                  <li><a href="Games.php">Lista</a></li>
                  <?php
                   if (isset($_SESSION["useruid"])){
                       if ($_SESSION["userrolid"]==1){
                        echo "<li><a href='profile.php'>Perfil</a></li>";
                        echo "<li><a href='includes/logoutinc.php'>Log out</a></li>";
                    } elseif ($_SESSION["userrolid"]==2){
                        echo "<li><a href='agregar.php'>Agregar Monstruos</a></li>";
                        echo "<li><a href='dex.html'>Jugar</a></li>";
                        echo "<li><a href='includes/logoutinc.php'>Log out</a></li>";
                    } 
                   } 
                   else{
                    echo "<li><a href='signup.php'>Sign up</a></li>";
                    echo "<li><a href='login.php'>Login</a></li>";
                    }
                    ?>
              </ul>
            </div>
        </nav>

    <div class="wrapper">