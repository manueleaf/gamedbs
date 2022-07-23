<?php
    include_once 'header.php';
?>

    <div class="wrapper">

        <section>
           <h2>Sign Up</h2>
           <form action="./includes/signupinc.php" method="post">
            <input type="text" name="name" placeholder="Nombre">
            <input type="text" name="uid" placeholder="Username">
            <input type="text" name="email" placeholder="Correo">
            <input type="password" name="pwd" placeholder="Contraseña">
            <input type="password" name="rptpwd" placeholder="Repetir contraseña">
            <button type="submit" name="submit">Enviar</button>
           </form>
        </section>

<?php
if (isset($_GET["error"])){
    if($_GET["error"]=="emptyinput"){
       echo "<p>¡Llena todos los campos!</p>";
    } else if($_GET["error"]=="invalidusername"){
        echo "<p>¡Hay caracteres invalidos en su nombre de usuario!</p>";
     } else if($_GET["error"]=="invalidemail"){
        echo "<p>¡Coloque un email real!</p>";
     } else if($_GET["error"]=="pwderror"){
        echo "<p>¡Las contraseñas no coinciden!</p>";
     } else if($_GET["error"]=="usertaken"){
        echo "<p>¡Nombre de usuario ya existente!</p>";
     } else if($_GET["error"]=="stmterror"){
        echo "<p>Algo salió mal, intentelo de nuevo</p>";
     } else if($_GET["error"]=="none"){
        echo "<p>¡se ha inscrito con exito!</p>";
     }
}
?>

<?php
    include_once 'pie.php';
?>