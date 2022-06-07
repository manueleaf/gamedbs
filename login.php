<?php
    include_once 'header.php';
?>

<div class="wrapper">

<section class="index-intro">
   <h2>Log in</h2>
   <form action="includes/logininc.php" method="post">
    <input type="text" name="name" placeholder="Username/Correo">
    <input type="password" name="pwd" placeholder="Contraseña">
    <button type="submit" name="submit">Ingresar</button>
   </form>
</section>

<?php
if (isset($_GET["error"])){
    if($_GET["error"]=="emptyinput"){
       echo "<p>¡Llena todos los campos!</p>";
    } else if($_GET["error"]=="wronglogin"){
        echo "<p>Usuario o contraseña incorrectos</p>";
     }
}
?>

<?php
    include_once 'pie.php';
?>