<?php
    include_once 'header.php';
?>
<?php
if(isset($_SESSION["useruid"])){
    echo "<p>Bienvenido " . $_SESSION["useruid"] . "</p>";
}
?>
    <div class="wrapper">

        <section class="index-intro">
            <h1>Listado de videojuegos</h1>
            <p>En esta pagina encontrarás una compilación de diversos juegos y te seran recomendados algunos dependiendo de los titulos que poseas</p>
        </section>

<?php
    include_once 'pie.php';
?>