<?php
    include_once 'header.php';
?>

<link rel="stylesheet" href="mystyle.css">
<?php
if(isset($_SESSION["useruid"])){
    echo "<p>Bienvenido " . $_SESSION["useruid"] . "</p>";
}
?>
    <div class="wrapper">

        <section class="index-intro">
            <h1>Hola</h1>
            <p>Este es un juego web desarrollado por una sola persona
                entrarás en un mundo en el que los enemigos dependerán del escenario donde te encuentres.
            </p>
        </section>

<?php
    include_once 'pie.php';
?>