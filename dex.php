<?php
session_start();
?>
<?php
if (isset($_SESSION["useruid"])){
    require_once './includes/dbhinc.php';
    require_once './includes/functionsinc.php';
    userOnline($conn, $_SESSION["userid"]);
}
?>

<!DOCTYPE html>
<html dir="ltr">
    <head>
        <meta charset="utf-8">
    </head>
    <style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111111;
}
</style>
    <body>
        <nav>
              <ul>
                  <?php
                  echo "<li><a href='index.php'>Inicio</a></li>";
                    if ($_SESSION["userrolid"]==2){
                        echo "<li><a href='listar.php'>Agregar Monstruos</a></li>";
                    }
                    echo "<li><a href='includes/logoutinc.php'>Log out</a></li>";
                    ?>
              </ul>
        </nav>
<?php
                   if (!isset($_SESSION["useruid"])){
                    header("location: ./index.php");
                   } 
?>
<!DOCTYPE html>
<style>
    body{
        background-color:black;
    }
</style>
<div style="display: inline-block; position: relative;">
    <div 
    id="overlapdiv"
    style="background-color:black; position: absolute; top:0; right:0; left:0; bottom:0; opacity: 0; pointer-events: none;"></div>
<canvas></canvas>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js" integrity="sha512-H6cPm97FAsgIKmlBA4s774vqoN24V5gSQL4yBTDOY2su2DeXZVhQPxFK4P6GPdnZqM9fg1G3cMv5wD7e6cFLZQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="data/collisions.js"></script>
<script src="data/pasto1Dato.js"></script>
<script src="data/pisoDato.js"></script>
<script src="data/classes.js"></script>
<script src="dex.js"></script>