<?php
    include_once 'header.php';
?>
<?php
if(isset($_SESSION["useruid"])){
    echo "<p>Bienvenido " . $_SESSION["useruid"] . "</p>";
}
?>
<?php   
   if($_SESSION["userrolid"]==2){
    echo "<h1>aqui podra agregar monstruos al juego. </h1>";
   } else {
   header("location: ./index.php");
   exit();}
   ?>
<?php
    include_once 'pie.php';
?>